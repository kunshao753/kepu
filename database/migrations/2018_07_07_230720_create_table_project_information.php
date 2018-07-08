<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProjectInformation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_information', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('corp_id')->comment('项目ID');
            $table->string('project_name')->comment('项目名称');
            $table->tinyInteger('Product_type')->comment('项目类型, 科普内容聚合平台：1；科普技术：2；科普体验：3');
            $table->string('Product_form',15)->comment('产品形态, App：1（ 20汉字）；小程序：2（20汉字）；网站：3（100英文）；H5：4（100英文）');
            $table->tinyInteger('Product_user')->comment('产品用户, 普通公众：1；支撑科普内容生成及传播的机构：2');
            $table->string('Product_user_size',10)->comment('产品用户数');
            $table->string('project_profile',500)->comment('产品概况');
            $table->string('Product_highlight',150)->comment('产品亮点');
            $table->string('business_model',150)->comment('商业模式');
            $table->string('core_barrier',50)->comment('核心壁垒');
            $table->string('financing_situation',200)->comment('过往融资情况');
            $table->string('is_patent',200)->comment('是否拥有专利技术');
            $table->string('product_communication',500)->comment('产品传播效果');
            $table->tinyInteger('is_ad')->comment('产品内是否有广告, 1是 2否');
            $table->string('ad_type',20)->comment('产品传播效果');
            $table->string('content_production_mechanism',150)->comment('内容生产机制');
            $table->string('content_review_mechanism',150)->comment('内容审核机构');
            $table->string('expert_agency_recommendation',150)->comment('专家或机构推荐意见')->nullable();

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
        Schema::dropIfExists('project_information');
    }
}
