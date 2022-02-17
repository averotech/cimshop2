<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Item;
use Carbon\Carbon;


class ItemController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();
        return view('items.show',['items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('items.add');
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
            'description' => 'required',
            'description_en' => 'required',
         ], $messages = [
            'required' => 'مطلوب :attribute حقل الـ',
        ]);


         if($data->fails()){
            session()->flash('alert_error_msg' ,  $data->errors()->first());
            return back();
        }


        $item = Item::create([
            'title' => request()->title,
            'title_en' => request()->title_en,
            'description' => request()->description,
            'description_en' => request()->description_en,
        ]);

        session()->flash('alert_success_msg' ,  'تم إضافة العنصر بنجاح');
        return \Redirect::to(route('admin.item.index'));
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
       $item = Item::where('id',$id)->first();
       return view('items.edit',['item'=>$item]);
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
            'description' => 'required',
            'description_en' => 'required',
         ], $messages = [
            'required' => 'مطلوب :attribute حقل الـ',
        ]);


         if($data->fails()){
            session()->flash('alert_error_msg' ,  $data->errors()->first());
            return back();
        }

        $item = Item::where('id',$id)->update([
            'title' => request()->title,
            'title_en' => request()->title_en,
            'description' => request()->description,
            'description_en' => request()->description_en,
        ]);

         session()->flash('alert_success_msg' ,  'تم تعديل العنصر  بنجاح');
        return \Redirect::to(route('admin.item.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::where('id',$id)->first();
        $item->delete();
        session()->flash('alert_success_msg' , 'تم الحذف بنجاح');
        return back();
    }
}
