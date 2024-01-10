<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProduct extends FormRequest
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
    public function rules(): array
    {
        return [
            'name' => 'required' ,
            'description' => 'required' ,
            'price' => 'required' ,
            'quantity' => 'required' ,
            'status' => 'required' ,
            'category_id' => 'required' ,


        ];
    }
    public function messages() {
        return [
            'name.required' => 'Trường không được để trống',
            'description.required' => 'Trường không được để trống' ,
            'price.required' => 'Trường không được để trống' ,
            'quantity.required' => 'Trường không được để trống' ,
            'status.required' => 'Trường không được để trống' ,
            'category_id.required' => 'Trường không được để trống' ,



        ];
    }
}
