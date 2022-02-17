<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Advert;
use App\Models\Product;
use App\Models\Slider;

class HomeController extends Controller
{

    public function index()
    {
        $adverts = Advert::orderBy('order','desc')->skip(0)->take(3)->get();

        $products = Product::with('mainImage')->orderBy('created_at', 'desc')->limit(8)->get();
        $sliders = Slider::all();

        return view('site.home.index', compact('adverts', 'products','sliders'));

    }
}
