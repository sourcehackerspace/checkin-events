<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;
use App\Course;
use App\Bookmark;
use Socialite;
use Crypt;
use Validator;

class CourseController extends Controller
{
	public function listCourses()
	{
		$courses = Course::all();
		return view('public.courses_list', compact("courses"));
	}

	public function registerToCourse($slug)
	{
		$course = Course::whereSlug($slug)->first();

		if ($course->remaining > 0) {
			session(['course' => $course]);
			return view('auth.facebook', compact("course"));
		}

		return view('public.course_full');
	}

	protected function validator(array $data)
	{
		return Validator::make($data, [
			'phone' => 'required',
			'from_name' => 'required'
		]);
	}

	protected function createProfile($id, $data)
	{
		return Profile::updateOrCreate(
			['user_id' => $id],
			['from' => $data['from'], 'from_name' => $data['from_name'], 'phone' => $data['phone']]
			);
	}

	public function showRegistrationForm($slug, $id)
	{
		$course = Course::whereSlug($slug)->first();
		$user = User::find(Crypt::decrypt($id));
		$name = $user->name;
		$email = $user->email;
		return view('auth.register', compact('name','email','course'));
	}

	protected function registerBookmark($slug, $user)
	{
		$course = Course::whereSlug($slug)->first();

		$course->busy ++;
		$course->remaining --;

		$course->save();

		return Bookmark::create([
			'course_id' => $course->id,
			'user_id' => $user
			]);
	}

	public function register(Request $request, $slug, $id)
	{
		$this->validator($request->all())->validate();

		$id_decrypt = Crypt::decrypt($id); // generar una exception para manejar el que quieren modifcar la url

		$this->createProfile($id_decrypt, $request->all());

		$bookmark = $this->registerBookmark($slug, $id_decrypt);

		// envio de correo

		return redirect()->route('register.success', compact('slug'));
	}

	public function successRegister($slug)
	{
		$course = Course::whereSlug($slug)->first();

		return view('public.register_success', compact('course'));
	}
}
