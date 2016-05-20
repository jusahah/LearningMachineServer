<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class NewItemRequest extends Request
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
            'type' => 'required|in:image,text',
            'resourceuuid' => 'max:256',
            'category' => 'required|integer',
            'tags' => 'max:999',
            'name' => 'required|min:1|max:127',
            'summary' => 'required|min:1|max:9999'
        ];
    }
}
