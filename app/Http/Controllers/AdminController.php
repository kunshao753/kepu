<?php
/**
 * Created by PhpStorm.
 * User: zty
 * Date: 2018/7/8
 * Time: 下午2:18
 */

namespace App\Http\Controllers;
use App\Message;
use App\Competition;
use App\CorpInfo;
use Illuminate\Http\Request;
use Excel;
use App\ProjectInfo;
use Illuminate\Support\Facades\Auth;


class AdminController extends PermissionController
{
    public function index()
    {
        $this->getIsLogin();
        $messageList = Message::where('id', '>', '0')->orderBy('created_at','DESC')->paginate(10);
        $competition = Competition::where(['id' => 1])->get(['status'])->first()->toArray();
        $corpList = CorpInfo::where('id', '>', '0')->orderBy('created_at','DESC')->paginate(10);
        $corpData = $this->corpAndProject($corpList);
        $competitionStep = $this->competitionConfig();
        foreach($competitionStep as $key=>$value){
            if($key == $competition['status']){
                $competitionStep[$key]['show'] = 1;
                break;
            }
        }
        return view('admin.index', array('messageList' => $messageList, 'corpData'=>$corpData, 'corpList'=>$corpList,'competitionStep'=> $competitionStep));
    }

    public function updateStatus(Request $request)
    {
        $this->getIsLogin();
        $step = $request->input('step');
        if(!$step){
            // TODO check
        }
        Competition::where(['id' => 1])->update(['status'=>$step]);
        return redirect()->route('admin.index');
    }

    public function auditStatus(Request $request)
    {
        $this->getIsLogin();
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
        $this->getIsLogin();
        $type = $request->get('type');
        if(!$type){
            // TODO check
        }
        if($type == 'message_board'){
            $cellData = array(['序号','姓名','手机号','邮箱','问题','描述']);
            $messageList = Message::where('id', '>', '0')->orderBy('created_at','DESC')->paginate(6)->toArray();
            if(!empty($messageList)){
                foreach($messageList['data'] as $key=>$message){
                    $tmpArray = array($key+1, $message['name'], $message['mobile'], $message['email'], $message['question'], $message['description']);
                    array_push($cellData, $tmpArray);
                }
            }
        }else{
            $cellData = array(['序号','姓名','手机号','企业名称','项目名称','参赛身份','产品类型','产品形态']);
            $corpList = CorpInfo::where('id', '>', '0')->orderBy('created_at','DESC')->paginate(10);
            $corpData = $this->corpAndProject($corpList);
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
    }

    public function corpAndProject($corpList)
    {
        if(empty($corpList)){
            return [];
        }
        $corpData = $corpList->toArray();
        $productType = $this->getCorpInfoConfig();
        foreach($corpData['data'] as $key=>$value){
            $projectList = ProjectInfo::where(['user_id'=> $value['user_id']])->first();
            $productTypeValue = $projectList['product_type'];
            foreach($productType['productType'] as $k=>$value){
                if($projectList['product_type'] == $k){
                    $productTypeValue = $value['text'];
                    break;
                }
            }
            $corpData['data'][$key]['project_name'] = $projectList['project_name'];
            $corpData['data'][$key]['product_type'] = $productTypeValue;
            $corpData['data'][$key]['product_form_val'] = $projectList['product_form_val'];
        }
        return $corpData;
    }
}