<?php namespace App\Http\Requests;

use Sentry;

class UserRequest extends Request
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Sentry::check();
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
            'email' => 'required|unique|max:255',
            'name' => 'required|max:255',
        ];
    }
}
