<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Category;
use Carbon\Carbon;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('categories.show',['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.add');
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
            'name_en' => 'required|string|max:300',
            'description' => 'required',
            'description_en' => 'required',
         ], $messages = [
            'required' => 'مطلوب :attribute حقل الـ',
        ]);


         if($data->fails()){
            session()->flash('alert_error_msg' ,  $data->errors()->first());
            return back();
        }


        $category = Category::create([
            'name' => request()->name,
            'name_en' => request()->name_en,
            'description' => request()->description,
            'description_en' => request()->description_en,
        ]);

        session()->flash('alert_success_msg' ,  'تم إضافة التصنيف بنجاح');
        return \Redirect::to(route('admin.category.index'));
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
       $category = Category::where('id',$id)->first();
       return view('categories.edit',['category'=>$category]);
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
            'name_en' => 'required|string|max:300',
            'description' => 'required',
            'description_en' => 'required',
         ], $messages = [
            'required' => 'مطلوب :attribute حقل الـ',
        ]);


         if($data->fails()){
            session()->flash('alert_error_msg' ,  $data->errors()->first());
            return back();
        }

        $category = Category::where('id',$id)->update([
            'name' => request()->name,
            'name_en' => request()->name_en,
            'description' => request()->description,
            'description_en' => request()->description_en,
        ]);

         session()->flash('alert_success_msg' ,  'تم تعديل التصنيف  بنجاح');
        return \Redirect::to(route('admin.category.index'));     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::where('id',$id)->first();
        $category->delete();
         session()->flash('alert_success_msg' , 'تم الحذف بنجاح');
         return back();
    }
}
