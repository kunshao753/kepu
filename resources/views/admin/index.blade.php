<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>申报评审系统-后台首页</title>
    <link rel="stylesheet" href="/styles/base.css?r=131" />
    <link rel="stylesheet" href="/styles/style.css?r=131" />
    <link rel="stylesheet" href="/css/jquery-ui.css?r=131" />
    <link rel="stylesheet" href="/styles/index.css?r=131" />
    <style>
        .page-list li{
            display: inline-block;
        }
        .page-list li.active span{
            color: #45cac4 !important;
        }
        .table-box tr td a{
            line-height:40px;
        }
        .table-box tr td,.table-box tr th{
            font-size: 18px;
            text-align: left;
            padding:10px 5px;
            line-height: 30px !important;
        }
        .search-box{width: 200px;padding: 10px; border: 1px solid #f4f4f4;line-height: 18px;margin-right: 10px;}
        .search-btn{background: #afdcc8;color: #fff;font-size: 18px;width: 80px;line-height: 40px;border-radius: 5px;border: none;}
    </style>
</head>
<body>
<div class="header">
    <div class="top-bar">
        <div class="w">
            <div class="logo"></div>
            <ul class="menu">
                <li ><a href="{{route('member.jump')}}">关于活动</a></li>
                <li ><a href="{{route('member.jump')}}">优秀作品</a></li>
                <li ><a href="{{route('member.jump')}}">活动现场</a></li>
                <li ><a href="{{route('member.jump')}}">指导专家</a></li>
                <li ><a href="{{route('member.jump')}}">加入我们</a></li>
            </ul>
            <div class="login-box">
                <label class="txt">
                    @if (!Auth::guest())
                        <a href="{{ route('logout') }}" class="sign-up" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">  退出  </a>
                        <form style="border:0; display: none" id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    @endif
                </label>
                <a href="javascript:void(0);" class="wechat"></a>
                <a href="javascript:void(0);" class="webo"></a>
            </div>
        </div>
    </div>
</div>
<div style="background: #fff; width: 1100px; padding: 0 20px 50px 20px; margin:0 auto;">
    <div class="people-num w">
        <h2>当前报名人数<br/>{{$count}}人</h2>
        <p style="margin: 10px 0">
            <input class="search-box" type="text" placeholder="按姓名查询">
            <input class="search-btn" type="button" value="搜索">
        </p>
        <div id="corpInfoList"></div>
        <div class="b-page clearfix">
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
            <a  href="{{route('admin.exportList')}}?type=message_board" class="export-btn">导出</a>
            <div class="page-list">
                <div id="messagePage"></div>
            </div>
        </div>
    </div>
</div>
<div class="footer clearfix" style="margin-top:100px;" >
    <div class="w">
        <table >
            <tr>
                <td valign="top"><img class="f_logo" src="/images/idex_82.png" /></td>
                <td valign="top">
                    <div class="f_m">
                        <img class="pic-title" src="/images/idex_79.png" />
                        <p class="title">主办单位</p>
                        <p class="text">中国科协科普部</p>
                        <p class="title">承办单位</p>
                        <p class="text">中国科协科技传播中心</p>
                        <p class="title">协办单位</p>
                        <p class="text"> 中国科学技术出版社、优客工场、启迪之星、中国科技新闻学会、椅子网 </p>
                    </div>
                </td>
                <td valign="top">
                    <div class="f_r">
                        <img class="pic-title" src="/images/idex_79.png" />
                        <p class="text contact">
                            中国科协科学技术传播中心：侯&nbsp;&nbsp;健&nbsp;&nbsp;&nbsp;&nbsp;于&nbsp;&nbsp;春<br />
                            联系电话：（010）87413332<br />
                            邮箱：kpcpds@cast.org.cn<br />
                            中国科协科普部：邢&nbsp;&nbsp;然&nbsp;&nbsp;&nbsp;&nbsp;张&nbsp;&nbsp;斌<br />
                            联系电话：（010）68578253
                        </p>
                    </div>
                </td>
            </tr>
        </table>
        <div class="f-bar">
            中国科学技术协会版权所<span style="padding:0 20px;">|</span>中国科学技术协会版权所
        </div>
    </div>

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
                <input name="auditstep" value="5" checked type="radio">
                初审通过
            </li>
            <li>
                <input name="auditstep" value="2" type="radio">
                初审未通过
            </li>
            <li>
                <input name="auditstep" value="3"  type="radio">
                初选通过
            </li>
            <li>
                <input name="auditstep" value="6"  type="radio">
                初选未通过
            </li>
            <li>
                <input name="auditstep" value="4" type="radio">
                终选通过
            </li>
            <li>
                <input name="auditstep" value="7" type="radio">
                终选未通过
            </li>
        </ul>
        <div class="f-btn">
            <a href="javascript:void(0);" id="audit-step" class="confirm">提交</a>
            <a href="javascript:void(0);" class="confirm green-btn">取消</a>
        </div>
    </div>
</div>
<script src="/js/jquery-2.2.3.min.js" ></script>
<script src="/js/handlebars-v4.0.5.js"></script>
<script src="/js/bootstrap.min.js"></script>
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
                        return (res.data.pageNum - 1) * 20 + i + 1
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
                        return (res.data.pageNum - 1) * param.pageSize + i + 1;
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
                        totalPage: Math.ceil(res.data.rowTotal/param.pageSize),
                        totalSize: res.data.rowTotal,
                        callback: function(num) {
                            param.pageNo = num;
                            param.name = $('.search-box').val();
                            cropInfoAjax(param);
                        }
                    })
                }
            }
        })
    }
    param['pageNo'] = 1;
    param['name'] = $('.search-box').val();
    cropInfoAjax(param);
    $(function(){
        $(".search-btn").on('click',function(){
            param['name'] = $('.search-box').val();
            console.log(param);
            cropInfoAjax(param);
        })
    })

</script>
<script id="messageList-template" type="text/x-handlebars-template">
    <table border="0" cellspacing="0" cellpadding="0" class="table-box">
        <tr>
            <th width="5%">序号</th>
            <th width="10%">姓名</th>
            <th width="15%">手机号</th>
            <th width="15%">邮箱</th>
            <th width="25%">问题</th>
            <th width="30%">描述</th>
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
            <th width="5%">序号</th>
            <th width="5%">姓名</th>
            <th width="10%">手机号</th>
            <th width="10%">企业名称</th>
            <th width="15%">项目名称</th>
            <th width="10%">参赛身份</th>
            <th width="10%">报名来源</th>
            <th width="10%">产品类型</th>
            <th width="10%">产品形态</th>
            <th width="15%">操作</th>
        </tr>
        @{{#each dataList}}
        <tr>
            <td>@{{index_key @index}}</td>
            <td>@{{ name}}</td>
            <td>@{{ mobile }}</td>
            <td>@{{ company_name }}</td>
            <td>@{{ project_name }}</td>
            <td>@{{ci contestant_identity }}</td>
            <td>@{{ signup_resouce }}</td>
            <td style="line-height: 30px;">@{{ product_type }}</td>
            <td  style="line-height: 30px;">@{{{ product_form_val }}}</td>
            <td>
                <a style="width: 70px; height: 45px; line-height: 45px;" href="{{route('admin.memberInfo')}}?id=@{{ user_id }}" class="btn">查看</a>
                <a style="width: 70px; height: 45px; line-height: 45px;" href="javascript:void(0);" data-id="@{{ id }}" class="btn audit-btn">审批</a>
                <a style="padding: 0 32px;margin-top: 10px; height: 45px; line-height: 45px;position: relative" href="javascript:void(0);" class="btn">
                        <span> @{{ files_zip }} </span>
                    <input style="position: absolute;width: 100%;height: 45px;left: 0;top: 0;opacity: 0" type="file" data-id="@{{ user_id }}" class="upload-file">
                </a>

            </td>
        </tr>
        @{{/each}}
    </table>
</script>
<script>


    var audit_id = 0;
    $(function(){
        // $('#memberInfoModel').modal("show");


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

        $('#corpInfoList').delegate('.upload-file','change',function(){
            var t = $(this);
            var uid = t.attr('data-id');
            var fileObj = this.files[0]
            var formData = new FormData();
            formData.append('file',fileObj);
            formData.append('id',uid);

            $.ajax({
                url: "/admin/uploadZipFile",
                type: 'post',
                cache: false,
                data: formData,
                processData: false,
                contentType: false
            }).done(function(res) {
                if(res.status == 'success'){
                    t.siblings('span').html('已上传');
                    alert('上传成功')
                }
            });
        })
    })


</script>

</body>
</html>