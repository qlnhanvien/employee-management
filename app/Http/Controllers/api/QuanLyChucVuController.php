<?php

namespace App\Http\Controllers\api;

use App\Http\Requests\QLCV\ChucVuRequest;
use App\Models\ChucVu;

class QuanLyChucVuController
{
    private $chucVu;
    public function __construct(ChucVu $chucVu)
    {
        $this->chucVu = $chucVu;
    }
    public function getAll()
    {
        $chucVus = $this->chucVu->all();
        return response()->json(['chucvus' => $chucVus], 200);
    }
    public function getID($MaCV)
    {
        try {
            $chucVu = $this->chucVu->find($MaCV);

            if ($chucVu) {
                return response()->json(['chucVu' => $chucVu], 200);
            }

            return response()->json(['err' => 'Chuc vu khong ton tai'], 404);
        } catch (\Exception $e)  {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function create(ChucVuRequest $request)
    {
        try {
            $chucVu = $this->chucVu->where('TenChucVu', $request->TenChucVu)->first();

            if ($chucVu) {
                return response()->json(['error' => 'Chuc vu da ton tai'], 404);
            }

            $chucVuMoi = $this->chucVu->create([
                'TenChucVu' => $request->TenChucVu,
                'HeSoLuong' => $request->HeSoLuong,
                'PhuCapChucVu' => $request->PhuCapChucVu,
            ]);

            return response()->json(['chucVu' => $chucVuMoi],200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }

    }
    public function update(ChucVuRequest $request, $MaCV)
    {
        try {
            $chucVu = ChucVu::find($MaCV);

            if (!$chucVu) {
                return response()->json(['message' => 'Chuc vu không tồn tại.'], 404);
            }

            $this->chucVu->where('MaChucVu', $MaCV)->update([
                'MaChucVu' =>  $MaCV,
                'TenChucVu' => $request->TenChucVu,
                'HeSoLuong' => $request->HeSoLuong,
                'PhuCapChucVu' => $request->PhuCapChucVu,
            ]);
            $chucVu = $this->chucVu->find($MaCV);
            return response()->json(['chucVu' => $chucVu,],200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Cập nhật thất bại.','error' => $e->getMessage()], 500);
        }
    }
    public function delete($MaCV)
    {
        try {
            $chucVu = ChucVu::find($MaCV);

            if (!$chucVu) {
                return response()->json(['message' => 'Chuc vu không tồn tại.'], 404);
            }

            $chucVuData = $chucVu->toArray();
            $deleteResult = $chucVu->delete();

            if ($deleteResult) {
                return response()->json(['message' => 'chucVu đã được xóa thành công.','nhanvien' => $chucVuData], 200);
            } else {
                return response()->json(['message' => 'Xóa chuc vu thất bại.'], 500);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => 'Xóa chuc vu thất bị.', 'error' => $e->getMessage()], 500);
        }

    }
}
