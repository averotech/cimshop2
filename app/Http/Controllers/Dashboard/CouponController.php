<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Category;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons = Coupon::all();
        return view('coupons.show',['coupons' => $coupons]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('coupons.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Validator::make(request()->all(), [
            'name' => 'required|string|max:300',
            'code' => 'required|string|max:300',
            'discount' => 'required',
            'is_active' => 'required',
        ]);


        if($data->fails()){
            session()->flash('alert_error_msg' ,  $data->errors()->first());
            return back();
        }


        $coupon = Coupon::create([
            'name' => request()->name,
            'code' => request()->code,
            'value' => request()->discount,
            'is_active' => request()->is_active,
        ]);

        session()->flash('alert_success_msg' ,  'تم إضافة الكوبون بنجاح');
        return \Redirect::to(route('admin.coupon.index'));
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
        $coupon = Coupon::where('id',$id)->first();
        return view('coupons.edit',['coupon'=>$coupon]);
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
            'name' => 'required|string|max:300',
            'code' => 'required|string|max:300',
            'discount' => 'required',
            'is_active' => 'required',
        ]);


        if($data->fails()){
            session()->flash('alert_error_msg' ,  $data->errors()->first());
            return back();
        }

        $coupon = Coupon::where('id',$id)->update([
            'name' => request()->name,
            'code' => request()->code,
            'value' => request()->discount,
            'is_active' => request()->is_active,
        ]);

        session()->flash('alert_success_msg' ,  'تم تعديل الكوبون  بنجاح');
        return \Redirect::to(route('admin.coupon.index'));     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $coupon = Coupon::where('id',$id)->first();
        $coupon->delete();
        session()->flash('alert_success_msg' , 'تم الحذف بنجاح');
        return back();
    }
}
