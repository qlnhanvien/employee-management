<?php

namespace App\Http\Controllers\api;

use App\Http\Requests\QDTD\QDTDRequest;
use App\Models\NhanVien;
use App\Models\PhongBan;
use App\Models\QuyetDinhTuyenDung;

class QuyetDinhTuyenDungController
{
    private $quyetDinhTuyenDung;
    private $nhanVien;
    private $phongBan;
    public function __construct(quyetDinhTuyenDung $quyetDinhTuyenDung, NhanVien $nhanVien, PhongBan $phongBan)
    {
        $this->quyetDinhTuyenDung = $quyetDinhTuyenDung;
        $this->nhanVien = $nhanVien;
        $this->phongBan = $phongBan;
    }

    public function getAll()
    {
        $quyetDinhTuyenDungs = $this->quyetDinhTuyenDung->all();
        return response()->json(['quyetDinhTuyenDungs' => $quyetDinhTuyenDungs], 200);
    }
    public function getId($MaQDTD)
    {
        try {
            $quyetDinhTuyenDung = $this->quyetDinhTuyenDung->find($MaQDTD);

            if ($quyetDinhTuyenDung) {
                return response()->json(['quyetdinh' => $quyetDinhTuyenDung], 200);
            }

            return response()->json(['err' => 'Quyet dinh tuyen dung khong ton tai'], 404);
        } catch (\Exception$e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }
    public function create(QDTDRequest $request)
    {
        try {
            $nhanVien = $this->nhanVien->where('MaNV', $request->MaNV)->first();
            $maPhongBan = $this->phongBan->where('MaPhongBan', $request->MaPhongBan)->first();

            if (!$nhanVien || !$maPhongBan) {
                return response()->json(['error' => 'Nhan vien hoac phong ban khong ton tai'], 404);
            }

            $quyetDinhTuyenDung = $this->quyetDinhTuyenDung->where('MaNV', $request->MaNV)->where('MaPhongBan', $request->MaPhongBan)->first();

            if ($quyetDinhTuyenDung) {
                return response()->json(['error' => 'Quyet dinh tuyen dung da ton tai'], 404);
            }

            $quyetDinhTuyenDung = $this->quyetDinhTuyenDung->create([
                'NgayQuyetDinhTuyenDung' => $request->NgayQuyetDinhTuyenDung,
                'ThoiGianThuViec' => $request->ThoiGianThuViec,
                'MucLuongThuViec' => $request->MucLuongThuViec,
                'NoiDungQuyetDinhTuyenDung' => $request->NoiDungQuyetDinhTuyenDung,
                'MaNV' => $request->MaNV,
                'MaPhongBan' => $request->MaPhongBan,
            ]);
            return response()->json(['quyetdinh' => $quyetDinhTuyenDung], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Them that bai','error' => $e->getMessage()], 500);
        }
    }
    public function update(QDTDRequest $request, $MaQDTD)
    {
        $QDTD = $this->quyetDinhTuyenDung->find($MaQDTD);

        if (!$QDTD) {
            return response()->json(['message' => 'Quyet dinh tuyen dung khong ton tai.'], 404);
        }

        $nhanVien = $this->nhanVien->where('MaNV', $request->MaNV)->first();
        $maPhongBan = $this->phongBan->where('MaPhongBan', $request->MaPhongBan)->first();

        if (!$nhanVien || !$maPhongBan) {
            return response()->json(['error' => 'Nhan vien hoac phong ban khong ton tai'], 404);
        }

        try {
            $this->quyetDinhTuyenDung->where('SoQuyetDinhTuyenDung', $MaQDTD)->update([
                'NgayQuyetDinhTuyenDung' => $request->NgayQuyetDinhTuyenDung,
                'ThoiGianThuViec' => $request->ThoiGianThuViec,
                'MucLuongThuViec' => $request->MucLuongThuViec,
                'NoiDungQuyetDinhTuyenDung' => $request->NoiDungQuyetDinhTuyenDung,
                'MaNV' => $request->MaNV,
                'MaPhongBan' => $request->MaPhongBan,
            ]);
            $QDTD = $this->quyetDinhTuyenDung->find($MaQDTD);
            return response()->json(['quyetdinh' => $QDTD], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Cap nhat that bai.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    public function delete($MaQDTD)
    {
        $QDTD = $this->quyetDinhTuyenDung->find($MaQDTD);

        if (!$QDTD) {
            return response()->json(['message' => 'Quyet dinh tuyen dung khong ton tai.'], 404);
        }

        try {
            $this->quyetDinhTuyenDung->where('SoQuyetDinhTuyenDung', $MaQDTD)->delete();
            return response()->json(['message' => 'Xoa thanh cong.'], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Xoa that bai.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
