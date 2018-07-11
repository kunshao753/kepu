<?php
/**
 * Created by PhpStorm.
 * User: zty
 * Date: 2018/7/10
 * Time: 下午9:56
 */

namespace App\Http\Controllers;


use http\Env\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class PermissionController extends Controller
{
    public function getIsLogin()
    {
        if(Auth::check() == false){
            header('Location: /');
            exit;
        }
    }

    public function getIsAdmin()
    {
//        if(Auth::check() == false || Auth::user()->permission != 1){
//            header('Location: /');
//            exit;
//        }
    }
}