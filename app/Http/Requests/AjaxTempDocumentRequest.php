<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Http\JsonResponse;

class AjaxTempDocumentRequest extends Request {

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
                'message'   => '<i class="fa fa-exclamation-circle fa-lg"></i>'.trans('create-project-form.validation-error'),
                'element'      => Request::get('name')
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
			'doc_1_mand'    => 'mimes:jpg,jpeg,png,bmp,tiff,pdf|max:20000',
            'doc_2_mand'    => 'mimes:jpg,jpeg,png,bmp,tiff,pdf|max:20000',
            'doc_3'         => 'mimes:jpg,jpeg,png,bmp,tiff,pdf|max:20000',
            'doc_4'         => 'mimes:jpg,jpeg,png,bmp,tiff,pdf|max:20000',
            'doc_5'         => 'mimes:jpg,jpeg,png,bmp,tiff,pdf|max:20000',
            'doc_6'         => 'mimes:jpg,jpeg,png,bmp,tiff,pdf|max:20000'
		];
	}

}
