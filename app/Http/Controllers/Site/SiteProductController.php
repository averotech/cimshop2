<?php


namespace App\Http\Controllers\Site;


use App\Http\Controllers\Controller;
use App\Models\Product;

class SiteProductController extends Controller
{

    public function index()
    {

    }

    public function details($id) {
        $product  = Product::with('colors','other_infos','similars.product','images')->findOrFail($id);
        return view('site.product.details',compact('product'));
    }

}
