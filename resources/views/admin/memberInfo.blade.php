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
            .table-box th{
                width: 30%;
                text-align: right !important;

            }
            .table-box td{
                padding-left:55px;
                text-align: left !important;
                font-weight: bold;
            }
            .table-box tr td,.table-box tr th{
                font-size: 18px;
                text-align: left;
                padding:10px 5px;
                line-height: 30px !important;
            }
            .a_view{
                width: 110px !important;
                text-underline: none;
            }
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
    <div class="people-num people-num-w w">
        <h2>基本信息</h2>
        <table border="0" cellspacing="0" cellpadding="0" class="table-box">
            <tr><th >报名来源</th><td>
                    @foreach ($signupResouce as $key=>$value)
                        @if($key == $cropInfo->signup_resouce)
                            {{$value['name']}}:
                        @endif
                        @if($key == $cropInfo->signup_resouce)
                            {{$cropInfo->signup_resouce_val}}
                        @endif
                    @endforeach
                </td></tr>
            <tr><th>姓名</th><td>{{$cropInfo->name}}</td></tr>
            <tr><th>性别</th><td> @if(1 == $cropInfo->sex) 男 @else 女 @endif </td></tr>
            <tr><th>出生年月</th><td>{{$cropInfo->birthday}}</td></tr>
            <tr><th>年龄</th><td>{{$cropInfo->age}}</td></tr>
            <tr><th>身份证号</th><td>{{$cropInfo->identity_no}}</td></tr>
            <tr><th>手机号</th><td>{{$cropInfo->mobile}}</td></tr>
            <tr><th>微信号</th><td>{{$cropInfo->wechat}}</td></tr>
            <tr><th>邮箱</th><td>{{$cropInfo->email}}</td></tr>
            <tr><th>参赛身份</th><td>@if(1 == $cropInfo->contestant_identity) 企业 @else 创客团队 @endif</td></tr>
            @if(1 == $cropInfo->contestant_identity)
            <tr><th>企业名称</th><td>{{$cropInfo->company_name}}</td></tr>
            <tr><th>公司网址</th><td>{{$cropInfo->website_url}}</td></tr>
            <tr><th>统一社会信用代码</th><td>{{$cropInfo->organization_code}}</td></tr>
            <tr><th>法定代表人姓名</th><td>{{$cropInfo->company_legal_name}}</td></tr>
            <tr><th>注册资本</th><td>{{$cropInfo->registered_capital}}</td></tr>
            <tr><th>注册日期</th><td>{{$cropInfo->registered_time}}</td></tr>
            <tr><th>注册地区</th><td>{{$cropInfo->registered_address}}</td></tr>
            @endif
            <tr><th>希望支持</th><td>
                    @foreach ($help as $key=>$value)
                       @if($value['show'] == 1)
                        {{$value['text']}}
                       @endif
                    @endforeach
                </td></tr>
        </table>
        <h2 style="margin-top:30px;">项目团队</h2>
        <table border="0" cellspacing="0" cellpadding="0" class="table-box">
            <tr><th >团队人数</th><td>{{$teamInfo->team_size}}</td></tr>
            <tr><th>团队概况</th><td>{{$teamInfo->our_team}}</td></tr>
            <tr><th>团队成员介绍</th><td>{{$teamInfo->member_profile}}</td></tr>
            <tr><th>内部管理制度清单</th><td>{{$teamInfo->management_system_list}}</td></tr>
        </table>
        <h2 style="margin-top:30px;">项目信息</h2>
        <table border="0" cellspacing="0" cellpadding="0" class="table-box">
            <tr><th >项目名称</th><td>{{$projectInfo->project_name}}</td></tr>
            <tr><th>产品类型</th><td>
                    @foreach ($productType as $key=>$value)
                        @if($key == $projectInfo->product_type) {{$value['text']}} @endif
                    @endforeach
                </td></tr>
            <tr><th>产品形态</th><td>
                    @foreach ($productForm as $key=>$value)
                        @if($value['show'] == 1) {{$value['name']}} @endif

                    @endforeach
                </td></tr>
            <tr><th>产品用户</th><td>@if($projectInfo->product_user == 1) 普通公众 @else 支撑科普内容生产及传播的机构 @endif</td></tr>
            <tr><th>产品用户数</th><td>{{$projectInfo->product_user_size}}</td></tr>
            <tr><th>产品概况</th><td>{{$projectInfo->project_profile}}</td></tr>
            <tr><th>产品亮点</th><td>{{$projectInfo->product_highlight}}</td></tr>
            <tr><th>商业模式</th><td>{{$projectInfo->business_model}}</td></tr>
            <tr><th>核心壁垒</th><td>{{$projectInfo->core_barrier}}</td></tr>
            <tr><th>过往融资</th><td>{{$projectInfo->financing_situation}}</td></tr>
            <tr><th>是否拥有专利技术</th><td>{{$projectInfo->is_patent}}</td></tr>
            <tr><th>产品传播效果</th><td>{{$projectInfo->product_communication}}</td></tr>
            <tr><th>产品内是否有广告</th><td> @if($projectInfo->is_ad == 1) 是 @else 否 @endif </td></tr>
            <tr><th>广告类型</th><td>{{$projectInfo->ad_type}}</td></tr>
            <tr><th>内容生产机制</th><td>{{$projectInfo->content_production_mechanism}}</td></tr>
            <tr><th>内容审核机制</th><td>{{$projectInfo->content_review_mechanism}}</td></tr>
            <tr><th>专家或机构推荐意见</th><td>{{$projectInfo->expert_agency_recommendation}}</td></tr>
        </table>
        <h2 style="margin-top:30px;">上传资料</h2>
        <table border="0" cellspacing="0" cellpadding="0" class="table-box">
            <tr><th >参赛声明签名扫描版PDF</th><td>
                    @if($projectPhoto->contestant_statement)
                        <a class="a_view"  target="_blank" href="/public/{{$projectPhoto->contestant_statement}}">PDF查看</a>
                    @endif
                </td></tr>
            <tr><th>身份证复印件正反面PDF</th><td>
                    @if($projectPhoto->identity_front_back)
                        <a class="a_view"  target="_blank" href="/public/{{$projectPhoto->identity_front_back}}">PDF查看</a>
                    @endif
                </td></tr>
            <tr><th>营业执照扫描PDF</th><td>
                    @if($projectPhoto->business_license)
                        <a class="a_view"  target="_blank" href="/public/{{$projectPhoto->business_license}}">PDF查看</a>
                    @endif
                </td></tr>
            <tr><th>知识产权合规声明PDF</th><td>
                    @if($projectPhoto->intellectual_property_statement)
                        <a class="a_view" target="_blank" href="/public/{{$projectPhoto->intellectual_property_statement}}">PDF查看</a>
                    @endif
                </td></tr>
            <tr><th>融资证明材料PDF</th><td>
                    @if($projectPhoto->financing_certificate)
                        <a class="a_view"  target="_blank"  href="/public/{{$projectPhoto->financing_certificate}}">PDF查看</a>
                    @endif
                </td></tr>
            <tr><th>产品传播效果报告PDF</th><td>
                    @if($projectPhoto->product_communication_report)
                        <a class="a_view"  target="_blank" href="/public/{{$projectPhoto->product_communication_report}}">PDF查看</a>
                    @endif
                </td></tr>
            <tr><th>选手照片（JPG等格式）</th><td>
                    @if($projectPhoto->contestant_photo)
                        <img src="/public/{{$projectPhoto->contestant_photo}}" width="120" />
                    @endif
                </td></tr>
            <tr><th>项目图片LOGO（PNG格式）</th><td>
                    @if($projectPhoto->logo_photo)
                        <img src="/public/{{$projectPhoto->logo_photo}}" width="120" />
                    @endif
                </td></tr>
        </table>
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
                        <p class="text"> 中国科学技术出版社、优客工场、中国科技新闻学会、椅子网 </p>
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
</body>
</html>