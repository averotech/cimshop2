<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    use AuthenticatesUsers;


    public function showLogin()
    {
        return view('auth.login');
    }

    //Login
    public function login(Request $request)
    {

        $data = Validator::make(request()->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);


        if ($data->fails()) {
            session()->flash('alert_error_msg', $data->errors()->first());
            return Redirect::to(route('auth.login'));
        }

        $data_auth = [
            'email' => $request->email,
            'password' => $request->password
        ];

        $user = User::where('email', request()->email)->first();
        if ($user) {

            if (auth()->attempt($data_auth)) {
                Auth::login($user);
                return redirect(route('admin.dashboard.index'));
            } else {
                session()->flash('alert_error_msg', 'الرجاء التأكد من كلمة المرور');
                return Redirect::to(route('auth.login'));
            }
        } else {
            session()->flash('alert_error_msg', 'الرجاء التأكد من اسم المستخدم');
            return Redirect::to(route('auth.login'));
        }
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect()->route('site.index');
    }
}
