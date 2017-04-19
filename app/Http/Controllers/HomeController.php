<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Conekta\Conekta;
use Conekta\Order;
use App\Event;

class HomeController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		// $this->middleware('auth', ['except' => 'pruebaConekta']);
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$events = Event::take(6)->get();

		return view('public.home', compact("events"));
	}

	public function home()
	{
		return view('home');
	}

	public function pruebaConekta()
	{
		// Conekta::setApiKey("key_DGMkS6kqqh5aDfezvpzPgw");
		// Conekta::setApiVersion("2.0.0");

		// $order = Order::create(
		// 	array(
		// 		"line_items" => array(
		// 			array(
		// 				"name" => "Incripción a curso",
		// 				"description" => "Pago de inscripción a curso: Creación de aplicaciones web con laravel.",
		// 				"unit_price" => 50000,
		// 				"quantity" => 1
		// 			)//first line_item
		// 		), //line_items
		// 		"currency" => "MXN",
		// 		"customer_info" => array(
		// 			"name" => "Fulanito Pérez",
		// 			"email" => "fulanito@bluebeanmx.com",
		// 			"phone" => "+5218181818181"
		// 		), //customer_info
		// 		"charges" => array(
		// 			array(
		// 				"payment_method" => array(
		// 					"type" => "oxxo_cash"
		// 				)//payment_method
		// 			) //first charge
		// 		) //charges
		// 	)//order
		// );

		// dd($order);
		// 
		return view('emails.voucher');
	}
}
