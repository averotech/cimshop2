<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Api\BaseController as BaseController;

use App\Models\Message;

class MessageController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'name' => 'required|string|max:300',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
         ], $messages = [
            'required' => 'مطلوب :attribute حقل الـ',
        ]);
        
             
        if($data->fails()){
            return $this->sendError('Validation Error', $data->errors());       
        }
        
        $message = Message::create([
            'name' => request()->name,
            'email' => request()->email,
            'subject' => request()->subject,
            'message' => request()->message
        ]);
        $msg = ($lang == "ar" ? 'تم الإرسال بنجاح' : 'Send Successfully');
        return $this->sendResponse($message, $msg , 200);
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
    public function destroy($id)
    {
        //
    }
}
