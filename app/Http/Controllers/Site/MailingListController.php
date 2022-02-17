<?php


namespace App\Http\Controllers\Site;


use App\Http\Controllers\Controller;
use App\Models\Subscriper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MailingListController extends Controller
{
    public function store(Request $request)
    {
        $data = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);

        if ($data->fails()) {
            return $this->sendError('Validation Error', $data->errors());
        }

        $subscriper = Subscriper::create([
            'email' => $request->email
        ]);

        $msg = $subscriper ? trans('site.success') : trans('site.error');
        $code = $subscriper ? 200 : 422;

        return $this->sendResponse($subscriper, $msg, $code);
    }
}
