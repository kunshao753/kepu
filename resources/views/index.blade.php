<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>申报评审系统首页</title>
    <link rel="stylesheet" href="/styles/base.css" type="text/css" />
    <link rel="stylesheet" href="/styles/index.css?r=1" type="text/css" />
    <link rel="stylesheet" href="/styles/swiper.min.css" type="text/css" />
    <style>


        /*@media screen and (max-width: 668px) {*/
            /*.pc-banner {*/
                /*background-size: auto 100%;*/
            /*}*/
        /*}*/

        .swiper-container {
            width: 100%;
            margin: 35px 0;
        }

        /*@media screen and (max-width: 668px) {*/
            /*.swiper-container {*/
                /*margin: 20px 0 15px;*/
            /*}*/
        /*}*/
        .swiper-slide {
            -webkit-transition: transform 1.0s;
            -moz-transition: transform 1.0s;
            -ms-transition: transform 1.0s;
            -o-transition: transform 1.0s;
            -webkit-transform: scale(0.8);
            transform: scale(0.8);
        }

        /*@media screen and (max-width: 668px) {*/
            /*.swiper-slide {*/
                /*-webkit-transform: scale(0.97);*/
                /*transform: scale(0.97);*/
            /*}*/
        /*}*/

        .swiper-slide-active,.swiper-slide-duplicate-active {
            -webkit-transform: scale(10);
            transform: scale(1.0);
        }

        /*@media screen and (max-width: 668px) {*/
            /*.swiper-slide-active,.swiper-slide-duplicate-active {*/
                /*-webkit-transform: scale(0.97);*/
                /*transform: scale(0.97);*/
            /*}*/
        /*}*/

        .none-effect {
            -webkit-transition: none;
            -moz-transition: none;
            -ms-transition: none;
            -o-transition: none;
        }

        .swiper-slide a {
            background: #fff;
            padding:10px;
            display: block;
            border-radius: 14px;
        }

        /*@media screen and (min-width: 668px) {*/
            /*.swiper-slide a:after {*/
                /*position: absolute;*/
                /*top: 0;*/
                /*left: 0;*/
                /*display: block;*/
                /*box-sizing: border-box;*/
                /*border: 10px solid #fff;*/
                /*content: "";*/
                /*width: 100%;*/
                /*height: 100%;*/
                /*background: url(images/top_slick_cover_bg01.png) 0 0 repeat;*/
                /*border-radius: 20px;*/
            /*}*/
        /*}*/

        .swiper-slide-active a:after {
            background: none;
        }

        /*@media screen and (max-width: 668px) {*/
            /*.swiper-slide a {*/
                /*padding: 5px;*/
                /*border-radius: 7px;*/
            /*}*/
        /*}*/

        .swiper-slide img {
            width: 100%;
            border-radius: 5px;
            display: block;
        }

        /*@media screen and (max-width: 668px) {*/
            /*.swiper-slide img {*/
                /*border-radius: 7px;*/
            /*}*/
        /*}*/

        .swiper-pagination {
            position: relative;
            margin-bottom: 30px;
        }

        .swiper-pagination-bullet {
            background: #00a0e9;
            margin-left: 4px;
            margin-right: 4px;
            width: 17px;
            height: 17px;
            opacity: 1;
            margin-bottom: 4px;
        }

        .swiper-pagination-bullet-active {
            width: 13px;
            height: 13px;
            background: #FFF;
            /*border: 6px solid #00a0e9;*/
            margin-bottom: 0;
        }

        /*@media screen and (max-width: 668px) {*/

            /*.swiper-pagination {*/
                /*position: relative;*/
                /*margin-bottom: 20px;*/
            /*}*/

            /*.swiper-pagination-bullet {*/
                /*background: #00a0e9;*/
                /*margin-left: 2px;*/
                /*margin-right: 2px;*/
                /*width: 8px;*/
                /*height: 8px;*/
                /*margin-bottom: 2px;*/
            /*}*/

            /*.swiper-pagination-bullet-active {*/
                /*width: 6px;*/
                /*height: 6px;*/
                /*background: #FFF;*/
                /*border: 3px solid #00a0e9;*/
                /*margin-bottom: 0;*/
            /*}*/
        /*}*/

        .button {
            width: 1000px;
            margin: 0 auto;
            bottom: 43px;
            position: relative;
        }

        /*@media screen and (max-width: 668px) {*/
            /*.button {*/
                /*width: 70%;*/
                /*bottom: 22px;*/
            /*}*/
        /*}*/

        .button div:hover {
            background-color: #2f4798;
        }

        .swiper-button-prev {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: url("data:image/svg+xml;charset=utf-8,%3Csvg%20xmlns%3D'http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg'%20viewBox%3D'0%200%2027%2044'%3E%3Cpath%20d%3D'M0%2C22L22%2C0l4.2%2C4.2L8.4%2C22l17.8%2C17.8L22%2C44L0%2C22z'%20fill%3D'%23ffffff'%2F%3E%3C%2Fsvg%3E") #00a0e9 center 50%/50% 50% no-repeat;
        }

        .swiper-button-next {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: url("data:image/svg+xml;charset=utf-8,%3Csvg%20xmlns%3D'http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg'%20viewBox%3D'0%200%2027%2044'%3E%3Cpath%20d%3D'M27%2C22L5%2C44l-4.2-4.2L18.6%2C22L0.8%2C4.2L5%2C0z'%20fill%3D'%23ffffff'%2F%3E%3C%2Fsvg%3E") #00a0e9 center 50%/50% 50% no-repeat;
        }

        /*@media screen and (max-width: 668px) {*/
            /*.button div {*/
                /*width: 28px;*/
                /*height: 28px;*/
            /*}*/
        /*}*/

    </style>
</head>
<body>
<div class="top-bar">
    <div class="w">
        <div class="logo"></div>
        <ul class="menu">
            <li ><a href="javascript:void(0);" class="active">关于大赛</a></li>
            <li ><a href="javascript:void(0);">优秀作品</a></li>
            <li ><a href="javascript:void(0);">活动现场</a></li>
            <li ><a href="javascript:void(0);">评委内容</a></li>
        </ul>
        <div class="login-box">
            <label class="txt">
                <a href="javascript:void(0);">登录</a>
                <span>|</span>
                <a href="javascript:void(0);">注册</a>
            </label>
            <a href="javascript:void(0);" class="wechat"></a>
            <a href="javascript:void(0);" class="webo"></a>
        </div>
    </div>
</div>
<div class="banner-top">
    <div class="btn-box clearfix">
        <a href="#" class="join"></a>
        <a href="#" class="ask"></a>
    </div>
    <section class="swiper-container" style="width: 1100px; margin: 100px auto">
        <div class="swiper-wrapper">
            <div class="swiper-slide " ><img src="/images/p1.png" /></div>
            <div class="swiper-slide " ><img src="/images/p2.png" /></div>
            <div class="swiper-slide " ><img src="/images/p3.png" /></div>
        </div>
        {{--<div class="swiper-button-next swiper-button-white"></div>--}}
        {{--<div class="swiper-button-prev swiper-button-white"></div>--}}
    </section>
</div>
<script src="/js/jquery-1.11.0.min.js" ></script>
<script src="/js/swiper.min.js" ></script>
{{--<script src="/js/jquery-migrate-1.2.1.js" ></script>--}}
{{--<script src="/js/formvalidator4.1.3/formValidator-4.1.3.js" ></script>--}}
{{--<script src="/js/formvalidator4.1.3/formValidatorRegex.js" ></script>--}}
<script>
    $(function(){
         new Swiper('.swiper-container', {
            autoplay:3000,
            speed:1000,
            autoplayDisableOnInteraction : false,
            loop:true,
            centeredSlides : true,
            slidesPerView:2,
            pagination : '.swiper-pagination',
            paginationClickable:true,
            prevButton:'.swiper-button-prev',
            nextButton:'.swiper-button-next',
            breakpoints: {
                668: {
                    slidesPerView: 1,
                }
            }
        });
    })
</script>
</body>
</html>