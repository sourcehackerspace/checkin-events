<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Encryption\DecryptException;
use App\User;
use App\Profile;
use App\Event;
use App\Bookmark;
use Socialite;
use Crypt;
use Validator;
use Mail;
use App\Mail\RegisterSuccess;
use App\Mail\VoucherMail;
use Conekta\Conekta;
use Conekta\Order;

class EventController extends Controller
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
		$event = Event::whereSlug($slug)->first();

		$event->busy ++;
		$event->remaining --;

		$event->save();

		return Bookmark::create([
				'event_id' => $event->id,
				'user_id' => $user
			]);

	}

	public function createOrderConekta($slug, $id)
	{
		$event = Event::whereSlug($slug)->first();

		$user = User::find($id);

		Conekta::setApiKey("key_DGMkS6kqqh5aDfezvpzPgw");
		Conekta::setApiVersion("2.0.0");

		return Order::create(
			array(
				"line_items" => array(
					array(
						"name" => "Incripción a curso",
						"description" => "Pago de inscripción a evento: ".$event->title,
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



	public function listEvents()
	{
		$events = Event::all();

		return view('public.events_list', compact("events"));
	}

	public function registerToEvent($slug)
	{
		$event = Event::whereSlug($slug)->first();

		if ($event->remaining > 0) {
			
			session(['event' => $event]);

			return view('public.event_show', compact("event"));
		}

		return view('public.event_full');
	}

	public function showRegistrationForm($slug, $id)
	{
		$event = Event::whereSlug($slug)->first();

		try {

			$user = User::find(decrypt($id));

		} catch (DecryptException $e) {

			return response()->view('errors.not_found', [], 404);
		}

		$name = $user->name;
		$email = $user->email;

		return view('public.complete_register', compact('name','email','event'));
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
		$course = Event::whereSlug($slug)->first();

		return view('public.register_success', compact('course'));
	}
}
