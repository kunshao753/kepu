<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Competition;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $competition = Competition::where(['id' => 1])->get(['status'])->first()->toArray();

        return view('index',['competition'=>$competition['status']]);
    }
}
