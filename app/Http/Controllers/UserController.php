<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function postNews($id){
        News::whereid($id)->update([
            'post_status' => 1
        ]);
    }

    public function unpostNews($id){
        News::whereid($id)->update([
            'post_status' => 0
        ]);
    }
}
