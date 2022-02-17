<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App;
use App\Models\Message;
use App\Models\Order;
use App\Models\Product;
use App\Models\Notifi;

class ReportController extends Controller
{
    //Show All
    public function index(){

          //count Produts
          $products_count = Product::count();

          //count Orders
          $orders_count = Order::count();

          //count Messages
          $msgs_count = Message::count();

        return view('welcome',[
                        'products_count' => $products_count,
                        'orders_count' => $orders_count,
                        'msgs_count' => $msgs_count,
                        ]);
    }

     //Change To Arabic
   public function changeLangeAr(){

        $lang = "ar";
        App::setLocale($lang);
        session()->put('locale', $lang);
    // dd(session('locale'));
        return redirect()->back();
    }

    //Change To Arabic
   public function siteChangeLangeAr(){

        $lang = "ar";
        App::setLocale($lang);
        session()->put('locale', $lang);
    // dd(session('locale'));
        return redirect()->back();
    }


    //Change To Arabic
    public function changeLangeEn(){

        $lang = "en";
        App::setLocale($lang);
        session()->put('locale', $lang);
        //dd(session('locale'));
        return redirect()->back();
    }

    //Change To Arabic
    public function siteChangeLangeEn(){

        $lang = "en";
        App::setLocale($lang);
        session()->put('locale', $lang);
        //dd(session('locale'));
        return redirect()->back();
    }

    public function showNotifications(){
        $notifications = Notifi::all();
        return view('notification.show',[
            'notifications' => $notifications,
            ]);
    }

    public function destroy($id)
    {
        $notifi = Notifi::where('id',$id)->first();
        $notifi->delete();
         session()->flash('alert_success_msg' , 'تم الحذف بنجاح');
         return back();
    }


}
