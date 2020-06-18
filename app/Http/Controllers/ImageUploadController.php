<?php

namespace App\Http\Controllers;

use App\craftWorkPic;
use App\UserData;
use Illuminate\Support\Facades\Auth;
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

    //view single image
    public function getImage($id)
    {

        $image = DB::table('craft_work_pics')
            ->where('id', $id)
            ->get();
        if (empty($image[0])) {
            return redirect()->route('images')->with('error', "Sorry, that image does not exist");
        } else {
            $user = DB::table('user_data')
                ->where('user_id', $image[0]->added_by)
                ->get();
            return view('viewImage', compact('image', 'user'));
        }
    }

    public function deleteImage($id)
    {
        $userdataId = DB::table('craft_work_pics')
            ->where('id', $id)
            ->get();

        $currentUser = DB::table('users')
            ->where('id', Auth::id())
            ->get();

        //if the user is not authenticate 
        if (!auth()->user()) {
            return view('auth/login')->with('message', 'Please log in first.');
        }
        //if the user has the same id
        elseif ($userdataId[0]->added_by == Auth::id()) {
            $image = DB::table('craft_work_pics')
                ->where('id', $id)
                ->get();

            Storage::disk('s3')->delete($image[0]->path);
            DB::table('craft_work_pics')
                ->where('id', $id)->delete();

            return redirect()->route('profile.index')
                ->with('success', 'The record was deleted successfully');
        }
        //if the user is the admin
        elseif ($currentUser[0]->user_type == 'admin') {

            $image = DB::table('craft_work_pics')
                ->where('id', $id)
                ->get();

            Storage::disk('s3')->delete($image[0]->path);
            DB::table('craft_work_pics')
                ->where('id', $id)->delete();

            return redirect()->route('images')
                ->with('success', 'The record was deleted successfully');
        }
        //if the user is authenticate but do not own the post redirect to homepage(images) with error
        else {
            return redirect()->route('images')
                ->with('error', "No, you can't delete someone else data");
        }
    }

    //formUpload works but easy hack
    public function formUpload()
    {
        if (!auth()->user()) {
            return view('auth/login')->with('message', 'Please log in first.');
        } else {
            return view('upload');
        }
    }
}
