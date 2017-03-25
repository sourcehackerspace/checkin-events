<?php

namespace App\Http\Controllers\Crud;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Event;
use App\Http\Requests\StoreEvent;
use Storage;
use App\Type;
use App\Topic;

class EventController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

	public function index()
	{
		$events = Event::all();

		return view('crud.events.index')->with('events', $events);
	}

	public function show($id)
	{
		$event = Event::find($id);

		return view('crud.events.show')->with('event', $event);
	}

	public function create()
	{
		$types = Type::all();

		$topics = Topic::all();
		
		return view('crud.events.create', compact("events", "types", "topics"));
	}

	public function storage(StoreEvent $request)
	{
		dd($request->all());

		$event = Event::create($request->except(['_token', 'image', 'type', 'topic', 'hascost', 'cost']));

		if ($request->hasFile('image')) {

			if ($request->file('image')->isValid()) {

				$path = $request->image->store('images', 'public');

				$event->image = $path;
				$event->save();
			}
		}

		return redirect()->route('crud.events.index')->with('status', 'Evento creado exitosamente.');
	}

	public function edit($id)
	{
		$event = Event::find($id);

		return view('crud.events.edit')->with('event', $event);
	}

	public function update(Request $request, $id)
	{
		$event = Event::find($id);
		
		return $request->all();
	}

	public function delete($id)
	{
		$event = Event::find($id);

		Storage::delete('public/'.$event->image);

		$event->delete();

		return redirect()->route('crud.events.index')->with('status', 'Evento Eliminado');
	}
}
