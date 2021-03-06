<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Api\BaseController as BaseController;

use App\Models\Product;

class ProductController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($lang)
    {
        $data = Validator::make(request()->all(), [
            'querySearch' => 'required',
            'item_list' => 'required',
         ], $messages = [
            'required' => 'مطلوب :attribute حقل الـ',
        ]);
        
             
        if($data->fails()){
            return $this->sendError('Validation Error', $data->errors());       
        }

        $searchq = request()->querySearch;
        $item_list = request()->item_list;

        if($lang == "ar"){
            $products = Product::with('category_product.category','images')
            ->where(function($query) use($searchq) {
                            $query->where('name','like', '%' . $searchq . '%' )
                            ->orWhere('description', 'like', '%' . $searchq . '%')
                            ->orWhere('sku', 'like', '%' . $searchq . '%')
                            ->orWhere('price', 'like', '%' . $searchq . '%');
                        })
            ->paginate($item_list);
        }else{
            $products = Product::with('category_product.category','images')
            ->where(function($query) use($searchq) {
                            $query->where('name_en','like', '%' . $searchq  . '%')
                            ->orWhere('description_en', 'like',  '%' . $searchq  . '%')
                            ->orWhere('sku', 'like', '%' . $searchq . '%')
                            ->orWhere('price', 'like', '%' . $searchq . '%');
                        })
            ->paginate($item_list);
        }
        
        if(count($products)>0){

            foreach($products as $product){

                if($lang == "en"){

                    $product->name = $product->name_en;
                    $product->description = $product->description_en;
                    // for($i=0;$i<count($product['category_product']);$i++){
                    //     $product['category_product'][$i]['category']['name'] = $product['category_product'][$i]['category']['name_en'];
                    //     $product['category_product'][$i]['category']['description'] = $product['category_product'][$i]['category']['description_en'];
                    // }

                    // for($i=0;$i<count($product['other_infos']);$i++){
                    //     $product['other_infos'][$i]['title'] = $product['other_infos'][$i]['title_en'];
                    //     $product['other_infos'][$i]['description'] = $product['other_infos'][$i]['description_en'];
                    // }

                    // if(count($product['similars'])>0){
                    //     for($i=0;$i<count($product['similars']);$i++){
                    //     $product['similars'][$i]['similar']['name'] = $product['similars'][$i]['similar']['name_en'];
                    //     $product['similars'][$i]['similar']['description'] = $product['similars'][$i]['similar']['description_en'];
                        
                    //         for($j=0;$j<count($product['similars'][$i]['similar']['images']);$j++){
                    //             $img = $product['similars'][$i]['similar']['images'][$j]['img'];
                    //             $product['similars'][$i]['similar']['images'][$j]['img'] =  url('/image/product/'.$img);
                    //         }                        
                    //     }
                    //  }

                }
                
                for($i=0;$i<count($product['images']);$i++){
                    $img = $product['images'][$i]['img'];
                    $product['images'][$i]['img'] =  url('/image/product/'.$img);
                }  

            }

            $msg = ($lang == "ar" ? 'تم العرض بنجاح' : 'Show Successfully');
            return $this->sendResponse($products, $msg , 200);
        }else{
            $msg = ($lang == "ar" ? 'لا يوجد داتا حتى الان' : 'No Data Found Yet' );
            return $this->sendResponse($products, $msg , 200);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,$lang)
    {
        $product = Product::where('id',$id)->with('category_product.category','colors','images','other_infos','similars')->first();
        if($product){

            if($lang == "en"){
                $product->name = $product->name_en;
                $product->description = $product->description_en;
                
                for($i=0;$i<count($product['category_product']);$i++){
                    $product['category_product'][$i]['category']['name'] = $product['category_product'][$i]['category']['name_en'];
                    $product['category_product'][$i]['category']['description'] = $product['category_product'][$i]['category']['description_en'];
                }
                for($i=0;$i<count($product['other_infos']);$i++){
                    $product['other_infos'][$i]['title'] = $product['other_infos'][$i]['title_en'];
                    $product['other_infos'][$i]['description'] = $product['other_infos'][$i]['description_en'];
                }
                for($i=0;$i<count($product['similars']);$i++){
                    $product['similars'][$i]['similar']['name'] = $product['similars'][$i]['similar']['name_en'];
                    $product['similars'][$i]['similar']['description'] = $product['similars'][$i]['similar']['description_en'];
                    
                    for($j=0;$j<count($product['similars'][$i]['similar']['images']);$j++){
                        $img = $product['similars'][$i]['similar']['images'][$j]['img'];
                        // dd($img);
                        // $product['similars'][$i]['similar']['images'][$j]['img'] = " ";
                        $product['similars'][$i]['similar']['images'][$j]['image'] =  url('/image/product/'.$img);
                        $product['similars'][$i]['similar']['images'][$j]['img'] =  $product['similars'][$i]['similar']['images'][$j]['image'];
                    }
                }
                for($i=0;$i<count($product['images']);$i++){
                    $img = $product['images'][$i]['img'];
                    $product['images'][$i]['img'] =  url('/image/product/'.$img);
                }
            }

            
            $msg = ($lang == "ar" ? 'تم العرض بنجاح' : 'Show Successfully');
            return $this->sendResponse($product, $msg , 200);
        }else{
            $msg = ($lang == "ar" ? 'المعرف غير صحيح' :  'Id Not Found'  );
            return $this->sendResponse($product, $msg , 200);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    ////Get URL Of Image
    public function getUrl($img){
        return url('/image/product/'.$img);
    }

    //Filter Product
    public function filter($lang){

        $data = Validator::make(request()->all(), [
            'sortQuery' => 'nullable', // [asc price , desc Price , asc date , desc date ]
            'category_id' => 'nullable',
            'price' => 'nullable',

            'min_price' => 'nullable',
            'max_price' => 'nullable',
            ]);

        if($data->fails()){
            return $this->sendError('Validation Error', $data->errors());       
        }

        $sortQuery = request()->sortQuery;
        $category_id = request()->category_id;
        
        $price = request()->price;

        $min_price = request()->min_price;
        $max_price = request()->max_price;
        
      
            
        if($sortQuery != null && $category_id != null &&  ($min_price != null && $max_price != null) ){

            $products = Product::where('price','<=',$max_price)->where('price','>=',$min_price)
          
            ->get();

            $arr = [];
            foreach($products as $product){

                for($i=0;$i<count($product['category_product']);$i++){
                    if($product['category_product'][$i]['category_id'] == $category_id ){
                         array_push($arr,$product->id);
                    }
                     
                }
            }

            $products = Product::whereIn('id',$arr)->get();
            
            if($sortQuery == "asc_price"){
                $products = Product::whereIn('id',$arr)
                ->with('category_product','images')
                ->orderBy('price', 'asc')->get();
            }

            if($sortQuery == "desc_price"){
                $products = Product::whereIn('id',$arr)
                ->with('category_product','images')
                ->orderBy('price', 'desc')->get();
            }

            if($sortQuery == "asc_date"){
                $products = Product::whereIn('id',$arr)
                ->with('category_product','images')
                ->orderBy('created_at', 'asc')->get();
            }

            if($sortQuery == "desc_date"){
                $products = Product::whereIn('id',$arr)
                ->with('category_product','images')
                ->orderBy('created_at', 'desc')->get();
            }

            
            foreach($products as $product){
                if($lang == "en"){
                    $product->name = $product->name_en;
                    $product->description = $product->description_en;
                }
                for($i=0;$i<count($product['images']);$i++){
                    $img = $product['images'][$i]['img'];
                    $product['images'][$i]['img'] =  url('/image/product/'.$img);
                }
            }

            $msg = ($lang == "ar" ? 'تم العرض بنجاح' : 'Show Successfully');
            return $this->sendResponse($products, $msg , 200);

        }


        if($sortQuery == null && $category_id != null &&  ($min_price != null && $max_price != null) ){

            $products = Product::where('price','<=',$max_price)->where('price','>=',$min_price)->get();

            $arr = [];
            foreach($products as $product){

                for($i=0;$i<count($product['category_product']);$i++){
                    if($product['category_product'][$i]['category_id'] == $category_id ){
                        array_push($arr,$product->id);
                    }
                }
            }

            $products = Product::whereIn('id',$arr)  
            ->with('category_product','images')
            ->get();

            foreach($products as $product){
                if($lang == "en"){
                    $product->name = $product->name_en;
                    $product->description = $product->description_en;
                }
                for($i=0;$i<count($product['images']);$i++){
                    $img = $product['images'][$i]['img'];
                    $product['images'][$i]['img'] =  url('/image/product/'.$img);
                }
            }
                
            $msg = ($lang == "ar" ? 'تم العرض بنجاح' : 'Show Successfully');
            return $this->sendResponse($products, $msg , 200);            
            
        }


        if($sortQuery != null && $category_id == null &&  ($min_price != null && $max_price != null) ){

            $products = Product::where('price','<=',$max_price)->where('price','>=',$min_price)->get();
            if($sortQuery == "asc_price"){
                $products = Product::
                with('category_product','images')
                ->orderBy('price', 'asc')->get();
            }

            if($sortQuery == "desc_price"){
                $products = Product::
                with('category_product','images')
                ->orderBy('price', 'desc')->get();
            }

            if($sortQuery == "asc_date"){
                $products = Product::
                with('category_product','images')
                ->orderBy('created_at', 'asc')->get();
            }

            if($sortQuery == "desc_date"){
                $products = Product::
                with('category_product','images')
                ->orderBy('created_at', 'desc')->get();
            }

             foreach($products as $product){
                if($lang == "en"){
                    $product->name = $product->name_en;
                    $product->description = $product->description_en;
                }
                for($i=0;$i<count($product['images']);$i++){
                    $img = $product['images'][$i]['img'];
                    $product['images'][$i]['img'] =  url('/image/product/'.$img);
                }
            }

            $msg = ($lang == "ar" ? 'تم العرض بنجاح' : 'Show Successfully');
            return $this->sendResponse($products, $msg , 200);

        }


        if($sortQuery != null && $category_id != null &&  ($min_price == null && $max_price == null) ){

            $products = Product::get();
            

            $arr = [];
            foreach($products as $product){

                for($i=0;$i<count($product['category_product']);$i++){
                    if($product['category_product'][$i]['category_id'] == $category_id ){
                         array_push($arr,$product->id);
                    }
                     
                }
            }

            $products = Product::whereIn('id',$arr)->get();
            //dd($products);
            
            if($sortQuery == "asc_price"){
                $products = Product::whereIn('id',$arr)
                ->with('category_product','images')
                ->orderBy('price', 'asc')->get();
            }

            if($sortQuery == "desc_price"){
                $products = Product::whereIn('id',$arr)
                ->with('category_product','images')
                ->orderBy('price', 'desc')->get();
            }

            if($sortQuery == "asc_date"){
                $products = Product::whereIn('id',$arr)
                ->with('category_product','images')
                ->orderBy('created_at', 'asc')->get();
            }

            if($sortQuery == "desc_date"){
                $products = Product::whereIn('id',$arr)
                ->with('category_product','images')
                ->orderBy('created_at', 'desc')->get();
            }

            foreach($products as $product){
                if($lang == "en"){
                    $product->name = $product->name_en;
                    $product->description = $product->description_en;
                }
                for($i=0;$i<count($product['images']);$i++){
                    $img = $product['images'][$i]['img'];
                    $product['images'][$i]['img'] =  url('/image/product/'.$img);
                }
            }

            $msg = ($lang == "ar" ? 'تم العرض بنجاح' : 'Show Successfully');
            return $this->sendResponse($products, $msg , 200);

        }

        if($sortQuery != null && $category_id == null &&  ($min_price == null && $max_price == null) ){

            $products = Product::get();
            
            if($sortQuery == "asc_price"){
                $products = Product::
                with('category_product','images')
                ->orderBy('price', 'asc')->get();
            }

            if($sortQuery == "desc_price"){
                $products = Product::
                with('category_product','images')
                ->orderBy('price', 'desc')->get();
            }

            if($sortQuery == "asc_date"){
                $products = Product::
                with('category_product','images')
                ->orderBy('created_at', 'asc')->get();
            }

            if($sortQuery == "desc_date"){
                $products = Product::
                with('category_product','images')
                ->orderBy('created_at', 'desc')->get();
            }

            foreach($products as $product){
                if($lang == "en"){
                    $product->name = $product->name_en;
                    $product->description = $product->description_en;
                }
                for($i=0;$i<count($product['images']);$i++){
                    $img = $product['images'][$i]['img'];
                    $product['images'][$i]['img'] =  url('/image/product/'.$img);
                }
            }

            $msg = ($lang == "ar" ? 'تم العرض بنجاح' : 'Show Successfully');
            return $this->sendResponse($products, $msg , 200);

        }

        if($sortQuery == null && $category_id != null &&  ($min_price == null && $max_price == null) ){

            $products = Product::get();

            $arr = [];
            foreach($products as $product){

                for($i=0;$i<count($product['category_product']);$i++){
                    if($product['category_product'][$i]['category_id'] == $category_id ){
                         array_push($arr,$product->id);
                    }
                }
            }

            $products = Product::whereIn('id',$arr)->with('category_product','images')->get();           


            foreach($products as $product){
                if($lang == "en"){
                    $product->name = $product->name_en;
                    $product->description = $product->description_en;
                }
                for($i=0;$i<count($product['images']);$i++){
                    $img = $product['images'][$i]['img'];
                    $product['images'][$i]['img'] =  url('/image/product/'.$img);
                }
            }

            $msg = ($lang == "ar" ? 'تم العرض بنجاح' : 'Show Successfully');
            return $this->sendResponse($products, $msg , 200);

        }

        if($sortQuery == null && $category_id == null &&  ($min_price != null && $max_price != null) ){

            $products = Product::where('price','<=',$max_price)->where('price','>=',$min_price)->with('category_product','images')->get();

            foreach($products as $product){
                if($lang == "en"){
                    $product->name = $product->name_en;
                    $product->description = $product->description_en;
                }
                for($i=0;$i<count($product['images']);$i++){
                    $img = $product['images'][$i]['img'];
                    $product['images'][$i]['img'] =  url('/image/product/'.$img);
                }
            }

            $msg = ($lang == "ar" ? 'تم العرض بنجاح' : 'Show Successfully');
            return $this->sendResponse($products, $msg , 200);

        }

        $msg = ($lang == "ar" ? 'لا يوجد معلومات للعرض' : 'No Data Found');
        return $this->sendResponse([], $msg , 200);

    }

      //Filter Product (Old)
      public function filterOld($lang){

        $data = Validator::make(request()->all(), [
            'sortQuery' => 'nullable', // [asc price , desc Price , asc date , desc date ]
            'category_id' => 'nullable',
            'price' => 'nullable',

            'min_price' => 'nullable',
            'max_price' => 'nullable',
            ]);

        if($data->fails()){
            return $this->sendError('Validation Error', $data->errors());       
        }

        $sortQuery = request()->sortQuery;
        $category_id = request()->category_id;
        
        $price = request()->price;

        $min_price = request()->min_price;
        $max_price = request()->max_price;
        
        if($sortQuery != null && $category_id != null &&  $price != null ){

            $products = Product::where('price','<',$price)
            // ->with(['category_product' => function ($query) use ($category_id) {
            //     $query->where('category_id',$category_id);
            // }])
            ->get();

            $arr = [];
            foreach($products as $product){

                for($i=0;$i<count($product['category_product']);$i++){
                    if($product['category_product'][$i]['category_id'] == $category_id ){
                         array_push($arr,$product->id);
                    }
                     
                }
            }

            $products = Product::whereIn('id',$arr)->get();
            
            if($sortQuery == "asc_price"){
                $products = Product::whereIn('id',$arr)
                ->with('category_product','images')
                ->orderBy('price', 'asc')->get();
            }

            if($sortQuery == "desc_price"){
                $products = Product::whereIn('id',$arr)
                ->with('category_product','images')
                ->orderBy('price', 'desc')->get();
            }

            if($sortQuery == "asc_date"){
                $products = Product::whereIn('id',$arr)
                ->with('category_product','images')
                ->orderBy('created_at', 'asc')->get();
            }

            if($sortQuery == "desc_date"){
                $products = Product::whereIn('id',$arr)
                ->with('category_product','images')
                ->orderBy('created_at', 'desc')->get();
            }

            
            foreach($products as $product){
                if($lang == "en"){
                    $product->name = $product->name_en;
                    $product->description = $product->description_en;
                }
                for($i=0;$i<count($product['images']);$i++){
                    $img = $product['images'][$i]['img'];
                    $product['images'][$i]['img'] =  url('/image/product/'.$img);
                }
            }

            $msg = ($lang == "ar" ? 'تم العرض بنجاح' : 'Show Successfully');
            return $this->sendResponse($products, $msg , 200);

        }


        if($sortQuery == null && $category_id != null &&  $price != null ){

            $products = Product::where('price','<',$price)->get();

            $arr = [];
            foreach($products as $product){

                for($i=0;$i<count($product['category_product']);$i++){
                    if($product['category_product'][$i]['category_id'] == $category_id ){
                        array_push($arr,$product->id);
                    }
                }
            }

            $products = Product::whereIn('id',$arr)  
            ->with('category_product','images')
            ->get();

            foreach($products as $product){
                if($lang == "en"){
                    $product->name = $product->name_en;
                    $product->description = $product->description_en;
                }
                for($i=0;$i<count($product['images']);$i++){
                    $img = $product['images'][$i]['img'];
                    $product['images'][$i]['img'] =  url('/image/product/'.$img);
                }
            }
                
            $msg = ($lang == "ar" ? 'تم العرض بنجاح' : 'Show Successfully');
            return $this->sendResponse($products, $msg , 200);            
            
        }


        if($sortQuery != null && $category_id == null &&  $price != null ){

            $products = Product::where('price','<',$price)->get();
            if($sortQuery == "asc_price"){
                $products = Product::
                with('category_product','images')
                ->orderBy('price', 'asc')->get();
            }

            if($sortQuery == "desc_price"){
                $products = Product::
                with('category_product','images')
                ->orderBy('price', 'desc')->get();
            }

            if($sortQuery == "asc_date"){
                $products = Product::
                with('category_product','images')
                ->orderBy('created_at', 'asc')->get();
            }

            if($sortQuery == "desc_date"){
                $products = Product::
                with('category_product','images')
                ->orderBy('created_at', 'desc')->get();
            }

             foreach($products as $product){
                if($lang == "en"){
                    $product->name = $product->name_en;
                    $product->description = $product->description_en;
                }
                for($i=0;$i<count($product['images']);$i++){
                    $img = $product['images'][$i]['img'];
                    $product['images'][$i]['img'] =  url('/image/product/'.$img);
                }
            }

            $msg = ($lang == "ar" ? 'تم العرض بنجاح' : 'Show Successfully');
            return $this->sendResponse($products, $msg , 200);

        }


        if($sortQuery != null && $category_id != null &&  $price == null ){

            $products = Product::get();

            $arr = [];
            foreach($products as $product){

                for($i=0;$i<count($product['category_product']);$i++){
                    if($product['category_product'][$i]['category_id'] == $category_id ){
                         array_push($arr,$product->id);
                    }
                     
                }
            }

            $products = Product::whereIn('id',$arr)->get();
            
            if($sortQuery == "asc_price"){
                $products = Product::whereIn('id',$arr)
                ->with('category_product','images')
                ->orderBy('price', 'asc')->get();
            }

            if($sortQuery == "desc_price"){
                $products = Product::whereIn('id',$arr)
                ->with('category_product','images')
                ->orderBy('price', 'desc')->get();
            }

            if($sortQuery == "asc_date"){
                $products = Product::whereIn('id',$arr)
                ->with('category_product','images')
                ->orderBy('created_at', 'asc')->get();
            }

            if($sortQuery == "desc_date"){
                $products = Product::whereIn('id',$arr)
                ->with('category_product','images')
                ->orderBy('created_at', 'desc')->get();
            }

            foreach($products as $product){
                if($lang == "en"){
                    $product->name = $product->name_en;
                    $product->description = $product->description_en;
                }
                for($i=0;$i<count($product['images']);$i++){
                    $img = $product['images'][$i]['img'];
                    $product['images'][$i]['img'] =  url('/image/product/'.$img);
                }
            }

            $msg = ($lang == "ar" ? 'تم العرض بنجاح' : 'Show Successfully');
            return $this->sendResponse($products, $msg , 200);

        }

        if($sortQuery != null && $category_id == null &&  $price == null ){

            $products = Product::get();
            
            if($sortQuery == "asc_price"){
                $products = Product::
                with('category_product','images')
                ->orderBy('price', 'asc')->get();
            }

            if($sortQuery == "desc_price"){
                $products = Product::
                with('category_product','images')
                ->orderBy('price', 'desc')->get();
            }

            if($sortQuery == "asc_date"){
                $products = Product::
                with('category_product','images')
                ->orderBy('created_at', 'asc')->get();
            }

            if($sortQuery == "desc_date"){
                $products = Product::
                with('category_product','images')
                ->orderBy('created_at', 'desc')->get();
            }

            foreach($products as $product){
                if($lang == "en"){
                    $product->name = $product->name_en;
                    $product->description = $product->description_en;
                }
                for($i=0;$i<count($product['images']);$i++){
                    $img = $product['images'][$i]['img'];
                    $product['images'][$i]['img'] =  url('/image/product/'.$img);
                }
            }

            $msg = ($lang == "ar" ? 'تم العرض بنجاح' : 'Show Successfully');
            return $this->sendResponse($products, $msg , 200);

        }

        if($sortQuery == null && $category_id != null &&  $price == null ){

            $products = Product::get();

            $arr = [];
            foreach($products as $product){

                for($i=0;$i<count($product['category_product']);$i++){
                    if($product['category_product'][$i]['category_id'] == $category_id ){
                         array_push($arr,$product->id);
                    }
                }
            }

            $products = Product::whereIn('id',$arr)->with('category_product','images')->get();           


            foreach($products as $product){
                if($lang == "en"){
                    $product->name = $product->name_en;
                    $product->description = $product->description_en;
                }
                for($i=0;$i<count($product['images']);$i++){
                    $img = $product['images'][$i]['img'];
                    $product['images'][$i]['img'] =  url('/image/product/'.$img);
                }
            }

            $msg = ($lang == "ar" ? 'تم العرض بنجاح' : 'Show Successfully');
            return $this->sendResponse($products, $msg , 200);

        }

        if($sortQuery == null && $category_id == null &&  $price != null ){

            $products = Product::where('price','<',$price)->with('category_product','images')->get();

            foreach($products as $product){
                if($lang == "en"){
                    $product->name = $product->name_en;
                    $product->description = $product->description_en;
                }
                for($i=0;$i<count($product['images']);$i++){
                    $img = $product['images'][$i]['img'];
                    $product['images'][$i]['img'] =  url('/image/product/'.$img);
                }
            }

            $msg = ($lang == "ar" ? 'تم العرض بنجاح' : 'Show Successfully');
            return $this->sendResponse($products, $msg , 200);

        }

        $msg = ($lang == "ar" ? 'لا يوجد معلومات للعرض' : 'No Data Found');
        return $this->sendResponse([], $msg , 200);

    }
 
}
