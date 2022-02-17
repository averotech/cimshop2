<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name','name_en','description','description_en'];

    protected $appends = ['show_name', 'show_description'];

    public function getShowNameAttribute()
    {
        $lang = app()->getLocale();
        return $lang == 'en' ? $this->name_en : $this->name;
    }

    public function getShowDescriptionAttribute()
    {
        $lang = app()->getLocale();
        return $lang == 'en' ? $this->description_en : $this->description;
    }

    public function category_product()
    {
        return $this->hasMany(CategoryProduct::class);
    }
}
