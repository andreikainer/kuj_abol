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
            return new JsonResponse([
                'errors'    => $errors,
                'message'   => '<i class="fa fa-exclamation-circle fa-lg"></i>'.trans('create-project-form.validation-error')
            ], 200);
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
			'project_name'  => 'required|regex:/^[a-zA-ZÀ-ž0-9]+([\sa-zA-ZÀ-ž0-9]+)*$/|max:60',
            'short_desc'    => 'required|max:180',
            'full_desc'     => 'required',
            'target_amount' => 'required|regex:/^[0-9]+([\s0-9,.]+)*$/',
            'child_name'    => 'required|regex:/^[a-zA-ZÀ-ž]+([\sa-zA-ZÀ-ž]+)*$/',
            'first_name'    => 'required|regex:/^[a-zA-ZÀ-ž]+([\sa-zA-ZÀ-ž]+)*$/',
            'last_name'     => 'required|regex:/^[a-zA-ZÀ-ž]+([\sa-zA-ZÀ-ž]+)*$/',
            'email'         => 'required|regex:/[a-zA-ZÀ-ž0-9_\.\+-]+@[a-zA-ZÀ-ž0-9-]+\.[a-zA-ZÀ-ž0-9-\.]/',
            'street'        => 'required',
            'postcode'      => 'required|integer|digits:4',
            'city'          => 'required|regex:/^[a-zA-ZÀ-ž-]+([\sa-zA-ZÀ-ž-]+)*$/',
            'country'       => 'required',
            'tel_number'    => 'required|regex:/^[+()\/0-9]+([\s+()\/0-9]+)*$/',
            'main_img'      => 'required_without:mainImage|mimes:jpg,jpeg,png,bmp,tiff|max:20000',
            'img_2'         => 'mimes:jpg,jpeg,png,bmp,tiff|max:20000',
            'img_3'         => 'mimes:jpg,jpeg,png,bmp,tiff|max:20000',
            'img_4'         => 'mimes:jpg,jpeg,png,bmp,tiff|max:20000',
            'doc_1_mand'    => 'required_without:doc1Mand|mimes:jpg,jpeg,png,bmp,tiff,pdf|max:20000',
            'doc_2_mand'    => 'required_without:doc2Mand|mimes:jpg,jpeg,png,bmp,tiff,pdf|max:20000',
            'doc_3'         => 'mimes:jpg,jpeg,png,bmp,tiff,pdf|max:20000',
            'doc_4'         => 'mimes:jpg,jpeg,png,bmp,tiff,pdf|max:20000',
            'doc_5'         => 'mimes:jpg,jpeg,png,bmp,tiff,pdf|max:20000',
            'doc_6'         => 'mimes:jpg,jpeg,png,bmp,tiff,pdf|max:20000',
		];
	}

}
