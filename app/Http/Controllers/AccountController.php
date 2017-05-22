<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Event;

class AccountController extends Controller
{
    public function index(){

        $title = "Tus Proximos Eventos";
        $bookmarks = Auth::user()->bookmarks;

        $idevents = $bookmarks->map(function ($bookmark) {
           return $bookmark->event->id;
        })->toArray();

        $today = date('Y-m-d');

        $events = Event::whereIn('id', $idevents)->where('date', '>=', $today)->orderBy('date','asc')->get();

        return view('accounts.events', compact("events", "title"));
    }

    public function lastEvents(){

        $title = "Tus Eventos Pasados";
        $bookmarks = Auth::user()->bookmarks;

        $idevents = $bookmarks->map(function ($bookmark) {
            return $bookmark->event->id;
        })->toArray();

        $today = date('Y-m-d');

        $events = Event::whereIn('id', $idevents)->where('date', '<', $today)->orderBy('date','desc')->get();

        return view('accounts.events', compact("events", "title"));
    }
}
