<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>申报评审系统首页</title>
    <link rel="stylesheet" href="/styles/swiper.min.css?r=12" type="text/css" />
    <link rel="stylesheet" href="/styles/base.css?r=2" type="text/css" />
    <link rel="stylesheet" href="/styles/index.css?r=1w" type="text/css" />
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
    <div id="swiper">
        <section class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide " >
                    <img src="/images/p1.png" />
                    <div>项目遴选标准</div>
                </div>
                <div class="swiper-slide " >
                    <img src="/images/p2.png" />
                    <div>孵化支持</div>
                </div>
                <div class="swiper-slide " >
                    <img src="/images/p3.png" />
                    <div>活动通知</div>
                </div>
            </div>
        </section>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>
</div>
<script src="/js/jquery-1.11.0.min.js?r=1" ></script>
<script src="/js/swiper.min.js?r=1" ></script>
{{--<script src="/js/jquery-migrate-1.2.1.js" ></script>--}}
{{--<script src="/js/formvalidator4.1.3/formValidator-4.1.3.js" ></script>--}}
{{--<script src="/js/formvalidator4.1.3/formValidatorRegex.js" ></script>--}}
<script>

    new Swiper('#swiper .swiper-container', {
        watchSlidesProgress: true,
        slidesPerView: 2,
        initialSlide:1,
        centeredSlides: true,
        loop: true,
        autoplay: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        on: {
            progress: function(progress) {
                for (i = 0; i < this.slides.length; i++) {
                    var slide = this.slides.eq(i);
                    var slideProgress = this.slides[i].progress;
                    modify = 1;
                    if (Math.abs(slideProgress) > 1) {
                        modify = (Math.abs(slideProgress) - 1) * 0.3 + 1;
                    }
                    translate = slideProgress * modify * 230 + 'px';
                    scale = 1 - Math.abs(slideProgress) / 7;
                    zIndex = 999 - Math.abs(Math.round(10 * slideProgress));
                    slide.transform('translateX(' + translate + ') scale(' + scale + ')');
                    slide.css('zIndex', zIndex);
                    slide.css('opacity', 1);
                    if (Math.abs(slideProgress) > 3) {
                        slide.css('opacity', 0);
                    }
                }
            },
            setTransition: function(transition) {
                for (var i = 0; i < this.slides.length; i++) {
                    var slide = this.slides.eq(i)
                    slide.transition(transition);
                }

            }
        }

    })
</script>
</body>
</html>