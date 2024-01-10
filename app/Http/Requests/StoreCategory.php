<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategory extends FormRequest
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
            'name' => 'required|unique:categories',
            'description' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên bắt buộc nhập.',
            'name.unique' => 'Tên danh mục đã tồn tại.',
            'description.required' => 'Trường bắt buộc nhập.',

        ];
    }
}
