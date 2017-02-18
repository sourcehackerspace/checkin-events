<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use Crypt;
use App\User;

class SocialiteController extends Controller
{
	/**
	 * Redirect the user to the GitHub authentication page.
	 *
	 * @return Response
	 */
	public function redirectToProvider()
	{
		return Socialite::driver('facebook')->redirect();
	}

	/**
	 * Obtain the user information from GitHub.
	 *
	 * @return Response
	 */
	public function handleProviderCallback()
	{
		$driver = 'facebook';

		$user_social = Socialite::driver($driver)->user();

		$user = User::firstOrNew(['email' => $user_social->email]);

		if(!isset($user->id)){
			$user->name = $user_social->name;
			$user->social_auth = true;
			$user->social_name = $driver;
			$user->social_token = $user_social->token;
			$user->save();
		}

		return redirect()->route('complete.register',['id' => Crypt::encrypt($user->id)]);
	}
}
