<?php

namespace App\Http\Controllers;

use App\Models\HopDong;
use App\Models\NhanVien;
use App\Models\PhongBan;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    private $nhanVien;
    private $hopDong;
    private $phongBan;
    public function __construct(NhanVien $nhanVien, HopDong $hopDong, PhongBan $phongBan)
    {
        $this->nhanVien = $nhanVien;
        $this->hopDong = $hopDong;
        $this->phongBan = $phongBan;
        $this->middleware('auth');
    }

    public function dashboard()
    {
        $nhanViens = $this->nhanVien->with('chiTietBangChamCongs')->paginate(10);
        $phongBans = $this->phongBan->paginate(10);
        $hopDongs = $this->hopDong->paginate(10);
        return view('index', compact('nhanViens','phongBans','hopDongs'));
    }
}
