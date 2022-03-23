<?php


namespace App\Http\Controllers\Dashboard;


use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        return view('sliders.index', compact('sliders'));
    }

    public function create()
    {
        return view('sliders.add');
    }

    public function store(Request $request)
    {
        $data = Validator::make(request()->all(), [
            'title' => 'required|string|max:300',
            'title_en' => 'required|string|max:300',
            'description' => 'required',
            'description_en' => 'required',
            'image' => 'nullable',
            'video' => 'nullable',
        ], $messages = [
            'required' => 'مطلوب :attribute حقل الـ',
        ]);


        if ($data->fails()) {
            session()->flash('alert_error_msg', $data->errors()->first());
            return back();
        }

        $fileName = null;
        if ($request->has('imageFile')) {
            $file = $request->file('imageFile');
            $fileName = $file->hashName();
            $file->store('sliders', ['disk' => 'image']); //Store Img On Disk
        }

        $videoName = null;
        if ($request->has('video')) {
            $video = $request->file('video');
            $videoName = $video->hashName();
            $video->store('sliders', ['disk' => 'image']); //Store Img On Disk
        }


        Slider::create([
            'title' => $request->title,
            'title_en' => $request->title_en,
            'description' => $request->description,
            'description_en' => $request->description_en,
            'image' => $fileName,
            'video' => $videoName,
        ]);

        session()->flash('alert_success_msg', 'تم إضافة السلايدر بنجاح');
        return \Redirect::to(route('admin.slider.index'));
    }

    public function edit($id)
    {
        $slider = Slider::where('id', $id)->first();
        return view('sliders.edit', ['slider' => $slider]);
    }

    public function update(Request $request, $id)
    {
        $data = Validator::make(request()->all(), [
            'title' => 'required|string|max:300',
            'title_en' => 'required|string|max:300',
            'description' => 'required',
            'description_en' => 'required',
            'image' => 'nullable',
            'video' => 'nullable',
        ], $messages = [
            'required' => 'مطلوب :attribute حقل الـ',
        ]);


        if ($data->fails()) {
            session()->flash('alert_error_msg', $data->errors()->first());
            return back();
        }
        $slider = Slider::find($id);

        $fileName = $slider->image;
        if ($request->has('imageFile')) {
            $file = $request->file('imageFile');
            $fileName = $file->hashName();
            $file->store('sliders', ['disk' => 'image']); //Store Img On Disk
        }

        $videoName = $slider->video;
        if ($request->has('video')) {
            $video = $request->file('video');
            $videoName = $video->hashName();
            $video->store('sliders', ['disk' => 'image']); //Store Img On Disk
        }

        $slider->update([
            'title' => $request->title,
            'title_en' => $request->title_en,
            'description' => $request->description,
            'description_en' => $request->description_en,
            'image' => $fileName,
            'video' => $videoName,
        ]);

        session()->flash('alert_success_msg', 'تم تعديل السلايدر بنجاح');
        return \Redirect::to(route('admin.slider.index'));
    }

    public function destroy($id)
    {
        $slider= Slider::where('id', $id)->first();
        $slider->delete();
        session()->flash('alert_success_msg', 'تم الحذف بنجاح');
        return back();
    }
}
