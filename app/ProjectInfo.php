<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectInfo extends Model
{
    protected $fillable = [
        'user_id','project_name','product_type','product_form','product_form_val','product_user',
        'product_user_size','project_profile','product_highlight','business_model',
        'core_barrier','financing_situation','is_patent','product_communication',
        'is_ad','ad_type','content_production_mechanism','content_review_mechanism',
        'expert_agency_recommendation'
    ];
    protected $table = 'project_information';
}
