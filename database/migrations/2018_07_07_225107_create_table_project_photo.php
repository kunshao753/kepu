<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProjectPhoto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_photo', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('corp_id')->comment('项目 ID');
            $table->string('contestant_statement',100)->comment('参赛声明');
            $table->string('contestant_photo',100)->comment('选手照片')->nullable();
            $table->string('business_license',100)->comment('营业执照扫描pdf')->nullable();
            $table->string('identity_front_back',100)->comment('身份证复印件正反面pdf');
            $table->string('logo_photo',100)->comment('项目图片logo')->nullable();
            $table->string('financing_certificate',100)->comment('融资证明资料pdf')->nullable();
            $table->string('intellectual_property_statement',100)->comment('知识产权合规声明pdf');
            $table->string('product_communication_report',100)->comment('产品传播效果报告pdf')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_photo');
    }
}
