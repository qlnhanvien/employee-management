<div class="modal modal-blur fade" id="modal-report" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="form-add-nhan-vien" class="card" method="Post" action="{{ route('admin.nhanvien.store') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Tạo mới</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label required">Tên NV
                        </label>
                        <div>
                            <input type="text" class="form-control @error('TenNV') is-invalid @enderror" name="TenNV" value="{{ old('TenNV') }}">
                        </div>
                        @error('TenNV')
                        <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Giới tính
                        </label>
                        <select type="text" class="form-select" id="select-option-cate" name="Phai">
                            <option value="0" >Nữ</option>
                            <option value="1" >Nam</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label required">Ngày sinh
                        </label>
                        <div class="input-icon mb-2">
                            <input class="form-control " type="date" placeholder="Select a date" id="datepicker-icon" name="NgaySinh" value="{{ old('NgaySinh','01/01/2000') }}"/>
                            <span class="input-icon-addon"><!-- Download SVG icon from http://tabler-icons.io/i/calendar -->
                              </span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label required">Địa chỉ
                        </label>
                        <div>
                            <input type="text" class="form-control @error('DiaChiNV') is-invalid @enderror" name="DiaChiNV" value="{{ old('DiaChiNV') }}">
                        </div>
                        @error('DiaChiNV')
                        <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label required">Điện thoại</label>
                        <input type="text" class="form-control @error('DienThoaiNV') is-invalid @enderror" name="DienThoaiNV" value="{{ old('DienThoaiNV') }}">
                        @error('DienThoaiNV')
                        <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary " name="btn-add-product" value="Thêm mới">
                    <a href="{{ route('admin.nhanvien.index') }}" class="btn btn-green btn-primary">Trở về</a>
                </div>
            </form>
        </div>
    </div>
</div>
