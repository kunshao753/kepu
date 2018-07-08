<?php
/**
 * Created by PhpStorm.
 * User: zty
 * Date: 2018/7/8
 * Time: 下午1:02
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Message;

class MessageController extends Controller
{
    public function index(Request $request)
    {
        $result = Message::create($request->all());
        if($result){
            return $this->responseSuccess();
        }else{
            return $this->responseError();
        }
    }
}