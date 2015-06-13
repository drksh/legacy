<?php namespace DarkShare\Http\Requests;

use DarkShare\Http\Requests\Request;

class FilesRequest extends Request {

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
			'title' => 'required',
			'path'  => 'required|file',
			'password' => 'sometimes|min:3'
		];
	}

}
