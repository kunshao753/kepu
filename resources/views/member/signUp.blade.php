@extends('layouts.top')

@section('content')
<<<<<<< HEAD
<div class="form-schedule w">
=======
    <div class="form-schedule w">
>>>>>>> e0aadc7e338ca866e11408e47e380ec04c6bc622
        <h3>我要报名</h3>
        <div class="d-prompt">
            <p>1.下载声明打印（企业盖章，创客团队签名）；
                <br/>
                2.扫描PDF上传（在上传资料中上传）。</p>
        </div>
    </div>
    <div class="f-btn pt40">
<<<<<<< HEAD
        <a href="/活动声明.pdf" target="_blank" class="confirm green-btn-d">下载</a>
        <a href="{{route('member.corpInfo')}}" class="confirm">下一步</a>
=======
        <a href="/活动声明.pdf" target="_blank" id="downloadBtn" class="confirm green-btn-d">下载</a>
        <a href="javascript:void(0);" id="nextStep" class="confirm gray-btn">下一步</a>
>>>>>>> e0aadc7e338ca866e11408e47e380ec04c6bc622
        <a href="javascript:void(0);" id="goBack" class="confirm green-btn">取消</a>
    </div>

    <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $(function(){
<<<<<<< HEAD
=======
            $("#downloadBtn").click(function(){
                $("#nextStep").removeClass('gray-btn')
            })
            $("#nextStep").click(function(){
                if($(this).hasClass('gray-btn')){
                    alert('请先下载活动声明文件!');
                }else{
                    window.location.href = "{{route('member.corpInfo')}}"
                }
            })
>>>>>>> e0aadc7e338ca866e11408e47e380ec04c6bc622
            $('#goBack').click(function(){
                window.history.back()
            })
        })
    </script>
@endsection

