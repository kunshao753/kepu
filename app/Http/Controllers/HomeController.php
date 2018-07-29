<?php

namespace App\Http\Controllers;

use App\CorpInfo;
use Illuminate\Http\Request;
use App\Competition;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Request $request)
    {


        $competition = Competition::where(['id' => 1])->get(['status'])->first()->toArray();

        $isCenter = 0;
        if(Auth::check() == true){
            $result = CorpInfo::where(['user_id'=>Auth::user()->id])->first();
            if($result){
                $isCenter = 1;
            }
        }

        return view('index',['isCenter'=>$isCenter, 'competition'=>$competition['status']]);
    }
}
