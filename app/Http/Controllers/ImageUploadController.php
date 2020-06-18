<?php

namespace App\Http\Controllers;

use App\craftWorkPic;
use App\Http\Requests\imageStorage;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

use DB;

class ImageUploadController extends Controller
{
    private $image;
    public function __construct(craftWorkPic $image)
    {
        $this->image = $image;
    }

    public function uploadImage(imageStorage $request)
    {
        if (!auth()->user()) {
            return view('auth/login')->with('message', 'Please log in first.');
        } else {
            $path = Storage::disk('s3')->put('images/upload', $request->file);
            $request->merge([
                'size' => $request->file->getSize(),
                'path' => $path
            ]);
            $this->image->create(
                $request->only(
                    'size',
                    'title',
                    'path',
                    'created_by',
                    'added_by',
                    'size',
                    'description',
                    'location',
                    'manufacturing_period',
                    'manufacturing_type',
                    'manufacturing_date'
                )
            );
            return redirect()->route('profile.index')
            ->with('success', 'Image Successfully Saved');
        }
    }

    //welcome page 

    public function welcomePage()
    {
        $image = Storage::disk('s3')->allFiles('images');
        $udata = DB::table('user_data')
            ->get();
        $imageInfo = DB::table('craft_work_pics')
            ->get();

        return view('welcome', compact('imageInfo', 'image', 'udata'));
    }

    public function getImage($id)
    {

        $image = DB::table('craft_work_pics')
            ->where('id', $id)
            ->get();

        $user = DB::table('user_data')
            ->where('user_id', $image[0]->added_by)
            ->get();

        return view('viewImage', compact('image', 'user'));
    }

    public function deleteImage($id)
    {

        $image = DB::table('craft_work_pics')
            ->where('id', $id)
            ->get();

        Storage::disk('s3')->delete($image[0]->path);
        DB::table('craft_work_pics')
            ->where('id', $id)->delete();

        return redirect()->route('profile.index')
            ->with('success', 'The record was deleted successfully');
    }


    public function formUpload()
    {
        return view('upload');
    }
}
