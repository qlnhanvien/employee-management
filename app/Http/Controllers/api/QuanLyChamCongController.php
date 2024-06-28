<?php

namespace App\Http\Controllers\api;

use App\Http\Requests\QLCC\ChamCongCreateRequest;
use App\Http\Requests\QLCC\ChamCongUpdateRequest;
use App\Models\BangChamCong;
use App\Models\ChiTietBangChamCong;
use App\Models\NhanVien;

class QuanLyChamCongController
{
    private $chamCong;
    private $chiTietBangChamCong;
    private $nhanVien;
    public function __construct(BangChamCong $chamCong, ChiTietBangChamCong $chiTietBangChamCong, NhanVien $nhanVien)
    {
        $this->chamCong = $chamCong;
        $this->nhanVien = $nhanVien;
        $this->chiTietBangChamCong = $chiTietBangChamCong;
    }
    public function getAll()
    {
        $bangchamcong = $this->chiTietBangChamCong->all();
        return response()->json(['bangchamcongs' => $bangchamcong], 200);
    }

    public function getID($MaBCC, $MaNV)
    {
        try {
            $bangchamcong = $this->chamCong->find($MaBCC);
            $nhanVien = $this->nhanVien->find($MaNV);

            if ($bangchamcong || $nhanVien) {
                $chiTietBangChamCong = $this->chiTietBangChamCong->where('MaBangChamCong', $MaBCC)->where('MaNV', $MaNV)->get();
                return response()->json(['$chiTietBangChamCong' => $chiTietBangChamCong], 200);
            }

            return response()->json(['err' => 'Bang cham cong hoac nhan vien khong ton tai'], 404);
        } catch (\Exception $e)  {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function create(ChamCongCreateRequest $request)
    {
        try {
            $existingRecord = $this->chiTietBangChamCong->where([
                ['MaNV', $request->MaNV],
                ['MaBangChamCong', $request->MaBangChamCong],
            ])->first();

            if ($existingRecord) {
                return response()->json(['error' => 'The record already exists.'], 400);
            }

            $chiTietBangChamCong = $this->chiTietBangChamCong->create([
                'MaNV' => $request->MaNV,
                'MaBangChamCong' => $request->MaBangChamCong,
                'CheckIn' => $request->CheckIn,
                'CheckOut' => $request->CheckOut,
                'Date' => $request->Date,
                'TotalTime' => $request->TotalTime,
                'Note' => $request->Note,
            ]);
            return response()->json(['$chiTietBangChamCong' => $chiTietBangChamCong], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function update(ChamCongUpdateRequest $request, $MaNV, $MaBCC)
    {
        try {
            $chiTietBangChamCong = $this->chiTietBangChamCong->where('MaNV', $MaNV)->where('MaBangChamCong', $MaBCC)->first();

            if (!$chiTietBangChamCong) {
                return response()->json(['message' => 'Chi tiet bang cham cong khong ton tai.'], 404);
            }

            $this->chiTietBangChamCong->where('MaBangChamCong', $MaBCC)
                            ->where('MaNV', $MaNV)
                            ->update([
                                        'MaNV' => $request->MaNV,
                                        'MaBangChamCong' => $request->MaBangChamCong,
                                        'CheckIn' => $request->CheckIn,
                                        'CheckOut' => $request->CheckOut,
                                        'Date' => $request->Date,
                                        'TotalTime' => $request->TotalTime,
                                        'Note' => $request->Note,
                                    ]);
            $CTBCC = $this->chiTietBangChamCong->find($MaBCC);
            return response()->json(['chiTietBangChamCong' => $CTBCC], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Cap nhat that bai.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function delete($MaNV, $MaBCC)
    {
        $CTBCC = $this->chiTietBangChamCong->where('MaNV', $MaNV)->where('MaBangChamCong', $MaBCC)->first();

        if (!$CTBCC) {
            return response()->json(['message' => 'Chi tiet bang cham cong khong ton tai.'], 404);
        }

        try {
            $this->chiTietBangChamCong->where('MaBangChamCong', $MaBCC)->where('MaNV', $MaNV)->delete();
            return response()->json(['message' => 'Xoa thanh cong.', '$CTBCC' => $CTBCC], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Xoa that bai.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
