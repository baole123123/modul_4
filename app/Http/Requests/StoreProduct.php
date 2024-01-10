<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProduct extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'status' => 'required',
            'category_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Trường bắt buộc nhập.',
            'description.required' => 'Trường bắt buộc nhập.',
            'price.required' => 'Trường bắt buộc nhập.',
            'price.numeric' => 'Trường bắt buộc nhập số.',
            'quantity.required' => 'Trường bắt buộc nhập.',
            'quantity.numeric' => 'Trường bắt buộc nhập số.',
            'status.required' => 'Trường bắt buộc nhập.',
            'category_id.required' => 'Trường bắt buộc nhập.',
        ];
    }
}
