<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class NewTextItemRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        echo \Auth::id();

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
            'summary' => 'required|max:9999',
            'category_id' => 'required|integer',
            'tags' => 'max:999',
            'note' => 'required|max:29999'
        ];
    }
}
