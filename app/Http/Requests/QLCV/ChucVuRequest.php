<?php

namespace App\Http\Requests\QLCV;

use Illuminate\Foundation\Http\FormRequest;

class ChucVuRequest extends FormRequest
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
            'TenChucVu' => 'required',
            'HeSoLuong' => 'required',
            'PhuCapChucVu' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'TenChucVu.required' => 'Tên chức vụ không được để trống',
            'HeSoLuong.required' => 'Hệ số lương không được để trống',
            'PhuCapChucVu.required' => 'Phụ cấp chức vụ không được để trống',
        ];
    }
}
