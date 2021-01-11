<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class post_like extends Model
{
    protected $table = "post_like";
    protected $fillable = ['userId', 'postId'];
}
