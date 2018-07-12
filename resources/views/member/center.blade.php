<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>申报评审系统-个人中心</title>
    <link rel="stylesheet" href="/styles/base.css">
    <link rel="stylesheet" href="/styles/style.css">
</head>
<body>
    <div class="header">
        <h2>科普互联网大赛</h2>
        <h3>个人中心</h3>
        <p class="text01">Personal Center</p>
        <p class="text02">Lorem ipsum dolor sit amet , consectetur adipiscing elit .</p>
        <div class="login" style=" color: #fff; font-size: 20px; position: absolute; right: 30px; top:50px;">
            <a style="color: #fff; margin-right:10px;" href="/">首页</a> |
            <a style="color: #fff;margin-left:10px;margin-right:10px;" href="{{route('member.index')}}" class="login">{{ Auth::user()->name }}</a> |
            <a style="color: #fff;margin-left:10px;" href="{{ route('logout') }}" class="sign-up" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">  退出  </a>
            <form style="border:0;" id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </div>
    </div>
    <div class="personal-data">
        <h3>个人资料</h3>
        <ul class="data-list">
            <li>
                手机号：<em>{{$user['mobile']}}</em>
            </li>
            <li>
                邮箱：<em>{{$user['email']}}</em>
            </li>
            <li>
                姓名：<em>{{$user['name']}}</em>
            </li>
        </ul>
    </div>
    <div class="my-data w">
        <h3>我的报名</h3>
        <table border="0" cellspacing="0" cellpadding="0" class="table-box">
            <tr>
                <th>审核进度</th>
                <th>操作</th>
            </tr>
            <tr>
                <td>
                    <span class="text">
                        @if($status == 0)
                            初审未通过
                        @elseif($status == 1)
                            报名
                        @elseif($status == 2)
                            进入初赛
                        @else
                            进入决赛
                        @endif
                    </span>
                </td>
                <td>
                    @if($isResult == 1)
                    <a href="{{route('member.corpInfo')}}?id={{$user['id']}}" class="btn">查看</a>
                    <a href="javascript:void(0);" class="btn" id="del">删除</a>
                    @else
                        <a href="{{route('member.signUp')}}" class="btn">开始报名</a>
                    @endif
                </td>
            </tr>
        </table>
    </div>
    <div class="footer">
        <span>中国科学技术协会版权所</span>
        <span>中国科学技术协会版权所</span>
    </div>
    <script>

        var disp_confirm = function ()
        {
            var r = confirm("删除报名信息")
            if (r == true)
            {
                window.location.href = "{{route('member.corpInfoDel')}}";
            }
        }
    </script>
    <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $(function(){
            $('#del').click(function(){
                disp_confirm();
            })
        })
    </script>
</body>
</html>