@extends('layouts.index');
@section('title')
    <title>Dashboard</title>
@endsection
@section('css')
    @includeFirst(['layouts.buildCss'])
@endsection
@section('js')
    @includeFirst(['layouts.buildJs'])
@endsection

@section('main')
    <div class="page-wrapper">
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
                            Dashboard
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
            <div class="container-xl">
                <div class="row row-deck row-cards">
                    <div class="col-12">
                        <div class="row row-cards">
                            <div class="col-sm-6 col-lg-3 col-xl-4">
                                <div class="card card-sm">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                            <span class="bg-green text-white avatar">
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M17 17h-11v-14h-2" /><path d="M6 5l14 1l-1 7h-13" /></svg>
                            </span>
                                            </div>
                                            <div class="col">
                                                <div class="font-weight-medium">
                                                    Số lượng nhân viên
                                                </div>
                                                <div class="text-muted">
                                                    {{$nhanViens->total()}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3 col-xl-4">
                                <div class="card card-sm">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                            <span class="bg-twitter text-white avatar">
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M22 4.01c-1 .49 -1.98 .689 -3 .99c-1.121 -1.265 -2.783 -1.335 -4.38 -.737s-2.643 2.06 -2.62 3.737v1c-3.245 .083 -6.135 -1.395 -8 -4c0 0 -4.182 7.433 4 11c-1.872 1.247 -3.739 2.088 -6 2c3.308 1.803 6.913 2.423 10.034 1.517c3.58 -1.04 6.522 -3.723 7.651 -7.742a13.84 13.84 0 0 0 .497 -3.753c0 -.249 1.51 -2.772 1.818 -4.013z" /></svg>
                            </span>
                                            </div>
                                            <div class="col">
                                                <div class="font-weight-medium">
                                                    Số lượng hợp đồng
                                                </div>
                                                <div class="text-muted">
                                                    {{$hopDongs->total()}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3 col-xl-4">
                                <div class="card card-sm">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                            <span class="bg-facebook text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/brand-facebook -->
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3" /></svg>
                            </span>
                                            </div>
                                            <div class="col">
                                                <div class="font-weight-medium">
                                                    Số lượng phòng ban
                                                </div>
                                                <div class="text-muted">
                                                    {{$phongBans->total()}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Timesheets</h3>
                            </div>
                            <div class="card-body border-bottom py-3">
                                <div class="d-flex">

                                    <div class="text-muted">
                                        Search:
                                        <div class="ms-2 d-inline-block">
                                            <input type="text" class="form-control form-control-sm" aria-label="Search invoice">
                                        </div>
                                    </div>
                                    <div class="ms-auto text-muted">
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table card-table table-vcenter text-nowrap datatable">
                                    <thead>
                                    <tr>
                                        <th class="w-1">STT</th>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>CheckIn</th>
                                        <th>CheckOut</th>
                                        <th>Date</th>
                                        <th>TotalTime</th>
                                        <th >Status</th>
                                        <th>Note</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @for ($i = 0; $i < count($nhanViens); $i++)
                                        @foreach ($nhanViens[$i]->chiTietBangChamCongs as $chamCong)
                                            <tr>
                                                <td><span class="text-muted">{{ $i + 1 }}</span></td>
                                                <td>{{ $nhanViens[$i]->MaNV }}</td>
                                                <td>{{ $nhanViens[$i]->TenNV }}</td>
                                                <td>{{ $chamCong->CheckIn }}</td>
                                                <td>{{ $chamCong->CheckOut }}</td>
                                                <td>{{ $chamCong->Date }}</td>
                                                <td>{{ $chamCong->TotalTime }}</td>
                                                <td>
                                                    <div class="text-start">
                                                        @if (\Carbon\Carbon::parse($chamCong->TotalTime)->greaterThanOrEqualTo(\Carbon\Carbon::parse('08:00:00')))
                                                            <span class="badge bg-success me-1"></span> Paid
                                                        @else
                                                            <span class="badge bg-danger me-1"></span> Unpaid
                                                        @endif
                                                    </div>
                                                </td>
                                                <td>{{ $chamCong->Note }}</td>
                                            </tr>
                                        @endforeach
                                    @endfor
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-center">
                                <p class="m-0 text-muted">Showing <span>{{ $nhanViens->firstItem()}}</span> to <span>{{ $nhanViens->lastItem()}}</span> of <span>{{$nhanViens->total()}}</span> entries</p>
                                <div class="pagination m-0 ms-auto">
                                    {{ $nhanViens->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
