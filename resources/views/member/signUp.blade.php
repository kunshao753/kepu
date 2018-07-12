<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>申报评审系统-报名-声明打印</title>
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

<div class="form-schedule w">
        <h3>我要报名</h3>
        <div class="d-prompt">
            <p>1.下载声明打印（企业盖章，创客团队签名）；
                <br/>
                2.扫描PDF上传（在上传资料中上传）。</p>
        </div>
    </div>
    <div class="f-btn pt40">
        <a href="/测试声明文件.pdf" target="_blank" class="confirm green-btn-d">下载</a>
        <a href="{{route('member.corpInfo')}}" class="confirm">下一步</a>
        <a href="javascript:void(0);" id="goBack" class="confirm green-btn">取消</a>
    </div>
    <div class="footer">
        <span>中国科学技术协会版权所</span>
        <span>中国科学技术协会版权所</span>
    </div>
    <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $(function(){
            $('#goBack').click(function(){
                window.history.back()
            })
        })
    </script>
</body>
</html>
