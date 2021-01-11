<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = "users";
    protected $fillable = ["name", "surname", "password", "email"];

    public function posts(){
        return $this->hasMany('App\Model\Posts');
    }
}
