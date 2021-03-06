<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Http\JsonResponse;

class ShareViaEmailRequest extends Request {

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
			'sender_name'   => 'required|regex:/^[a-zA-ZÀ-ž]+([\sa-zA-ZÀ-ž]+)*$/',
            'sender_email'  => 'required|regex:/[a-zA-ZÀ-ž0-9_\.\+-]+@[a-zA-ZÀ-ž0-9-]+\.[a-zA-ZÀ-ž0-9-\.]/',
            'friend_name'   => 'required|regex:/^[a-zA-ZÀ-ž]+([\sa-zA-ZÀ-ž]+)*$/',
            'friend_email'  => 'required|regex:/[a-zA-ZÀ-ž0-9_\.\+-]+@[a-zA-ZÀ-ž0-9-]+\.[a-zA-ZÀ-ž0-9-\.]/',
		];
	}

}
