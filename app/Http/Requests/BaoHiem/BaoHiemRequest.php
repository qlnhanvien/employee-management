<?php

namespace App\Http\Requests\BaoHiem;

use Illuminate\Foundation\Http\FormRequest;

class BaoHiemRequest extends FormRequest
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
            'TenBaoHiem' => 'required',
            'TileBaoHiem' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'TenBaoHiem.required' => 'Vui lòng nhập tên bảo hiểm',
            'TileBaoHiem.required' => 'Vui lòng nhập tỉ lệ bảo hiểm',
        ];
    }
}
