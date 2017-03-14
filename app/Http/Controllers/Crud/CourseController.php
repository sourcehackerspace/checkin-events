<?php

namespace App\Http\Controllers\Crud;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Course;
use App\Http\Requests\StoreCourse;
use Storage;

class CourseController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

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

	public function storage(StoreCourse $request)
	{

		$course = Course::create($request->except(['_token', 'image']));

		if ($request->hasFile('image')) {

			if ($request->file('image')->isValid()) {

				$path = $request->image->store('images', 'public');

				$course->image = $path;
				$course->save();
			}
		}

		return redirect()->route('crud.courses.index')->with('status', 'Curso creado exitosamente.');
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
		$course = Course::find($id);

		Storage::delete('public/'.$course->image);

		$course->delete();

		return redirect()->route('crud.courses.index')->with('status', 'Curso Eliminado');
	}
}
