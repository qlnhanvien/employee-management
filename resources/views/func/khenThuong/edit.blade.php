@extends('layouts.index');
@section('title')
    <title>Chỉnh sửa nhân viên</title>
@endsection
@section('css')
    @includeFirst(['layouts.buildCss'])
@endsection
@section('js')
    @includeFirst(['layouts.buildJs'])
    <script src="{{ asset('libs/litepicker/dist/litepicker.js') }}" defer></script>
    <script>
        // @formatter:off
        document.addEventListener("DOMContentLoaded", function () {
            window.Litepicker && (new Litepicker({
                element: document.getElementById('datepicker-icon'),
                buttonText: {
                    previousMonth: `<!-- Download SVG icon from http://tabler-icons.io/i/chevron-left -->
    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 6l-6 6l6 6" /></svg>`,
                    nextMonth: `<!-- Download SVG icon from http://tabler-icons.io/i/chevron-right -->
    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 6l6 6l-6 6" /></svg>`,
                },
            }));
        });
        // @formatter:on
    </script>
@endsection
@section('main')
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">
                <div class="col-12">
                    @if (session('success'))
                        <div id="success-alert" class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form id="form-add-nhan-vien" class="card" method="post" action="{{ route('admin.nhanvien.update', $nhanvien->MaNV) }}">
                        @csrf
                        <div class="card-header">
                            <h3 class="card-title">Thêm mới nhân viên</h3>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label required readonly">Mã NV
                                </label>
                                <div>
                                    <input type="text" class="form-control" name="MaNV" value="{{ $nhanvien->MaNV }}" readonly>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Tên NV
                                </label>
                                <div>
                                    <input type="text" class="form-control @error('TenNV') is-invalid @enderror" name="TenNV" value=" {{ $nhanvien->TenNV }}">
                                </div>
                                @error('TenNV')
                                <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Phái
                                </label>
                                <select type="text" class="form-select" id="select-option-sex" name="Phai">
                                    <option value="0" {{ $nhanvien->Phai == 0 ? 'selected' : ''}}>Nữ</option>
                                    <option value="1" {{ $nhanvien->Phai == 1 ? 'selected' : ''}}>Nam</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Ngày sinh
                                </label>
                                <div class="input-icon mb-2">
                                    <input class="form-control " placeholder="Select a date" id="datepicker-icon" name="NgaySinh" value="{{ $nhanvien->NgaySinh }}"/>
                                    <span class="input-icon-addon"><!-- Download SVG icon from http://tabler-icons.io/i/calendar -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z" /><path d="M16 3v4" /><path d="M8 3v4" /><path d="M4 11h16" /><path d="M11 15h1" /><path d="M12 15v3" /></svg>
                              </span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Địa chỉ
                                </label>
                                <div>
                                    <input type="text" class="form-control @error('DiaChiNV') is-invalid @enderror" name="DiaChiNV" value="{{ $nhanvien->DiaChiNV }}">
                                </div>
                                @error('DiaChiNV')
                                <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Điện thoại</label>
                                <input type="text" class="form-control @error('DienThoaiNV') is-invalid @enderror" name="DienThoaiNV" value=" {{ $nhanvien->DienThoaiNV }}">
                            </div>
                            @error('DienThoaiNV')
                            <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="card-footer text-end">
                            <input type="submit" class="btn btn-primary " name="btn-update-nhanvien" value="Cập nhật">
                            <a href="{{ route('admin.nhanvien.index') }}" class="btn btn-green btn-primary">Trở về</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
