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

class MemberController extends PermissionController
{
    public function jump(){
        header('Location: http://shenbao.kepuchina.cn');
        exit;
    }
    public function index(Request $request)
    {
        $this->getIsLogin();
        $result = CorpInfo::where(['user_id'=>Auth::user()->id])->first();
        $auditStatus = 0;
        $isResult = 0;
        if($result){
            $auditStatus = $result->audit_status;
            $isResult = 1;
        }
        if(Auth::user()->permission == 1){
            return redirect()->route('admin.index');
        }
        return view('member.center', ['status'=>$auditStatus, 'isResult'=>$isResult, 'user'=>Auth::user()->toArray()]);
    }
    public function corpInfo(Request $request)
    {
        $this->getIsLogin();
        $config= $this->getCorpInfoConfig();
        $cropInfo = [];
        $dateInput = [];
        $help = $config['help'];
        $view = 'member.schedule01';
        $nextUrl = '';
        if(isset($request['id'])){
            $id = $request->get('id');
            if(Auth::user()->id != $id && Auth::user()->permission != 1){
                return redirect()->route('home');
            }
            $cropInfo = CorpInfo::where(['user_id'=> $id])->first();
            if($cropInfo){
                $cropInfoArray = $cropInfo->toArray();
                $helpArray = explode(',', $cropInfoArray['accept_help']);
                foreach ($help as $key=>$value){
                    if(array_key_exists($key, array_flip($helpArray))){
                        $help[$key]['show'] = 1;
                    }
                }
                $dateInput = [
                    'birthday'=>$this->getDate($cropInfoArray['birthday']),
                    'registered_time'=>$this->getDate($cropInfoArray['registered_time'])
                ];
                $view = 'member.schedule01show';
                $teamInfo = ProjectTeam::where(['user_id' => $id])->first();
                if($teamInfo){
                    $nextUrl = route('member.projectTeam').'?id='.$id;
                }
            }
        }
        return view($view, ['cropInfo' =>$cropInfo,'dateInput'=>$dateInput, 'nextUrl' => $nextUrl, 'help'=>$help,'signupResouce' => $config['signupResouce']]);
    }
    public function corpInfoEdit(Request $request)
    {
        $this->getIsLogin();
        $cropInfo = CorpInfo::where(['user_id'=> Auth::user()->id])->first();
        if($cropInfo){
            $cropInfo->delete();
        }
        $params = $request->all();
        $signupResouceVal = "";
        if (isset($params['signup_resouce']) && $params['signup_resouce'] < 4) {
            $signupResouceVal = $params['signup_resouce_'.$params['signup_resouce']];
        }
        if(isset($params['birthday']) && !empty($params['birthday'])){
            $params['birthday'] = $this->setDate($params['birthday']);
        }
        if(isset($params['registered_time']) && !empty($params['registered_time'])){
            $params['registered_time'] = $this->setDate($params['registered_time']);
        }
        $params['signup_resouce_val'] = $signupResouceVal;
        $params['accept_help'] = implode(",", $params['accept_help']);
        $params['user_id'] = Auth::user()->id;
        $result = CorpInfo::create($params);
        if($result){
            return Redirect()->route('member.projectTeam', ['id'=>Auth::user()->id]);
        }
    }
    public function corpInfoDel(Request $request)
    {
        $this->getIsLogin();
        $id = Auth::user()->id;
        // 删除用户报名数据
        $cropInfo = CorpInfo::where(['user_id'=> $id])->first();
        if($cropInfo){
            $cropInfo->delete();
        }
        $teamInfo = ProjectTeam::where(['user_id' => $id])->first();
        if($teamInfo){
            $teamInfo->delete();
        }
        $projectInfo = ProjectInfo::where(['user_id' => $id])->first();
        if($projectInfo){
            $projectInfo->delete();
        }
        $projectPhoto = ProjectPhoto::where(['user_id' => $id])->first();
        if($projectInfo){
            $projectPhoto->delete();
        }
        CorpInfo::where(['user_id' => Auth::user()->id])->update(['audit_status'=>0]);
        return redirect()->route('member.index');
    }
    public function signUp(Request $request)
    {
        $this->getIsLogin();
        return view('member.signUp');
    }
    public function projectInfo(Request $request)
    {
        $this->getIsLogin();
        $view = 'member.schedule03';
        $projectInfo = [];
        $config= $this->getCorpInfoConfig();
        $productForm = $config['productForm'];
        $productType = $config['productType'];
        $nextUrl = '';
        if(isset($request['id'])) {
            $id = $request->get('id');
            if(Auth::user()->id != $id && Auth::user()->permission != 1){
                return redirect()->route('home');
            }
            $projectInfo = ProjectInfo::where(['user_id' => $id])->first();
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
                $projectPhoto = ProjectPhoto::where(['user_id' => $id])->first();
                if($projectPhoto){
                    $nextUrl = route('member.projectPhoto').'?id='.$id;
                }
            }
        }
        return view($view,['projectInfo'=>$projectInfo,'nextUrl' => $nextUrl, 'productType'=>$productType,'productForm'=>$productForm]);
    }
    public function projectInfoEdit(Request $request)
    {
        $this->getIsLogin();
        $projectInfo = ProjectInfo::where(['user_id' => Auth::user()->id])->first();
        if($projectInfo){
            $projectInfo->delete();
        }
        $params = $request->all();
        $product_form = [];
        foreach($params['product_form_k'] as $key=>$value){
            if($params['product_form_v'][$key] == '' || $params['product_form_v'][$key] == null){
                break;
            }
            $product_form[$key] = $params['product_form_v'][$key];
        }

        unset($params['product_form_k']);
        unset($params['product_form_v']);
        $params['product_form_val'] = json_encode($product_form);
        $params['user_id'] = Auth::user()->id;
        $result = ProjectInfo::create($params);
        if($result){
            return Redirect()->route('member.projectPhoto', ['id'=>Auth::user()->id]);
        }

    }
    public function projectPhoto(Request $request)
    {
        $this->getIsLogin();
        $view = 'member.schedule04';
        $projectPhoto = [];
        $nextUrl = '';
        if(isset($request['id'])){
            $id = $request->get('id');
            if(Auth::user()->id != $id && Auth::user()->permission != 1){
                return redirect()->route('home');
            }
            $projectPhoto = ProjectPhoto::where(['user_id' => $id])->first();
            if($projectPhoto){
                $view = 'member.schedule04show';
                if(Auth::user()->permission == 1){
                    $nextUrl = route('admin.index');
                }else{
                    $nextUrl = route('member.index');
                }
            }
        }
        return view($view,['projectPhoto' => $projectPhoto, 'nextUrl'=>$nextUrl, 'pathPic' =>'/public/']);
    }
    public function projectPhotoEdit(Request $request)
    {
        $this->getIsLogin();
        $params = $request->all();
        $projectPhoto = ProjectPhoto::where(['user_id' => Auth::user()->id])->first();
        if($projectPhoto){
            $projectPhoto->delete();
        }
        $params['user_id'] = Auth::user()->id;
        $result = ProjectPhoto::create($params);
        if ($result) {
            $isExtPhoto  = ProjectPhoto::where(['user_id'=> Auth::user()->id])->first();
            $projectInfo = ProjectInfo::where(['user_id'=> Auth::user()->id])->first();
            $projectTeam = ProjectTeam::where(['user_id'=> Auth::user()->id])->first();
            if($isExtPhoto && $projectInfo && $projectTeam){
                CorpInfo::where(['user_id' => Auth::user()->id])->update(['audit_status'=>1]);
            }

            return redirect('/');
        }
    }
    public function projectTeam(Request $request)
    {
        $this->getIsLogin();
        $view = 'member.schedule02';
        $teamInfo = [];
        $nextUrl = '';
        if(isset($request['id'])){
            $id = $request->get('id');
            if(Auth::user()->id != $id && Auth::user()->permission != 1){
                return redirect()->route('home');
            }
            $teamInfo = ProjectTeam::where(['user_id' => $id])->first();
            if($teamInfo){
                $view = 'member.schedule02show';
                $projectInfo = ProjectInfo::where(['user_id' => $id])->first();
                if($projectInfo){
                    $nextUrl = route('member.projectInfo').'?id='.$id;
                }
            }
        }
        return view($view,['teamInfo' => $teamInfo, 'nextUrl'=>$nextUrl]);
    }
    public function projectTeamEdit(Request $request)
    {
        $this->getIsLogin();
        // TODO 查询是否存在
        $teamInfo = ProjectTeam::where(['user_id' => Auth::user()->id])->first();
        if($teamInfo){
            $teamInfo->delete();
        }
        $params = $request->all();
        $params['user_id'] = Auth::user()->id;
        $result = ProjectTeam::create($params);
        if($result){
            return Redirect()->route('member.projectInfo', ['id'=>Auth::user()->id]);
        }

    }
    public function setDate($date)
    {
        $this->getIsLogin();
        $date = str_replace('-','/', str_replace('/','/',$date));
        $date = explode("/", $date);
        $date = $date[2].'/'.$date[0].'/'.$date[1];
        return $date;
    }
    public function getDate($date)
    {
        if(!$date){
            return "";
        }
        $this->getIsLogin();
        $date = str_replace('-','/', str_replace('/','/',$date));
        $date = explode("/", $date);
        $date = $date[1].'/'.$date[2].'/'.$date[0];
        return $date;
    }

}