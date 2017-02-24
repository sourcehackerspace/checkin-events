<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;

class PublicController extends Controller
{
    public function listCourses()
    {
    	$courses = Course::all();
    	return view('public.courses_list', compact("courses"));
    }

    public function registerToCourse($slug)
    {
    	$course = Course::whereSlug($slug)->first();
    	return view('auth.facebook', compact("course"));
    }
}
