<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $appends = ['status'];
    protected $guarded = [];
    public $translatable = ['name'];

    public function getStatusAttribute($data)
    {
        return $this->is_active ? trans('langs.active') : trans('langs.deactivate');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }

}
