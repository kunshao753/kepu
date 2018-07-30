@extends('layouts.top')
@section('content')
    <div class="login-s " style="position: relative; bottom: -25px; padding-right: 40px;">
        <span>还没有账号？</span>
        <a href="{{ route('register') }}">注册</a>
    </div>
    <form  method="POST" id="form" action="{{ route('login') }}">
        {{ csrf_field() }}
        <div class="my-data w">
            <h3>会员登录</h3>
        </div>
        <div class="form-cont w">
            <ul class="form-list">
                <li>
                    <input type="tel" id="mobile" maxlength="11" name="mobile" data-title="手机号" placeholder="手机号" />
                    <div id="mobileTip"></div>
                </li>
                <li>
                    <input type="password" id="password" name="password" maxlength="20" data-title="密码"  placeholder="密码" />
                    <div id="passwordTip"></div>
                </li>
                <li style="min-height: 65px;">
                    <input type="text" class="check-input"  id="checkcode" maxlength="5" name="checkcode"  placeholder="验证码" />
                    <div class="check-img-box">
                        <img src="{{route('checkCode.create')}}" class="check-img" id="checkcodeimg" >
                        <a  href="javascript:void(0);" onClick="checkCode()">换一张</a>
                    </div>
                    <div id="checkcodeTip"></div>
                </li>
            </ul>
            <div class="f-btn">
                <button type="submit" class="confirm">登录</button>
            </div>
        </div>
    </form>
    <style>
        .form-list li{ position: relative;  }
        #passwordTip, #password-confirmTip, #mobileTip, #emailTip, #nameTip,#checkcodeTip{
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
        #passwordTip div,#checkcodeTip div,  #password-confirmTip div, #mobileTip div, #emailTip div,#nameTip div{
            font-size: 20px;
            color: #f8386b;
        }
        .check-input{
            position: absolute;
            left:323px;
            top:20px;
            width: 180px !important;
        }
        .check-img{
            width: 170px;
            border-radius:6px;
            height: 60px;
        }
        .check-img-box{
            position: absolute;
            left:535px
        }
    </style>
    <script src="/js/jquery-1.11.0.min.js" ></script>
    <script src="/js/jquery-migrate-1.2.1.js" ></script>
    <script src="/js/jquery-ui.min.js" ></script>
    <script src="/js/formvalidator4.1.3/formValidator-4.1.3.js?r=1" ></script>
    <script src="/js/formvalidator4.1.3/formValidatorRegex.js" ></script>
    <script>
        var checkCode = function (){
            $.ajax({
                url:"{{route('checkCode.create')}}",
                type: 'GET',
                success: function(data){
                    if(data){
                        $("#checkcodeimg").attr('src', $('#checkcodeimg').attr('src'));
                    }else{
                        alert("获取验证码失败！");
                    }
                }
            })
        }
    </script>
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
            $("#checkcode").formValidator({
                onShow:"*必填",
                onFocus:"5位数字、字母",
            }).inputValidator( {
                min :5,
                onError :"5位数字、字母"
            }).ajaxValidator({
                dataType: "json",
                async: true,
                url: "{{route('checkCode.verifyCheckCode')}}",
                success: function (response) {
                    console.log(response)
                    if(response.status == 'success'){
                        return true;
                    }else{
                        checkCode();
                        return false;
                    }
                },
                onError: "验证码输入有误",
                onWait: " "
            });
        })

    </script>
@endsection
