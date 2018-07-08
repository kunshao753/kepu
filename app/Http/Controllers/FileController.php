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


class FileController extends Controller
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
        $file= $request->file('file');
        if ($file) {
            $suffix = $file->getClientOriginalExtension();
            $path = $file->getRealPath();
            $filename = date('Y-m-d') . '/' . uniqid() .'.'.$suffix;
            Storage::disk('uploadfiles')->put($filename,file_get_contents($path));
            return $this->responseSuccess(['filepath'=>"/storage/files/".$filename]);
        }else{
            return $this->responseError();
        }
    }

}