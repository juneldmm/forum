@extends('app')
@section('content')
    <div class="jumbotron">
        <div class="container">

            <h2>欢迎来到maggie live社区<a class="btn btn-danger btn-lg pull-right" href="/discussions/create" role="button">发新帖</a></h2>

        </div>
    </div>
    <div class="container">
       <div class="row">
         <div class="col-md-9" role="main">
             @foreach($discussions as $discussion)
                <div class="media">
                    {{--贴主的头像--}}
                    <div class="media-left">
                       <a href="#">
                       <img class="media-object img-circle" alt="64*64" src="{{$discussion->user->avatar}}" style="width:64px;height:64px">
                       </a>
                    </div>

                    <div class="media-body">
                        {{--帖子标题--}}
                        <h4 class="media-heading"><a href="discussions/{{$discussion->id}}"><p class="text-primary">{{$discussion->title}}</p></a> </h4>
                            <div class="media-conversation-meta">
                                <span class="media-conversation-replies">
                                    {{--评论条数--}}
                                    <a href="discussions/{{$discussion->id}}"><span class="label label-info">{{count($discussion->comments)}}</span></a>
                                </span>
                            </div>
                                 {{--帖子作者--}}
                        <p class="text-muted">作者:{{$discussion->user->name}}</p>
                    </div>

                 </div>
             @endforeach
             {!! $discussions->appends(['type'=>'discussion','name'=>'maggie'])->render() !!}
         </div>
       </div>
    </div>

@stop