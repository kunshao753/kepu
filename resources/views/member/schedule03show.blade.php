@extends('layouts.top')

@section('content')
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
                    <input type="text" name="project_name" value="{{$projectInfo->project_name}}" maxlength="49" id="project_name" placeholder="请填写项目名称" class="input-box">
                    <span class="prompt red-p"><span id="project_nameTip"></span></span>
                </li>
                <li class="clearfix label-f-n pl0">
                    <div class="label">
                        <label for="">产品类型</label>
                    </div>
                    <div class="radio-list">
                        @foreach ($productType as $key=>$value)
                            <div class="label">
                                <input value="{{$key}}"  @if($key == $projectInfo->product_type) checked @endif name="{{$value['name']}}"  type="radio">
                                <label for="">{{$value['text']}}</label>
                            </div>
                        @endforeach
                    </div>
                    <span class="prompt red-p" style=" margin-left: -40px;"><span id="product_typeTip"></span></span>
                </li>
                <li class="clearfix">
                    <div class="label">
                        <label for="">产品形态</label>
                    </div>
                    <div class="radio-list-wrap">
                        @foreach ($productForm as $key=>$value)
                            <div class="radio-listnew">
                                <div class="label">
                                    <input value="{{$key}}" @if($value['show'] == 1) checked @endif name="{{$value['key']}}" type="checkbox">
                                    <label for="">{{$value['name']}}</label>
                                </div>
                            </div>
                            <input type="text" name="{{$value['val']}}" maxlength="30" value="{{$value['text']}}" placeholder="{{$value['tips']}}" class="input-box">
                        @endforeach
                    </div>
                    <span class="prompt red-p" style=" margin-top:65px;"><span id="product_formTip">*必填(四选一)</span></span>

                </li>
                <li class="clearfix label-f-n pl0">
                    <div class="label">
                        <label for="">产品用户</label>
                    </div>
                    <div class="radio-list">
                        <div class="label">
                            <input value="1"  @if($projectInfo->product_user == 1) checked @endif  name="product_user" type="radio">
                            <label for="">普通公众</label>
                        </div>
                        <div class="label">
                            <input value="2"  @if($projectInfo->product_user == 2) checked @endif name="product_user" type="radio">
                            <label for="">支撑科普内容生产及传播的机构</label>
                        </div>
                    </div>
                    <span class="prompt red-p"><span id="product_userTip"></span></span>

                </li>
                <li class="clearfix">
                    <div class="label">
                        <label for="">产品用户数</label>
                    </div>
                    <input type="text" name="product_user_size"  value="{{$projectInfo->product_user_size}}" maxlength="10" id="product_user_size" placeholder="请填写产品用户数" class="input-box">
                    <span class="prompt">人</span>
                    <span class="prompt red-p"><span id="product_user_sizeTip"></span></span>
                </li>
                <li class="clearfix">
                    <div class="label">
                        <label for="">产品概况</label>
                    </div>
                    <textarea name="project_profile" id="project_profile" maxlength="499" placeholder="请填写产品概况（500字）" class="textarea-box">{{$projectInfo->project_profile}}</textarea>
                    <span class="prompt red-p"><span id="project_profileTip"></span></span>
                </li>
                <li class="clearfix">
                    <div class="label">
                        <label for="">产品亮点</label>
                    </div>
                    <textarea name="product_highlight" maxlength="149" id="product_highlight" placeholder="请填写产品亮点" class="textarea-box">{{$projectInfo->product_highlight}}</textarea>
                    <span class="prompt red-p"><span id="product_highlightTip"></span></span>
                </li>
                <li class="clearfix">
                    <div class="label">
                        <label for="">商业模式</label>
                    </div>
                    <textarea name="business_model" id="business_model" maxlength="199" placeholder="请填写商业模式（200字）" class="textarea-box">{{$projectInfo->business_model}}</textarea>
                    <span class="prompt red-p"><span id="business_modelTip"></span></span>
                </li>
                <li class="clearfix">
                    <div class="label">
                        <label for="">核心壁垒</label>
                    </div>
                    <textarea  name="core_barrier" id="core_barrier" maxlength="199" placeholder="请填写核心壁垒（200字）" class="textarea-box">{{$projectInfo->core_barrier}}</textarea>
                    <span class="prompt red-p"><span id="core_barrierTip"></span></span>
                </li>
                <li class="clearfix">
                    <div class="label">
                        <label for="">过往融资</label>
                    </div>
                    <textarea  name="financing_situation" maxlength="199" id="financing_situation" placeholder="请填写过往融资（200字）" class="textarea-box">{{$projectInfo->financing_situation}}</textarea>
                    <span class="prompt red-p"><span id="financing_situationTip"></span></span>
                </li>
                <li class="clearfix">
                    <div class="label">
                        <label for="">是否拥有专利技术</label>
                    </div>
                    <textarea  name="is_patent" id="is_patent" maxlength="199" placeholder="请描述（200字）" class="textarea-box">{{$projectInfo->is_patent}}</textarea>
                    <span class="prompt red-p"><span id="is_patentTip"></span></span>
                </li>
                <li class="clearfix">
                    <div class="label">
                        <label for="">产品传播效果</label>
                    </div>
                    <textarea name="product_communication" maxlength="499" id="product_communication" placeholder="请填写传播效果（500字）" class="textarea-box">{{$projectInfo->product_communication}}</textarea>
                    <span class="prompt red-p"><span id="product_communicationTip"></span></span>
                </li>
                <li class="clearfix">
                    <div class="label">
                        <label for="">产品内是否有广告</label>
                    </div>
                    <div class="radio-list">
                        <div class="label">
                            <input value="1" name="is_ad" @if($projectInfo->is_ad == 1) checked @endif  type="radio">
                            <label for="">是</label>
                        </div>
                        <div class="label">
                            <input value="2" name="is_ad" @if($projectInfo->is_ad == 2) checked @endif  type="radio">
                            <label for="">否</label>
                        </div>
                    </div>
                    <span class="prompt red-p"><span id="is_adTip"></span></span>
                </li>
                <li class="clearfix">
                    <div class="label">
                        <label for="">广告类型</label>
                    </div>
                    <input type="text" name="ad_type" maxlength="19" id="ad_type"  value="{{$projectInfo->ad_type}}" placeholder="请填写广告类型" class="input-box">
                    <span class="prompt red-p"><span id="ad_typeTip"></span></span>
                </li>
                <li class="clearfix">
                    <div class="label">
                        <label for="">内容生产机制</label>
                    </div>
                    <input type="text"  name="content_production_mechanism" value="{{$projectInfo->content_production_mechanism}}" maxlength="149" id="content_production_mechanism" placeholder="请填写生产机制" class="input-box">
                    <span class="prompt red-p"><span id="content_production_mechanismTip"></span></span>
                </li>
                <li class="clearfix">
                    <div class="label">
                        <label for="">内容审核机制</label>
                    </div>
                    <input type="text" id="content_review_mechanism"  value="{{$projectInfo->content_review_mechanism}}" maxlength="149" name="content_review_mechanism" placeholder="请填写审核机制" class="input-box">
                    <span class="prompt red-p"><span id="content_review_mechanismTip"></span></span>
                </li>
                <li class="clearfix">
                    <div class="label">
                        <label for="">专家或机构推荐意见</label>
                    </div>
                    <textarea name="expert_agency_recommendation" maxlength="149" id="expert_agency_recommendation" placeholder="除自由报名选手外需填写；如投资人推荐意见或高校学校推荐意见（200字）" class="textarea-box">{{$projectInfo->expert_agency_recommendation}}</textarea>
                    <span class="prompt red-p"><span id="expert_agency_recommendationTip"></span></span>
                </li>
            </ul>
        </div>
        <div class="f-btn pt40">
            <button type="submit" class="confirm">修改</button>
            <a href="javascript:void(0);" id="goBack" class="confirm green-btn">取消</a>
        </div>
    </form>
    <script src="/js/jquery-1.11.0.min.js" ></script>
    <script src="/js/jquery-migrate-1.2.1.js" ></script>
    <script src="/js/jquery-ui.min.js" ></script>
    <script src="/js/formvalidator4.1.3/formValidator-4.1.3.js" ></script>
    <script src="/js/formvalidator4.1.3/formValidatorRegex.js" ></script>
    <script>
        $(function(){

            $('#goBack').click(function(){
                window.location.href="/";
            })
            $.formValidator.initConfig({
                formID:"form",
                onSuccess:function(){
                    var flag = 1;
                    var num = 0;
                    for(var i=1;i<6; i++){
                        var isCheck = $(":checkbox[name='product_form_k["+i+"]']").attr('checked');
                        if(isCheck == 'checked'){
                            num = num+1;
                            if($("input[name='product_form_v["+i+"]']").val() == ''){
                                flag = 0;
                                alert("产品形态选名称不能为空");
                                break;
                            }
                        }
                    }
                    if(!num){
                        alert("产品形态不能为空");
                        return false;
                    }
                    if(!flag){
                        return false;
                    }
                    return true;
                },
                onError:function(){
                    return false;
                }
            });

            $("#project_name").formValidator( {
                onShow:"*必填",
                onFocus :"输入项目名称",
            }).inputValidator( {
                min :2,
                empty : {
                    leftEmpty :false,
                    rightEmpty :false,
                    emptyError :"两边不能有空"
                },
                onError :"2-50汉字"
            });
            $(":radio[name='product_type']").formValidator({
                tipID:"product_typeTip",
                onShow:"*必填",
                onFocus:"输入产品类型"
            }).inputValidator({
                min:1,
                max:1,
                onError:"产品类型不能为空"
            });
            $(":radio[name='product_user']").formValidator({
                tipID:"product_userTip",
                onShow:"*必填",
                onFocus:"输入产品用户"
            }).inputValidator({
                min:1,
                max:1,
                onError:"产品用户不能为空"
            });
            $("#product_user_size").formValidator({
                onShow:"*必填",
                onFocus:"输入产品用户数",
            }).regexValidator({
                regExp:"^\\d{1,10}$",
                onError:"产品用户数不正确"
            })
            $("#project_profile").formValidator( {
                onShow:"*必填",
                onFocus :"输入产品概况",
            }).inputValidator( {
                min :1,
                onError :"产品概况不能为空"
            });
            $("#product_highlight").formValidator( {
                onShow:"*必填",
                onFocus :"输入产品亮点",
            }).inputValidator( {
                min :1,
                onError :"产品亮点不能为空"
            });
            $("#business_model").formValidator( {
                onShow:"*必填",
                onFocus :"输入商业模式",
            }).inputValidator( {
                min :1,
                onError :"商业模式不能为空"
            });
            $("#core_barrier").formValidator( {
                onShow:"*必填",
                onFocus :"输入核心壁垒",
            }).inputValidator( {
                min :1,
                onError :"核心壁垒不能为空"
            });
            $("#financing_situation").formValidator( {
                onShow:"*必填",
                onFocus :"输入过往融资",
            }).inputValidator( {
                min :1,
                onError :"过往融资不能为空"
            });
            $("#is_patent").formValidator( {
                onShow:"*必填",
                onFocus :"输入是否专利技术",
            }).inputValidator( {
                min :1,
                onError :"专利技术不能为空"
            });
            $("#product_communication").formValidator( {
                onShow:"*必填",
                onFocus :"输入传播效果",
            }).inputValidator( {
                min :1,
                onError :"传播效果不能为空"
            });
            $(":radio[name='is_ad']").formValidator({
                tipID:"is_adTip",
                onShow:"*必填",
                onFocus:"输入广告"
            }).inputValidator({
                min:1,
                max:1,
                onError:"是否有广告不能为空"
            });
            $("#ad_type").formValidator( {
                onShow:"*必填",
                onFocus :"输入广告类型",
            }).inputValidator( {
                min :1,
                onError :"广告类型不能为空"
            });
            $("#content_production_mechanism").formValidator( {
                onShow:"*必填",
                onFocus :"输入内容生产机制",
            }).inputValidator( {
                min :1,
                onError :"内容生产机制不能为空"
            });
            $("#content_review_mechanism").formValidator( {
                onShow:"*必填",
                onFocus :"输入内容审核机制",
            }).inputValidator( {
                min :1,
                onError :"内容审核机制不能为空"
            });
            $("#expert_agency_recommendation").formValidator( {
                onShow:"*必填",
                onFocus :"输入专家或机构推荐意见",
            }).inputValidator( {
                min :1,
                onError :"专家或机构推荐意见不能为空"
            });
        })
    </script>
    @endsection
