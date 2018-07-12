@extends('layouts.top')

@section('content')
    <div class="schedule-list">
        <ul class="schedule-wrap clearfix">
            <li class="cur">
                <em>1</em>
                <span>基本信息</span>
                <i class="line"></i>
            </li>
            <li>
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
    <form method="post" id="form" action="{{route('member.corpInfoEdit')}}">
        <div class="form-schedule w">
            <h3>报名来源</h3>
            <ul class="form-list">
                @foreach ($signupResouce as $key=>$value)
                    <li class="clearfix">
                        <div class="label">
                            <input name="signup_resouce" value="{{$key}}" type="radio">
                            <label >{{$value['name']}}</label>
                        </div>
                        @if ($key < 4)
                            <input type="text" name="signup_resouce_{{$key}}" maxlength="49" disabled placeholder="{{$value['tips']}}" class="signup_resouce_{{$key}} input-box">
                        @endif
                        @if($key == 1)
                            <span class="prompt red-p"><span id="signup_resouceTip">*必填(四选一)</span></span>
                        @endif
                    </li>
                @endforeach

            </ul>
        </div>
        <div class="form-schedule w">
            <h3>基本信息</h3>
            <ul class="form-list">
                <li class="clearfix">
                    <div class="label">
                        <label for="">姓名</label>
                    </div>
                    <input type="text" name="name" maxlength="8" id="name" placeholder="请填写姓名" class="input-box">
                    <span class="prompt red-p"><span id="nameTip"></span></span>
                </li>
                <li class="clearfix">
                    <div class="label">
                        <label >性别</label>
                    </div>
                    <div class="radio-list">
                        <div class="label">
                            <input name="sex" id="sex" checked value="1" type="radio">
                            <label for="">男</label>
                        </div>
                        <div class="label">
                            <input name="sex" id="sex1" value="2" type="radio">
                            <label for="">女</label>
                        </div>
                    </div>
                </li>
                <li class="clearfix">
                    <div class="label">
                        <label for="">出生年月</label>
                    </div>
                    <input type="text" name="birthday" id="birthday" placeholder="请填写出生年月" class="input-box">
                    <span class="prompt red-p"><span id="birthdayTip"></span></span>
                </li>
                <li class="clearfix">
                    <div class="label">
                        <label for="">年龄</label>
                    </div>
                    <input type="text" name="age" id="age" placeholder="请填写年龄" class="input-box">
                    <span class="prompt red-p"><span id="ageTip"></span></span>
                </li>
                <li class="clearfix">
                    <div class="label">
                        <label for="">身份证号</label>
                    </div>
                    <input type="text" name="identity_no" maxlength="18" id="identity_no" placeholder="请填写身份证号" class="input-box">
                    <span class="prompt red-p"><span id="identity_noTip"></span></span>
                </li>
                <li class="clearfix">
                    <div class="label">
                        <label for="">手机号</label>
                    </div>
                    <input type="text" name="mobile" maxlength="11" id="mobile" placeholder="请填手机号" class="input-box">
                    <span class="prompt red-p"><span id="mobileTip"></span></span>
                </li>
                <li class="clearfix">
                    <div class="label">
                        <label for="">微信号</label>
                    </div>
                    <input type="text" name="wechat" placeholder="请填写微信号" class="input-box">
                </li>
                <li class="clearfix">
                    <div class="label">
                        <label for="">邮箱</label>
                    </div>
                    <input type="text" name="email" maxlength="39" id="email" placeholder="请填写邮箱" class="input-box">
                    <span class="prompt red-p"><span id="emailTip"></span></span>
                </li>
                <li class="clearfix">
                    <div class="label">
                        <label for="">参赛身份</label>
                    </div>
                    <div class="radio-list">
                        <div class="label">
                            <input value="1" name="contestant_identity" id="contestant_identity" type="radio">
                            <label for="">企业</label>
                        </div>
                        <div class="label">
                            <input value="2" name="contestant_identity" id="contestant_identity1" type="radio">
                            <label for="">创客团队</label>
                        </div>
                        <span class="prompt red-p"><span id="contestant_identityTip"></span></span>
                    </div>
                </li>
            </ul>
        </div>
        <div id="company_info_box" style="display: none">
        <div class="form-schedule w">
            <h3>企业基本情况</h3>
            <ul class="form-list">
                <li class="clearfix">
                    <div class="label">
                        <label for="">企业名称</label>
                    </div>
                    <input type="text" maxlength="49"  name="company_name" id="company_name" placeholder="请填写企业名称" class="input-box">
                    <span class="prompt red-p"><span id="company_nameTip"></span></span>
                </li>
                <li class="clearfix">
                    <div class="label">
                        <label for="">公司网址</label>
                    </div>
                    <input type="text" name="website_url" maxlength="95" placeholder="请填写企业网址" class="input-box">
                </li>
            </ul>
        </div>
        <div class="form-schedule w">
                <h3>企业注册情况</h3>
                <ul class="form-list">
                    <li class="clearfix">
                        <div class="label">
                            <label for="">统一社会信用代码</label>
                        </div>
                        <input type="text" maxlength="18"  name="organization_code" id="organization_code" placeholder="请填写统一社会信用代码" class="input-box">
                        <span class="prompt red-p"><span id="organization_codeTip"></span></span>
                    </li>
                    <li class="clearfix">
                        <div class="label">

                            <label for="">法定代表人姓名</label>
                        </div>
                        <input type="text" maxlength="8" name="company_legal_name" id="company_legal_name" placeholder="请填写法定代表人姓名" class="input-box">
                        <span class="prompt red-p"><span id="company_legal_nameTip"></span></span>

                    </li>
                    <li class="clearfix">
                        <div class="label">
                            <label for="">注册资本</label>
                        </div>
                        <input type="text" name="registered_capital" maxlength="8" id="registered_capital" placeholder="请填写注册资本" class="input-box">
                        <span class="prompt">万元</span>
                        <span class="prompt red-p"><span id="registered_capitalTip"></span></span>
                    </li>
                    <li class="clearfix">
                        <div class="label">
                            <label for="">注册日期</label>
                        </div>
                        <input type="text" name="registered_time" id="registered_time" placeholder="请选择注册日期" readonly class="input-box">
                        <span class="prompt red-p"><span id="registered_timeTip"></span></span>
                    </li>
                    <li class="clearfix cur">
                        <div class="label">
                            <label for="">注册地区</label>
                        </div>
                        <div class="select-box clearfix">
                            <input type="text" name="registered_address" maxlength="49" id="registered_address"  placeholder="请选择注册地区" class="input-box">
                            <span class="prompt red-p"><span id="registered_addressTip"></span></span>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="form-schedule w">
            <h3>你希望获得什么支持</h3>
            <ul class="form-list">
                <li class="clearfix label-f-n">
                    <div class="radio-list">
                        @foreach ($help as $key=>$value)
                            <div class="label">
                                <input value="{{$key}}"
                                       @if($value['show'] == 1)
                                       checked
                                       @endif
                                       name="accept_help[]"  type="checkbox">
                                <label for="">{{$value['text']}}</label>
                            </div>
                        @endforeach
                    </div>
                    <span class="prompt red-p"><span id="accept_helpTip"></span></span>
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
            $( "#registered_time" ).datepicker({
                changeMonth: true,
                numberOfMonths: 1
            });
            $( "#birthday" ).datepicker({
                changeMonth: true,
                numberOfMonths: 1
            });
            $('#goBack').click(function(){
                window.location.href="/";
            })
            $.formValidator.initConfig({
                formID:"form",
                onSuccess:function(){
                    var num = $(":radio[name='signup_resouce']:checked").val();
                    if(num < 4 ){
                        var sr_name = 'signup_resouce_'+num;
                        if($("input[name="+sr_name+"]").val() == ""){
                            alert("报名来源内容不能为空")
                            return false;
                        }
                    }
                    return true;
                },
                onError:function(){
                    return false;
                }
            });
            $("#name").formValidator( {
                onShow :"*必填",
                onFocus :"2-8汉字和字母",
            }).inputValidator( {
                min :2,
                onError :"姓名不能为空"
            });
            // TODO 处理
            $(":radio[name='signup_resouce']").formValidator({
                tipID:"signup_resouceTip",
                onShow:"*必填(四选一)",
                onFocus:"请输入右边内容",
            }).inputValidator({
                min:1,
                max:1,
                onError:"报名来源不能为空"
            });
            $("#age").formValidator({
                empty:true,
                onShow :"",
                onFocus:"输入正确年龄",
                onEmpty:""
            }).regexValidator({
                regExp:regexEnum.isNumber2,
                onError:"年龄格式不正确"
            });
            $("#identity_no").formValidator({
                onShow:"*必填",
                onFocus:"输入15或18位的身份证",
                onCorrect:"身份证有效"
            }).functionValidator({
                fun:isCardID
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
                empty:true,
                onShow :"",
                onFocus:"邮箱6-40个字符",
                onEmpty:""
            }).regexValidator({
                regExp:"^([\\w-.]+)@(([[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}.)|(([\\w-]+.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(]?)$",
                onError:"邮箱格式不正确"
            });
            // TODO 处理
            $(":radio[name='contestant_identity']").formValidator({
                tipID:"contestant_identityTip",
                onShow:"*必填",
                onFocus:"参赛身份"
            }).inputValidator({
                min:1,
                max:1,
                onError:"参赛身份不能为空"
            });
            $($(":radio[name='contestant_identity']")).click(function(){
                if($(":radio[name='contestant_identity']:checked").val()==1){
                    $("#company_info_box").show();
                }else{
                    $("#company_info_box").hide();
                }
            })
            $($(":radio[name='signup_resouce']")).click(function(){
                var key = $(":radio[name='signup_resouce']:checked").val()
                if(key < 4){
                    for(var i=1; i<4;i++){
                        $(".signup_resouce_"+i).val('');
                        $(".signup_resouce_"+i).attr('disabled',true);
                    }
                    $(".signup_resouce_"+key).attr('disabled',false);
                }
            })


            $("#company_name").formValidator( {
                onShow:"*必填",
                onFocus :"输入企业名称",
            }).functionValidator({
                fun: function (val) {
                    if($("#company_info_box").css('display') == 'none'){
                        return true;
                    }
                    if(!/^\S{2,49}$/.test(val)){
                        return "企业名称不能为空";
                    }
                    return true;
                }
            });
            $("#organization_code").formValidator( {
                onShow:"*必填",
                onFocus :"输入18位信用代码",
            }).functionValidator({
                fun: function (val) {
                    if($("#company_info_box").css('display') == 'none'){
                        return true;
                    }
                    if(!/^\d{1,18}$/.test(val)){
                        return "信用代码不正确";
                    }
                    return true;
                }
            });
            $("#company_legal_name").formValidator( {
                onShow:"*必填",
                onFocus :"输入法定代表人",
            }).functionValidator({
                fun: function (val) {
                    if($("#company_info_box").css('display') == 'none'){
                        return true;
                    }
                    if(!/^\S{2,8}$/.test(val)){
                        return "法定代表人不能为空";
                    }
                    return true;
                }
            });
            $("#registered_capital").formValidator({
                onShow:"*必填",
                onFocus:"输入注册资本",
            }).functionValidator({
                fun: function (val) {
                    if($("#company_info_box").css('display') == 'none'){
                        return true;
                    }
                    if(!/^\S{1,8}$/.test(val)){
                        return "注册资本不能为空";
                    }
                    if(!/^([+-]?)\d*\.?\d+$/.test(val)){
                        return "注册资本格式不正确";
                    }
                    return true;
                }
            });
            $("#registered_time").formValidator( {
                onShow:"*必填",
                onFocus :"输入注册日期",
            }).functionValidator({
                fun: function (val) {
                    if($("#company_info_box").css('display') == 'none'){
                        return true;
                    }
                    if(!/^\S{1,30}$/.test(val)){
                        return "注册日期不能为空";
                    }
                    return true;
                }
            });
            $("#registered_address").formValidator( {
                onShow:"*必填",
                onFocus :"输入注册地区",
            }).functionValidator({
                fun: function (val) {
                    if($("#company_info_box").css('display') == 'none'){
                        return true;
                    }
                    if(!/^\S{2,50}$/.test(val)){
                        return "注册地区不能为空";
                    }
                    return true;
                }
            });

            $(":checkbox[name='accept_help[]']").formValidator({
                tipID:"accept_helpTip",
                onShow:"*必填（至少选1个）",
                onFocus:"你至少选择1个",
            }).inputValidator({
                min:1,
                onError:"你选的个数不对"
            });
        })
    </script>
@endsection
