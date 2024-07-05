<?php

namespace App\Http\Controllers\api;

use App\Helpers\UtilityHelper;
use App\Http\Requests\BaoHiem\BaoHiemRequest;
use App\Models\BaoHiem;

class QuanLiBaoHiemController
{
    private $baoHiem;
    public function __construct(BaoHiem $baoHiem)
    {
        $this->baoHiem = $baoHiem;
    }
    public function getAll()
    {
        $baoHiems = $this->baoHiem->all();
        return response()->json(['baoHiems' => $baoHiems], 200);
    }
    public function getID($MaBH)
    {
        try {
            $baoHiem = $this->baoHiem->find($MaBH);
            if ($baoHiem) {
                return response()->json(['baoHiem' => $baoHiem], 200);
            }

            return response()->json(['error' => 'Bao hiem khong ton tai'], 404);
        } catch (\Exception $e)  {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function create(BaoHiemRequest $request)
    {
        try {
            $maBH = UtilityHelper::generate('BH-', 'BaoHiem', 'MaBaoHiem');
            $baoHiem = $this->baoHiem->create([
                'MaBaoHiem'=>$maBH,
                'TenBaoHiem'=>$request->TenBaoHiem,
                'TileBaoHiem'=>$request->TileBaoHiem,
            ]);

            return response()->json(['Bao Hiem' => $baoHiem],200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }

    }
    public function update(BaoHiemRequest $request,$MaBH)
    {
        $baoHiem = BaoHiem::find($MaBH);

        if (!$baoHiem) {
            return response()->json(['message' => 'Bao hiem khong ton tai.'], 404);
        }

        try {
            $this->baoHiem->where('MaBaoHiem', $MaBH)->update([
                'MaBaoHiem'=>$MaBH,
                'TenBaoHiem'=>$request->TenBaoHiem,
                'TileBaoHiem'=>$request->TileBaoHiem,
            ]);
            $baoHiem = $this->baoHiem->find($MaBH);
            return response()->json(['Bao Hiem' => $baoHiem,],200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Cap nhap that bai.','error' => $e->getMessage()], 500);
        }
    }
    public function delete($MaBH)
    {
        $baoHiem = $this->baoHiem->where('MaNV', $MaBH)->first();

        if (!$baoHiem) {
            return response()->json(['message' => 'Bao Hiem khong ton tai.'], 404);
        }

        $baoHiemData = $baoHiem->toArray();
        $deleteResult = $baoHiem->delete();

        if ($deleteResult) {
            return response()->json(['message' => 'Bao hiem duoc xoathanh cong.','nhanvien' => $baoHiemData], 200);
        } else {
            return response()->json(['message' => 'Xoa bao hiem thanh cong.'], 500);
        }
    }
}
