<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectTeam extends Model
{
    protected $fillable = [
        'user_id','team_size','our_team','member_profile','management_system_list'
    ];
    protected $table = 'project_team';
}
