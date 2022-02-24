<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Size;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sizes = Size::all();
        return view('sizes.show', ['sizes' => $sizes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sizes.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Validator::make(request()->all(), [
            'name' => 'required|string|max:300',
            'name_en' => 'required|string|max:300',
        ], $messages = [
            'required' => 'مطلوب :attribute حقل الـ',
        ]);


        if ($data->fails()) {
            session()->flash('alert_error_msg', $data->errors()->first());
            return back();
        }
        //Add Product
        $size = Size::create([
            'name' => request()->name,
            'name_en' => request()->name_en,
        ]);

        session()->flash('alert_success_msg', 'تم إضافة المنتج بنجاح');
        return \Redirect::to(route('admin.size.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $size = Size::where('id', $id)->first();
        return view('sizes.details', ['size' => $size]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $size = Size::where('id', $id)->first();

        return view('sizes.edit', ['size' => $size]);
    }

    public function update(Request $request, $id)
    {
        $data = Validator::make(request()->all(), [
            'name' => 'required|string|max:300',
            'name_en' => 'required|string|max:300',
        ], $messages = [
            'required' => 'مطلوب :attribute حقل الـ',
        ]);


        if ($data->fails()) {
            session()->flash('alert_error_msg', $data->errors()->first());
            return back();
        }

        //Add Product
        Size::where('id', $id)->update([
            'name' => request()->name,
            'name_en' => request()->name_en,
        ]);

        session()->flash('alert_success_msg', 'تم تعديل الحجم بنجاح');
        return \Redirect::to(route('admin.size.index'));
    }

    public function destroy($id)
    {
        $size = Size::where('id', $id)->first();
        $size->delete();
        session()->flash('alert_success_msg', 'تم الحذف بنجاح');
        return back();

    }
}
