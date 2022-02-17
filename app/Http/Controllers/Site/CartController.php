<?php


namespace App\Http\Controllers\Site;


use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function index()
    {
        return view('site.cart.index');
    }

    public function add(Request $request)
    {

    }

    public function applyCoupon(Request $request)
    {
        $data = Validator::make(request()->all(), [
            'code' => 'required',
        ]);

        if ($data->fails()) {
            return $this->sendError('Validation Error' , $data->errors());
        }

        $coupon = Coupon::where('code', $request->code)->active()->first();
        if (!$coupon)
            return $this->sendError('Validation Error', trans('site.the_coupon_is_invalid'));

        $order = Order::select('coupon_id')->where('coupon_id', $coupon->id)->get();
        $usage_limit_per_coupon = count($order);

        if (!is_null($coupon->usage_limit_per_coupon) && $coupon->usage_limit_per_coupon <= $usage_limit_per_coupon)
            return $this->sendError('Validation Error', trans('site.usage_limit_per_coupon'));


        return $this->sendResponse((int)$coupon->value,trans('site.success'));
    }
}
