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
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
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
            <a href="{{route('member.signUp')}}" class="sign-btn">报名</a>
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
        <div class="schedule-up">
            <h4>大赛启动</h4>
            <p class="s-date">2018年7月</p>
            <div class="s-icon-wrap">
                <em class="line"></em>
                <i class="s-icon"></i>
            </div>
        </div>
        <div class="schedule-down">
            <div class="s-icon-wrap">
                <em class="line"></em>
                <i class="s-icon"></i>
            </div>
            <h4>大赛启动</h4>
            <p class="s-date">2018年10月上旬</p>
        </div>
        <div class="schedule-up">
            <h4>大赛启动</h4>
            <p class="s-date">2018年7月</p>
            <div class="s-icon-wrap">
                <em class="line"></em>
                <i class="s-icon"></i>
            </div>
        </div>
        <div class="schedule-down">
            <div class="s-icon-wrap">
                <em class="line"></em>
                <i class="s-icon"></i>
            </div>
            <h4>大赛启动</h4>
            <p class="s-date">2018年7月</p>
        </div>
        <div class="schedule-up">
            <h4>大赛启动</h4>
            <p class="s-date">2018年7月</p>
            <div class="s-icon-wrap">
                <em class="line"></em>
                <i class="s-icon"></i>
            </div>
        </div>
        <div class="schedule-down">
            <div class="s-icon-wrap">
                <em class="line"></em>
                <i class="s-icon"></i>
            </div>
            <h4>大赛启动</h4>
            <p class="s-date">2018年7月</p>
        </div>
        <div class="schedule-up">
            <h4>大赛启动</h4>
            <p class="s-date">2018年7月</p>
            <div class="s-icon-wrap">
                <em class="line"></em>
                <i class="s-icon"></i>
            </div>
        </div>
        <div class="schedule-down">
            <div class="s-icon-wrap">
                <em class="line"></em>
                <i class="s-icon"></i>
            </div>
            <h4>大赛启动</h4>
            <p class="s-date">2018年7月</p>
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
        <ul class="form-list">
            <li>
                <input type="text" id="name" name="name" data-title="用户名" placeholder="用户名">
                <label for="">*必填</label>
            </li>
            <li>
                <input type="text" id="mobile" name="mobile"  data-title="联系方式" placeholder="请留下您的联系方式">
                <label for="">*必填</label>
            </li>
            <li>
                <input type="text" id="email" name="email"  data-title="邮箱"  placeholder="请留下您的邮箱">
                <label for="">*必填</label>
            </li>
            <li>
                <input type="text" id="question" name="question"  data-title="您的问题"  placeholder="您的问题">
                <label for="">*必填</label>
            </li>
            <li>
                <textarea id="description" name="description"  data-title="描述问题" placeholder="请描述您的问题"></textarea>
                <label for="">*必填</label>
            </li>
        </ul>
        <div class="f-btn">
            <a href="javascript:void(0);" class="confirm">提交</a>
        </div>
    </div>
</div>
<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
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
    $(function(){
        $('.login-mode .weibo, .login-mode .wechat').hover(function(){
            $(this).find('.qr-code').show();
        },function(){
            $(this).find('.qr-code').hide();
        })
        $('.question-btn').click(function(){
            $(".pop-up").show();
        })
        $('.closeicon').click(function () {
            $(".pop-up").hide();
        })
        var config = ['name','mobile','email','question','description'];
        var checkQuestion = function(){
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
            if (checkQuestion() == false){
                return;
            }
            var data = {};
            for (var x in config){
                console.log()
                data[config[x]] = $('#'+config[x]).val();
            }
            $.ajax({
                type:"POST",
                url:"{{route('message.create')}}",
                data:data,
                dataType:"json",
                success:function(response){
                    if(response.status == 'success'){
                        $(".form-list input, .form-list textarea").val('');
                        $(".pop-up").hide();
                    }
                }
            })
        })
    })
</script>
</body>
</html>