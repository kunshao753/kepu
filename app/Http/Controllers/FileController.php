<?php
/**
 * Created by PhpStorm.
 * User: zty
 * Date: 2018/7/9
 * Time: 上午12:03
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Qiniu\Storage\UploadManager;
use Qiniu\Auth as QiniuAuth;
use App\ProjectPhoto;


class FileController extends PermissionController
{
    public function uploadImage(Request $request)
    {
        $file= $request->file('file');
        if ($file) {
            $oldName = $file->getClientOriginalName();
            $suffix = $file->getClientOriginalExtension();
            $type = $file->getClientMimeType();
            $path = $file->getRealPath();
            $filename = date('Y-m-d') . '/' . uniqid() .'.'.$suffix;
            $bool= Storage::disk('uploadimg')->put($filename,file_get_contents($path));
            return json_encode(['status'=>1,'filepath'=>$filename]);
        }else{
            $idCardFrontImg = '';
            return json_encode($idCardFrontImg);
        }
    }

    public function uploadFile(Request $request)
    {
        $this->getIsLogin();
        $file= $request->file('file');
        if ($file) {
            $suffix = $file->getClientOriginalExtension();
            $path = $file->getRealPath();
            $filename = date('Y-m-d') . '/' . uniqid() .'.'.$suffix;
            Storage::disk('public')->put($filename,file_get_contents($path));
            return $this->responseSuccess(['filepath'=>$filename]);
        }else{
            return $this->responseError();
        }
    }

    public function uploadQnFile(Request $request){
        $this->getIsAdmin();
        $file= $request->file('file');
        $id = $request['id'];

        if ($file) {
            $suffix = $file->getClientOriginalExtension();
            $path = $file->getRealPath();//要上传文件的本地路径
            $filename = date('Y-m-d') . '/' . uniqid() .'.'.$suffix;//上传到七牛后保存的文件名

            $accessKey = getenv('QINIU_ACCESS_KEY');
            $secretKey = getenv('QINIU_SECRET_KEY');
            $bucket = getenv('QINIU_BUCKET');
            $qn_domain = getenv('QINIU_DOMAIN');

            // 构建鉴权对象
            $auth = new QiniuAuth($accessKey, $secretKey);

            // 生成上传 Token
            $token = $auth->uploadToken($bucket);

            // 初始化 UploadManager 对象并进行文件的上传。
            $uploadMgr = new UploadManager();

            // 调用 UploadManager 的 putFile 方法进行文件的上传。
            $ret = $uploadMgr->putFile($token, $filename, $path);
            if($ret){
                //更新数据库
                $file_path = 'http://'.$qn_domain.'/'.$filename;
                $res = ProjectPhoto::where(['user_id' => $id])->update(array('files_zip'=>$file_path));
                if($res){
                    return $this->responseSuccess(['filepath'=>$filename]);
                }else{
                    return $this->responseError("上传失败");
                }
            }else{
                return $this->responseError($ret);
            }
        }else{
            return $this->responseError();
        }
    }

}