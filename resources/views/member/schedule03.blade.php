<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>流程一</title>
    <link rel="stylesheet" href="/styles/base.css">
    <link rel="stylesheet" href="/styles/style.css">
</head>
<body>
    <div class="header">
        <h2>科普互联网大赛</h2>
        <h3>项目报名</h3>
        <p class="text01">Project registration system</p>
        <p class="text02">Lorem ipsum dolor sit amet , consectetur adipiscing elit .</p>
    </div>
    <div class="schedule-list">
        <ul class="schedule-wrap clearfix">
            <li>
                <em>1</em>
                <span>基本信息</span>
                <i class="line"></i>
            </li>
            <li>
                <em>2</em>
                <span>项目团队</span>
                <i class="line"></i>
            </li>
            <li class="cur">
                <em>3</em>
                <span>项目信息</span>
                <i class="line"></i>
            </li>
            <li>
                <em>4</em>
                <span>上传资料</span>
                <i class="line"></i>
            </li>
        </ul>
    </div>
    <form method="post" id="form" action="{{route('member.projectInfoEdit')}}">
        <div class="form-schedule w">
            <h3>项目信息</h3>
            <ul class="form-list">
                <li class="clearfix">
                    <div class="label">
                        <label for="">项目名称</label>
                    </div>
                    <input type="text" name="project_name" placeholder="请填写项目名称" class="input-box">
                </li>
                <li class="clearfix label-f-n pl0">
                    <div class="label">
                        <label for="">产品类型</label>
                    </div>
                    <div class="radio-list">
                        @foreach ($productType as $key=>$value)
                            <div class="label">
                                <input value="{{$key}}" @if($value['show'] == 1) checked @endif name="{{$value['name']}}"  type="radio">
                                <label for="">{{$value['text']}}</label>
                            </div>
                        @endforeach
                    </div>
                </li>
                <li class="clearfix">
                    <div class="label">
                        <label for="">产品形态</label>
                    </div>
                    <div class="radio-list-wrap">
                        @foreach ($productForm as $key=>$value)
                            <div class="radio-listnew">
                                <div class="label">
                                    <input value="{{$key}}" name="{{$value['key']}}" type="checkbox">
                                    <label for="">{{$value['name']}}</label>
                                </div>
                            </div>
                            <input type="text" name="{{$value['val']}}" value="{{$value['text']}}" placeholder="{{$value['tips']}}" class="input-box">
                        @endforeach
                    </div>
                </li>
                <li class="clearfix label-f-n pl0">
                    <div class="label">
                        <label for="">产品用户</label>
                    </div>
                    <div class="radio-list">
                        <div class="label">
                            <input value="1" name="product_user" type="radio">
                            <label for="">普通公众</label>
                        </div>
                        <div class="label">
                            <input value="2" name="product_user" type="radio">
                            <label for="">支撑科普内容生产及传播的机构</label>
                        </div>
                    </div>
                </li>
                <li class="clearfix">
                    <div class="label">
                        <label for="">产品用户数</label>
                    </div>
                    <input type="text" name="product_user_size" placeholder="请填写产品用户数" class="input-box">
                    <span class="prompt">人</span>
                </li>
                <li class="clearfix">
                    <div class="label">
                        <label for="">产品概况</label>
                    </div>
                    <textarea name="project_profile" placeholder="请填写产品概况（500字）" class="textarea-box"></textarea>
                </li>
                <li class="clearfix">
                    <div class="label">
                        <label for="">产品亮点</label>
                    </div>
                    <textarea name="product_highlight" placeholder="请填写团队概况" class="textarea-box"></textarea>
                </li>
                <li class="clearfix">
                    <div class="label">
                        <label for="">商业模式</label>
                    </div>
                    <textarea name="business_model" placeholder="请填写商业模式（50字）" class="textarea-box"></textarea>
                </li>
                <li class="clearfix">
                    <div class="label">
                        <label for="">核心壁垒</label>
                    </div>
                    <textarea  name="core_barrier" placeholder="请填写核心壁垒（50字）" class="textarea-box"></textarea>
                </li>
                <li class="clearfix">
                    <div class="label">
                        <label for="">过往融资</label>
                    </div>
                    <textarea  name="financing_situation" placeholder="请填写过往融资（200字）" class="textarea-box"></textarea>
                </li>
                <li class="clearfix">
                    <div class="label">
                        <label for="">是否拥有专利技术</label>
                    </div>
                    <textarea  name="is_patent" placeholder="请描述（200字）" class="textarea-box"></textarea>
                </li>
                <li class="clearfix">
                    <div class="label">
                        <label for="">产品传播效果</label>
                    </div>
                    <textarea name="product_communication"  placeholder="请填写传播效果（500字）" class="textarea-box"></textarea>
                </li>
                <li class="clearfix">
                    <div class="label">
                        <label for="">产品内是否有广告</label>
                    </div>
                    <div class="radio-list">
                        <div class="label">
                            <input value="1" name="is_ad" type="radio">
                            <label for="">是</label>
                        </div>
                        <div class="label">
                            <input value="2" name="is_ad" type="radio">
                            <label for="">否</label>
                        </div>
                    </div>
                </li>
                <li class="clearfix">
                    <div class="label">
                        <label for="">广告类型</label>
                    </div>
                    <input type="text" name="ad_type" placeholder="请填写广告类型" class="input-box">
                </li>
                <li class="clearfix">
                    <div class="label">
                        <label for="">内容生产机制</label>
                    </div>
                    <input type="text"  name="content_production_mechanism" placeholder="请填写生产机制" class="input-box">
                    <span class="prompt red-p">*必填</span>
                </li>
                <li class="clearfix">
                    <div class="label">
                        <label for="">内容审核机制</label>
                    </div>
                    <input type="text"   name="content_review_mechanism" placeholder="请填写审核机制" class="input-box">
                    <span class="prompt red-p">*必填</span>
                </li>
                <li class="clearfix">
                    <div class="label">
                        <label for="">专家或机构推荐意见</label>
                    </div>
                    <textarea name="expert_agency_recommendation"  placeholder="除自由报名选手外需填写；如投资人推荐意见或高校学校推荐意见（200字）" class="textarea-box"></textarea>
                </li>
            </ul>
        </div>
        <div class="f-btn pt40">
            <a href="javascript:void(0);" id="submit-btn" class="confirm">提交</a>
            <a href="javascript:void(0);" id="goBack" class="confirm green-btn">取消</a>
        </div>
    </form>
    <div class="footer">
        <span>中国科学技术协会版权所</span>
        <span>中国科学技术协会版权所</span>
    </div>
    <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $(function(){
            $('#submit-btn').click(function(){
                $('#form').submit();
            })
            $('#goBack').click(function(){
                window.history.back()
            })
        })
    </script>
</body>
</html>