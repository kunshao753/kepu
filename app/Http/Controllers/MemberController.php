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
        $result = CorpInfo::where(['user_id'=>Auth::user()->id])->first();
        $auditStatus = 0;
        if($result){
            $auditStatus = $result->audit_status;
        }
        return view('member.center', ['status'=>$auditStatus, 'user'=>Auth::user()->toArray()]);
    }
    public function corpInfo(Request $request)
    {
        $config= $this->getCorpInfoConfig();
        $cropInfo = [];
        $help = $config['help'];
        $flag = 0;
        $view = 'member.schedule01';
        if(isset($request['id'])){
            $cropInfo = CorpInfo::where(['user_id'=> $request->get('id')])->first();
            if($cropInfo){
                $cropInfoArray = $cropInfo->toArray();
                $helpArray = explode(',', $cropInfoArray['accept_help']);
                foreach ($help as $key=>$value){
                    if(array_key_exists($key, array_flip($helpArray))){
                        $help[$key]['show'] = 1;
                    }
                }
                $view = 'member.schedule01show';
            }
        }
        return view($view, ['cropInfo' =>$cropInfo, 'help'=>$help,'signupResouce' => $config['signupResouce']]);
    }
    public function corpInfoEdit(Request $request)
    {
        // TODO 查询是否存在
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
        $view = 'member.schedule03';
        $projectInfo = [];
        $config= $this->getCorpInfoConfig();
        $productForm = $config['productForm'];
        $productType = $config['productType'];
        if(isset($request['id'])) {
            $projectInfo = ProjectInfo::where(['user_id' => $request->get('id')])->first();
            if ($projectInfo) {
                $projectInfoArray = $projectInfo->toArray();
                $productFormArray = json_decode($projectInfoArray['product_form_val'], true);
                foreach ($productForm as $key => $value) {
                    if (array_key_exists($key, $productFormArray)) {
                        $productForm[$key]['text'] = $productFormArray[$key];
                        $productForm[$key]['show'] = 1;
                    }
                }
                $view = 'member.schedule03show';
            }
        }
        return view($view,['projectInfo'=>$projectInfo, 'productType'=>$productType,'productForm'=>$productForm]);
    }
    public function projectInfoEdit(Request $request)
    {
        if(!isset($request['id'])){
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

    }
    public function projectPhoto(Request $request)
    {
        $view = 'member.schedule04';
        $projectPhoto = [];
        if(isset($request['id'])){
            $projectPhoto = ProjectPhoto::where(['user_id' => $request->get('id')])->first();
            if($projectPhoto){
                $view = 'member.schedule04show';
            }
        }
        return view($view,['projectPhoto' => $projectPhoto, 'pathPic' =>'/public/files/']);
    }
    public function projectPhotoEdit(Request $request)
    {
        $params = $request->all();
        if(!isset($request['id'])) {
            $params['user_id'] = Auth::user()->id;
            $result = ProjectPhoto::create($params);
            if ($result) {
                return redirect('/');
            } else {
                return redirect()->route('member.projectTeam');
            }
        }
    }
    public function projectTeam(Request $request)
    {
        $view = 'member.schedule02';
        $teamInfo = [];
        if(isset($request['id'])){
            $teamInfo = ProjectTeam::where(['user_id' => $request->get('id')])->first();
            if($teamInfo){
                $view = 'member.schedule02show';
            }
        }
        return view($view,['teamInfo' => $teamInfo]);
    }
    public function projectTeamEdit(Request $request)
    {
        // TODO 查询是否存在
        if(!isset($request['id'])) {
            $params = $request->all();
            $params['user_id'] = Auth::user()->id;
            $result = ProjectTeam::create($params);
            if ($result) {
                return redirect()->route('member.projectInfo');
            } else {
                return redirect()->route('member.projectTeam');
            }
        }
    }

}