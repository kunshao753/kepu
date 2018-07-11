<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link rel="stylesheet" href="/styles/base.css" />
    <link rel="stylesheet" href="/styles/style.css" />
    <style>
        .page-list li{
            display: inline-block;
        }
        .page-list li.active span{
            color: #45cac4 !important;
        }
    </style>
</head>
<body>
<div class="header">
    <h2>科普互联网大赛</h2>
    <h3>大赛评审管理</h3>
    <p class="text01">Project registration system</p>
    <p class="text02">Lorem ipsum dolor sit amet , consectetur adipiscing elit .</p>
</div>
<div class="schedule-date w">
    <h2>当前大赛阶段</h2>
        {{ csrf_field() }}
        <ul class="schedule-date-list clearfix">
            @foreach ($competitionStep as $key=>$value)
                <li>
                    <input value="{{$key}}" type="radio"
                           @if ($value['show'] == 1)
                                checked="checked"
                           @endif
                           name="step">
                    <label >{{$value['text']}}</label>
                </li>
            @endforeach
        </ul>
    <div class="f-btn pt40">
        <a href="javascript:void(0);" id="step" class="confirm">保存</a>
    </div>
</div>
<div class="people-num w">
    <h2>当前报名人数<br/>{{$count}}人</h2>
    <table border="0" cellspacing="0" cellpadding="0" class="table-box">
        <tr>
            <th>序号</th>
            <th>姓名</th>
            <th>手机号</th>
            <th>企业名称</th>
            <th>项目名称</th>
            <th>参赛身份</th>
            <th>产品类型</th>
            <th>产品形态</th>
            <th>操作</th>
        </tr>
        @foreach ($corpData['data'] as $key=>$value)
            <tr>
                <td class="text">{{$key+1}}</td>
                <td class="text">{{$value['name']}}</td>
                <td class="text">{{$value['mobile']}}</td>
                <td class="text">{{$value['company_name']}}</td>
                <td class="text">{{$value['project_name']}}</td>
                <td class="text">
                    @if($value['contestant_identity'] == 1)
                        企业
                    @else
                        创客团队
                    @endif
                </td>
                <td class="text" width="15%" style="line-height: 30px;">{{$value['product_type']}}</td>
                <td class="text"  style="line-height: 30px;" >{!! $value['product_form_val'] !!}</td>
                <td>
                    <a href="{{route('member.corpInfo')}}?id={{$value['user_id']}}" class="btn">查看</a>
                    <a href="javascript:void(0);" data-id="{{$value['id']}}" class="btn audit-btn">审批</a>
                </td>
            </tr>
        @endforeach
    </table>
    <div class="b-page clearfix">
        <a href="javascript:void(0);" data-type="corporate_information" class="export-btn">导出</a>
        <div class="page-list">
            {{ $corpList->links()}}
        </div>
    </div>
</div>
<div class="people-num people-num-w w">
    <h2>咨询答疑</h2>

    <div id="messageList"></div>

    <div class="b-page clearfix">
        <a href="javascript:void(0);" data-type="message_board" class="export-btn">导出</a>
        <div class="page-list">
            <div id="messagePage"></div>
        </div>
    </div>
</div>
<div class="footer">
    <span>中国科学技术协会版权所</span>
    <span>中国科学技术协会版权所</span>
</div>
<div class="pop-up" style="display: none">
    <div class="mask"></div>
    <div class="form-cont w">
        <i class="closeicon"></i>
        <h3 class="big-tit">
            审批操作
        </h3>
        <ul class="reason-list">
            <li>
                <input name="auditstep" value="1" checked type="radio">
                初审未通过
            </li>
            <li>
                <input name="auditstep" value="2"  type="radio">
                进入初赛
            </li>
            <li>
                <input name="auditstep" value="3" type="radio">
                进入决赛
            </li>
        </ul>
        <div class="f-btn">
            <a href="javascript:void(0);" id="audit-step" class="confirm">提交</a>
            <a href="javascript:void(0);" class="confirm green-btn">取消</a>
        </div>
    </div>
</div>
<script src="/js/jquery-1.11.0.min.js" ></script>
<script src="/js/handlebars-v4.0.5.js"></script>
<script src="/js/paging.js"></script>
<script>
    var params = {
        pageSize: 20,
    };
    var messageAjax = function(params){
        $.ajax({
            type:"POST",
            url:"{{route('admin.message')}}",
            data:params,
            dataType:"json",
            success:function(res){
                if(res.status == 'success'){
                    var result = res.data;
                    var templateList = Handlebars.compile($("#messageList-template").html());
                    Handlebars.registerHelper("index_key", function(i) {
                        return i+1;
                    });
                    $('#messageList').html(templateList(result));
                    // $("#messagePage").paging({
                    //     pageNum: res.data.pageNum,
                    //     totalPage: Math.ceil(res.data.rowTotal/1),
                    //     totalSize: res.data.rowTotal,
                    //     callback: function(num) {
                    //         params.pageNo = num;
                    //         messageAjax(params);
                    //     }
                    // })
                }
            }
        })
    }
    params['pageNo'] = 1;
    messageAjax(params);

</script>
<script id="messageList-template" type="text/x-handlebars-template">
    <table border="0" cellspacing="0" cellpadding="0" class="table-box">
        <tr>
            <th>序号</th>
            <th>姓名</th>
            <th>手机号</th>
            <th>邮箱</th>
            <th>问题</th>
            <th>描述</th>
        </tr>
            {{--<tr>--}}
                {{--<td class="text">{{$key+1}}</td>--}}
                {{--<td class="text">{{$message->name}}</td>--}}
                {{--<td class="text">{{$message->mobile}}</td>--}}
                {{--<td class="text">{{$message->email}}</td>--}}
                {{--<td class="text">{{$message->question}}</td>--}}
                {{--<td class="text">{{$message->description}}</td>--}}
            {{--</tr>--}}
        @{{#each dataList}}
        <tr>
            <td>@{{index_key @index}}</td>
            <td>@{{ name}}</td>
            <td>@{{ mobile }}</td>
            <td>@{{ email }}</td>
            <td>@{{ question }}</td>
            <td>@{{ description }}</td>
        </tr>
        @{{/each}}
    </table>
</script>
<script>
    var audit_id = 0;
    $(function(){
        $('.export-btn').click(function(){
            var type = $(this).attr('data-type');
            window.location.href="{{route('admin.exportList')}}?type="+type;
        })
        $('.audit-btn').click(function(){
            $(".pop-up").hide();
            $(".pop-up").show();
            audit_id = $(this).attr('data-id');
        })
        $('.green-btn,.closeicon').click(function(){
            $(".pop-up").hide();
        })
        $('#step').click(function(){
            var step = $("input[name='step']:checked").val();
            $.ajax({
                type:"POST",
                url:"{{route('admin.updateStatus')}}",
                data:{step: step},
                dataType:"json",
                success:function(response){
                    alert("设置成功");
                    window.location.href = window.location.href;
                }
            })
        })
        $('#audit-step').click(function(){
            var status = $("input[name='auditstep']:checked").val();
            $.ajax({
                type:"POST",
                url:"{{route('admin.auditStatus')}}",
                data:{status: status, id: audit_id},
                dataType:"json",
                success:function(response){
                    console.log(response)
                    if(response.status == 'success'){
                        $(".pop-up").hide();
                    }
                }
            })
        })
    })
</script>
</body>
</html>