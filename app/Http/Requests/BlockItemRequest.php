<?php namespace App\Http\Requests;

class BlockItemRequest extends Request {

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
            'id' => 'integer',
            'name' => 'required|max:255',
            'text' => 'required',
            'descript' => 'max:255',
            'avatar' => 'mimes:jpeg,bmp,png',
            'block_id'=> 'integer'
        ];
	}

}
