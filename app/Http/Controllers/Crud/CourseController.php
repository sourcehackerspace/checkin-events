<?php

namespace App\Http\Controllers\Crud;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Course;

class CourseController extends Controller
{
	public function index()
	{
		$courses = Course::all();

		return view('crud.courses.index')->with('courses', $courses);
	}

	public function show($id)
	{
		$course = Course::find($id);

		return view('crud.courses.show')->with('course', $course);
	}

	public function create()
	{
		return view('crud.courses.create');
	}

	public function storage(Request $request)
	{
		return $request->all();
	}

	public function edit($id)
	{
		$course = Course::find($id);

		return view('crud.courses.edit')->with('course', $course);
	}

	public function update(Request $request, $id)
	{
		$course = Course::find($id);
		
		return $request->all();
	}

	public function delete($id)
	{
		$course = Course::destroy($id);

		return redirect()->route('crud.courses.index')->with('status', 'Curso Eliminado');
	}
}
