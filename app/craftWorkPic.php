<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class craftWorkPic extends Model
{
     protected $fillable = [
        'title', 'path', 'created_by', 'added_by', 'size', 'description', 'location', 'manufacturing_period', 'manufacturing_type', 'manufacturing_date'
    ];
    
    public $appends = ['url'];

    public function getUrlAttribute()
    {
        return Storage::disk('s3')->url($this->path);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'added_by');
    }
    
    public static function boot()
    {
        parent::boot();
        static::creating(function ($image) {
            $image->added_by = auth()->user()->id;
        });
    }
}
