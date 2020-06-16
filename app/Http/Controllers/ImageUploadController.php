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

    public function postUpload(imageStorage $request)
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
            return back()->with('success', 'Image Successfully Saved');
        }
    }

    //welcome page 

    public function getImages()
    {
        $image = Storage::disk('s3')->allFiles('images');
        // $users = DB::table('craft_work_pics')
        //     ->get();

        $imageInfo = DB::table('craft_work_pics')
            ->get();        
        return view('welcome', compact('imageInfo','image'))
                  ->with('i', (request()->input('page',1) -1)*5);
    }

    public function getMyImages()
    {
        //check if user is logged in 
        if (!auth()->user()) {
            return view('auth/login')->with('message', 'Please log in first.');
        } else {
            return view('images')->with('images', auth()->user()->images);
        }
    }

    public function getImage($id)
    {
        $image = DB::table('craft_work_pics')
            ->where('id', $id)
            ->get();
        return view('viewImage')->with('image', $image);
    }
}
