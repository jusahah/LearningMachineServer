<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class NewCategoryRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Auth checkup done earlier in middleware
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
            'name' => 'required|max:127|alphanum',
            'parentid' => 'required|integer'
        ];
    }
}
