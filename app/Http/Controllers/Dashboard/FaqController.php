<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Faq;
use Carbon\Carbon;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqs = Faq::all();
        return view('faqs.show',['faqs' => $faqs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('faqs.add');
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
            'question' => 'required|string|max:300',
            'question_en' => 'required|string|max:300',
            'answer' => 'required',
            'answer_en' => 'required',
         ], $messages = [
            'required' => 'مطلوب :attribute حقل الـ',
        ]);


         if($data->fails()){
            session()->flash('alert_error_msg' ,  $data->errors()->first());
            return back();
        }


        $category = Faq::create([
            'question' => request()->question,
            'question_en' => request()->question_en,
            'answer' => request()->answer,
            'answer_en' => request()->answer_en,
        ]);

        session()->flash('alert_success_msg' ,  'تم إضافة السؤال بنجاح');
        return \Redirect::to(route('admin.faq.index'));
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
        $faq = Faq::where('id',$id)->first();
        return view('faqs.edit',['faq'=>$faq]);
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
            'question' => 'required|string|max:300',
            'question_en' => 'required|string|max:300',
            'answer' => 'required',
            'answer_en' => 'required',
         ], $messages = [
            'required' => 'مطلوب :attribute حقل الـ',
        ]);


         if($data->fails()){
            session()->flash('alert_error_msg' ,  $data->errors()->first());
            return back();
        }


        $faq = Faq::where('id',$id)->update([
            'question' => request()->question,
            'question_en' => request()->question_en,
            'answer' => request()->answer,
            'answer_en' => request()->answer_en,
        ]);

        session()->flash('alert_success_msg' ,  'تم تعديل السؤال بنجاح');
        return \Redirect::to(route('admin.faq.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $faq = Faq::where('id',$id)->first();
        $faq->delete();
        session()->flash('alert_success_msg' , 'تم الحذف بنجاح');
        return back();
    }
}
