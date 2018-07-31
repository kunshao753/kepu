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
        @elseif(stripos(\Illuminate\Support\Facades\Request::getRequestUri(),'signUp') !== false)
            申报评审系统-报名-声明打印
        @elseif(stripos(\Illuminate\Support\Facades\Request::getRequestUri(),'index') !== false)
            申报评审系统-个人中心
        @elseif(stripos(\Illuminate\Support\Facades\Request::getRequestUri(),'login') !== false)
            申报评审系统-登录页
        @elseif(stripos(\Illuminate\Support\Facades\Request::getRequestUri(),'register') !== false)
            申报评审系统-注册页
        @else
            申报评审系统--上传资料
        @endif
    </title>
    <link rel="stylesheet" href="/styles/base.css?r=131" />
    <link rel="stylesheet" href="/styles/style.css?r=132" />
    <link rel="stylesheet" href="/css/jquery-ui.css?r=132" />
    <link rel="stylesheet" href="/styles/index.css?r=132" />
</head>
<body>
<div class="header">
    <div class="top-bar">
        <div class="w">
            <div class="logo"></div>
            <ul class="menu">
                <li ><a href="{{route('member.jump')}}">关于活动</a></li>
                <li ><a href="{{route('member.jump')}}">优秀作品</a></li>
                <li ><a href="{{route('member.jump')}}">活动现场</a></li>
                <li ><a href="{{route('member.jump')}}">指导专家</a></li>
                <li ><a href="{{route('member.jump')}}">加入我们</a></li>
            </ul>
            <div class="login-box">
                <label class="txt">
                    @if(Auth::guest())
                        <a href="{{ route('login') }}">登录</a> <span>|</span><a href="{{ route('register') }}">注册</a><span>|</span>
                    @else
                        @if(Auth::user()->permission != 1)
                            <a  href="{{route('member.index')}}" class="login">{{ Auth::user()->name }}</a><span>|</span>
                        @endif
                        <a  href="{{ route('logout') }}" class="sign-up" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">退出</a><span>|</span>
                        <form style="border:0; display: none" id="logout-form" action="{{ route('logout') }}" method="POST" >{{ csrf_field() }} </form>
                    @endif
                    <a href="javascript:void(0);" class="question-btn">咨询答疑</a>
                </label>
                <a href="javascript:void(0);" class="wechat"></a>
                <a href="javascript:void(0);" class="webo"></a>
            </div>
        </div>
    </div>

    {{--<h2>科普互联网大赛</h2>--}}
    {{--<h3>项目报名</h3>--}}
    {{--<p class="text01">Project registration system</p>--}}
    {{--<p class="text02">Lorem ipsum dolor sit amet , consectetur adipiscing elit .</p>--}}

</div>
<div style="width: 1100px; margin: 0 auto; padding-bottom:100px; background: rgba(255, 255, 255, 1); overflow: hidden">
@yield('content')
</div>
<div class="footer clearfix" style="margin-top:100px;">
    <div class="w">
        <table >
            <tr>
                <td valign="top"><img class="f_logo" src="/images/idex_82.png" /></td>
                <td valign="top">
                    <div class="f_m">
                        <img class="pic-title" src="/images/idex_79.png" />
                        <p class="title">主办单位</p>
                        <p class="text">中国科协科普部</p>
                        <p class="title">承办单位</p>
                        <p class="text">中国科协科技传播中心</p>
                        <p class="title">协办单位</p>
                        <p class="text"> 中国科学技术出版社、优客工场、启迪之星、中国科技新闻学会、椅子网 </p>
                    </div>
                </td>
                <td valign="top">
                    <div class="f_r">
                        <img class="pic-title" src="/images/idex_79.png" />
                        <p class="text contact">
                            中国科协科学技术传播中心：侯&nbsp;&nbsp;健&nbsp;&nbsp;&nbsp;&nbsp;于&nbsp;&nbsp;春<br />
                            联系电话：（010）87413332<br />
                            邮箱：kpcpds@cast.org.cn<br />
                            中国科协科普部：邢&nbsp;&nbsp;然&nbsp;&nbsp;&nbsp;&nbsp;张&nbsp;&nbsp;斌<br />
                            联系电话：（010）68578253
                        </p>
                    </div>
                </td>
            </tr>
        </table>
        <div class="f-bar">
            中国科学技术协会版权所<span style="padding:0 20px;">|</span>中国科学技术协会版权所
        </div>
    </div>
</div>
<div class="pop-up" id="q-pop-up" style="display: none">
    <div class="mask"></div>
    <div class="form-cont w">
        <i class="closeicon"></i>
        <h3 class="big-tit">
            咨询答疑
        </h3>
        <form id="qform">
            {{ csrf_field() }}
            <ul class="form-list form-list-q">
                <li>
                    <input type="text" id="qname"maxlength="8" name="name" data-title="用户名" placeholder="用户名">
                    <div id="qnameTip"></div>
                </li>
                <li>
                    <input type="text" id="qmobile" maxlength="11"  name="mobile" data-title="手机号" placeholder="请留下您的手机号" />
                    <div id="qmobileTip"></div>
                </li>
                <li>
                    <input type="text" id="qemail" name="email" maxlength="40" data-title="邮箱"  placeholder="请留下您的邮箱">
                    <div id="qemailTip"></div>
                </li>
                <li>
                    <input type="text" id="qquestion" name="question" maxlength="29" data-title="您的问题"  placeholder="您的问题">
                    <div id="qquestionTip"></div>
                </li>
                <li>
                    <textarea id="qdescription" name="description" maxlength="99"  data-title="描述问题" placeholder="请描述您的问题"></textarea>
                    <div id="qdescriptionTip"></div>
                </li>
            </ul>
            <div class="f-btn">
                <button class="confirm">提交</button>
            </div>
        </form>
    </div>
</div>
<style>
    .form-list-q li{ position: relative; }
    #qdescriptionTip, #qquestionTip, #qmobileTip, #qemailTip, #qnameTip{
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
    #qdescriptionTip div,  #qquestionTip div, #qmobileTip div, #qemailTip div,#qnameTip div{
        font-size: 20px;
        color: #f8386b;
    }
</style>

<script>

    $(function(){
        $('.question-btn').click(function () {
            $('.form-list-q input, .form-list-q textarea').val('');
            $("#q-pop-up").show();
        })
        $('.closeicon').click(function () {
            $("#q-pop-up").hide();
            window.location.href = window.location.href;
        })
        var questionSubmit = function () {
            var config = ['name','mobile','email','question','description'];
            var data = {};
            for (var x in config){
                data[config[x]] = $('#q'+config[x]).val();
            }
            $(".form-list-q input, .form-list-q textarea").val('');
            $("#q-pop-up").hide();
            $.ajax({
                type:"POST",
                url:"{{route('message.create')}}",
                data:data,
                dataType:"json",
                success:function(response){
                    if(response.status == 'success'){
                       alert("提交成功！");
                       window.location.href = window.location.href;
                    }
                }
            })
        }
        $.formValidator.initConfig({
            formID: "qform",
            validatorGroup: "2",
            onSuccess:function(){
                questionSubmit();
                return false;
            },
            onError:function(){
                return false;
            }
        });
        $("#qname").formValidator( {
            validatorGroup: "2",
            onShow :"*必填",
            onFocus :"2-8位，字母和汉字",
        }).inputValidator( {
            min :2,
            onError :"2-8位，字母和汉字"
        }).regexValidator({
            regExp:"^[a-zA-Z\u4E00-\u9FA5]+$",
            onError:"2-8位，字母和汉字"
        });
        $("#qmobile").formValidator({
            validatorGroup: "2",
            onShow:"*必填",
            onFocus:"手机号11位数字",
        }).regexValidator({
            regExp:"mobile",
            dataType:"enum",
            onError:"手机号码格式不正确"
        });

        $("#qemail").formValidator({
            validatorGroup: "2",
            onShow:"*必填",
            onFocus:"邮箱6-40个字符",
        }).regexValidator({
            regExp:"^([\\w-.]+)@(([[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}.)|(([\\w-]+.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(]?)$",
            onError:"邮箱格式不正确"
        });
        $("#qquestion").formValidator( {
            validatorGroup: "2",
            onShow:"*必填",
            onFocus :"2-30位",
        }).inputValidator( {
            min :2,
            onError :"问题不能为空"
        }).inputValidator( {
            empty : {
                leftEmpty :false,
                rightEmpty :false,
                emptyError :"两边不能有空"
            },
            onError :"2-30位"
        });
        $("#qdescription").formValidator( {
            validatorGroup: "2",
            onShow:"*必填",
            onFocus :"2-100位",
        }).inputValidator( {
            min :2,
            onError :"描述问题不能为空"
        }).inputValidator( {
            empty : {
                leftEmpty :false,
                rightEmpty :false,
                emptyError :"两边不能有空"
            },
            onError :"2-100位"
        });

    })
</script>

</body>
</html>