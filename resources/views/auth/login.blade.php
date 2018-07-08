<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/styles/base.css">
    <link rel="stylesheet" href="/styles/style.css">
</head>
<body class="gray-b">
    <div class="header">
        <h2>科普互联网大赛</h2>
        <h3>项目报名</h3>
        <p class="text01">Project registration system</p>
        <p class="text02">Lorem ipsum dolor sit amet , consectetur adipiscing elit .</p>
    </div>
    <div class="login-s w">
        <span>还没有账号？</span>
        <a href="{{ route('register') }}">注册</a>
        <em>|</em>
        <a href="/">返回</a>
    </div>
    <form  method="POST" id="form" action="{{ route('login') }}">
        {{ csrf_field() }}
        <div class="form-cont w">
            <h3 class="big-tit">
                会员登录
            </h3>
            <ul class="form-list">
                <li>
                    <input type="text" name="email" id="email" data-title="邮箱" placeholder="邮箱">
                    <label for="">*必填</label>
                </li>
                <li>
                    <input type="password" name="password" id="password"  data-title="密码" placeholder="密码">
                    <label for="">*必填</label>
                </li>
            </ul>
            <div class="f-btn">
                <a href="javascript:void(0);" class="confirm">登录</a>
            </div>
        </div>
    </form>
    <div class="footer">
        <span>中国科学技术协会版权所</span>
        <span>中国科学技术协会版权所</span>
    </div>
    <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $(function(){
            var config = ['email','password'];
            var checkInput = function(){
                var flag = true;
                for (var x in config){
                    if ($('#'+config[x]).val() == ''){
                        $('#'+config[x]).closest('li').find('label').html(
                            $('#'+config[x]).attr('data-title')+'不能为空'
                        );
                        flag = false;
                    }
                }
                return flag;
            }
            $('.confirm').click(function(){
                if (checkInput() == false){
                    return;
                }
                $('#form').submit();
            })
        })
    </script>
</body>
</html>