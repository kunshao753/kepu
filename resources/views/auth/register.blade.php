<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link rel="stylesheet" href="/styles/base.css">
    <link rel="stylesheet" href="/styles/style.css">
    <link rel="stylesheet" href="/css/jquery-ui.css">
</head>
<body class="gray-b">
    <div class="header">
        <h2>科普互联网大赛</h2>
        <h3>项目报名</h3>
        <p class="text01">Project registration system</p>
        <p class="text02">Lorem ipsum dolor sit amet , consectetur adipiscing elit .</p>
    </div>
    <div class="login-s w">
        <span>已有账号，</span>
        <a href="{{ route('login') }}">马上登录</a>
        <em>|</em>
        <a href="/">返回</a>
    </div>
    <form  method="POST" id="form" action="{{ route('register') }}">
        {{ csrf_field() }}
        <div class="form-cont w">
            <h3 class="big-tit">
                注册会员
            </h3>
            <ul class="form-list">
                <li>
                    <input type="tel" id="mobile" maxlength="11" name="mobile" data-title="手机号" placeholder="手机号" />
                    <div id="mobileTip"></div>
                </li>
                <li>
                    <input type="password" id="password" name="password"  data-title="密码"  placeholder="密码" />
                    <div id="passwordTip"></div>
                </li>
                <li>
                    <input type="password" name="password_confirmation" id="password-confirm" placeholder="确认密码" data-title="确认密码" />
                    <div id="password-confirmTip"></div>
                </li>
                <li>
                    <input type="text" name="email" maxlength="40" id="email" placeholder="邮箱" />
                    <div id="emailTip"></div>
                </li>
                <li>
                    <input type="text" name="name" maxlength="8" id="name" placeholder="姓名" />
                    <div id="nameTip"></div>
                </li>
            </ul>
            <div class="f-btn">
                <button type="submit" class="confirm">注册</button>
            </div>
        </div>
        @if ($errors->has('mobile') ||  $errors->has('email'))
            <script>
                @if($errors->first('mobile'))
                    alert('手机号已注册');
                @else
                    alert('邮箱已注册');
                @endif
            </script>
        @endif
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
                onFocus :"必包含数字字母组合",
            }).inputValidator( {
                min :1,
                onError :"密码不能为空"
            }).inputValidator( {
                min :6,
                max :20,
                empty : {
                    leftEmpty :false,
                    rightEmpty :false,
                    emptyError :"两边不能有空"
                },
                onError :"6-20位数字、字母"
            }).functionValidator({
                fun:testNewPassword
            });
            $("#password-confirm").formValidator( {
                onShow :"*必填",
                onFocus :"6-20位数字、字母",
                onCorrect :"&nbsp;"
            }).inputValidator( {
                min :1,
                onError :"确认密码不能为空"
            }).inputValidator( {
                min :6,
                max :20,
                empty : {
                    leftEmpty :false,
                    rightEmpty :false,
                    emptyError :"两边不能有空"
                },
                onError :"6-20位数字、字母"
            }).compareValidator( {
                desID :"password",
                operateor :"=",
                onError :"两次密码不一致"
            });
            $("#email").formValidator({
                onShow :"*必填",
                onFocus:"邮箱6-100个字符",
            }).regexValidator({
                regExp:"^([\\w-.]+)@(([[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}.)|(([\\w-]+.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(]?)$",
                onError:"邮箱格式不正确"
            });
            $("#name").formValidator( {
                onShow :"*必填",
                onFocus :"2-8汉字和字母",
            }).inputValidator( {
                min :1,
                onError :"姓名不能为空"
            });
        })

    </script>
</body>
</html>