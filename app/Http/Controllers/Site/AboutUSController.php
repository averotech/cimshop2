<?php


namespace App\Http\Controllers\Site;
use App\Http\Controllers\Controller;
use App\Models\StoryImage;


class AboutUSController extends Controller
{
    public function index()
    {
        $images = StoryImage::get();
        return view('site.about-us.index',compact('images'));
    }
}
