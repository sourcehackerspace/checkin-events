<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin/events';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function showLoginForm()
    {
        session()->forget('event');

        session(['login' => true]);

        return view('auth.login');
    }

    protected function credentials(Request $request)
    {
        $credentials = $request->only($this->username(), 'password');
        $credentials['type'] = 'admin';
        return $credentials;
    }

    public function redirectTo()
    {
        if (Auth::user()->type == 'admin') {
            return '/admin/events';
        }
        elseif (Auth::user()->type == 'user'){
            return '/account/events';
        }

        return $this->redirectTo;
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->flush();

        $request->session()->regenerate();

        return redirect()->route('auth.login');
    }
}
