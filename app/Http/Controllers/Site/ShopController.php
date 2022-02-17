<?php


namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('site.shop.index', compact('categories'));
    }

    public function data(Request $request)
    {
        $products = new Product();

        $filter = json_decode($request->filter);

        if ($filter->text) {
            $products = $products->where(function ($query) use ($filter) {
                $text = $filter->text;
                $lang = app()->getLocale();
                if ($lang === 'ar')
                    $query->where("name", 'LIKE', "%$text%")->orwhere("description", 'LIKE', "%$text%");
                else
                    $query->where("name_en", 'LIKE', "%$text%")->orwhere("description_en", 'LIKE', "%$text%");

            });
        }

        if (is_array($filter->price)) {
            $price = $filter->price;

            $min = $price[0];
            $max = $price[1];
            $products = $products->whereBetween('price', [$min, $max]);
        }
        if (isset($filter->category_id)) {
            $products = $products->whereHas('category_product', function ($q) use ($filter) {
                $cate_id = $filter->category_id;
                $q->where('category_id', $cate_id);
            });
        }

        if ($request->has('sort')) {

            $sort = $request->sort;
            //$orderBy = $request->order_by;

            $fieldName = 'created_at';
            $order = 'desc';

            if ($sort === 'asc_price') {
                $fieldName = 'price';
                $order = 'asc';
            }
            if ($sort === 'desc_price') {
                $fieldName = 'price';
                $order = 'desc';
            }
            if ($sort === 'asc_date') {
                $fieldName = 'created_at';
                $order = 'asc';
            }
            if ($sort === 'desc_date') {
                $fieldName = 'created_at';
                $order = 'desc';
            }
            $products = $products->orderBy($fieldName, $order);
        }

        $limit = $request->limit ? $request->limit : 9;
        $products = $products->with('mainImage')->paginate($limit);

        return $this->sendResponse($products, null, 200);
    }
}
