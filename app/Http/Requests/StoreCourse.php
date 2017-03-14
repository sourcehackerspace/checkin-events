<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCourse extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
		'name' => 'required',
		'topic' => 'required',
		'address' => 'required',
		'date' => 'required',
		'time' => 'required',
		'quota' => 'required',
		'description' => 'required',
		];
	}

	/**
	 * Get the error messages for the defined validation rules.
	 *
	 * @return array
	 */
	public function messages()
	{
		return [
		'topic.required' => 'El tema del curso es requerido',
		'quota.required'  => 'El cupo del curso es requerido',
		];
	}
}
