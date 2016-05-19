<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Item;

class NewQuestionRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(\Illuminate\Http\Request $request)
    {
        // Check user owns the item
        $itemID = $request->get('item_id');

        if (!$itemID) return false;

        if (Item::where('id', $itemID)->where('user_id', \Auth::id())->exists()) {
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
            'item_id' => 'required|integer',
            'name' => 'required|max:127',
            'question' => 'required|max:9999',
            'answer' => 'required|max:9999'
        ];
    }
}
