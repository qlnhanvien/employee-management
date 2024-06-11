@extends('layouts.index');
@section('title')
    <title>Quản lý nhân viên</title>
@endsection
@section('css')
    @includeFirst(['layouts.buildCss'])
@endsection
@section('js')
    @includeFirst(['layouts.buildJs'])
@endsection

@section('main')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Overview
                    </div>
                    <h2 class="page-title">
                        Quản lý nhân viên
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Timesheets</h3>
                        </div>
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter text-nowrap datatable">
                                <thead>
                                <tr>
                                    <th class="w-1">Mã nhân viên</th>
                                    <th>Tên nhân viên</th>
                                    <th>Phái</th>
                                    <th>Ngày sinh</th>
                                    <th>Địa chỉ</th>
                                    <th>Điện thoại</th>
                                    <th>Chức năng</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($nhanViens as $nhanvien)
                                <tr>

                                        <td><span class="text-muted">{{ $nhanvien->MaNV }}</span></td>
                                        <td>{{ $nhanvien->TenNV }}</td>
                                        <td>
                                            {{ $nhanvien->Phai }}
                                        </td>
                                        <td>
                                            {{ $nhanvien->NgaySinh }}
                                        </td>
                                        <td>
                                            {{ $nhanvien->DiaChiNV }}
                                        </td>
                                        <td>
                                            {{ $nhanvien->DienThoaiNV }}
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.nhanvien.edit', $nhanvien->MaNV) }}" class=" btn-primary w-100">
                                                Chỉnh sửa
                                            </a>
                                        </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-12 mt-3 d-flex justify-content-end">
                            {{ $nhanViens->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
