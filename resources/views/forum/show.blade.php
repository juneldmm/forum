@extends('app')
@section('content')
    <div class="jumbotron">
        <div class="container">
            <div class="media">
                <div class="media-left">
                    <a href="#">
                        <img class="media-object img-circle" alt="64*64" src="{{$discussion->user->avatar}}" style="width:64px;height:64px">
                    </a>

                </div>
                <div class="media-body">
                    <h4 class="media-heading">{{$discussion->title}}
                   @if(Auth::check() && Auth::user()->id == $discussion->user_id)
                    <a class="btn btn-primary btn-lg pull-right" href="/discussions/{{$discussion->id}}/edit" role="button">修改帖子</a>
                    @endif
                    </h4>
                    {{$discussion->user->name}}
                </div>

            </div>

        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-9" role="main" id="maggie">
               <div class="blog-post">
                  <h3>{{ $html}}</h3>
               </div>
                <hr>
                @foreach($discussion->comments as $comment)
                    <div class="media">
                        <div class="media-left">
                           <a href="#">
                           <img class="media-object img-circle" alt="64*64" src="{{$comment->user->avatar}}" style="width:64px;height:64px">
                           </a>
                         </div>
                        <div class="media-body">
                        <h5 class="media-heading"><span class="text-primary">{{$comment->user->name}}</span><span class="text-muted">&nbsp;&nbsp;/&nbsp;&nbsp;发表于{{$comment->created_at}}</span></h5>
                            <div class="media-conversation-meta">
                                <span class="media-conversation-replies">
                                    {{--回复--}}
                                    <a href=""><span class="label label-info">回复</span></a>
                                </span>
                            </div>
                            {{$comment->body}}
                        </div>
                     </div>
                @endforeach
                {{--<div class="media" v-for="comment in comments">--}}
                    {{--<div class="media-left">--}}
                        {{--<a href="#">--}}
                            {{--<img class="media-object img-circle" alt="64*64" src="@{{comment.avatar}}" style="width:64px;height:64px">--}}
                        {{--</a>--}}
                    {{--</div>--}}
                    {{--<div class="media-body">--}}
                        {{--<h4 class="media-heading">@{{comment.name}}</h4>--}}
                        {{--@{{comment.body}}--}}
                    {{--</div>--}}
                {{--</div>--}}
                <hr>
                @if(Auth::check())
                {!! Form::open(['url'=>'/comment','v-on:submit'=>'onSubmitForm']) !!}
                        {!! Form::hidden('discussion_id',$discussion->id) !!}
                          <!--body Field-->
                   <div class="form-group">
                        {!!Form::textarea('body',null,['class'=>'form-control','v-model'=>'newPost.body'])!!}
                   </div>
                <div>
                    {!! Form::submit('发表评论',['class'=>'btn btn-success pull-right','@click'=>'showdiscussion']) !!}
                </div>
                {!! Form::close() !!}
                @else
                    <a href="/login" class="btn btn-block btn-success">登录参与评论</a>
                @endif

            </div>
        </div>

    </div>

<script>
    {{--Vue.http.headers.common['X-CSRF-TOKEN']=document.querySelector('#token').getAttribute(value);--}}
    {{--new Vue({--}}
        {{--el:'#maggie',--}}
        {{--data:{--}}
            {{--comments:[],--}}
            {{--newComment:{--}}
                {{--name:'{{Auth::user()->name}}',--}}
                {{--avatar:'{{Auth::user()->avatar}}',--}}
                {{--body:''--}}
            {{--},--}}
            {{--newPost:{--}}
                {{--discussion_id:'{{$discussion->id}}',--}}
                {{--user_id:'{{Auth::user()->id}}',--}}
                {{--body:''--}}

            {{--}--}}
        {{--},--}}
        {{--methods:{--}}
            {{--onSubmitForm:function(e){--}}
                {{--e.preventDefault();--}}
                {{--var comment=this.newComment;--}}
                {{--var post=this.newPost;--}}
                {{--post.body=comment.body;--}}
                {{--this.$http.post('/comment',post,function(){--}}
                    {{--this.comments.push(comment);--}}
                {{--});--}}
                {{--this.newComment={--}}
                    {{--name:'{{Auth::user()->name}}',--}}
                    {{--avatar:'{{Auth::user()->avatar}}',--}}
                    {{--body:''--}}
                {{--}--}}
            {{--}--}}
        {{--}--}}
    {{--});--}}
</script>


        <!--百度一键分享-->
    <script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"16"},"slide":{"type":"slide","bdImg":"6","bdPos":"left","bdTop":"250"},"image":{"viewList":["qzone","tsina","tqq","renren","weixin"],"viewText":"分享到：","viewSize":"16"},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["qzone","tsina","tqq","renren","weixin"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>



@endsection


