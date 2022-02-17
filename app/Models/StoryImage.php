<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoryImage extends Model
{
    use HasFactory;

    protected $fillable = ["img"];
    protected $appends = ['img_url'];


    public function getImgUrlAttribute()
    {
        return $this->img ? url('/image/story/' . $this->img) : null;
    }

}
