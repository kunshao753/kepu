<?php
/**
 * Created by PhpStorm.
 * User: zty
 * Date: 2018/7/8
 * Time: 下午5:52
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\CorpInfo;
use App\ProjectTeam;
use App\ProjectPhoto;
use App\ProjectInfo;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{

    public function index(Request $request)
    {
        $result = CorpInfo::where(['user_id'=>1])->first();
        $auditStatus = 0;
        if($result){
            $auditStatus = $result->audit_status;
        }
        return view('member.center', ['status'=>$auditStatus, 'user'=>Auth::user()->toArray()]);
    }
    public function corpInfo()
    {
        $config= $this->getCorpInfoConfig();
        return view('member.schedule01', ['help'=>$config['help'],'signupResouce' => $config['signupResouce']]);
    }
    public function corpInfoEdit(Request $request)
    {
        if(!isset($request['id'])){
            $params = $request->all();
            $signupResouceVal = "";
            for ($x=1; $x<=3; $x++) {
                $signupResouceVal .= $params['signup_resouce_'.$x];
                unset($params['signup_resouce_'.$x]);
            }
            $params['signup_resouce_val'] = $signupResouceVal;
            $params['accept_help'] = implode(",", $params['accept_help']);
            $params['audit_status'] = 0;
            $params['user_id'] = Auth::user()->id;
            $result = CorpInfo::create($params);
            if($result){
                return redirect()->route('member.projectTeam');
            }else{
                return redirect()->route('member.corpInfo');
            }
            die;
        }

    }
    public function signUp(Request $request)
    {

        return view('member.signUp');
    }
    public function projectInfo(Request $request)
    {
        $config= $this->getCorpInfoConfig();
        return view('member.schedule03',['productType'=>$config['productType'],'productForm'=>$config['productForm']]);
    }
    public function projectInfoEdit(Request $request)
    {
        $params = $request->all();
        $product_form = [];
        foreach($params['product_form_k'] as $key=>$value){
            $product_form[$key] = $params['product_form_v'][$key];
        }
        unset($params['product_form_k']);
        unset($params['product_form_v']);
        $params['product_form_val'] = json_encode($product_form);
        $params['user_id'] = Auth::user()->id;
        $result = ProjectInfo::create($params);
        if($result){
            return redirect()->route('member.projectPhoto');
        }else{
            return redirect()->route('member.projectInfo');
        }
    }
    public function projectPhoto()
    {
        return view('member.schedule04');
    }
    public function projectPhotoEdit(Request $request)
    {
        $params = $request->all();
        $params['user_id'] = Auth::user()->id;
        $result = ProjectPhoto::create($params);
        if($result){
            return redirect('/');
        }else{
            return redirect()->route('member.projectTeam');
        }
    }
    public function projectTeam(Request $request)
    {
        return view('member.schedule02');
    }
    public function projectTeamEdit(Request $request)
    {
        $params = $request->all();
        $params['user_id'] = Auth::user()->id;
        $result = ProjectTeam::create($params);
        if($result){
            return redirect()->route('member.projectInfo');
        }else{
            return redirect()->route('member.projectTeam');
        }
    }

}