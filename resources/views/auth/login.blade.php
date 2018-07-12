<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>申报评审系统-登录页</title>
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
            @if ($errors->has('mobile') || $errors->has('password'))
                    <script>
                        alert('手机号密码输入有误, 请重新输入');
                    </script>
            @endif
            <ul class="form-list">
                <li>
                    <input type="tel" id="mobile" maxlength="11" name="mobile" data-title="手机号" placeholder="手机号" />
                    <div id="mobileTip"></div>
                </li>
                <li>
                    <input type="password" id="password" name="password" maxlength="20" data-title="密码"  placeholder="密码" />
                    <div id="passwordTip"></div>
                </li>
            </ul>
            <div class="f-btn">
                <button type="submit" class="confirm">登录</button>
            </div>
        </div>
    </form>
    <div class="footer">
        <span>中国科学技术协会版权所</span>
        <span>中国科学技术协会版权所</span>
    </div>
    <script src="/js/jquery-1.11.0.min.js" ></script>
    <script src="/js/jquery-migrate-1.2.1.js" ></script>
    <script src="/js/jquery-ui.min.js" ></script>
    <script src="/js/formvalidator4.1.3/formValidator-4.1.3.js" ></script>
    <script src="/js/formvalidator4.1.3/formValidatorRegex.js" ></script>
    <style>
        .form-list li{
            position: relative;
        }
        #passwordTip, #password-confirmTip, #mobileTip, #emailTip, #nameTip{
            font-size: 20px;
            color: #f8386b;
            position: absolute;
            right: 15px;
            top:21px;
            height: 60px;
            width: 260px;
            line-height: 60px;
            text-align: left;
        }
        #passwordTip div,  #password-confirmTip div, #mobileTip div, #emailTip div,#nameTip div{
            font-size: 20px;
            color: #f8386b;
        }
    </style>
    <script>
        $(function(){
            $.formValidator.initConfig({
                formID:"form",
                onSuccess:function(){
                    return true;
                },
                onError:function(){
                    return false;
                }
            });
            $("#mobile").formValidator({
                onShow:"*必填",
                onFocus:"手机号11位数字",
            }).regexValidator({
                regExp:"mobile",
                dataType:"enum",
                onError:"手机号码格式不正确"
            });
            $("#password").formValidator( {
                onShow :"*必填",
                onFocus :"6-20位数字、字母",
            }).inputValidator( {
                min :1,
                onError :"密码不能为空"
            }).inputValidator( {
                min :6,
                empty : {
                    leftEmpty :false,
                    rightEmpty :false,
                    emptyError :"两边不能有空"
                },
                onError :"6-20位数字、字母"
            }).functionValidator({
                fun:testNewPassword
            });
        })

    </script>
</body>
</html>