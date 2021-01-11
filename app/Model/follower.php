<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class follower extends Model
{
    protected $table = "follower";
    protected $fillable = ["userId", "companyId"];
}



