<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use App\User;
use Crypt;

class AssistantController extends Controller
{
    public function index($slug)
    {
        $event = Event::where('slug', $slug)->first();
        $bookmarks = $event->bookmarks;

        return view('assistants.index', compact("bookmarks", "event"));
    }

    public function show($id)
    {
        $user = User::find(Crypt::decrypt($id));
        $events = $user->bookmarks->map(function ($bookmark) {
            return $bookmark->event;
        });

        return view('assistants.show', compact("user", "events"));
    }
}
