<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Controllers\Api\BaseController as BaseController;
use App\Models\Advert;
use App\Models\StoryImage;


class AdvertController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($lang)
    {
        $adverts = Advert::get();
        if(count($adverts)>0){

            if($lang == "en"){
                foreach($adverts as $advert){
                    $advert->title = $advert->title_en;

                    if($advert->img){
                      $advert['img'] =  url('/image/adverts/'.$advert->img);      
                    }else{
                      $advert['img'] =  $user->photo;     
                    } 

                }
            }

            $msg = ($lang == "ar" ? 'تم العرض بنجاح' : 'Show Successfully');
            return $this->sendResponse($adverts, $msg , 200);
        }else{
            $msg = ($lang == "ar" ? 'لا يوجد داتا حتى الان' : 'No Data Found Yet' );
            return $this->sendResponse($adverts, $msg , 200);
        }
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
    public function store(Request $request)
    {
        //
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
