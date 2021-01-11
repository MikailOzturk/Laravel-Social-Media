<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class company extends Model
{
    protected $table = "company";
    protected $fillable = ["company_name","sector","sector","since","description","adress","image_url","status"];


}
