<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Api\BaseController as BaseController;

use App\Models\Cart;
use App\Models\Order;
use App\Models\DetailsOrder;
use App\Models\Notifi;

class CartController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($lang)
    {
        $carts = Session()->get('cart');
        if(is_array(Session()->get('cart')) or is_object(Session()->get('cart'))) {
            foreach (Session()->get('cart') as $index => $cart) {
                
                if($cart['quantity'] == 0) {
                    unset($carts[$index]);
                }

                $product = session()->forget('cart', $cart['id']);
            }
            if(!empty($carts)) {
                session()->put('cart', $carts);
            }
            
        }
        // dd(Session()->get('cart'));
        $msg = ($lang == "ar" ? 'تم العرض بنجاح' : 'Show Successfully');
        return $this->sendResponse($carts, $msg , 200);
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
    public function store(Request $request,$lang)
    {
        $data = Validator::make(request()->all(), [
            //'client' => 'required',
            'product_id' => 'required',
            //'quantity' => 'required',
         ], $messages = [
            'required' => 'مطلوب :attribute حقل الـ',
        ]);
            
        if($data->fails()){
            return $this->sendError('Validation Error', $data->errors());       
        }
        
        //Get Session Of User In Browser
        $cart = session()->get('cart');

        $product = Product::where('id',request()->product_id)->first();
        if(!$product){
            $msg = ($lang == "ar" ? 'المنتج غير موجود' : 'Id Not Found');
            return $this->sendResponse([], $msg , 200);
        }

          // If Cart is empty then this the first product
          if(!$cart) {

            //Index Of Cart
            $i = 0;
                $cart = [
                    $i => [
                        "id" => $product->id,
                        "name" =>  $lang == "ar" ? $product->name : $product->name_en,
                        "quantity" => 1,
                        //'product_id' => $product->id,
                        "sku" => $product->sku,
                        "price" => $product->price ,
                        "product_description" => $lang == "ar" ?  $product->description : $product->description_en
                    ]
                ];            
                  session(['cart' => $cart]);
                  $msg = ($lang == "ar" ? 'تم الإضافة بنجاح' : 'Added Successfully');
                  return $this->sendResponse($cart, $msg , 200);

          }


        // if cart not empty then check if this product exist then increment quantity
        if(is_array(Session()->get('cart')) or is_object(Session()->get('cart'))) {
            foreach (Session()->get('cart') as  $cart) {
                if($cart['id'] == request()->product_id){

                    $cart['quantity']++;
                   // $cart['id']= request()->product_id;
                    session(['cart' => $cart]);
                    $msg = ($lang == "ar" ? 'تم الإضافة بنجاح' : 'Added Successfully');
                    return $this->sendResponse($cart, $msg , 200);
                }
            }
        }


        // if item not exist in cart then add to cart with quantity = 1
        $count_product_in_cart = count($cart);
        $i = $count_product_in_cart;
        $cart[$i] = [
            "id" => $product->id,
            "name" =>  $lang == "ar" ? $product->name : $product->name_en,
            "quantity" => 1,
            "sku" => $product->sku,
            "price" => $product->price ,
            "product_description" => $lang == "ar" ?  $product->description : $product->description_en
        ];

        session(['cart' => $cart]);
        $msg = ($lang == "ar" ? 'تم الإضافة بنجاح' : 'Added Successfully');
        return $this->sendResponse($cart, $msg , 200);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function remove($id,$lang)
    {
         //dd(session()->get('cart'));
         $product = session()->forget('cart', $id)->first();
         $msg = ($lang == "ar" ? 'تم إزالة المنتج بنجاح' : 'Remove From Cart Successfully');
         return $this->sendResponse([], $msg , 200);
    }


    //Down Count Of Product In Cart
    public function downQtyProductInTheCart(Request $request,$lang)
    {
        $data = Validator::make(request()->all(), [
            'product_id' => 'required',
         ], $messages = [
            'required' => 'مطلوب :attribute حقل الـ',
        ]);
            
        if($data->fails()){
            return $this->sendError('Validation Error', $data->errors());       
        }

        //Get Cart
        $carts = session()->get('cart');
        
        if(is_array(Session()->get('cart')) or is_object(Session()->get('cart'))) {
            foreach ($carts as  $cart) {
                if($cart['id'] == request()->product_id){
                    $cart['quantity']--;
                    session()->put('cart', $cart);
                    $msg = ($lang == "ar" ? 'تم إنقاص العدد بنجاح' : 'Count Down Successfully');
                    return $this->sendResponse([], $msg , 200);
                }
            }
        }

    }

    //Up Count Of Product In Cart
    public function upQtyProductInTheCart(Request $request,$lang)
    {
        $data = Validator::make(request()->all(), [
            'product_id' => 'required',
         ], $messages = [
            'required' => 'مطلوب :attribute حقل الـ',
        ]);
            
        if($data->fails()){
            return $this->sendError('Validation Error', $data->errors());       
        }

        //Get Cart
        $carts = session()->get('cart');

        $product = Product::where('id',request()->product_id)->first();
        
        if(is_array(Session()->get('cart')) or is_object(Session()->get('cart'))) {
            foreach ($carts as  $cart) {
                if($cart['id'] == request()->product_id){
                    $cart['quantity']++;

                    //Check If Quantity Greater Than Product Quantity
                    // if($cart['quantity'] > $product->quantity){
                    //     $msg = ($lang == "ar" ? 'كمية المنتج غير متوفرة' : 'Quantity Of Product Not Found');
                    //     return $this->sendResponse([], $msg , 200);
                    // }

                    session()->put('cart', $cart);
                    $msg = ($lang == "ar" ? 'تم زيادة العداد بنجاح' : 'Count Up Successfully');
                    return $this->sendResponse([], $msg , 200);
                }
            }
        }
    }

    
    //Remove All Cart
    public function destroy($lang)
    {
         session()->forget('cart');
         $msg = ($lang == "ar" ? 'تم إزالة السلة بنجاح' : 'Remove Cart Successfully');
         return $this->sendResponse([], $msg , 200);
    }


    //Confirm Order
    public function confirmOrder($lang){
       
        $data = Validator::make(request()->all(), [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'product_id' => 'required',
            'quantity' => 'required',
            'colors' => 'required',
            'note' => 'nullable'
         ], $messages = [
            'required' => 'مطلوب :attribute حقل الـ',
        ]);
            
        if($data->fails()){
            return $this->sendError('Validation Error', $data->errors());       
        }

        $product_ids = request()->product_id;
        $quantities = request()->quantity;
        $colors = request()->colors;
      
        if( count($product_ids) >0 && count($quantities)>0 && count($colors)>0){
             
            //Create New Order
            $order = Order::create([
                'name' => request()->name,
                'phone' => request()->phone,
                'email' => request()->email,
                'status' => "pending",
                'note' =>  request()->note ? request()->note : null ,
            ]);

            for($i=0;$i<count($product_ids);$i++){
                DetailsOrder::create([
                    'order_id' => $order->id,
                    'product_id' => $product_ids[$i],
                    'quantity' => $quantities[$i],
                    'color' => $colors[$i],
                ]);
            }
        }

        //Send Notification
        Notifi::create([
            'title'=>'طلب جديد',
            'msg'=>'تم وصول الطلب  ' .$order->id ,
            'order_id'=>$order->id ,
        ]);
       
        
        $order = Order::where('id',$order->id)->with('details.product')->first();

        $msg = ($lang == "ar" ? 'تم تأكيد عملية الشراء بنجاح' : 'Confirm Order Successfully');
        return $this->sendResponse($order, $msg , 200);

    }


}
