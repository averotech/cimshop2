<?php


namespace App\Http\Controllers\Site;


use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactUSController extends Controller
{
    public function index()
    {
        $items = Item::get();

        return view('site.contact-us.index',compact('items'));
    }

    public function store(Request $request)
    {
        $data = Validator::make($request->all(), [
            'name' => 'required|string|max:300',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);


        if($data->fails()){
            return $this->sendError('Validation Error', $data->errors());
        }

        $message = Message::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message
        ]);

        $msg = $message ? trans('site.success') : trans('site.error');
        $code = $message ? 200 : 422;
        return $this->sendResponse($message, $msg, $code);
    }
}
