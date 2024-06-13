<?php

namespace App\Http\Requests\NhanVien;

use Illuminate\Foundation\Http\FormRequest;

class NhanVienCreateRequest extends FormRequest
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
            'TenNV' => 'required',
            'Phai' => 'required',
            'NgaySinh' => 'required',
            'DiaChiNV' => 'required',
            'DienThoaiNV' => 'required|numeric|',
        ];
    }

    public function messages(): array
    {
        return [
            'TenNV.required' => 'Tên nhân viên không được để trống',
            'Phai.required' => 'Phái nhân viên không được để trống',
            'NgaySinh.required' => 'Ngày sinh nhân viên không được để trống',
            'DiaChiNV.required' => 'Địa chỉ nhân viên không được để trống',
            'DienThoaiNV.required' => 'Điện thoại nhân viên không được để trống',
            'DienThoaiNV.numeric' => 'Điện thoại nhân viên phải là số',
        ];
    }
}
