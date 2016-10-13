<!DOCTYPE html>
<html>
<head>
    <title>Laravel 论坛</title>
    <link href="/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="/css/style.css" rel="stylesheet" type="text/css">
    <link href="/css/font-awesome.css" rel="stylesheet">
    <link href="/css/jquery.Jcrop.css" rel="stylesheet">
    <link href="/css/footor.css" rel="stylesheet">
    <script src="/js/vue.js"></script>
    <script src="/js/vue-resource.min.js"></script>
    <script src="/js/jquery-2.1.4.min.js" ></script>
    <script src="/js/jquery.form.js"></script>
    <script src="/js/jquery.Jcrop.min.js"></script>
    <script src="/js/bootstrap.min.js" ></script>
<meta id="token" name="token" value="{{csrf_token()}}">
</head>
<body>
<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">maggie live</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="/">首页</a></li>

            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if(Auth::check())
                    <li><a id="dLable" type="'button" data-toggle="dropdown"  aria-expanded='true'>{{Auth::user()->name}}</a>
                        <ul class="dropdown-menu" aria-labelledby="dLabel">
                            <li><a href="/user/avatar"> <i class="fa fa-user"></i> 更换头像</a></li>
                            <li><a href=""> <i class="fa fa-cog"></i> 更换密码</a></li>
                            <li><a href=""> <i class="fa fa-heart"></i> 特别感谢</a></li>
                            <li role="separator" class="divider"></li>
                            <li> <a href="/logout">  <i class="fa fa-sign-out"></i> 退出登录</a></li>
                        </ul>
                    </li>
                <li><img src="{{Auth::user()->avatar}}" class="img-circle" width="50" alt="用户头像"> </li>

                @else
                     <li><a href="/login">登录</a></li>
                     <li><a href="/register">注册</a></li>
                @endif
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>


@yield('content')

<script>
    $(document).ready(function(){
        $("#top_btn").click(function(){if(scroll=="off") return;$("html,body").animate({scrollTop: 0}, 600);});
    });
</script>
<div id="leftsead">
            <a id="top_btn">
                <div class="hides" style="width:161px;display:none">
                    <img src="/uploads/ll06.png" width="161" height="49" />
                </div>
                <img src="/uploads/l06.png" width="47" height="49" class="shows" />
            </a>

</div>

<div class="container">
    <div class="footer_m">
        <div class="inner-footer_m">
            <div class="links z m">
                  <p class="text-center">
                      <a href="http://blog.sina.com.cn/u/2347568907" target="_blank">关于我们</a>
                      <a href="http://blog.sina.com.cn/u/2347568907" target="_blank">联系我们</a>
                      <a href="http://blog.sina.com.cn/u/2347568907" target="_blank">友情链接</a>
                      <a class="copyright">Maggie && Leacent</a>
                      <span>
                          Powered by <a target="_blank" href="http://www.discuz.net/">laravel!</a> X3
                      </span>
                  </p>
            </div>

        </div>

    </div>
</div>
</body>
</html>