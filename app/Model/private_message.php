<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class private_message extends Model
{
    protected $table = "private_message";
    protected $fillable = ["senderId","receiverId","conversationId","message"];


}
