<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Campaign extends Model
{
    use SoftDeletes;
    public $timestamps = true;
    protected $fillable = [
        'title',
        'short_description',
        'long_description',
        'start',
        'end',
        'status',
        'campaign_type_id',
        'user_creator_id',
    ];

    public function scopeByCreator($query, $user_creator_id = null)
    {
        if (!is_null($user_creator_id)) {
            $query->where('user_creator_id', $user_creator_id);
        }
        return $query;
    }

    public function campaignType()
    {
        return $this->belongsTo('App\CampaignType','campaign_type_id','id');
    }

    public function users() {
        return $this->belongsToMany('App\User', 'user_campaign', 'campaign_id', 'user_id')->withTimestamps();
    }
}
