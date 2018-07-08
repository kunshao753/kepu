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
                <input type="text" name="team_size" placeholder="请填写团队人数" class="input-box">
                <span class="prompt">人</span>
            </li>
            <li class="clearfix">
                <div class="label">
                    <label for="">团队概况</label>
                </div>
                <textarea name="our_team" placeholder="请填写团队概况" class="textarea-box"></textarea>
            </li>
            <li class="clearfix">
                <div class="label">
                    <label for="">团队成员介绍</label>
                </div>
                <textarea name="member_profile"  placeholder="请填写姓名、背景、职能等" class="textarea-box"></textarea>
            </li>
            <li class="clearfix">
                <div class="label">
                    <label for="">内部管理制度清单</label>
                </div>
                <textarea name="management_system_list"  placeholder="请填管理制度" class="textarea-box"></textarea>
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