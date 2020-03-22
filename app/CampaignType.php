<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CampaignType extends Model
{
    use SoftDeletes;
    public $timestamps = true;
    protected $fillable = [
        'name',
        'description',
    ];

    public function campaigns()
    {
        return $this->hasMany('App\Campaign','id','campaign_type_id');
    }
}
