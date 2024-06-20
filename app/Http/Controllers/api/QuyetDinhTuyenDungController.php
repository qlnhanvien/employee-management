<?php

namespace App\Http\Controllers\api;

use App\Http\Requests\QDTD\QDTDRequest;
use App\Models\QuyetDinhTuyenDung;
use Illuminate\Http\Request;

class QuyetDinhTuyenDungController
{
    private $quyetDinhTuyenDung;
    public function __construct(quyetDinhTuyenDung $quyetDinhTuyenDung)
    {
        $this->quyetDinhTuyenDung = $quyetDinhTuyenDung;
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
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function update(QDTDRequest $request, $MaQDTD)
    {
        $QDTD = $this->quyetDinhTuyenDung->find($MaQDTD);

        if (!$QDTD) {
            return response()->json(['message' => 'Quyet dinh tuyen dung khong ton tai.'], 404);
        }

        try {
            $this->quyetDinhTuyenDung->where('MaQDTD', $MaQDTD)->update([
                'MaNV' => $request->MaNV,
                'NgayQuyetDinhTuyenDung' => $request->NgayQuyetDinhTuyenDung,
                'ThoiGianThuViec' => $request->ThoiGianThuViec,
                'MucLuongThuViec' => $request->MucLuongThuViec,
                'NoiDungQuyetDinhTuyenDung' => $request->NoiDungQuyetDinhTuyenDung,
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
            $this->quyetDinhTuyenDung->where('MaQDTD', $MaQDTD)->delete();
            return response()->json(['message' => 'Xoa thanh cong.'], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Xoa that bai.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

}
