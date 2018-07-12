<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @if(stripos(\Illuminate\Support\Facades\Request::getRequestUri(),'corpInfo') !== false)
            申报评审系统--基本信息
        @elseif(stripos(\Illuminate\Support\Facades\Request::getRequestUri(),'projectTeam') !== false)
            申报评审系统--项目团队
        @elseif(stripos(\Illuminate\Support\Facades\Request::getRequestUri(),'projectInfo') !== false)
            申报评审系统--项目信息
        @else
            申报评审系统--上传资料
        @endif
    </title>
    <link rel="stylesheet" href="/styles/base.css">
    <link rel="stylesheet" href="/styles/style.css">
    <link rel="stylesheet" href="/css/jquery-ui.css">
</head>
<body>
<div class="header">
    <h2>科普互联网大赛</h2>
    <h3>项目报名</h3>
    <p class="text01">Project registration system</p>
    <p class="text02">Lorem ipsum dolor sit amet , consectetur adipiscing elit .</p>
    <div class="login" style=" color: #fff; font-size: 20px; position: absolute; right: 30px; top:50px;">
        @if(Auth::user()->permission == 1)
            <a style="color: #fff; margin-right:10px;" href="{{route("admin.index")}}">首页</a> |
        @else
            <a style="color: #fff; margin-right:10px;" href="/">首页</a> |
            <a style="color: #fff;margin-left:10px;margin-right:10px;" href="{{route('member.index')}}" class="login">{{ Auth::user()->name }}</a> |
        @endif
        <a style="color: #fff;margin-left:10px;" href="{{ route('logout') }}" class="sign-up" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">  退出  </a>
        @if (!Auth::guest())
            <form style="border:0;" id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        @endif
    </div>
</div>

@yield('content')


</body>
</html>