<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
    protected $fillable = ['id','name','from', 'movement','active_period','bio', 'user_id'];

}
