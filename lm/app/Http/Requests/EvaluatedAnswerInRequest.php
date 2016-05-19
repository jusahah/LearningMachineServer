<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EvaluatedAnswerInRequest extends Request
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
            'question' => 'required|integer',
            'answer'  => 'required|max:16000',
            'result'   => 'required|integer|min:0|max:1'
        ];
    }
}
