<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    /**
     * 返回失败接口
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function responseError($message = '失败' )
    {
        return $this->response([
            'status' => 'failed',
            'data' => '{}',
            'message' => $message
        ]);
    }

    public function competitionConfig()
    {
        return array(
            '1'=> array('text'=>'7月 大赛启动', 'show'=>0),
            '2'=> array('text'=>'8月-9月 项目征集', 'show'=>0),
            '3'=> array('text'=>'10月上旬 初步审查', 'show'=>0),
            '4'=> array('text'=>'10月中旬 材料评审', 'show'=>0),
            '5'=> array('text'=>'10月下旬 初赛', 'show'=>0),
            '6'=> array('text'=>'11月上旬 赛前培训', 'show'=>0),
            '7'=> array('text'=>'11月上旬 决赛', 'show'=>0),
            '8'=> array('text'=>'11月后 后续产业服务', 'show'=>0)
        );
    }

    public function getCorpInfoConfig()
    {
        return [
            'productForm'=>array(
                "1"=>array(
                    'name'=>'App Ios',
                    'tips'=>'请填写APP名称',
                    'show' => 0,
                    'text' => '',
                    'key' => 'product_form_k[1]',
                    'val' => 'product_form_v[1]'
                ),
                "2"=>array(
                    'name'=>'App Android',
                    'tips'=>'请填写APP名称',
                    'show' => 0,
                    'text' => '',
                    'key' => 'product_form_k[2]',
                    'val' => 'product_form_v[2]'
                ),
                "3"=>array(
                    'name'=>'小程序',
                    'tips'=>'请填写小程序名称',
                    'show' => 0,
                    'text' => '',
                    'key' => 'product_form_k[3]',
                    'val' => 'product_form_v[3]'
                ),
                "4"=>array(
                    'name'=>'网址',
                    'tips'=>'请填写网址',
                    'show' => 0,
                    'text' => '',
                    'key' => 'product_form_k[4]',
                    'val' => 'product_form_v[4]'
                ),
                "5"=>array(
                    'name'=>'H5',
                    'tips'=>'请填写网址',
                    'show' => 0,
                    'text' => '',
                    'key' => 'product_form_k[5]',
                    'val' => 'product_form_v[5]'
                ),
            ),
            'productType' => array(
                "1"=>array( 'name' => 'product_type', 'text' => '科普内容聚合平台（知识、游戏、教育、工具书类）', 'show' => 0),
                "2"=>array( 'name' => 'product_type', 'text' => '科普技术', 'show' => 0),
                "3"=>array( 'name' => 'product_type', 'text' => '科普交互服务', 'show' => 0),
                "4"=>array( 'name' => 'product_type', 'text' => '科普体验', 'show' => 0),
            ),
            'help'=>array(
                "1"=>array( 'name' => 'accept_help[1]', 'text' => '投资', 'show' => 0),
                "2"=>array( 'name' => 'accept_help[2]', 'text' => '资源对接（产品、技术合作）', 'show' => 0 ),
                "3"=>array( 'name' => 'accept_help[3]', 'text' => '创业指导（知名投资人、企业家指导）', 'show' => 0 ),
                "4"=>array( 'name' => 'accept_help[4]', 'text' => '项目推广（品牌宣传）', 'show' => 0 ),
                "5"=>array( 'name' => 'accept_help[5]', 'text' => '创业训练营', 'show' => 0 ),
                "6"=>array( 'name' => 'accept_help[6]', 'text' => '其他', 'show' => 0 )
            ),
            'signupResouce' =>array(
            "1"=>array(
                'name'=>'地方推荐',
                'tips'=>'请填写推荐的组织或学会',
                'show' => 0,
                'text' => ''
            ),
            "2"=>array(
                'name'=>'投资人推荐',
                'tips'=>'填写投资人',
                'show' => 0,
                'text' => ''
            ),
            "3"=>array(
                'name'=>'高校推荐',
                'tips'=>'请填写学校',
                'show' => 0,
                'text' => ''
            ),
            "4"=>array(
                'name'=>'自主报名',
                'tips'=>'',
                'show' => 0,
                'text' => ''
            )
        )];
    }

    /**
     * 返回成功接口
     * @param string $data
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function responseSuccess($data = '{}', $message = '成功')
    {
        return $this->response([
            'status' => 'success',
            'data' => $data,
            'message' => $message
        ]);
    }
    public function response($data)
    {
        return response()->json($data);
    }
}
