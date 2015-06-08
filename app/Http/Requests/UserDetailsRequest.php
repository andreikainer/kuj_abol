<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Session;

class UserDetailsRequest extends Request {

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
            'user_name'     => 'required|regex:/^[a-zA-zÀ-ž0-9_-]{3,16}$/',
            'email'         => 'required|regex:/[a-zA-ZÀ-ž0-9_\.\+-]+@[a-zA-ZÀ-ž0-9-]+\.[a-zA-ZÀ-ž0-9-\.]/',
            'first_name'    => 'required|regex:/^[a-zA-ZÀ-ž]+([\sa-zA-ZÀ-ž]+)*$/',
            'last_name'     => 'required|regex:/^[a-zA-ZÀ-ž]+([\sa-zA-ZÀ-ž]+)*$/',
            'business_name' => 'regex:/^[A-Za-z0-9\-! ,\'\"\/@\.:\(\)]+$/',
            'postcode'      => 'integer|digits:4',
            'city'          => 'regex:/^[a-zA-ZÀ-ž-]+([\sa-zA-ZÀ-ž-]+)*$/',
            'country'       => 'regex:/^[a-zA-ZÀ-ž-]+([\sa-zA-ZÀ-ž-]+)*$/',
            'tel_number'    => 'regex:/^[+()\/0-9]+([\s+()\/0-9]+)*$/',
            'avatar'        => 'mimes:jpg,jpeg,png,bmp,tiff|max:20000',
        ];
	}

    /**
     * Get the proper failed validation response for the request.
     *
     * @param  array  $errors
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function response(array $errors)
    {
        if ($this->ajax() || $this->wantsJson())
        {
            return new JsonResponse($errors, 422);
        }

        Session::flash('section_key', '3');
        return $this->redirector->to($this->getRedirectUrl())
            ->withInput($this->except($this->dontFlash))
            ->withErrors($errors, $this->errorBag);
    }

}
