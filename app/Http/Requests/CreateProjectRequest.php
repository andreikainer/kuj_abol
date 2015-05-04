<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Http\JsonResponse;

class CreateProjectRequest extends Request {

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
            return new JsonResponse($errors, 200);
        }

        return $this->redirector->to($this->getRedirectUrl())
            ->withInput($this->except($this->dontFlash))
            ->withErrors($errors, $this->errorBag);
    }

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
			'project_name'  => 'required|regex:/^[a-zA-ZÀ-ž0-9]+([\sa-zA-ZÀ-ž0-9]+)*$/|unique:projects_tbl',
            'short_desc'    => 'required|max:180',
            'full_desc'     => 'required',
            'target_amount' => 'required|integer',
            'child_name'    => 'required|regex:/^[a-zA-ZÀ-ž]+([\sa-zA-ZÀ-ž]+)*$/',
            'first_name'    => 'required|regex:/^[a-zA-ZÀ-ž]+([\sa-zA-ZÀ-ž]+)*$/',
            'last_name'     => 'required|regex:/^[a-zA-ZÀ-ž]+([\sa-zA-ZÀ-ž]+)*$/',
            'email'         => 'required|regex:/[a-zA-ZÀ-ž0-9_\.\+-]+@[a-zA-ZÀ-ž0-9-]+\.[a-zA-ZÀ-ž0-9-\.]/',
            'address'       => 'required',
            'tel_number'    => 'required|regex:/^[+()0-9]+([\s+()0-9]+)*$/',
            'main_img'      => 'required|mimes:jpg,jpeg,png,bmp,tiff',
            'img_2'         => 'mimes:jpg,jpeg,png,bmp,tiff',
            'img_3'         => 'mimes:jpg,jpeg,png,bmp,tiff',
            'img_4'         => 'mimes:jpg,jpeg,png,bmp,tiff',
            'doc_1_mand'    => 'required|mimes:jpg,jpeg,png,bmp,tiff,pdf',
            'doc_2_mand'    => 'required|mimes:jpg,jpeg,png,bmp,tiff,pdf',
            'doc_3'         => 'mimes:jpg,jpeg,png,bmp,tiff,pdf',
            'doc_4'         => 'mimes:jpg,jpeg,png,bmp,tiff,pdf',
            'doc_5'         => 'mimes:jpg,jpeg,png,bmp,tiff,pdf',
            'doc_6'         => 'mimes:jpg,jpeg,png,bmp,tiff,pdf',
		];
	}

}
