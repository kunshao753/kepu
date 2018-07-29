<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>申报评审系统-后台首页</title>
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
    <div class="login-header w clearfix" style="position: relative">
        <div class="login" style="position: absolute; font-size: 22px; right:50px; top:30px;">
            @if (!Auth::guest())
                <a style="color: #fff" href="{{ route('logout') }}" class="sign-up" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">  退出  </a>
            @endif
        </div>
        @if (!Auth::guest())
            <form style="border:0;" id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        @endif
    </div>
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
    <div id="corpInfoList"></div>
    <div class="b-page clearfix">
        {{--<a href="javascript:void(0);" data-type="corporate_information" class="export-btn">导出</a>--}}
        <a  href="{{route('admin.exportList')}}?type=corporate_information" class="export-btn">导出</a>
        <div class="page-list">
            <div id="corpInfoPage"></div>
        </div>
    </div>
</div>
<div class="people-num people-num-w w">
    <h2>咨询答疑</h2>

    <div id="messageList"></div>

    <div class="b-page clearfix">
        {{--<a href="javascript:void(0);" data-type="message_board" class="export-btn">导出</a>--}}
        <a  href="{{route('admin.exportList')}}?type=message_board" class="export-btn">导出</a>
        <div class="page-list">
            <div id="messagePage"></div>
        </div>
    </div>
</div>
<div class="footer">
    <span>中国科学技术协会版权所</span>
    <span>中国科学技术协会版权所</span>
</div>
<div class="pop-up" style="display: none;   ">
    <div class="mask"></div>
    <div class="form-cont w" style="position: fixed; top:70px;">
        <i class="closeicon"></i>
        <h3 class="big-tit">
            审批操作
        </h3>
        <ul class="reason-list">
            <li>
                <input name="auditstep" value="2" checked type="radio">
                初审未通过
            </li>
            <li>
                <input name="auditstep" value="3"  type="radio">
                进入初赛
            </li>
            <li>
                <input name="auditstep" value="4" type="radio">
                进入决赛
            </li>
        </ul>
        <div class="f-btn">
            <a href="javascript:void(0);" id="audit-step" class="confirm">提交</a>
            <a href="javascript:void(0);" class="confirm green-btn">取消</a>
        </div>
    </div>
</div>
<div class="modal fade" id="memberInfoModel" style=" display: none; margin-top:5%;" tabindex="-1" role="dialog">
    {{ csrf_field() }}
    <div class="modal-dialog" role="document" style=" width: 850px;">
        <div class="modal-content form-control">
            <div class="modal-header" style=""><button class="close" type="button" data-dismiss="modal">×</button>
                <h3 id="myModalLabel" style="font-size: 18px;">查看用户信息</h3>
            </div>
            <div class="modal-body " style="height: 530px; padding-top:20px;">
            </div>
        </div>
    </div>
</div>
<script src="/js/jquery-2.2.3.min.js" ></script>
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
                    $("#messagePage").paging({
                        pageNo: res.data.pageNum,
                        totalPage: Math.ceil(res.data.rowTotal/20),
                        totalSize: res.data.rowTotal,
                        callback: function(num) {
                            params.pageNum = num;
                            messageAjax(params);
                        }
                    })
                }
            }
        })
    }
    params['pageNum'] = 1;
    messageAjax(params);

</script>
<script>
    var param = {
        pageSize: 20,
    };
    var cropInfoAjax = function(param){
        $.ajax({
            type:"POST",
            url:"{{route('admin.corpInfo')}}",
            data:param,
            dataType:"json",
            success:function(res){
                if(res.status == 'success'){
                    var result = res.data;
                    console.log(result)
                    var templateList = Handlebars.compile($("#corpInfoList-template").html());
                    Handlebars.registerHelper("index_key", function(i) {
                        return i+1;
                    });
                    Handlebars.registerHelper("ci", function(id) {
                        if(id == 1){
                            return "企业";
                        }else{
                            return "创客团队";
                        }
                    });
                    $('#corpInfoList').html(templateList(result));
                    $("#corpInfoPage").paging({
                        pageNo: res.data.pageNum,
                        totalPage: Math.ceil(res.data.rowTotal/20),
                        totalSize: res.data.rowTotal,
                        callback: function(num) {
                            param.pageNo = num;
                            cropInfoAjax(param);
                        }
                    })
                }
            }
        })
    }
    param['pageNo'] = 1;
    cropInfoAjax(param);

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
<script id="corpInfoList-template" type="text/x-handlebars-template">
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
        @{{#each dataList}}
        <tr>
            <td>@{{index_key @index}}</td>
            <td>@{{ name}}</td>
            <td>@{{ mobile }}</td>
            <td>@{{ company_name }}</td>
            <td>@{{ project_name }}</td>
            <td>@{{ci contestant_identity }}</td>
            <td width="15%" style="line-height: 30px;">@{{ product_type }}</td>
            <td width="15%" style="line-height: 30px;">@{{{ product_form_val }}}</td>
            <td>
                <a href="/member/corpInfo?id=@{{ user_id }}" class="btn">查看</a>
                <a href="javascript:void(0);" data-id="@{{ id }}" class="btn audit-btn">审批</a>
            </td>
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

        $('#corpInfoList').delegate('.audit-btn','click',function(){
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