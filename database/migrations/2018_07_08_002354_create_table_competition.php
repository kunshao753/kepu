<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCompetition extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competition', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('大赛名称')->nullable();
            $table->string('introduction')->comment('大赛简介')->nullable();
            $table->tinyInteger('status')->comment('1:7月 大赛启动; 2:8月-9月 项目征集; 3: 10月上旬 初步审查; 4:10月中旬 材料评审; 5:10月下旬 初赛; 6:11月上旬 赛前培训; 7:11月上旬 决赛; 8:11月后 后续产业服务');
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
        Schema::dropIfExists('competition');
    }
}
