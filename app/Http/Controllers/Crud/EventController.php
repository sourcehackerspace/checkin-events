<?php

namespace App\Http\Controllers\Crud;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Event;
use App\Http\Requests\StoreEvent;
use Storage;
use App\Type;
use App\Topic;
use Auth;

class EventController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

	public function index()
	{
		$events = Auth::user()->events;

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
		// dd($request->all());

		$event = new Event($request->only(['title', 'summary', 'address', 'date', 'time', 'quota', 'description']));

		$event->type()->associate(Type::find($request->input('type')));

		$event->topic()->associate(Topic::find($request->input('topic')));

		$event->user()->associate(Auth::user());

		$event->save();

		if ($request->has('hascost')) {
			
			$event->isfree = false;
			$event->cost = $request->input('cost')*100;

			$event->save();
		}

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
		$types = Type::all();

		$topics = Topic::all();

		$event = Event::find($id);

		return view('crud.events.edit',compact("event", "topics", "types"));
	}

	public function update(StoreEvent $request, $id)
	{
		$event = Event::find($id)->update($request->only(['title', 'summary', 'address', 'date', 'time', 'quota', 'description']));

		if ($request->has('hascost') && $event->cost != $request->input('cost')) {
			
			$event->isfree = false;
			$event->cost = $request->input('cost')*100;

			$event->save();
		}

		if ($request->hasFile('image')) {

			if ($request->file('image')->isValid()) {

				$path = $request->image->store('images', 'public');

				$event->image = $path;
				$event->save();
			}
		}
		
		return redirect()->route('crud.events.index')->with('status', 'Evento Modificado Exitosamente');
	}

	public function delete($id)
	{
		$event = Event::find($id);

		Storage::delete('public/'.$event->image);

		$event->delete();

		return redirect()->route('crud.events.index')->with('status', 'Evento Eliminado');
	}
}
