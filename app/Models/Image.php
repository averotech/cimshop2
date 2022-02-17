<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'img', 'is_main', 'description', 'description_en'];
    protected $appends = ['img_url'];

    public function getImgUrlAttribute()
    {
        return $this->img ? url('/image/product/' . $this->img) : null;
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
