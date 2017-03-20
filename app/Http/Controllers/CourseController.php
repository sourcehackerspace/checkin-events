<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Encryption\DecryptException;
use App\User;
use App\Profile;
use App\Course;
use App\Bookmark;
use Socialite;
use Crypt;
use Validator;
use Mail;
use App\Mail\RegisterSuccess;
use App\Mail\VoucherMail;
use Conekta\Conekta;
use Conekta\Order;

class CourseController extends Controller
{
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

	public function createOrderConekta($slug, $id)
	{
		$course = Course::whereSlug($slug)->first();

		$user = User::find($id);

		Conekta::setApiKey("key_DGMkS6kqqh5aDfezvpzPgw");
		Conekta::setApiVersion("2.0.0");

		return Order::create(
			array(
				"line_items" => array(
					array(
						"name" => "Incripción a curso",
						"description" => "Pago de inscripción a curso: ".$course->name,
						"unit_price" => 50000,
						"quantity" => 1
					)
				),
				"currency" => "MXN",
				"customer_info" => array(
					"name" => $user->name,
					"email" => $user->email,
					"phone" => $user->profile->phone
				),
				"charges" => array(
					array(
						"payment_method" => array(
							"type" => "oxxo_cash"
						)
					)
				)
			)
		);
	}



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

	public function showRegistrationForm($slug, $id)
	{
		$course = Course::whereSlug($slug)->first();

		try {

			$user = User::find(decrypt($id));

		} catch (DecryptException $e) {

			return response()->view('errors.not_found', [], 404);
		}

		$name = $user->name;
		$email = $user->email;

		return view('auth.register', compact('name','email','course'));
	}

	public function register(Request $request, $slug, $id)
	{
		$this->validator($request->all())->validate();

		try {

			$id_decrypt = decrypt($id);

		} catch (DecryptException $e) {

			return response()->view('errors.not_found', [], 404);
		}

		$this->createProfile($id_decrypt, $request->all());

		$bookmark = $this->registerBookmark($slug, $id_decrypt);

		$order = $this->createOrderConekta($slug, $id_decrypt);

		Mail::to($bookmark->user->email)->send(new RegisterSuccess($bookmark));

		Mail::to($bookmark->user->email)->send(new VoucherMail($order));

		return redirect()->route('register.success', compact('slug'));
	}

	public function successRegister($slug)
	{
		$course = Course::whereSlug($slug)->first();

		return view('public.register_success', compact('course'));
	}
}
