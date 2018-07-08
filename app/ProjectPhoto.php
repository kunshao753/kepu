<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectPhoto extends Model
{
    protected $fillable = [
        'user_id','contestant_statement','contestant_photo','business_license','identity_front_back',
        'logo_photo','financing_certificate','intellectual_property_statement','product_communication_report'
    ];
    protected $table = 'project_photo';
}
