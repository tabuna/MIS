<?php

namespace App\Http\Requests\Site;

use App\Http\Requests\Request;

class ReviewsRequest extends Request
{
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
            'fio' => 'required|max:255',
            'content' => 'required',
        ];
    }
}
