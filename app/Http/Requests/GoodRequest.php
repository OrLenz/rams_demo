<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GoodRequest extends FormRequest
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
            'employees_id' => 'required|integer|exists:employees,id',
            'chart_of_accounts_id' => 'required|integer|exists:chart_of_accounts,id',
            'categories_id' => 'required|integer|exists:categories,id',
            'stuff' => 'required|max:255',
            'unit' => 'required|max:255',
            'detail' => 'required',
            'code_num' => 'required|integer',
            'source_of_funds' => 'required|max:255',
            'price' => 'required|integer'
        ];
    }
}
