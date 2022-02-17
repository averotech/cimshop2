<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advert extends Model
{
    use HasFactory;
    protected $fillable = ['title','title_en','img','link','order'];
    protected $appends = ['show_title','img_url'];


    public function getShowTitleAttribute()
    {
        $lang = app()->getLocale();
        return $lang == 'en' ? $this->title_en : $this->title;
    }

    public function getImgUrlAttribute()
    {
        return $this->img ? url('/image/adverts/' . $this->img) : null;
    }
}
