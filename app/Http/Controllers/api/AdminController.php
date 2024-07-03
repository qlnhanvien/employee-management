<?php

namespace App\Http\Controllers\api;

use App\Exports\AdminExport;
use App\Models\HopDong;
use App\Models\NhanVien;
use App\Models\PhongBan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use \Symfony\Component\HttpFoundation\BinaryFileResponse;

class AdminController
{
    private $nhanVien;
    private $hopDong;
    private $phongBan;
    public function __construct(NhanVien $nhanVien, HopDong $hopDong, PhongBan $phongBan)
    {
        $this->nhanVien = $nhanVien;
        $this->hopDong = $hopDong;
        $this->phongBan = $phongBan;
    }
    public function dashboardApi()
    {
        $nhanViens = $this->nhanVien->with('chiTietBangChamCongs')->paginate(10);
        $phongBans = $this->phongBan->paginate(10);
        $hopDongs = $this->hopDong->paginate(10);
        return response()->json([
            'nhanViens'=>$nhanViens,
            'phongBans'=>$phongBans,
            'hopDongs'=>$hopDongs
        ],200);
    }

    public function getProfile() {

        $admin = auth()->user();
        return response()->json($admin, 200);
    }

    public function updateProfile(Request $request)
    {
        try {
            // Lấy người dùng hiện tại
            $user = Auth::user();

            // Validate dữ liệu đầu vào
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:50',
                'password' => 'required|string|min:8|confirmed',
            ]);

            // Nếu dữ liệu không hợp lệ, trả về lỗi
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            // Cập nhật thông tin người dùng
            $user->update([
                'name' => $request->name,
                'password' => Hash::make($request->password),
            ]);

            return response()->json(['message' => 'Cap nhap thanh cong'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function export(Request $request): BinaryFileResponse
    {
        $criteria = $request->only(['name', 'email']);
        $fileName = 'admins_' . now()->format('Ymd_His') . '.xlsx';
        return Excel::download(new AdminExport($criteria),  $fileName);
    }
}
