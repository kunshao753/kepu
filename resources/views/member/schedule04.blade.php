<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>流程四</title>
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
    <style>
        .data-list li{
            position: relative;
        }
        .a_view{
            position: absolute;
            top: 120px;
            width: 120px;
            height: 40px;
            right: 35px;
            font-size: 18px;
            color: blue;

        }
    </style>
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
                        <div class="file-btn">
                            <input type="file" id="contestant_statement" class="input-file" />
                            <input type="hidden"  name="contestant_statement" class="contestant_statement" />
                            <span class="file-b">上传</span>
                        </div>
                    </li>
                    <li class="right text-aline">
                        <div class="text-left">
                            <p class="text01">身份证复印件正反面PDF</p>
                            <p class="text02"> ＊必传</p>
                        </div>
                        <div class="file-btn">
                            <input type="file" id="identity_front_back"  name="" class="input-file" />
                            <input type="hidden" name="identity_front_back" class="identity_front_back" />
                            <span class="file-b">上传</span>
                        </div>
                    </li>
                    <li>
                        <div class="text-left">
                            <p class="text01">营业执照扫描PDF</p>
                        </div>
                        <div class="file-btn">
                            <input type="file" id="business_license" class="input-file" />
                            <input type="hidden"  name="business_license" />
                            <span class="file-b">上传</span>
                        </div>
                    </li>
                    <li class="right text-aline">
                        <div class="text-left">
                            <p class="text01">知识产权合规声明PDF</p>
                            <p class="text02">＊必传</p>
                        </div>
                        <div class="file-btn">
                            <input type="file" id="intellectual_property_statement" class="input-file" />
                            <input type="hidden" name="intellectual_property_statement" class="intellectual_property_statement" />
                            <span class="file-b">上传</span>
                        </div>
                    </li>
                    <li>
                        <div class="text-left">
                            <p class="text01">融资证明材料PDF</p>
                            <p class="text02">有融资情况上传<br/> ＊必传</p>
                        </div>
                        <div class="file-btn">
                            <input type="file" id="financing_certificate" class="input-file">
                            <input type="hidden"  name="financing_certificate" />
                            <span class="file-b">上传</span>
                        </div>
                    </li>
                    <li class="right text-aline">
                        <div class="text-left">
                            <p class="text01">产品传播效果报告PDF</p>
                        </div>
                        <div class="file-btn">
                            <input type="file" id="product_communication_report" class="input-file" />
                            <input type="hidden" name="product_communication_report" />
                            <span class="file-b">上传</span>
                        </div>
                    </li>
                    <li class="text-aline">
                        <div class="text-left">
                            <p class="text01">选手照片（JPG等格式）</p>
                        </div>
                        <div class="file-btn">
                            <input type="file" id="contestant_photo" class="input-file" />
                            <input type="hidden" name="contestant_photo" />
                            <span class="file-b">上传</span>
                        </div>
                    </li>
                    <li class="right text-aline">
                        <div class="text-left">
                            <p class="text01">项目图片LOGO（PNG格式）</p>
                        </div>
                        <div class="file-btn">
                            <input type="file" id="logo_photo" class="input-file" />
                            <input type="hidden" name="logo_photo" />
                            <span class="file-b">上传</span>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="add-img clearfix">
                <div class="img-show contestant_photo_img" style="display: none"></div>
                <div class="img-show logo_photo_img" style="display: none; float:right"></div>
                </div>
            </div>
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
            $('.data-list input').change(function(){
                var formData = new FormData();
                var inputName = $(this).attr('id');
                var file = $('#'+$(this).attr('id'))[0].files[0];

                if (!/image\/\w+/.test(file.type) && !/\w+\/pdf/.test(file.type)) {
                    alert("只能上传pdf文件和图片格式！")
                    return false;
                }
                formData.append("file", file);
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
                        if(inputName == 'contestant_photo' || inputName == 'logo_photo'){
                            $className = inputName + '_img';
                            $('.'+$className).html('<img  src="{{$pathPic}}'+res.data.filepath+'" >');
                            $('.'+$className).show();
                        }else{
                            $('#'+inputName).closest('li').append(
                                '<a class="a_view" target="_blank" href="{{$pathPic}}'+res.data.filepath+'" >PDF查看</a>'
                            );
                        }
                    }
                });
            })
            $('#submit-btn').click(function(){
                if($(".contestant_statement").val().length == 0){
                    alert("参赛声明签名扫描版PDF不能为空");
                    return false;
                }
                if($(".identity_front_back").val().length == 0){
                    alert("身份证复印件正反面PDF");
                    return false;
                }
                if($(".intellectual_property_statement").val().length == 0){
                    alert("知识产权合规声明PDF");
                    return false;
                }
                $('#form').submit();
            })
            $('#goBack').click(function(){
                window.location.href="/";
            })
        })
    </script>
</body>
</html>