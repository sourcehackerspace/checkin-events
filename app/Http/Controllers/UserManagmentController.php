<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Socialite;

class UserManagmentController extends Controller
{
    public function index()
    {
    	$users = User::where('type','user')->get();

    	return view('users.index')->with('users', $users);
    }

    public function show($id)
    {
    	$user = User::find($id);

    	return view('users.show', compact("user"));
    }
}
