<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $fillable = ['about_us','about_us_en','email','phone','facebook_link','whatsapp_link','video','lng','lat'];
    protected $appends = ['show_about','video_url'];

    public function getShowAboutAttribute()
    {
        $lang = app()->getLocale();
        return $lang == 'en' ? $this->about_us_en : $this->about_us;
    }

    public function getVideoUrlAttribute()
    {
        return $this->video ? asset('video/'.$this->video) : null;
    }
}
