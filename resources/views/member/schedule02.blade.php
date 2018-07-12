@extends('layouts.top')

@section('content')
    <div class="schedule-list">
        <ul class="schedule-wrap clearfix">
            <li>
                <em>1</em>
                <span>基本信息</span>
                <i class="line"></i>
            </li>
            <li class="cur">
                <em>2</em>
                <span>项目团队</span>
                <i class="line"></i>
            </li>
            <li>
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
    <form method="post" id="form" action="{{route('member.projectTeamEdit')}}">
        <input type="hidden" name="corp_id" value="1" />
    <div class="form-schedule w">
        <h3>项目团队</h3>
        <ul class="form-list">
            <li class="clearfix">
                <div class="label">
                    <label for="">团队人数</label>
                </div>
                <input type="text" name="team_size" maxlength="5" id="team_size" placeholder="请填写团队人数" class="input-box">
                <span class="prompt">人</span>
                <span class="prompt red-p"><span id="team_sizeTip"></span></span>
            </li>
            <li class="clearfix">
                <div class="label">
                    <label for="">团队概况</label>
                </div>
                <textarea name="our_team" id="our_team" placeholder="请填写团队概况" class="textarea-box"></textarea>
                <span class="prompt red-p"><span id="our_teamTip"></span></span>
            </li>
            <li class="clearfix">
                <div class="label">
                    <label for="">团队成员介绍</label>
                </div>
                <textarea name="member_profile" id="member_profile" placeholder="请填写姓名、背景、职能等" class="textarea-box"></textarea>
                <span class="prompt red-p"><span id="member_profileTip"></span></span>
            </li>
            <li class="clearfix">
                <div class="label">
                    <label for="">内部管理制度清单</label>
                </div>
                <textarea name="management_system_list" id="management_system_list" placeholder="请填管理制度" class="textarea-box"></textarea>
                <span class="prompt red-p"><span id="management_system_listTip"></span></span>
            </li>
        </ul>
    </div>
    <div class="f-btn pt40">
        <button type="submit" class="confirm">下一步</button>
        <a href="javascript:void(0);" id="goBack" class="confirm green-btn">取消</a>
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
    <script>
        $(function(){

            $('#goBack').click(function(){
                window.location.href="/";
            })
            $.formValidator.initConfig({
                formID:"form",
                onSuccess:function(){
                    return true;
                },
                onError:function(){
                    return false;
                }
            });
            $("#team_size").formValidator({
                onShow:"*必填",
                onFocus:"输入团队人数",
            }).regexValidator({
                regExp:"^\\d{1,5}$",
                onError:"团队人数不正确"
            })
            $("#our_team").formValidator( {
                onShow:"*必填",
                onFocus :"团队概况",
            }).inputValidator( {
                min :1,
                onError :"团队概况不能为空"
            });
            $("#member_profile").formValidator( {
                onShow:"*必填",
                onFocus :"团队成员",
            }).inputValidator( {
                min :1,
                onError :"团队成员不能为空"
            });
            $("#management_system_list").formValidator( {
                onShow:"*必填",
                onFocus :"管理制度",
            }).inputValidator( {
                min :1,
                onError :"管理制度不能为空"
            });

        })
    </script>
@endsection
