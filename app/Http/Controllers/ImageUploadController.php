<?php

namespace App\Http\Controllers;

use App\imageUpload;
use App\Http\Requests\imageStorage;
use Illuminate\Support\Facades\Storage;

class ImageUploadController extends Controller
{
    private $image;
    public function __construct(imageUpload $image)
    {
        $this->image = $image;
    }

    public function getImages()
    {
        return view('images')->with('images', auth()->user()->images);
    }

    public function postUpload(imageStorage $request)
    {
        $path = Storage::disk('s3')->put('images/originals', $request->file);
        $request->merge([
            'size' => $request->file->getSize(),
            'path' => $path
        ]);
        $this->image->create($request->only('path', 'title', 'size'));
        return back()->with('success', 'Image Successfully Saved');
    }
}
