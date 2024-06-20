<?php

namespace App\Http\Requests\QDTD;

use Illuminate\Foundation\Http\FormRequest;

class QDTDRequest extends FormRequest
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
//            'SoQuyetDinhTuyenDung' => 'required',
            'NgayQuyetDinhTuyenDung' => 'required',
            'ThoiGianThuViec' => 'required',
            'MucLuongThuViec' => 'required',
            'NoiDungQuyetDinhTuyenDung' => 'required',
            'MaNV' => 'required',
            'MaPhongBan' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
//            'SoQuyetDinhTuyenDung.required' => 'Số quyết định tuyển dụng không được để trống',
            'NgayQuyetDinhTuyenDung.required' => 'Ngày quyết định tuyển dụng không được để trống',
            'ThoiGianThuViec.required' => 'Thời gian thử việc không được để trống',
            'MucLuongThuViec.required' => 'Mức lương thử việc không được để trống',
            'NoiDungQuyetDinhTuyenDung.',
            'MaNV.required' => 'Mã nhân viên không được để trống',
            'MaPhongBan.required' => 'Mã phòng ban không được để trống',
        ];
    }
}
