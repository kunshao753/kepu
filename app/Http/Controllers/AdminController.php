<?php
/**
 * Created by PhpStorm.
 * User: zty
 * Date: 2018/7/8
 * Time: 下午2:18
 */

namespace App\Http\Controllers;
use App\Common\UrlPage;
use App\Message;
use App\Competition;
use App\CorpInfo;
use App\ProjectPhoto;
use App\ProjectTeam;
use App\User;
use Illuminate\Http\Request;
use Excel;
use App\ProjectInfo;
use Illuminate\Support\Facades\Auth;

class AdminController extends PermissionController
{
    public function index()
    {
        $this->getIsAdmin();
        $competition = Competition::where(['id' => 1])->get(['status'])->first()->toArray();
        $competitionStep = $this->competitionConfig();
        foreach($competitionStep as $key=>$value){
            if($key == $competition['status']){
                $competitionStep[$key]['show'] = 1;
                break;
            }
        }
        $count = CorpInfo::whereIn('audit_status',[1,3,4,5])->count();
        return view('admin.index', array('count'=>$count,'competitionStep'=> $competitionStep));
    }

    public function memberInfo(Request $request)
    {
        $this->getIsAdmin();
        if(!isset($request['id'])){
            // TODO check
            // return;
        }
        $id = $request['id'];

        $cropInfo = CorpInfo::where(['user_id'=> $id])->first();
        $config= $this->getCorpInfoConfig();
        $productForm = $config['productForm'];
        $productType = $config['productType'];
        $help = $config['help'];
        if($cropInfo){
            $cropInfoArray = $cropInfo->toArray();
            $helpArray = explode(',', $cropInfoArray['accept_help']);
            foreach ($help as $key=>$value){
                if(array_key_exists($key, array_flip($helpArray))){
                    $help[$key]['show'] = 1;
                }
            }
        }
        $teamInfo = ProjectTeam::where(['user_id'=> $id])->first();
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
        }
        $projectPhoto = ProjectPhoto::where(['user_id' => $id])->first();

        return view('admin.memberInfo', array(
            'cropInfo'=>$cropInfo,
            'help'=>$help,
            'signupResouce' => $config['signupResouce'],
            'teamInfo'=>$teamInfo,
            'productType'=>$productType,
            'productForm'=>$productForm,
            'projectInfo'=>!empty($projectInfo) ? $projectInfo : '',
            'projectPhoto'=>!empty($projectPhoto) ? $projectPhoto : '',
        ));


    }
    public function messageList(Request $request){
        $pageSize = $request->input('pageSize');
        $pageNum = $request->input('pageNum');
        $offset = ($pageNum - 1) * $pageSize;
        $messageList = Message::offset($offset)->limit($pageSize)->get();
        $count = Message::where('id','>','0')->count();
        $page = UrlPage::makePage(
            100000,
            $pageNum,
            $request->url()
        );
        $result = [
            'pageNum'=>$pageNum ,
            'rowTotal' => $count,
            'dataList' => $messageList,
            'pageList' => $page
        ];
        return $this->responseSuccess($result);
    }
    public function cropInfoList(Request $request){
        $pageSize = $request->input('pageSize');
        $pageNum = $request->input('pageNo');
        $name = $request->input('name');
        $offset = ($pageNum - 1) * $pageSize;
        if(!empty($name)){
            $corpList = CorpInfo::whereIn('audit_status',[1,3,4,5])->Where('name','like',"%$name%")->offset($offset)->limit($pageSize)->orderBy('created_at','DESC')->get();
            $count = CorpInfo::whereIn('audit_status',[1,3,4,5])->Where('name','like',"%$name%")->count();
        }else{
            $corpList = CorpInfo::whereIn('audit_status',[1,3,4,5])->offset($offset)->limit($pageSize)->orderBy('created_at','DESC')->get();
            $count = CorpInfo::whereIn('audit_status',[1,3,4,5])->count();
        }

        $corpData = $this->corpAndProject($corpList, $this->getCorpInfoConfig());
        $result = [
            'pageNum'=>$pageNum ,
            'rowTotal' => $count,
            'dataList' => $corpData
        ];
        return $this->responseSuccess($result);
    }
    public function updateStatus(Request $request)
    {
        $this->getIsAdmin();
        $step = $request->input('step');
        if(!$step){
            // TODO check
        }
        Competition::where(['id' => 1])->update(['status'=>$step]);
        return $this->responseSuccess();
    }
    public function auditStatus(Request $request)
    {
        $this->getIsAdmin();
        $status = $request->input('status');
        $id = $request->input('id');
        if(!$status || !$id){
            // TODO check
        }
        $result = CorpInfo::where(['id' => $id])->update(['audit_status'=>$status]);
        if($result){
            return $this->responseSuccess();
        }
    }
    public function exportList(Request $request)
    {
        $this->getIsAdmin();
        $type = $request->get('type');
        if(!$type){
            // TODO check
        }
        if($type == 'message_board'){
            $cellData = array(['序号','姓名','手机号','邮箱','问题','描述']);
            $messageList = Message::where('id', '>', '0')->orderBy('created_at','DESC')->paginate(5000)->toArray();
            if(!empty($messageList)){
                foreach($messageList['data'] as $key=>$message){
                    $tmpArray = array($key+1, $message['name'], $message['mobile'], $message['email'], $message['question'], $message['description']);
                    array_push($cellData, $tmpArray);
                }
            }
        }else{
            $cellData = array(['序号','姓名','手机号','企业名称','项目名称','参赛身份','报名来源','产品类型','产品形态']);
            $corpList = CorpInfo::whereIn('audit_status',[1,3,4,5])->orderBy('created_at','DESC')->paginate(5000);
            $corpData = $this->corpAndProjectExport($corpList, $this->getCorpInfoConfig());
            if(!empty($corpData)){
                foreach($corpData['data'] as $key=>$value){
                    $ci = '企业';
                    if($value['contestant_identity'] != 1){
                        $ci = '创客团队';
                    }
                    $tmpArray = array($key+1, $value['name'],$value['mobile'],$value['company_name'],$value['project_name'],$ci,$value['signup_resouce'],$value['product_type'],$value['product_form_val'] );
                    array_push($cellData, $tmpArray);
                }
            }
        }
        Excel::create($type,function ($excel) use ($cellData){
            $excel->sheet('score',function ($sheet) use ($cellData) {
                $sheet->rows($cellData);
            });
        })->export('xls');
        die;
    }
    public function corpAndProjectExport($corpList,$config)
    {
        if(empty($corpList)){
            return [];
        }
        $corpData = $corpList->toArray();
        $productType = $this->getCorpInfoConfig();
        foreach($corpData['data'] as $key=>$value){
            //$isExtPhoto  = ProjectPhoto::where(['user_id'=> $value['user_id']])->first();
            $projectInfo = ProjectInfo::where(['user_id'=> $value['user_id']])->first();
            //$projectTeam = ProjectTeam::where(['user_id'=> $value['user_id']])->first();
            //if(!$isExtPhoto || !$projectInfo || !$projectTeam){
            //    unset($corpData['data'][$key]);
            //    continue;
            //}
            $projectName = '';
            if($projectInfo){
                $projectName = !empty($projectInfo['project_name']) ? $projectInfo['project_name'] : '';
            }
            $productTypeValue = !empty($projectInfo['product_type']) ? $projectInfo['product_type'] : '';
            $productFormArray = json_decode($projectInfo['product_form_val'], true);
            foreach($productType['productType'] as $k=>$value1){
                if($projectInfo['product_type'] == $k){
                    $productTypeValue = $value1['text'];
                    break;
                }
            }

            foreach($productType['signupResouce'] as $k=>$value2){
                if($value['signup_resouce'] == $k){
                    $signupResourceValue = $value2['name'];
                    break;
                }
            }
            $productForm = '';
            if(!empty($productFormArray)){
                foreach ($productFormArray as $k=>$v){
                    $productForm .= $config['productForm'][$k]['name'];
                }
            }
            $corpData['data'][$key]['project_name'] = $projectName;
            $corpData['data'][$key]['signup_resouce'] = $signupResourceValue;
            $corpData['data'][$key]['product_type'] = $productTypeValue;
            $corpData['data'][$key]['product_form_val'] = $productForm;
        }
        return $corpData;
    }
    public function corpAndProject($corpList,$config)
    {
        if(empty($corpList)){
            return [];
        }
        $corpData = $corpList->toArray();
        $productType = $this->getCorpInfoConfig();
        foreach($corpData as $key=>$value){
            //$isExtPhoto  = ProjectPhoto::where(['user_id'=> $value['user_id']])->first();
            $photoInfo  = ProjectPhoto::where(['user_id'=> $value['user_id']])->first();
            $projectInfo = ProjectInfo::where(['user_id'=> $value['user_id']])->first();
            //$projectTeam = ProjectTeam::where(['user_id'=> $value['user_id']])->first();
            //if(!$isExtPhoto || !$projectInfo || !$projectTeam){
                //unset($corpData[$key]);
                //continue;
            //}
            $projectName = '';
            if($projectInfo){
                $projectName = !empty($projectInfo['project_name']) ? $projectInfo['project_name'] : '';
            }
            $productTypeValue = !empty($projectInfo['product_type']) ? $projectInfo['product_type'] : '';
            $productFormArray = json_decode($projectInfo['product_form_val'], true);
            foreach($productType['productType'] as $k=>$value1){
                if($projectInfo['product_type'] == $k){
                    $productTypeValue = $value1['text'];
                    break;
                }
            }
            foreach($productType['signupResouce'] as $k=>$value2){
                if($value['signup_resouce'] == $k){
                    $signupResourceValue = $value2['name'];
                    break;
                }
            }

            $productForm = '';
            if(!empty($productFormArray)){
                foreach ($productFormArray as $k=>$v){
                    $productForm .= $config['productForm'][$k]['name']."<br />";
                }
            }
            $corpData[$key]['project_name'] = $projectName;
            $corpData[$key]['signup_resouce'] = $signupResourceValue;
            $corpData[$key]['product_type'] = $productTypeValue;
            $corpData[$key]['product_form_val'] = $productForm;
            $corpData[$key]['files_zip'] = empty($photoInfo['files_zip']) ? '上传资料' : '已上传';
        }
        return $corpData;
    }
}