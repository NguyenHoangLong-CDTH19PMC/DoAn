<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class xlAddRequestProduct extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'tensp' => 'required',
            'masp' => 'required',
            'soluong'=>'required'
        ];
    }
    public function messages()
    {
        return[
            'tensp.required'=> 'Chưa nhập tên sản phẩm',
            'masp.required'=> 'Chưa nhập mã sản phẩm',
            'soluong.required'=> 'Chưa nhập số lượng tồn kho',
        ];
    }
}
