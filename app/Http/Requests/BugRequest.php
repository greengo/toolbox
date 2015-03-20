<?php namespace Greengo\Http\Requests;

use Greengo\Http\Requests\Request;

class BugRequest extends Request {

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
		$rules = [
			'title' => 'required',
			'repro_steps' => 'required',
			'expected_behaviour' => 'required',
			'observed_behaviour' => 'required',
			'created_by' => 'required',
			'assigned_to' => 'required',
			'project' => 'required'
		];

		// If you need to change rules based on routes or something, do like this:
		if (Request::isMethod('patch'))
		{
			$rules = null;
			$rules = [];

		}

		return $rules;
	}

}
