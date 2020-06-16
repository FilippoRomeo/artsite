<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class userdatas extends Model
{
    protected $fillable = ['id','title','description', 'link','user_id'];
}
