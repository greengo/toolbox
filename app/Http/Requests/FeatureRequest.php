<?php

namespace Greengo\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FeatureRequest extends FormRequest
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
      $rules = [
        'title' => 'required',
        'project' => 'required'
      ];

      // If you need to change rules based on routes or something, do like this:
      if (FeatureRequest::isMethod('patch'))
      {
        $rules = null;
        $rules = [];
      }

      return $rules;
    }
}
