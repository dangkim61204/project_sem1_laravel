<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCatalogueRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [  
            'name'=>'required',
            'description' => 'required',
            'content' => 'required'
           
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Bạn chưa nhập tên thuộc tính',
            'description.required' => 'Bạn chưa nhập vào mô tả',
            'content.required' => 'Bạn chưa nhập vào phần nội dung',
        ];
    }
}
