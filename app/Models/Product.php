<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'name_en', 'description', 'description_en', 'sku', 'price', 'quantity', 'min_stock',
        'refund_and_return_policy',
        'refund_and_return_policy_en',
        'product_info',
        'product_info_en',
        'product_info_en',
        'shipping_info',
        'shipping_info_en',
        'price_after_discount',
        'size',
    ];
    protected $appends = ['show_name', 'show_description', 'show_size'];

    public static function getSizes()
    {
        return Size::all();
    }

    public function getShowSizeAttribute()
    {
        $arr = [
            1 => trans('site.small'),
            2 => trans('site.medium'),
            3 => trans('site.larage'),
        ];
        return @$arr[$this->size];
    }

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

    public function colors()
    {
        return $this->hasMany(Color::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function mainImage()
    {
        return $this->hasOne(Image::class);
    }

    public function similars()
    {
        return $this->hasMany(Similar::class);
    }

    public function other_infos()
    {
        return $this->hasMany(OtherInfo::class);
    }

    public function details_order()
    {
        return $this->hasMany(DetailsOrder::class);
    }

    public function sizes()
    {
        return $this->hasMany(ProductSize::class);
    }

}
