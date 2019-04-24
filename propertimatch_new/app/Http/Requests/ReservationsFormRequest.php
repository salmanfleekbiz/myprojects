<?php namespace App\Http\Requests;


class ReservationsFormRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{

		if($this->user()->can_post())
		{
			return true;
		}
		return false;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'firstname' => array('Regex:/^[A-Za-z0-9 ]+$/'),
			'firstname' => 'required',
			'lastname' => array('Regex:/^[A-Za-z0-9 ]+$/'),
			'lastname' => 'required',
			'email' => 'required|email',
			'booking_status' => 'required',
			//'body' => 'required',
		];
	}	
}
