<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class company_comment extends Model
{
    protected $table = "company_comment";
    protected $fillable = ["id", "comment", "point", "created_at", "userId","companyId"];


}
