<?php


namespace App\Http\Controllers\Site;
use App\Http\Controllers\Controller;
use App\Models\Faq;


class SiteFaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::get();
        return view('site.faq.index',compact('faqs'));
    }
}
