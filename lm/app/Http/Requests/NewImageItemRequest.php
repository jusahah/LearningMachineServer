<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class NewImageItemRequest extends Request
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
            'name' => 'required|max:127',
            'summary' => 'required|max:999',
            'category_id' => 'required|integer',
            'tags' => 'required|max:999',
            'imagepath' => 'required|URL',
            'thumbnail' => 'required|max:63000'
        ];
    }
}
