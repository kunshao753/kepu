<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>index</title>
    <link rel="stylesheet" href="/styles/base.css" type="text/css" />
    <link rel="stylesheet" href="/styles/style.css" type="text/css" />
</head>
<body>
<div class="main-banner">
    <div class="login-header w clearfix">
        <div class="login-mode">
                    <span class="weibo">
                        <i class="weibo-icon"></i>
                        <div class="qr-code" style="display: none">
                            <i class="icon01"></i>
                            <img src="img/qr-code.jpg" alt=""÷>
                        </div>
                    </span>
                    <span class="wechat">
                        <i class="wechat-icon"></i>
                        <div class="qr-code"  style="display: none">
                            <i class="icon01"></i>
                            <img src="img/qr-code.jpg" alt=""÷>
                        </div>
                    </span>
        </div>

        <div class="login">
            @if (Auth::guest())
                <a href="{{ route('login') }}" class="login">登录</a>
                <a href="{{ route('register') }}" class="sign-up">注册</a>
            @else
                <a href="{{route('member.index')}}" class="login">{{ Auth::user()->name }}</a>
                <a href="{{ route('logout') }}" class="sign-up" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">  退出  </a>
                <form style="border:0;" id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
                </form>
            @endif
        </div>
    </div>
    <h2 class="big-tit">科普互联网大赛</h2>
    <div class="sign-button">
        @if (Auth::guest())
            <a href="{{route('login')}}" class="sign-btn">报名</a>
        @else
            @if($isCenter == 1)
                <a href="{{route('member.index')}}" class="sign-btn">已报名</a>
            @else
                <a href="{{route('member.signUp')}}" class="sign-btn">报名</a>
            @endif
        @endif
        <a href="javascript:void(0);" class="question-btn">咨询答疑</a>
    </div>
    <p class="synopsis-t">Lorem ipsum dolor sit amet , consectetur adipiscing elit .</p>
</div>
<div class="summary-cont w">
    <ul class="btn-list clearfix">
        <li id="works-cont-b">
            <div class="img-wrap">
                <img src="img/works01.png" alt="">
            </div>
            <h3>优秀作品</h3>
        </li>
        <li id="activity-scene-b">
            <div class="img-wrap">
                <img src="img/works02.png" alt="">
            </div>
            <h3>活动现场</h3>
        </li>
        <li id="about-cont-b">
            <div class="img-wrap">
                <img src="img/works03.png" alt="">
            </div>
            <h3>关于大赛</h3>
        </li>
        <li id="rater-cont-b">
            <div class="img-wrap">
                <img src="img/works04.png" alt="">
            </div>
            <h3>评委阵容</h3>
        </li>
    </ul>
    <div class="notice-cont">
        <h2>公告动态</h2>
        <p class="notice-text">LeRM IpSouthDoor坐在一起，奉献Eclipse EelIT。艾尼安·尤斯莫德。普罗维登格洛尔坐在阿米特·拉克斯·艾维桑·维维拉·胡斯托·科莫多。普罗旺斯.社会学是一门学科。Na发酵剂，NulLa Lutut-PaulCua外阴，猫科植物（TeleLe）。</p>
    </div>
</div>
<div class="schedule-cont">
    <h3>赛程安排</h3>
    <div class="schedule-list clearfix">
        <div class="schedule-up @if($competition == 1) cur @endif ">
            <h4>大赛启动</h4>
            <p class="s-date">7月</p>
            <div class="s-icon-wrap">
                <em class="line"></em>
                <i class="s-icon"></i>
            </div>
        </div>
        <div class="schedule-down  @if($competition == 2) cur @endif ">
            <div class="s-icon-wrap">
                <em class="line"></em>
                <i class="s-icon"></i>
            </div>
            <h4>项目征集</h4>
            <p class="s-date">8月-9月</p>
        </div>
        <div class="schedule-up  @if($competition == 3) cur @endif ">
            <h4>初步审查</h4>
            <p class="s-date">10月上旬</p>
            <div class="s-icon-wrap">
                <em class="line"></em>
                <i class="s-icon"></i>
            </div>
        </div>
        <div class="schedule-down  @if($competition == 4) cur @endif ">
            <div class="s-icon-wrap">
                <em class="line"></em>
                <i class="s-icon"></i>
            </div>
            <h4>材料评审</h4>
            <p class="s-date">10月中旬</p>
        </div>
        <div class="schedule-up  @if($competition == 5) cur @endif ">
            <h4>初赛</h4>
            <p class="s-date">10月下旬</p>
            <div class="s-icon-wrap">
                <em class="line"></em>
                <i class="s-icon"></i>
            </div>
        </div>
        <div class="schedule-down @if($competition == 6) cur @endif ">
            <div class="s-icon-wrap">
                <em class="line"></em>
                <i class="s-icon"></i>
            </div>
            <h4>赛前培训</h4>
            <p class="s-date">11月上旬</p>
        </div>
        <div class="schedule-up  @if($competition == 7) cur @endif ">
            <h4>决赛</h4>
            <p class="s-date">11月上旬</p>
            <div class="s-icon-wrap">
                <em class="line"></em>
                <i class="s-icon"></i>
            </div>
        </div>
        <div class="schedule-down @if($competition == 8) cur @endif ">
            <div class="s-icon-wrap">
                <em class="line"></em>
                <i class="s-icon"></i>
            </div>
            <h4>后续产业服务</h4>
            <p class="s-date">11月后</p>
        </div>
    </div>
</div>
<div class="about-cont clearfix w" id="about-cont">
    <h3>关于大赛</h3>
    <div class="left-c">
        <div class="text-list">
            <h4>/大赛简介/</h4>
            <p>LeRM IpSouthDoor坐在一起，奉献Eclipse EelIT。艾尼安·尤斯莫德。普罗维登格洛尔坐在阿米特·拉克斯·艾维桑·维维拉·胡斯托·科莫多。普罗旺斯.社会学是一门学科。Na发酵剂，NulLa Lutut-PaulCua外阴，猫科植物（TeleLe）。</p>
        </div>
        <div class="text-list">
            <h4>/大赛日程/</h4>
            <p>LeRM IpSouthDoor坐在一起，奉献Eclipse EelIT。艾尼安·尤斯莫
                德。普罗维登格洛尔坐在阿米特·拉克斯·艾维桑·维维拉·胡斯托·科莫多。普罗旺斯.社会学是一门学科。Na发酵剂，NulLa Lutut-PaulCua外阴，猫科植物（TeleLe）。普罗维登格洛尔坐在阿米特·拉克斯·艾维桑·维维拉·胡斯托·科莫多。普罗旺斯.社会学是一门学科。Na发酵剂，NulLa Lutut-PaulCua外阴，猫科植物（TeleLe）。</p>
        </div>
        <div class="text-list">
            <h4>/大赛规则/</h4>
            <p>LeRM IpSouthDoor坐在一起，奉献Eclipse EelIT。艾尼安·尤斯莫德。普罗维登格洛尔坐在阿米特·拉克斯·艾维桑·维维拉·胡斯托·科莫多。普罗旺斯.社会学是一门学科。Na发酵剂，NulLa Lutut-PaulCua外阴，猫科植物（TeleLe）。</p>
        </div>
    </div>
    <div class="right-c">
        <div class="text-list">
            <h4>组织机构</h4>
            <p>
                <strong>主办单位</strong>
                <br/>
                组织机构
                <br/>
                <strong>协办单位</strong>
                <br/>
                优客工厂（主要协助开展企业项目的征集与宣传）
                <br/>
                中国科技新闻学会（主要协助大赛的宣传报道
                椅子网（主要协助开展高校项的征集与宣传）
                <br/>
                科普出版社（主要负责征集网站建设）
                <br/>
                <strong>大赛组委会</strong>
                <br/>
                组委会主任：白希（中国科协科普部部长）
                组委会常务副主任；王进展（中国科协科技传播中心主任）
                <br/>
                组委会副主任：钱岩（中国科协科普部副部长）
                毛大庆（中国科协科技传播中心副主任）
                宁方刚（中国科协科技传播中心副主任）
                成员：中国科协科普部、中国科协科技传播部、优客工厂、中国科技新闻学等相关人员
            </p>
        </div>
        <div class="text-list">
            <h4>／组委会办公室／</h4>
            <p>组委会办公室设在中国科协科技传播中心，负责大赛各项具体工作的执行。</p>
        </div>
    </div>
</div>
<div class="works-cont" id="works-cont">
    <h3>优秀作品</h3>
    <div class="list-show w clearfix">
        <div class="list-cont">
            <img src="img/img.jpg" alt=""÷>
            <h4>品牌建设者</h4>
            <p class="text">
                景王品牌网站建设者，联盟主题RLUE中心获奖...
            </p>
            <div class="author clearfix clearfix">
                <h5>姗个棒棒糖</h5>
                <span class="date">3小时前</span>
            </div>
        </div>
        <div class="list-cont">
            <img src="img/img.jpg" alt=""÷>
            <h4>品牌建设者</h4>
            <p class="text">
                景王品牌网站建设者，联盟主题RLUE中心获奖...
            </p>
            <div class="author clearfix">
                <h5>姗个棒棒糖</h5>
                <span class="date">3小时前</span>
            </div>
        </div>
        <div class="list-cont">
            <img src="img/img.jpg" alt=""÷>
            <h4>品牌建设者</h4>
            <p class="text">
                景王品牌网站建设者，联盟主题RLUE中心获奖...
            </p>
            <div class="author clearfix">
                <h5>姗个棒棒糖</h5>
                <span class="date">3小时前</span>
            </div>
        </div>
        <div class="list-cont">
            <img src="img/img.jpg" alt=""÷>
            <h4>品牌建设者</h4>
            <p class="text">
                景王品牌网站建设者，联盟主题RLUE中心获奖...
            </p>
            <div class="author clearfix">
                <h5>姗个棒棒糖</h5>
                <span class="date">3小时前</span>
            </div>
        </div>
        <div class="list-cont">
            <img src="img/img.jpg" alt=""÷>
            <h4>品牌建设者</h4>
            <p class="text">
                景王品牌网站建设者，联盟主题RLUE中心获奖...
            </p>
            <div class="author clearfix">
                <h5>姗个棒棒糖</h5>
                <span class="date">3小时前</span>
            </div>
        </div>
    </div>
</div>
<div class="activity-scene" id="activity-scene">
    <h3>活动现场</h3>
    <div class="list-show w clearfix">
        <div class="list-cont">
            <img src="img/img.jpg" alt=""÷>
            <h4>品牌建设者</h4>
            <p class="text">
                景王品牌网站建设者，联盟主题RLUE中心获奖...
            </p>
        </div>
        <div class="list-cont">
            <img src="img/img.jpg" alt=""÷>
            <h4>品牌建设者</h4>
            <p class="text">
                景王品牌网站建设者，联盟主题RLUE中心获奖...
            </p>
        </div>
        <div class="list-cont">
            <img src="img/img.jpg" alt=""÷>
            <h4>品牌建设者</h4>
            <p class="text">
                景王品牌网站建设者，联盟主题RLUE中心获奖...
            </p>
        </div>
        <div class="list-cont">
            <img src="img/img.jpg" alt=""÷>
            <h4>品牌建设者</h4>
            <p class="text">
                景王品牌网站建设者，联盟主题RLUE中心获奖...
            </p>
        </div>
    </div>
</div>
<div class="rater-cont w" id="rater-cont">
    <h3>评委阵容</h3>
    <ul class="reate-list clearfix">
        <li class="blue-s">
            <img src="img/img.jpg" alt=""÷>
            <h4>吴承康</h4>
            <p>中国高温气体力学家</p>
        </li>
        <li class="orange-s">
            <img src="img/img.jpg" alt=""÷>
            <h4>吴承康</h4>
            <p>中国高温气体力学家</p>
        </li>
        <li class="pink-s">
            <img src="img/img.jpg" alt=""÷>
            <h4>吴承康</h4>
            <p>中国高温气体力学家</p>
        </li>
        <li class="green-s">
            <img src="img/img.jpg" alt=""÷>
            <h4>吴承康</h4>
            <p>中国高温气体力学家</p>
        </li>
        <li class="red-s">
            <img src="img/img.jpg" alt=""÷>
            <h4>吴承康</h4>
            <p>中国高温气体力学家</p>
        </li>
        <li class="green-s">
            <img src="img/img.jpg" alt=""÷>
            <h4>吴承康</h4>
            <p>中国高温气体力学家</p>
        </li>
        <li class="pink-s">
            <img src="img/img.jpg" alt=""÷>
            <h4>吴承康</h4>
            <p>中国高温气体力学家</p>
        </li>
        <li class="blue-s">
            <img src="img/img.jpg" alt=""÷>
            <h4>吴承康</h4>
            <p>中国高温气体力学家</p>
        </li>
        <li class="red-s">
            <img src="img/img.jpg" alt=""÷>
            <h4>吴承康</h4>
            <p>中国高温气体力学家</p>
        </li>
        <li class="orange-s">
            <img src="img/img.jpg" alt=""÷>
            <h4>吴承康</h4>
            <p>中国高温气体力学家</p>
        </li>
    </ul>
</div>
<div class="footer">
    <span>中国科学技术协会版权所</span>
    <span>中国科学技术协会版权所</span>
</div>
<div class="pop-up" style="display: none">
    <div class="mask"></div>
    <div class="form-cont w">
        <i class="closeicon"></i>
        <h3 class="big-tit">
            咨询答疑
        </h3>
        <form id="form">
            {{ csrf_field() }}
            <ul class="form-list">
                <li>
                    <input type="text" id="name"maxlength="8" name="name" data-title="用户名" placeholder="用户名">
                    <div id="nameTip"></div>
                </li>
                <li>
                    <input type="text" id="mobile" maxlength="11"  name="mobile" data-title="手机号" placeholder="请留下您的手机号" />
                    <div id="mobileTip"></div>
                </li>
                <li>
                    <input type="text" id="email" name="email"  data-title="邮箱"  placeholder="请留下您的邮箱">
                    <div id="emailTip"></div>
                </li>
                <li>
                    <input type="text" id="question" name="question" maxlength="30" data-title="您的问题"  placeholder="您的问题">
                    <div id="questionTip"></div>
                </li>
                <li>
                    <textarea id="description" name="description" maxlength="30"  data-title="描述问题" placeholder="请描述您的问题"></textarea>
                    <div id="descriptionTip"></div>
                </li>
            </ul>
            <div class="f-btn">
                <button class="confirm">提交</button>
            </div>
        </form>
    </div>
</div>
<script src="/js/jquery-1.11.0.min.js" ></script>
<script src="/js/jquery-migrate-1.2.1.js" ></script>
<script src="/js/formvalidator4.1.3/formValidator-4.1.3.js" ></script>
<script src="/js/formvalidator4.1.3/formValidatorRegex.js" ></script>
<style>
    .form-list li{ position: relative; }
    #descriptionTip, #questionTip, #mobileTip, #emailTip, #nameTip{
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
    #descriptionTip div,  #questionTip div, #mobileTip div, #emailTip div,#nameTip div{
        font-size: 20px;
        color: #f8386b;
    }
</style>
<script>
    window.onload = function(){
        document.querySelector("#works-cont-b").onclick = function(){
            document.querySelector("#works-cont").scrollIntoView(false);
        }
        document.querySelector("#activity-scene-b").onclick = function(){
            document.querySelector("#activity-scene").scrollIntoView(false);
        }
        document.querySelector("#about-cont-b").onclick = function(){
            document.querySelector("#about-cont").scrollIntoView(false);
        }
        document.querySelector("#rater-cont-b").onclick = function(){
            document.querySelector("#rater-cont").scrollIntoView(false);
        }
    }
</script>
<script>
    $(function() {
        $('.login-mode .weibo, .login-mode .wechat').hover(function () {
            $(this).find('.qr-code').show();
        }, function () {
            $(this).find('.qr-code').hide();
        })
        $('.question-btn').click(function () {
            $(".pop-up").show();
        })
        $('.closeicon').click(function () {
            $(".pop-up").hide();
        })
    })

    $(function(){
        var questionSubmit = function () {
            var config = ['name','mobile','email','question','description'];
            var data = {};
            for (var x in config){
                data[config[x]] = $('#'+config[x]).val();
            }
            $(".form-list input, .form-list textarea").val('');
            $(".pop-up").hide();
            $.ajax({
                type:"POST",
                url:"{{route('message.create')}}",
                data:data,
                dataType:"json",
                success:function(response){
                    if(response.status == 'success'){
                        alert("提交成功！");
                    }
                }
            })
        }
        $.formValidator.initConfig({
            formID:"form",
            onSuccess:function(){
                questionSubmit();
                return false;
            },
            onError:function(){
                return false;
            }
        });
        $("#name").formValidator( {
            onShow:"*必填",
            onFocus :"2-8位汉字",
        }).inputValidator( {
            min :1,
            onError :"姓名不能为空"
        }).inputValidator( {
            min :2,
            max :8,
            empty : {
                leftEmpty :false,
                rightEmpty :false,
                emptyError :"两边不能有空"
            },
            onError :"2-8位汉字"
        });
        $("#mobile").formValidator({
            onShow:"*必填",
            onFocus:"手机号11位数字",
        }).regexValidator({
            regExp:"mobile",
            dataType:"enum",
            onError:"手机号码格式不正确"
        });

        $("#email").formValidator({
            onShow:"*必填",
            onFocus:"邮箱6-40个字符",
        }).regexValidator({
            regExp:"^([\\w-.]+)@(([[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}.)|(([\\w-]+.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(]?)$",
            onError:"邮箱格式不正确"
        });
        $("#question").formValidator( {
            onShow:"*必填",
            onFocus :"2-30位汉字",
        }).inputValidator( {
            min :1,
            onError :"问题不能为空"
        }).inputValidator( {
            min :2,
            max :30,
            empty : {
                leftEmpty :false,
                rightEmpty :false,
                emptyError :"两边不能有空"
            },
            onError :"2-30位汉字"
        });
        $("#description").formValidator( {
            onShow:"*必填",
            onFocus :"2-100位汉字",
        }).inputValidator( {
            min :1,
            onError :"描述问题不能为空"
        }).inputValidator( {
            min :2,
            max :30,
            empty : {
                leftEmpty :false,
                rightEmpty :false,
                emptyError :"两边不能有空"
            },
            onError :"2-30位汉字"
        });

    })

</script>
</body>
</html>