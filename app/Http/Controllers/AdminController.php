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
<<<<<<< HEAD
        $count = ProjectPhoto::where('id','>','0')->count();
=======
        $count = CorpInfo::whereIn('audit_status',[1,3,4])->count();
>>>>>>> e0aadc7e338ca866e11408e47e380ec04c6bc622
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
            'projectInfo'=>$projectInfo,
            'projectPhoto'=>$projectPhoto
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
        $offset = ($pageNum - 1) * $pageSize;
<<<<<<< HEAD
        $corpList = CorpInfo::offset($offset)->limit($pageSize)->orderBy('created_at','DESC')->get();
        $count = CorpInfo::where('id','>','0')->count();
=======
        $corpList = CorpInfo::whereIn('audit_status',[1,3,4])->offset($offset)->limit($pageSize)->orderBy('created_at','DESC')->get();
        $count = CorpInfo::whereIn('audit_status',[1,3,4])->count();
>>>>>>> e0aadc7e338ca866e11408e47e380ec04c6bc622
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
<<<<<<< HEAD
            $messageList = Message::where('id', '>', '0')->orderBy('created_at','DESC')->paginate(500)->toArray();
=======
            $messageList = Message::where('id', '>', '0')->orderBy('created_at','DESC')->paginate(5000)->toArray();
>>>>>>> e0aadc7e338ca866e11408e47e380ec04c6bc622
            if(!empty($messageList)){
                foreach($messageList['data'] as $key=>$message){
                    $tmpArray = array($key+1, $message['name'], $message['mobile'], $message['email'], $message['question'], $message['description']);
                    array_push($cellData, $tmpArray);
                }
            }
        }else{
            $cellData = array(['序号','姓名','手机号','企业名称','项目名称','参赛身份','产品类型','产品形态']);
<<<<<<< HEAD
            $corpList = CorpInfo::where('id', '>', '0')->orderBy('created_at','DESC')->paginate(500);
=======
            $corpList = CorpInfo::whereIn('audit_status',[1,3,4])->orderBy('created_at','DESC')->paginate(5000);
>>>>>>> e0aadc7e338ca866e11408e47e380ec04c6bc622
            $corpData = $this->corpAndProjectExport($corpList, $this->getCorpInfoConfig());
            if(!empty($corpData)){
                foreach($corpData['data'] as $key=>$value){
                    $ci = '企业';
                    if($value['contestant_identity'] != 1){
                        $ci = '创客团队';
                    }
                    $tmpArray = array($key+1, $value['name'],$value['mobile'],$value['company_name'],$value['project_name'],$ci,$value['product_type'],$value['product_form_val'] );
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
<<<<<<< HEAD
            $isExtPhoto  = ProjectPhoto::where(['user_id'=> $value['user_id']])->first();
            $projectInfo = ProjectInfo::where(['user_id'=> $value['user_id']])->first();
            $projectTeam = ProjectTeam::where(['user_id'=> $value['user_id']])->first();
            if(!$isExtPhoto || !$projectInfo || !$projectTeam){
                unset($corpData['data'][$key]);
                continue;
            }
            $projectName = '';
            if($projectInfo){
                $projectName = $projectInfo['project_name'];
            }
            $productTypeValue = $projectInfo['product_type'];
=======
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
>>>>>>> e0aadc7e338ca866e11408e47e380ec04c6bc622
            $productFormArray = json_decode($projectInfo['product_form_val'], true);
            foreach($productType['productType'] as $k=>$value){
                if($projectInfo['product_type'] == $k){
                    $productTypeValue = $value['text'];
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
<<<<<<< HEAD
            $isExtPhoto  = ProjectPhoto::where(['user_id'=> $value['user_id']])->first();
            $projectInfo = ProjectInfo::where(['user_id'=> $value['user_id']])->first();
            $projectTeam = ProjectTeam::where(['user_id'=> $value['user_id']])->first();
            if(!$isExtPhoto || !$projectInfo || !$projectTeam){
                unset($corpData[$key]);
                continue;
            }
            $projectName = '';
            if($projectInfo){
                $projectName = $projectInfo['project_name'];
            }
            $productTypeValue = $projectInfo['product_type'];
=======
            //$isExtPhoto  = ProjectPhoto::where(['user_id'=> $value['user_id']])->first();
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
>>>>>>> e0aadc7e338ca866e11408e47e380ec04c6bc622
            $productFormArray = json_decode($projectInfo['product_form_val'], true);
            foreach($productType['productType'] as $k=>$value){
                if($projectInfo['product_type'] == $k){
                    $productTypeValue = $value['text'];
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
            $corpData[$key]['product_type'] = $productTypeValue;
            $corpData[$key]['product_form_val'] = $productForm;
        }
        return $corpData;
    }
}