<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class post_comment extends Model
{
    protected $table = "post_comment";
    protected $fillable = ["id", "content", "created_at", "userId", "postId"];
}
