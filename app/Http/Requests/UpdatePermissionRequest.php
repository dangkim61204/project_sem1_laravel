<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePermissionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        return [
          
          
            'name'=>'required',
            'canonical'=>'required|unique:permissions,canonical, '.$this->id.'',
           


        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Bạn chưa nhập tên quyền',
            'canonical.required' => 'Bạn chưa nhập từ khóa của quyền',
            'canonical.unique' => 'Quyền đã tồn tại',
          
        ];
    }
}
