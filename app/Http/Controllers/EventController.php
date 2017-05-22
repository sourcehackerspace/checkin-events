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

	protected function registerBookmark($slug, $user, $ntickets)
	{
		$total = 0;

		$event = Event::whereSlug($slug)->first();

		$event->busy + $ntickets;
		$event->remaining - $ntickets;

		$event->save();

		if(!$event->isfree){
			$total = $ntickets * $event->cost;
		}

		return Bookmark::create([
				'event_id' => $event->id,
				'user_id' => $user,
				'quantity' => $ntickets,
				'payment' => $total,
			]);

	}

	public function createOrderConekta($slug, $id, $ntickets)
	{
		$event = Event::whereSlug($slug)->first();

		if ($event->isfree) {
			return false;
		}

		$user = User::find($id);

		// $total = $event->cost_cent * $ntickets;

		Conekta::setApiKey("key_DGMkS6kqqh5aDfezvpzPgw");
		Conekta::setApiVersion("2.0.0");

		return Order::create(
			array(
				"line_items" => array(
					array(
						"name" => "Incripción a curso",
						"description" => "Pago de inscripción al evento: ".$event->title,
						"unit_price" => $event->cost_cent,
						"quantity" => $ntickets
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

		    session()->forget('login');

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

		$this->createProfile($id_decrypt, $request->only(['from', 'from_name', 'phone']));

		$bookmark = $this->registerBookmark($slug, $id_decrypt, $request->input('ntickets'));

		$order = $this->createOrderConekta($slug, $id_decrypt, $request->input('ntickets'));

		Mail::to($bookmark->user->email)->send(new RegisterSuccess($bookmark));

		if($order){
			Mail::to($bookmark->user->email)->send(new VoucherMail($order));
		}

		return redirect()->route('register.success', compact('slug'));
	}

	public function successRegister($slug)
	{
		$event = Event::whereSlug($slug)->first();

		return view('public.register_success', compact('event'));
	}
}
