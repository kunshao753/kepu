<?php
/**
 * Created by PhpStorm.
 * User: zty
 * Date: 2018/7/28
 * Time: 下午5:20
 */

namespace App\Http\Controllers;

use Gregwar\Captcha\CaptchaBuilder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckCodeController extends Controller
{
    public function create()
    {
        $builder = new CaptchaBuilder;
        $builder->build($width = 170, $height = 60,$font = null);
        $phrase = $builder->getPhrase();
        Session::flash("checkcode", $phrase);
        header("Cache-Control: no-cache, must-revalidate");
        header("Content-Type: image/jpeg");
        return $builder->output();
    }

    public function verifyCheckCode(Request $request) {
        $userInput = $request->get('checkcode');
        if ($request->session()->get('checkcode') == $userInput) {
            return $this->responseSuccess();
        } else {
            return $this->responseError();
        }
    }
}