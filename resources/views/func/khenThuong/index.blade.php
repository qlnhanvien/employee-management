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
    <div class="page-header d-print-none mt-5">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <h2 class="page-title">
                        Quản lý khen thưởng
                    </h2>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal"
                           data-bs-target="#modal-report">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                 viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M12 5l0 14"/>
                                <path d="M5 12l14 0"/>
                            </svg>
                            Tạo mới
                        </a>
                        <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal"
                           data-bs-target="#modal-report" aria-label="Create new report">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                 viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M12 5l0 14"/>
                                <path d="M5 12l14 0"/>
                            </svg>
                        </a>
                    </div>
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
                            <h3 class="card-title">Bảng khen thưởng</h3>
                        </div>
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter text-nowrap datatable">
                                <thead>
                                <tr>
                                    <th class="w-1">Mã khen thưởng</th>
                                    <th>Khen thưởng tập thể</th>
                                    <th>Khen thưởng cá nhân</th>
                                    <th>Số tiền khen thưởng</th>
                                    <th></th>
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
                                            <a href="{{ route('admin.nhanvien.edit', $nhanvien->MaNV) }}"
                                               class="btn btn-green btn-primary w-auto">Chỉnh sửa</a>
                                            <form action="{{ route('admin.nhanvien.delete', $nhanvien->MaNV) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-red btn-primary w-auto">Xóa</button>
                                            </form>

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
    @include('nhanvien.create')

    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Open modal if there are validation errors -->
    @if ($errors->any())
        <script>
            var myModal = new bootstrap.Modal(document.getElementById('modal-report'), {
                keyboard: false
            });
            myModal.show();
        </script>
    @endif
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const dateInput = document.getElementById('datepicker-icon');
            if (!dateInput.value) { // Nếu không có giá trị từ old('NgaySinh')
                dateInput.value = '2000-01-01'; // Đặt giá trị mặc định
            }
        });
    </script>
@endsection
