<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminUpdateRequest extends FormRequest
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
            'name' => 'required',
            'password' => 'required|string|min:8|confirmed',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Vui lòng nhập tên',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.confirmed' => 'Xác nhận mật khẩu không đúng',
            'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự',
            'password.string' => 'Mật khẩu phải là chuỗi ký tự',
        ];
    }
}
