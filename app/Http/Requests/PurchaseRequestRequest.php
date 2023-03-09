<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PurchaseRequestRequest extends FormRequest
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
            'suppliers_id' => 'required|integer|exists:suppliers,id',
            'stuff' => 'required|max:255',
            'description' => 'required|max:255',
            'unit' => 'required|max:255',
            'qty' => 'required|integer',
            'status' => 'required|max:255',
            'price' => 'required|integer',
            'total' => 'required',
            'subtotal' => 'required',
            'grand_total' => 'required'
        ];
    }
}
