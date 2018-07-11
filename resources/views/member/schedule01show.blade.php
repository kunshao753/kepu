<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link rel="stylesheet" href="/styles/base.css">
    <link rel="stylesheet" href="/styles/style.css">
</head>
<body>
    <div class="header">
        <h2>科普互联网大赛</h2>
        <h3>项目报名</h3>
        <p class="text01">Project registration system</p>
        <p class="text02">Lorem ipsum dolor sit amet , consectetur adipiscing elit .</p>
        <div class="login" style=" color: #fff; font-size: 20px; position: absolute; right: 30px; top:50px;">
            <a style="color: #fff; margin-right:10px;" href="/">首页</a> |
            <a style="color: #fff;margin-left:10px;margin-right:10px;" href="{{route('member.index')}}" class="login">{{ Auth::user()->name }}</a> |
            <a style="color: #fff;margin-left:10px;" href="{{ route('logout') }}" class="sign-up" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">  退出  </a>
            @if (!Auth::guest())
                <form style="border:0;" id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            @endif
        </div>
    </div>
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
        <div class="form-schedule w">
            <h3>报名来源</h3>
            <ul class="form-list">
                @foreach ($signupResouce as $key=>$value)
                    <li class="clearfix">
                        <div class="label">
                            <input name="signup_resouce" @if($key == $cropInfo->signup_resouce) checked @endif value="{{$key}}" type="radio">
                            <label >{{$value['name']}}</label>
                        </div>
                        @if ($key < 4)
                            <input type="text" @if($key == $cropInfo->signup_resouce) value="{{$cropInfo->signup_resouce_val}}" @endif  name="signup_resouce_{{$key}}" placeholder="{{$value['tips']}}" class="input-box">
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
                    <input type="text" name="name" value="{{$cropInfo->name}}" placeholder="请填写姓名" class="input-box">
                </li>
                <li class="clearfix">
                    <div class="label">
                        <label >性别</label>
                    </div>
                    <div class="radio-list">
                        <div class="label">
                            <input name="sex" value="1" @if(1 == $cropInfo->sex) checked @endif type="radio">
                            <label for="">男</label>
                        </div>
                        <div class="label">
                            <input name="sex" value="2" @if(2 == $cropInfo->sex) checked @endif  type="radio">
                            <label for="">女</label>
                        </div>
                    </div>
                </li>
                <li class="clearfix">
                    <div class="label">
                        <label for="">出生年月</label>
                    </div>
                    <input type="date" name="birthday" value="{{$cropInfo->birthday}}" placeholder="请填写出生年月" class="input-box">
                </li>
                <li class="clearfix">
                    <div class="label">
                        <label for="">年龄</label>
                    </div>
                    <input type="text" name="age"  value="{{$cropInfo->age}}"  placeholder="请填写年龄" class="input-box">
                </li>
                <li class="clearfix">
                    <div class="label">
                        <label for="">身份证号</label>
                    </div>
                    <input type="text" name="identity_no"  value="{{$cropInfo->identity_no}}"  placeholder="请填写身份证号" class="input-box">
                </li>
                <li class="clearfix">
                    <div class="label">
                        <label for="">手机号</label>
                    </div>
                    <input type="text" name="mobile"  value="{{$cropInfo->mobile}}" placeholder="请填手机号" class="input-box">
                </li>
                <li class="clearfix">
                    <div class="label">
                        <label for="">微信号</label>
                    </div>
                    <input type="text" name="wechat" value="{{$cropInfo->wechat}}" placeholder="请填写微信号" class="input-box">
                </li>
                <li class="clearfix">
                    <div class="label">
                        <label for="">邮箱</label>
                    </div>
                    <input type="text" name="email" value="{{$cropInfo->email}}"  placeholder="请填写邮箱" class="input-box">
                </li>
                <li class="clearfix">
                    <div class="label">
                        <label for="">参赛身份</label>
                    </div>
                    <div class="radio-list">
                        <div class="label">
                            <input value="1" name="contestant_identity" @if(1 == $cropInfo->contestant_identity) checked @endif type="radio">
                            <label for="">企业</label>
                        </div>
                        <div class="label">
                            <input value="2" name="contestant_identity" @if(2 == $cropInfo->contestant_identity) checked @endif type="radio">
                            <label for="">创客团队</label>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="form-schedule w">
            <h3>企业基本情况</h3>
            <ul class="form-list">
                <li class="clearfix">
                    <div class="label">
                        <label for="">企业名称</label>
                    </div>
                    <input type="text" name="company_name" value="{{$cropInfo->company_name}}" placeholder="请填写企业名称" class="input-box">
                </li>
                <li class="clearfix">
                    <div class="label">
                        <label for="">公司网址</label>
                    </div>
                    <input type="text" name="website_url" value="{{$cropInfo->website_url}}" placeholder="请填写企业网址" class="input-box">
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
                        <input type="text"  name="organization_code" value="{{$cropInfo->organization_code}}"  placeholder="请填写统一社会信用代码" class="input-box">
                    </li>
                    <li class="clearfix">
                        <div class="label">

                            <label for="">法定代表人姓名</label>
                        </div>
                        <input type="text" name="company_legal_name" value="{{$cropInfo->company_legal_name}}" placeholder="请填写法定代表人姓名" class="input-box">
                    </li>
                    <li class="clearfix">
                        <div class="label">

                            <label for="">注册资本</label>
                        </div>
                        <input type="number" name="registered_capital" value="{{$cropInfo->registered_capital}}"  placeholder="请填写注册资本" class="input-box">
                        <span class="prompt">万元</span>
                    </li>
                    <li class="clearfix">
                        <div class="label">
                            <label for="">注册日期</label>
                        </div>
                        <input type="date" name="registered_time"  value="{{$cropInfo->registered_time}}"  placeholder="请选择注册日期" class="input-box">
                    </li>
                    <li class="clearfix cur">
                        <div class="label">
                            <label for="">注册地区</label>
                        </div>
                        <div class="select-box clearfix">
                            <input type="text" name="registered_address" value="{{$cropInfo->registered_address}}"  placeholder="请选择注册地区" class="input-box">
                        </div>
                    </li>
                </ul>
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
                                       name="{{$value['name']}}"  type="checkbox">
                                <label for="">{{$value['text']}}</label>
                            </div>
                        @endforeach
                    </div>
                </li>
            </ul>
        </div>
        <div class="f-btn pt40">
            @if($nextUrl != '')
                <a href="{{$nextUrl}}" class="confirm">下一步</a>
            @endif
        </div>
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