<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifi extends Model
{
    use HasFactory;

    protected $fillable = ['title','msg','order_id','is_read'];
    
}
