<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

use App\Models\Order;
use App\Models\Message;
use App\Models\Product;
use App\Models\Notifi;
use Carbon\Carbon;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
         //count Produts
         $products_count = Product::count();

         //count Orders
         $orders_count = Order::count();

         //count Messages
         $msgs_count = Message::count();

        return view('orders.show',['orders' => $orders,
                                    'products_count' => $products_count,
                                    'orders_count' => $orders_count,
                                    'msgs_count' => $msgs_count
                                 ]);
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
        $order = Order::where('id',$id)->first();
        return view('orders.edit',['order' => $order]);
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
        $data = Validator::make(request()->all(), [
            'status' => 'required'
         ], $messages = [
            'required' => 'مطلوب :attribute حقل الـ',
        ]);

        if($data->fails()){
            session()->flash('alert_error_msg' ,  $data->errors()->first());
            return back();
        }

        //Edit Order
         Order::where('id',$id)->update([
            'status' => request()->status
        ]);

        //Send Notification
        Notifi::create([
            'title'=>'تغيير حالة',
            'msg'=>'تم تغيير حالة الطلب   ' .$id ,
            'order_id'=> $id ,
        ]);

        session()->flash('alert_success_msg' , 'تم تعديل حالة الطلب بنجاح');
        return Redirect::to(route('admin.order.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::where('id',$id)->first();
        $order->delete();
        session()->flash('alert_success_msg' , 'تم الحذف بنجاح');
        return back();
    }
}
