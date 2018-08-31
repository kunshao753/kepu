<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCorporateInformation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('corporate_information', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('signup_resouce')->comment('报名来源, 地方推荐：1；投资人推荐：2；高效推荐：3；自主报名：4');
            $table->tinyInteger('audit_status')->comment('申报审批状态, 初审未通过：0；报名：1；进入初赛：2；进入决赛：3');
            $table->integer('user_id')->comment('主键USER ID');
            $table->string('name',8)->comment('姓名');
            $table->tinyInteger('sex')->comment('性别');
            $table->date('birthday')->comment('出生年月')->nullable();
            $table->tinyInteger('age')->comment('年龄')->nullable();
            $table->string('identity_no',18)->comment('身份证号');
            $table->string('mobile',11)->comment('手机号');
            $table->string('wechat',30)->comment('wechat')->nullable();
            $table->string('email')->comment('邮箱')->nullable();
            $table->tinyInteger('contestant_identity')->comment('参赛身份, 企业：1；创客团队：2');
            $table->string('company_name',50)->comment('公司名称');
            $table->string('website_url',100)->comment('公司网址')->nullable();
            $table->string('organization_code',18)->comment('统一社会信用代码');
            $table->string('company_legal_name',8)->comment('法定代表人姓名');
            $table->string('registered_capital',8)->comment('注册资本');
            $table->date('registered_time')->comment('注册日期');
            $table->string('registered_address',50)->comment('注册地址');
            $table->string('accept_help',15)->comment('你希望获得什么支持, 投资：1；资源对接（产品、技术合作）：2；创业指导（知名投资人、企业家指导）：3；项目推广：4；创业训练营：5；其他：6');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('corporate_information');
    }
}
