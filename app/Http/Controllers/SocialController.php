<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use Crypt;
use App\User;
use App\Bookmark;

class SocialController extends Controller
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

		try {

			$user_social = Socialite::driver($driver)->user();

		} catch (\Exception $e) {

            return back()->with('error', 'Hubo un error, por favor vuelve a registrarte.');
        }

		// dd($user_social); 

		$user = User::firstOrNew(['email' => $user_social->email]);

		if (!isset($user->id)) {

			$user->name = $user_social->name;
			$user->social_auth = true;
			$user->social_name = $driver;
			$user->social_token = $user_social->token;
			$user->save();
		}


		if (session()->has('course')) {

			$course = session('course');

			if (Bookmark::where('user_id', $user->id)->where('course_id', $course->id)->count() > 0) {

				return back()->with('error','Ya estas registrado a este curso.');
			}
			
			session()->forget('course');

			return redirect()->route('complete.register',['slug' => $course->slug, 'id' => Crypt::encrypt($user->id)]);
		} else {

			return back()->with('error','Hubo un error, por favor vuelve a registrarte.');
		}

	}
}
