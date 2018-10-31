@extends('layouts.top')

@section('content')
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
                            未报名
                        @elseif($status == 1)
                            报名成功,材料审核中
                        @elseif($status == 2)
                            初审未通过
                        @elseif($status == 5)
                            初审通过
                        @elseif($status == 3)
                            初选通过
                        @elseif($status == 6)
                            初选未通过
                        @elseif($status == 4)
                            终选通过
                        @elseif($status == 7)
                            终选未通过
                        @endif
                    </span>
                </td>
                <td>
                    @if($isResult == 1)
                    {{--<a href="{{route('member.corpInfo')}}?id={{$user['id']}}" class="btn">修改</a>--}}
                    {{--<a href="javascript:void(0);" class="btn" id="del">删除</a>--}}
                    @else
{{--                        <a href="{{route('member.signUp')}}" class="btn">开始报名</a>--}}
                        <a href="javascript:void(0)" class="btn" style="color: #969398;background: #f4f4f4;">报名结束</a>

                    @endif
                </td>
            </tr>
        </table>
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
@endsection