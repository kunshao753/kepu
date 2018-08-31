<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProjectTeam extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_team', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('team_size' )->comment('项目人数');
            $table->integer('corp_id')->comment('项目 ID');
            $table->text('our_team')->comment('团队概况');
            $table->text('member_profile')->comment('团队成员介绍');
            $table->text('management_system_list')->comment('内部管理制度清单');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_team');
    }
}
