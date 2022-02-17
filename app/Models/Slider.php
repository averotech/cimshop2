<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $appends = ['image_url','video_url'];

    public function getImageUrlAttribute()
    {
        return asset('image/sliders/' . $this->image);
    }

    public function getVideoUrlAttribute()
    {
        return asset('image/sliders/' . $this->video);
    }
}
