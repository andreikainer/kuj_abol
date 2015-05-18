<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class AdminEditProjectRequest extends Request {

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
			'project_name'  => 'required|regex:/^[a-zA-ZÀ-ž0-9]+([\sa-zA-ZÀ-ž0-9]+)*$/',
            'short_desc'    => 'required|max:180',
            'full_desc'     => 'required',
            'target_amount' => 'required|regex:/^[0-9]+([\s0-9,.]+)*$/',
            'child_name'    => 'required|regex:/^[a-zA-ZÀ-ž]+([\sa-zA-ZÀ-ž]+)*$/',
		];
	}

}
