<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
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
            'name' => [
                'required',
                'string'
            ],
            'email' => [
                'required',
                'email',
                'unique:employees,email',
                'min:3',
                'max:30',
            ],
            'password' => [
                'required',
                'string',
                'min:8',
                'max:16'
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Vui lòng nhập tên của bạn',
            'name.string' => 'Tên phải là một chuỗi',

            'email.required' => 'Vui lòng nhập địa chỉ email',
            'email.email' => 'Địa chỉ email không hợp lệ',
            'email.unique' => 'Địa chỉ email đã tồn tại trong hệ thống',
            'email.min' => 'Địa chỉ email phải có ít nhất 3 ký tự',
            'email.max' => 'Địa chỉ email không được vượt quá 30 ký tự',

            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.string' => 'Mật khẩu phải là một chuỗi',
            'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự',
            'password.max' => 'Mật khẩu không được vượt quá 16 ký tự',
        ];
    }
}
