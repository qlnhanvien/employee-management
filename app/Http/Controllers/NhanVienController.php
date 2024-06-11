<?php

namespace App\Http\Controllers;

use App\Http\Requests\NhanVien\NhanVienCreateRequest;
use App\Http\Requests\NhanVien\NhanVienUpdateRequest;
use App\Models\NhanVien;
use Illuminate\Support\Facades\Log;

class NhanVienController extends Controller
{
    private $nhanVien;

    public function __construct(NhanVien $nhanVien)
    {
        $this->nhanVien = $nhanVien;
    }

    public function index()
    {
        $nhanViens = $this->nhanVien->paginate(5);
        return view('nhanvien.index', compact('nhanViens'));
    }

    public function create()
    {
        return view('nhanvien.create');
    }

    public function store(NhanVienCreateRequest $request)
    {
        try {
            $this->nhanVien->create([
                'MaNV' => $request->MaNV,
                'TenNV' => $request->TenNV,
                'Phai' => $request->Phai,
                'NgaySinh' => $request->NgaySinh,
                'DiaChiNV' => $request->DiaChiNV,
                'DienThoaiNV' => $request->DienThoaiNV,
            ]);

        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }


        return redirect()->route('admin.nhanvien.index');
    }

    public function edit($MaNV)
    {
        $nhanvien = $this->nhanVien->where('MaNV', $MaNV)->first();

        return view('nhanvien.edit', compact('nhanvien'));
    }

    public function update(NhanVienUpdateRequest $request, $MaNV)
    {
        try {
            $this->nhanVien->where('MaNV', $MaNV)->update([
                'MaNV' => $request->MaNV,
                'TenNV' => $request->TenNV,
                'Phai' => $request->Phai,
                'NgaySinh' => $request->NgaySinh,
                'DiaChiNV' => $request->DiaChiNV,
                'DienThoaiNV' => $request->DienThoaiNV,
            ]);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }

        return redirect()->route('admin.nhanvien.index');
    }
}
