<?php

namespace App\Http\Controllers\api;

use App\Helpers\UtilityHelper;
use App\Http\Requests\NhanVien\NhanVienCreateRequest;
use App\Http\Requests\NhanVien\NhanVienUpdateRequest;
use App\Models\NhanVien;

class NhanVienController
{
    private $nhanVien;
    public function __construct(NhanVien $nhanVien)
        {
            $this->nhanVien = $nhanVien;
        }
    public function getAll()
    {
        $nhanViens = $this->nhanVien->all();
        return response()->json(['nhanviens' => $nhanViens], 200);
    }
    public function getID($MaNV)
    {
        try {
            $nhanVien = $this->nhanVien->find($MaNV);

            if ($nhanVien) {
                return response()->json(['quyetdinh' => $nhanVien], 200);
            }

            return response()->json(['err' => 'Nhan vien khong ton tai'], 404);
        } catch (\Exception $e)  {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }

    }
    public function create(NhanVienCreateRequest $request)
    {
        try {
            $maNV = UtilityHelper::generate('NV-', 'NhanVien', 'MaNV');
            $nhanVien = $this->nhanVien->create([
                'MaNV' => $maNV,
                'TenNV' => $request->TenNV,
                'Phai' => $request->Phai,
                'NgaySinh' => $request->NgaySinh,
                'DiaChiNV' => $request->DiaChiNV,
                'DienThoaiNV' => $request->DienThoaiNV,
            ]);

            return response()->json(['nhanvien' => $nhanVien],200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }

    }
    public function update(NhanVienUpdateRequest $request, $MaNV)
    {
        $nhanVien = NhanVien::find($MaNV);

        if (!$nhanVien) {
            return response()->json(['message' => 'Nhân viên không tồn tại.'], 404);
        }

        try {
            $this->nhanVien->where('MaNV', $MaNV)->update([
                'MaNV' =>  $MaNV,
                'TenNV' => $request->TenNV,
                'Phai' => $request->Phai,
                'NgaySinh' => $request->NgaySinh,
                'DiaChiNV' => $request->DiaChiNV,
                'DienThoaiNV' => $request->DienThoaiNV,
            ]);
            $nhanvien = $this->nhanVien->find($MaNV);
            return response()->json(['nhanvien' => $nhanvien,],200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Cập nhật thất bại.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    public function delete($MaNV)
    {
        $nhanVien = $this->nhanVien->where('MaNV', $MaNV)->first();

        if (!$nhanVien) {
            return response()->json(['message' => 'Nhân viên không tồn tại.'], 404);
        }

        $nhanVienData = $nhanVien->toArray();
        $deleteResult = $nhanVien->delete();

        if ($deleteResult) {
            return response()->json([
                'message' => 'Nhân viên đã được xóa thành công.',
                'nhanvien' => $nhanVienData
            ], 200);
        } else {
            return response()->json(['message' => 'Xóa nhân viên thất bại.'], 500);
        }
    }
}
