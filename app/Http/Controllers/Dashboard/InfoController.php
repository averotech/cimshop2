<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\About;
use App\Models\StoryImage;
use Carbon\Carbon;

class InfoController extends Controller
{
    //Show Info Of Website
    public function show(){
        $info = About::first();
        $images = StoryImage::all();
        if($info){
            return view('infos.show',['info' => $info,'images'=>$images]);
        }else{
            return view('infos.show',['info' => $info ,'images'=>$images]);
        }
    }

    //Add Or Edit Info Of Website
    public function add(){
        //dd(request()->file('video'));
        $data = Validator::make(request()->all(), [
            'about_us' => 'required',
            'about_us_en' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'facebook_link' => 'required',
            'whatsapp_link' => 'required',
            'lng' => 'nullable',
            'lat' => 'nullable',
         ], $messages = [
            'required' => 'مطلوب :attribute حقل الـ',
        ]);


         if($data->fails()){
            session()->flash('alert_error_msg' ,  $data->errors()->first());
            return view('infos.show');
        }

        $info = About::first();

        if($info){
            About::where('id',$info->id)->update([
                'about_us' => request()->about_us,
                'about_us_en' => request()->about_us_en,
                'email' => request()->email,
                'phone' => request()->phone,
                'website' => request()->website,
                'address' => request()->address,
                'facebook_link' => request()->facebook_link,
                'whatsapp_link' => request()->whatsapp_link,
                'google_map' => request()->google_map,
                'lng' => request()->lng ? request()->lng : '-118.21835144999999',
                'lat' => request()->lat ? request()->lat : '34.181573908322854',
            ]);

        }else{
            About::create([
                'about_us' => request()->about_us,
                'about_us_en' => request()->about_us_en,
                'email' => request()->email,
                'website' => request()->website,
                'address' => request()->address,
                'phone' => request()->phone,
                'facebook_link' => request()->facebook_link,
                'whatsapp_link' => request()->whatsapp_link,
                'google_map' => request()->google_map,
                'lng' => '-118.21835144999999',
                'lat' => '34.181573908322854',
            ]);
        }

        //Stote Images
        $imgs = request()->file('imageFile');
        if($imgs){

            for($i=0;$i<count($imgs);$i++){
              if($imgs[$i] != null){

                  $file = $imgs[$i];
                  $fileName = $file->hashName();

                  StoryImage::create([
                      'img' => $fileName,
                  ]);

                  $file->store('story',['disk'=>'image']); //Store Img On Disk

              }
            }
        }

        //To Get Deleted Images Count
        $del_imgs_str = request()->del_imgs;
        $del_imgs_arr = explode (",", $del_imgs_str);
        $del_imgs_count = count($del_imgs_arr);
        // dd($del_imgs_arr);
        if($del_imgs_count){

          for($i=0;$i<$del_imgs_count;$i++){
             $img = StoryImage::where('id', $del_imgs_arr[$i])->first();
                 if($img){
                 //Delete Old Image
                 if(\Storage::disk('image')->exists(('story/'.$img->img))){
                      \Storage::disk('image')->delete('story/'.$img->img);
                 }

                 StoryImage::where('id', $img->id)->delete();
                 }
         }

       }


        $info = About::first();

        //Upload Video
        //if(request()->hasFile('video')){
        if(request()->video){

            $info = About::first();

            //Delete Old
            if(\Storage::disk('video')->exists(($info->video))){
                \Storage::disk('video')->delete($info->video);
            }

            //Store New
            //$path = request()->file('video')->store('about', ['disk' =>'video']);
            $path = request()->video->store('about', ['disk' =>'video']);
            About::where('id',$info->id)->update([
                'video' => $path
            ]);
        }

        session()->flash('alert_success_msg' ,  'تم تعديل معلومات الموقع بنجاح');
        return \Redirect::to(route('admin.website_info.index'));
    }

}
