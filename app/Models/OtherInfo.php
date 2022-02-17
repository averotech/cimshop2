<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherInfo extends Model
{
    use HasFactory;

    protected $fillable = ['product_id','title','title_en','description','description_en'];
    protected $appends = ['show_title','show_description'];

    public function getShowTitleAttribute()
    {
        $lang = app()->getLocale();
        return $lang == 'en' ? $this->title_en : $this->title;
    }

    public function getShowDescriptionAttribute()
    {
        $lang = app()->getLocale();
        return $lang == 'en' ? $this->description_en : $this->description;
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
