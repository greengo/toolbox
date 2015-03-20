<?php namespace Greengo\Http\Requests;

use Greengo\Http\Requests\Request;

class CreateBugRequest extends Request {

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
			'repro_steps' => 'required',
			'expected_behaviour' => 'required',
			'observed_behaviour' => 'required',
			'created_by' => 'required',
			'assigned_to' => 'required',
			'project' => 'required'
		];
	}

}
