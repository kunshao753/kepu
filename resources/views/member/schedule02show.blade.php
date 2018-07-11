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
        <input type="hidden" name="corp_id" value="1" />
    <div class="form-schedule w">
        <h3>项目团队</h3>
        <ul class="form-list">
            <li class="clearfix">
                <div class="label">
                    <label for="">团队人数</label>
                </div>
                <input type="text" name="team_size" value="{{$teamInfo->team_size}}" placeholder="请填写团队人数" class="input-box">
                <span class="prompt">人</span>
            </li>
            <li class="clearfix">
                <div class="label">
                    <label for="">团队概况</label>
                </div>
                <textarea name="our_team" placeholder="请填写团队概况" class="textarea-box">{{$teamInfo->our_team}}</textarea>
            </li>
            <li class="clearfix">
                <div class="label">
                    <label for="">团队成员介绍</label>
                </div>
                <textarea name="member_profile"  placeholder="请填写姓名、背景、职能等" class="textarea-box">{{$teamInfo->member_profile}}</textarea>
            </li>
            <li class="clearfix">
                <div class="label">
                    <label for="">内部管理制度清单</label>
                </div>
                <textarea name="management_system_list"  placeholder="请填管理制度" class="textarea-box">{{$teamInfo->management_system_list}}</textarea>
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