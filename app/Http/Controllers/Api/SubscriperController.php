<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Api\BaseController as BaseController;

use App\Models\Subscriper;

class SubscriperController extends BaseController
{
    //Subscripe
    public function subscripe($lang){
        $data = Validator::make(request()->all(), [
            'email' => 'required|email',
         ], $messages = [
            'required' => 'مطلوب :attribute حقل الـ',
        ]);

        if($data->fails()){
            return $this->sendError('Validation Error', $data->errors());
        }

        $subscriper = Subscriper::create([
            'email'=>request()->email
        ]);

        $msg = ($lang == "ar" ? 'تم الاشتراك بنجاح' : 'Successfully Subscripe');
        return $this->sendResponse($subscriper, $msg , 200);


    }

}
