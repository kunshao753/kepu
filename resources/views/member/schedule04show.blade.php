@extends('layouts.top')

@section('content')
    <div class="schedule-list">
        <ul class="schedule-wrap clearfix">
            <li>
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
            <li class="cur">
                <em>4</em>
                <span>上传资料</span>
                <i class="line"></i>
            </li>
        </ul>
    </div>
    <form method="post" id="form" enctype="multipart/form-data" action="{{route('member.projectPhotoEdit')}}">
        <div class="form-schedule w">
            <h3>上传资料</h3>
            <div class="data-up">
                <ul class="data-list clearfix">
                    <li>
                        <div class="text-left">
                            <p class="text01">参赛声明签名扫描版PDF</p>
                            <p class="text02">报名时下载的PDF企业盖章，团队签名后扫描上传<br /> ＊必传</p>
                        </div>
                        {{--<div class="file-btn">--}}
                            {{--<input type="file" id="contestant_statement" class="input-file" />--}}
                            {{--<input type="hidden" name="contestant_statement" />--}}
                            {{--<span class="file-b">上传</span>--}}
                        {{--</div>--}}
                        @if($projectPhoto->contestant_statement)
                        <a class="a_view"  target="_blank" href="/public/{{$projectPhoto->contestant_statement}}">PDF查看</a>
                        @endif
                    </li>
                    <li class="right text-aline">
                        <div class="text-left">
                            <p class="text01">身份证复印件正反面PDF</p>
                            <p class="text02"> ＊必传</p>
                        </div>
                        {{--<div class="file-btn">--}}
                            {{--<input type="file" id="identity_front_back"  name="" class="input-file" />--}}
                            {{--<input type="hidden" name="identity_front_back" />--}}
                            {{--<span class="file-b">上传</span>--}}
                        {{--</div>--}}
                        @if($projectPhoto->identity_front_back)
                        <a class="a_view"  target="_blank" href="/public/{{$projectPhoto->identity_front_back}}">PDF查看</a>
                        @endif
                    </li>
                    <li>
                        <div class="text-left">
                            <p class="text01">营业执照扫描PDF</p>
                            <p class="text02">*企业用户请上传</p>
                        </div>
                        {{--<div class="file-btn">--}}
                            {{--<input type="file" id="business_license" class="input-file" />--}}
                            {{--<input type="hidden" name="business_license" />--}}
                            {{--<span class="file-b">上传</span>--}}
                        {{--</div>--}}
                        @if($projectPhoto->business_license)
                        <a class="a_view"  target="_blank" href="/public/{{$projectPhoto->business_license}}">PDF查看</a>
                        @endif
                    </li>
                    <li class="right text-aline">
                        <div class="text-left">
                            <p class="text01">知识产权合规声明PDF</p>
                            <p class="text02">＊必传</p>

                        </div>
                        {{--<div class="file-btn">--}}
                            {{--<input type="file" id="intellectual_property_statement" class="input-file" />--}}
                            {{--<input type="hidden" name="intellectual_property_statement" />--}}
                            {{--<span class="file-b">上传</span>--}}
                        {{--</div>--}}
                        @if($projectPhoto->intellectual_property_statement)
                        <a class="a_view" target="_blank" href="/public/{{$projectPhoto->intellectual_property_statement}}">PDF查看</a>
                        @endif
                    </li>
                    <li>
                        <div class="text-left">
                            <p class="text01">融资证明材料PDF</p>
                            <p class="text02">*有融资用户请上传</p>

                        </div>
                        {{--<div class="file-btn">--}}
                            {{--<input type="file" id="financing_certificate" class="input-file">--}}
                            {{--<input type="hidden" name="financing_certificate" />--}}
                            {{--<span class="file-b">上传</span>--}}
                        {{--</div>--}}
                        @if($projectPhoto->financing_certificate)
                        <a class="a_view"  target="_blank"  href="/public/{{$projectPhoto->financing_certificate}}">PDF查看</a>
                        @endif
                    </li>
                    <li class="right text-aline">
                        <div class="text-left">
                            <p class="text01">产品传播效果报告PDF</p>
                        </div>
                        {{--<div class="file-btn">--}}
                            {{--<input type="file" id="product_communication_report" class="input-file" />--}}
                            {{--<input type="hidden" name="product_communication_report" />--}}
                            {{--<span class="file-b">上传</span>--}}
                        {{--</div>--}}
                        @if($projectPhoto->product_communication_report)
                        <a class="a_view"  target="_blank" href="/public/{{$projectPhoto->product_communication_report}}">PDF查看</a>
                        @endif
                    </li>
                    <li class="text-aline">
                        <div class="text-left">
                            <p class="text01">选手照片（JPG等格式）</p>
                        </div>
                        {{--<div class="file-btn">--}}
                            {{--<input type="file" id="contestant_photo" class="input-file" />--}}
                            {{--<input type="hidden" name="contestant_photo" />--}}
                            {{--<span class="file-b">上传</span>--}}
                        {{--</div>--}}
                        @if($projectPhoto->contestant_photo)
                        <img src="/public/{{$projectPhoto->contestant_photo}}" width="120" />
                        @endif
                    </li>
                    <li class="right text-aline">
                        <div class="text-left">
                            <p class="text01">项目图片LOGO（PNG格式）</p>
                        </div>
                        {{--<div class="file-btn">--}}
                            {{--<input type="file" id="logo_photo" class="input-file" />--}}
                            {{--<input type="hidden" name="logo_photo" />--}}
                            {{--<span class="file-b">上传</span>--}}
                        {{--</div>--}}
                        @if($projectPhoto->logo_photo)
                        <img src="/public/{{$projectPhoto->logo_photo}}" width="120" />
                        @endif
                    </li>
                </ul>
            </div>
            <div class="add-img clearfix">
                <div class="img-show" style="display: none"></div>
            </div>
        </div>
        <div class="f-btn pt40">
            @if($nextUrl != '')
                <a href="{{$nextUrl}}" class="confirm">结束</a>
            @endif
        </div>
    </form>
    <div class="footer">
        <span>中国科学技术协会版权所</span>
        <span>中国科学技术协会版权所</span>
    </div>
    <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $(function(){
            $('.data-list input').change(function(){
                var formData = new FormData();
                var inputName = $(this).attr('id');
                formData.append("file", $('#'+$(this).attr('id'))[0].files[0]);
                $.ajax({
                    url: "{{route('uploadFile')}}",
                    type: 'POST',
                    cache: false,
                    data: formData,
                    processData: false,
                    contentType: false
                }).done(function(res) {
                    if(res.status == 'success'){
                        $("input[name="+inputName+"]").val(res.data.filepath);
                        $('#'+inputName).closest('.file-btn').find('.file-b').html('上传成功');
                        if(inputName == 'contestant_photo'){
                            $('.img-show').html('<img src="'+res.data.filepath+'" >');
                            $('.img-show').show();
                        }
                    }
                });
            })
            $('#submit-btn').click(function(){
                $('#form').submit();
            })
            $('#goBack').click(function(){
                window.history.back()
            })
        })
    </script>
@endsection
