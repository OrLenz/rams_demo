<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GoodEntryRequest extends FormRequest
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
            'goods_id' => 'required|integer|exists:goods,id',
            'rooms_id' => 'required|integer|exists:rooms,id',
            'suppliers_id' => 'required|integer|exists:suppliers,id',
            'date_of_entry' => 'required|date',
            'stock' => 'required|integer|min:0',
            'condition' => 'required|max:255',
        ];
    }
}
