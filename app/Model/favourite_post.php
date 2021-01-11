<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class favourite_post extends Model
{
    protected $table = "favourite_post";
    protected $fillable = ['userId', 'postId'];
}
