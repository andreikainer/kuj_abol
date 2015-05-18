<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class SponsorDetailsRequest extends Request {

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
            'business_name' => 'regex:/^[A-Za-z0-9\-! ,\'\"\/@\.:\(\)]+$/',
            'logo'          => 'mimes:jpg,jpeg,png,bmp,tiff|max:20000',
            'url'           => 'regex:/^[A-Za-z0-9\-! ,\'\"\/@\.:\(\)]+$/',
        ];
	}

}
