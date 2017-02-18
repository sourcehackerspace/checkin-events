<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Profile;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Socialite;
use Crypt;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'phone' => 'required',
            'from_name' => 'required'
        ]);
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm($id)
    {
        $user = User::find(Crypt::decrypt($id));
        $name = $user->name;
        $email = $user->email;
        return view('auth.register', compact('name','email'));
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email']
        ]);
    }

    public function register(Request $request, $id)
    {
        $this->validator($request->all())->validate();

        // event(new Registered($user = $this->create($request->all())));

        // $this->guard()->login($user);

        $profile = Profile::updateOrCreate(
            ['user_id' => Crypt::decrypt($id)],
            ['from' => $request->input('from'), 'from_name' => $request->input('from_name'), 'phone' => $request->input('phone')]
            );

        return $profile;
    }
}
