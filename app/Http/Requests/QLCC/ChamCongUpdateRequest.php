<?php

namespace App\Http\Requests\QLCC;

use Illuminate\Foundation\Http\FormRequest;

class ChamCongUpdateRequest extends FormRequest
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
            'MaNV' => 'required|exists:NhanVien,MaNV',
            'MaBangChamCong' => 'required|exists:BangChamCong,MaBangChamCong',
            'CheckIn' => 'required',
            'CheckOut' => 'required',
            'Date' => 'required|date',
            'TotalTime' => 'required',
            'Note' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'MaNV.required' => 'Vui lòng chọn nhân viên',
            'MaNV.exists' => 'Nhân viên không tồn tại',
            'MaBangChamCong.required' => 'Vui lòng chọn bảng chấm công',
            'MaBangChamCong.exists' => 'Bảng chấm công không tồn tại',
            'CheckIn.required' => 'Vui lòng nhập CheckIn',
            'CheckOut.required' => 'Vui lòng nhập CheckOut',
            'Date.required' => 'Vui lòng nhập Date',
            'Date.date' => 'Vui lòng nhập đúng định dạng Date',
            'TotalTime.required' => 'Vui lòng nhập TotalTiem',
            'Note.required' => 'Vui lòng nhập Note',
        ];
    }
}
