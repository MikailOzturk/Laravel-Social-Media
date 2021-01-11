<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class posts extends Model

{
    protected $table = "posts";
    protected $fillable = ["id", "title", "content", "created_at", "image_url", "user_id", "company_id"];

    public function users(){
        return $this->belongsTo('App\Model\Users');
    }
}

