<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Advert;
use Carbon\Carbon;

class AdvertController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adverts = Advert::all();
        return view('adverts.show',['adverts' => $adverts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adverts.add');
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
            'title' => 'required',
            'title_en' => 'required',
            'img' => 'required',
            'link' => 'nullable',

         ], $messages = [
            'required' => 'مطلوب :attribute حقل الـ',
        ]);


         if($data->fails()){
            session()->flash('alert_error_msg' ,  $data->errors()->first());
            return back();
        }


        $advert = Advert::create([
            'title' => request()->title,
            'title_en' => request()->title_en,
            'link' => request()->link ? request()->link : null,
        ]);


         //Store Img Of Profile
         $img_file = request()->file('img');

         if($img_file){//New Img

           //Store New img
           $name = request()->file('img')->getClientOriginalName();

           $fileV = request()->file('img');
           $fileName = $fileV->hashName();
           $fileV->store('adverts', ['disk' => 'image']);

           Advert::where('id',$advert->id)->update([
               'img' => $fileName,
           ]);

         }


        session()->flash('alert_success_msg' ,  'تم إضافة الإعلان بنجاح');
        return \Redirect::to('adverts');
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
       $advert = Advert::where('id',$id)->first();
       return view('adverts.edit',['advert'=>$advert]);
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
            'title' => 'required',
            'title_en' => 'required',
            'img' => 'nullable',
            'link' => 'nullable',

         ], $messages = [
            'required' => 'مطلوب :attribute حقل الـ',
        ]);


         if($data->fails()){
            session()->flash('alert_error_msg' ,  $data->errors()->first());
            return back();
        }


        $advert = Advert::where('id',$id)->update([
            'title' => request()->title,
            'title_en' => request()->title_en,
            'link' => request()->link ? request()->link : null,
        ]);

        //Store Img Of Profile
        $img_file = request()->file('img');
        $img_text = request()->img;

        $advert = Advert::where('id',$id)->first();

        if($img_file){//New Img

             //Delete Old Image
             if(\Storage::disk('image')->exists(('adverts/'.$advert->img))){
                \Storage::disk('image')->delete('adverts/'.$advert->img);
             }

            //Store New img
            $name = request()->file('img')->getClientOriginalName();

            $fileV = request()->file('img');
            $fileName = $fileV->hashName();
            $fileV->store('adverts', ['disk' => 'image']);

            Advert::where('id',$id)->update([
                'img' => $fileName,
            ]);

        }

        session()->flash('alert_success_msg' ,  'تم إضافة الإعلان بنجاح');
        return \Redirect::to(route('admin.advert.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $advert = Advert::where('id',$id)->first();
        $advert->delete();
        session()->flash('alert_success_msg' , 'تم الحذف بنجاح');
        return back();
    }
}
