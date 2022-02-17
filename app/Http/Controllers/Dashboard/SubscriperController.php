<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Subscriper;

class SubscriperController extends Controller
{
    //Show Subscripers
    public function showsubscripers(){
        $subscripers = Subscriper::all();
        return view('subscripers.show',['subscripers' => $subscripers]); 
    }

    public function destroy($id)
    {
        $subscriper = Subscriper::where('id',$id)->first();
        $subscriper->delete();
         session()->flash('alert_success_msg' , 'تم الحذف بنجاح');
         return back();
    }
}
