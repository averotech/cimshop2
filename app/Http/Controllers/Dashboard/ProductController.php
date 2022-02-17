<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CategoryProduct;
use App\Models\Color;
use App\Models\Image;
use App\Models\OtherInfo;
use App\Models\Product;
use App\Models\Similar;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $arr = [];
        foreach ($products as $product) {
            if ($product->quantity > $product->min_stock) {
                array_push($arr, $product->id);
            }
        }
        $products_c = Product::whereIn('id', $arr)->get();
        return view('products.show', ['products' => $products_c]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $products = Product::all();
        return view('products.add', ['categories' => $categories, 'products' => $products]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Validator::make(request()->all(), [
            'name' => 'required|string|max:300',
            'name_en' => 'required|string|max:300',
            'description' => 'required',
            'description_en' => 'required',
            'sku' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'min_stock' => 'required',
        ], $messages = [
            'required' => 'مطلوب :attribute حقل الـ',
        ]);


        if ($data->fails()) {
            session()->flash('alert_error_msg', $data->errors()->first());
            return back();
        }
        //Add Product
        $product = Product::create([
            'name' => request()->name,
            'name_en' => request()->name_en,
            'description' => request()->description,
            'description_en' => request()->description_en,
            'sku' => request()->sku,
            'price' => request()->price,
            'price_after_discount' => request()->price_after_discount,
            'quantity' => request()->quantity,
            'min_stock' => request()->min_stock,
            'product_info' => request()->product_info,
            'product_info_en' => request()->product_info_en,
            'refund_and_return_policy' => request()->refund_and_return_policy,
            'refund_and_return_policy_en' => request()->refund_and_return_policy_en,
            'shipping_info' => request()->shipping_info,
            'shipping_info_en' => request()->shipping_info_en,
            'size' => request()->size,
        ]);

        //Store color
        $colors = request()->colors;
        if ($colors) {
            for ($i = 0; $i < (count($colors) - 1); $i++) {
                Color::create([
                    'product_id' => $product->id,
                    'color' => $colors[$i],
                ]);
            }
        }

        //Store Category
        if (request()->categories) {
            $categories = request()->categories;
            for ($i = 0; $i < count(request()->categories); $i++) {
                CategoryProduct::create([
                    'product_id' => $product->id,
                    'category_id' => $categories[$i]
                ]);
            }
        }

        //Store Similar Products
        if (request()->similars) {
            $similars = request()->similars;
            for ($i = 0; $i < count(request()->similars); $i++) {
                Similar::create([
                    'product_id' => $product->id,
                    'similar_product_id' => $similars[$i]
                ]);
            }
        }


        //Stote Images
        $imgs = request()->file('imageFile');
        $checkSelect = request()->checkSelect;
        if ($imgs) {

            for ($i = 0; $i < count($imgs); $i++) {
                if ($imgs[$i] != null) {

                    $file = $imgs[$i];
                    $fileName = $file->hashName();

                    Image::create([
                        'img' => $fileName,
                        'product_id' => $product->id,
                        //'is_main' => $checkSelect[$i] == "on" ? 1 :
                    ]);

                    $file->store('product', ['disk' => 'image']); //Store Img On Disk

                }
            }
        }

        session()->flash('alert_success_msg', 'تم إضافة المنتج بنجاح');
        return \Redirect::to(route('admin.product.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::where('id', $id)->with('colors', 'images', 'category_product.category', 'similars.similar', 'other_infos')->first();
        return view('products.details', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::where('id', $id)->with('colors', 'images', 'category_product.category', 'similars.similar')->first();
        $categories = Category::all();
        $products = Product::where('id', '!=', $id)->get();

        $categories_for_product_id_arr = [];
        $categories_product = CategoryProduct::where('product_id', $id)->get();
        foreach ($categories_product as $category) {
            array_push($categories_for_product_id_arr, $category->category_id);
        }


        $similars_for_product_id_arr = [];
        $similars_product = Similar::where('product_id', $id)->get();
        foreach ($similars_product as $similar) {
            array_push($similars_for_product_id_arr, $similar->similar_product_id);
        }

        return view('products.edit', ['product' => $product, 'categories' => $categories, 'products' => $products, 'categories_for_product_id_arr' => $categories_for_product_id_arr, 'similars_for_product_id_arr' => $similars_for_product_id_arr]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Validator::make(request()->all(), [
            'name' => 'required|string|max:300',
            'name_en' => 'required|string|max:300',
            'description' => 'required',
            'description_en' => 'required',
            'sku' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'min_stock' => 'required',
        ], $messages = [
            'required' => 'مطلوب :attribute حقل الـ',
        ]);


        if ($data->fails()) {
            session()->flash('alert_error_msg', $data->errors()->first());
            return back();
        }

        $product = Product::where('id', $id)->first();

        //Add Product
        Product::where('id', $id)->update([
            'name' => request()->name,
            'name_en' => request()->name_en,
            'description' => request()->description,
            'description_en' => request()->description_en,
            'sku' => request()->sku,
            'price' => request()->price,
            'quantity' => request()->quantity,
            'min_stock' => request()->min_stock,
            'product_info' => request()->product_info,
            'product_info_en' => request()->product_info_en,
            'refund_and_return_policy' => request()->refund_and_return_policy,
            'refund_and_return_policy_en' => request()->refund_and_return_policy_en,
            'shipping_info' => request()->shipping_info,
            'shipping_info_en' => request()->shipping_info_en,
            'size' => request()->size,
            'price_after_discount' => request()->price_after_discount,
        ]);

        //Store color
        $colors = request()->colors;
        //dd($colors);
        if (count($colors) > 2) {
            for ($i = 0; $i < (count($colors) - 1); $i++) {
                Color::create([
                    'product_id' => $product->id,
                    'color' => $colors[$i],
                ]);
            }
        }

        //To Get Deleted Colors Count
        $del_colors_str = request()->del_colors;
        if ($del_colors_str) {
            $del_colors_arr = explode(",", $del_colors_str);
            //dd($del_colors_arr);
            $del_colors_count = count($del_colors_arr);
            if ($del_colors_count) {
                for ($i = 0; $i < $del_colors_count; $i++) {
                    $color = Color::where('id', $del_colors_arr[$i])->first();
                    $color->delete();
                }
            }
        }


        //Store Category
        if (request()->categories) {

            //Delete Old
            CategoryProduct::where('product_id', $id)->delete();

            //Insert New Category
            $categories = request()->categories;
            for ($i = 0; $i < count(request()->categories); $i++) {
                CategoryProduct::create([
                    'product_id' => $product->id,
                    'category_id' => $categories[$i]
                ]);
            }

        }


        //Store Similar Products
        if (request()->similars) {

            //Delete Old
            Similar::where('product_id', $id)->delete();

            //Insert New Similar
            $similars = request()->similars;
            for ($i = 0; $i < count(request()->similars); $i++) {
                Similar::create([
                    'product_id' => $product->id,
                    'similar_product_id' => $similars[$i]
                ]);
            }
        }


        //To Store New Image
        $imgs = request()->file('imageFile');

        if ($imgs) {

            for ($i = 0; $i < count($imgs); $i++) {
                if ($imgs[$i] != null) {

                    $file = $imgs[$i];
                    $fileName = $file->hashName();

                    Image::create([
                        'img' => $fileName,
                        'product_id' => $product->id,
                        //'is_main' => $checkSelect[$i] == "on" ? 1 :
                    ]);

                    $file->store('product', ['disk' => 'image']); //Store Img On Disk
                }
            }
        }


        //To Get Deleted Images Count
        $del_imgs_str = request()->del_imgs;
        $del_imgs_arr = explode(",", $del_imgs_str);
        $del_imgs_count = count($del_imgs_arr);
        // dd($del_imgs_arr);
        if ($del_imgs_count) {

            for ($i = 0; $i < $del_imgs_count; $i++) {
                $img = Image::where('id', $del_imgs_arr[$i])->first();
                if ($img) {
                    //Delete Old Image
                    if (\Storage::disk('image')->exists(('product/' . $img->img))) {
                        \Storage::disk('image')->delete('product/' . $img->img);
                    }

                    Image::where('id', $img->id)->delete();
                }

            }

        }


        session()->flash('alert_success_msg', 'تم تعديل المنتج بنجاح');
        return \Redirect::to(route('admin.product.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::where('id', $id)->first();
        $similars = Similar::where('similar_product_id', $id)->delete();
        $product->delete();
        session()->flash('alert_success_msg', 'تم الحذف بنجاح');
        return back();

    }


    //Show Other Info Of Product
    public function showOtherInfo($id)
    {

        $product = Product::where('id', $id)->first();
        $other_infos = OtherInfo::where('product_id', $id)->get();
        return view('products.other', ['other_infos' => $other_infos, 'product' => $product]);

    }

    //Delete Other Info Of Product
    public function destroyOtherInfo($id)
    {
        $other_info = OtherInfo::where('id', $id)->first();
        $other_info->delete();
        session()->flash('alert_success_msg', 'تم الحذف بنجاح');
        return back();

    }

    //Add Other Info Of Product
    public function addOtherInfoView($id)
    {
        $product = Product::where('id', $id)->first();

        return view('products.addOther', ['product' => $product]);
    }


    //Add Other Info Of Product
    public function addOtherInfo($id)
    {

        $data = Validator::make(request()->all(), [
            'title' => 'required|string',
            'title_en' => 'required|string',
            'description' => 'required',
            'description_en' => 'required',
        ], $messages = [
            'required' => 'مطلوب :attribute حقل الـ',
        ]);


        if ($data->fails()) {
            session()->flash('alert_error_msg', $data->errors()->first());
            return back();
        }


        //Add Other Info
        $info = OtherInfo::create([
            'title' => request()->title,
            'title_en' => request()->title_en,
            'description' => request()->description,
            'description_en' => request()->description_en,
            'product_id' => $id,
        ]);
        session()->flash('alert_success_msg', 'تم الاضافة بنجاح');
        return \Redirect::to(route('product.other_info.info', ['id' => $id]));

    }


    //Show All Critical Products
    public function criticalProducts()
    {
        //  $products = Product::whereRaw('quantity < min_stock')->get();
        // $products = DB::table('products')
        //         ->whereColumn('quantity', '<', 'min_stock')
        //         ->get();
        $products = Product::all();

        //    $qty = Product::pluck('quantity');
        //     $products = Product::whereIn('min_stock',$qty)->get();

        $arr = [];
        foreach ($products as $product) {
            if ($product->quantity <= $product->min_stock) {
                array_push($arr, $product->id);
            }
        }
        $products_c = Product::whereIn('id', $arr)->get();

        return view('products.critical', ['products' => $products_c]);
    }


}
