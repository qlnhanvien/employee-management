<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NhanVienController extends Controller
{
    public function index()
    {
        return view('nhanvien.index');
    }
}
