<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Similar extends Model
{
    use HasFactory;

    protected $fillable = ['product_id','similar_product_id'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function similar()
    {
        return $this->belongsTo(Product::class,'similar_product_id','id');
    }
}
