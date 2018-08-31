<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CorpInfo extends Model
{
    protected $fillable = [
        'signup_resouce','user_id','audit_status','signup_resouce_val','name','sex','birthday','age','identity_no','mobile',
        'wechat','email','contestant_identity','company_name','website_url','organization_code',
        'company_legal_name','registered_capital','registered_time','registered_address',
        'accept_help'
    ];
    protected $table = 'corporate_information';
}
