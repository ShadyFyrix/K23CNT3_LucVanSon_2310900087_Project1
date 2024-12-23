@extends('layouts.admin.master')
@section('title', 'Thêm Sản Phẩm')
@section('content-body')
<div class="container mt-4">
    <h2>Thêm Sản Phẩm</h2>
    <form action="{{ route('san_pham.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="lvs_MaSanPham">Mã    Sản Phẩm</label>
            <input type="text" class="form-control" id="lvs_MaSanPham" name="lvs_MaSanPham" required>
        </div>
        <div class="mb-3">
            <label for="lvs_TenSanPham">Tên Sản Phẩm</label>
            <input type="text" class="form-control" id="lvs_TenSanPham" name="lvs_TenSanPham" required>
        </div>
        <div class="mb-3">
            <label for="lvs_SoLuong">Số Lượng</label>
            <input type="number" class="form-control" id="lvs_SoLuong" name="lvs_SoLuong" min="0" required>
        </div>
        <div class="mb-3">
            <label for="lvs_DonGia">Đơn Giá</label>
            <input type="number" class="form-control" id="lvs_DonGia" name="lvs_DonGia" min="0" required>
        </div>
        <div class="mb-3">
            <label for="lvs_MaLoai">Loại sản phẩm:</label>
            <select id="lvs_MaLoai" name="lvs_MaLoai" required>
                <option value="">Chọn loại sản phẩm</option>
                @foreach($lvs_loai_san_pham as $loai)
                    <option value="{{ $loai->lvs_MaLoai }}">{{ $loai->lvs_TenLoai }}</option>
                @endforeach            
            </select>
        </div>
        <div class="mb-3">
            <label for="lvs_HinhAnh">Hình Ảnh</label>
            <input type="file" class="form-control" id="lvs_HinhAnh" name="lvs_HinhAnh" required>
        </div>
        <div class="mb-3">
            <label for="lvs_TrangThai">Trạng Thái</label>
            <select class="form-control" id="lvs_TrangThai" name="lvs_TrangThai" required>
                <option value="1">Kích hoạt</option>
                <option value="0">Vô hiệu hóa</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Lưu</button>
        <a href="{{ route('san_pham.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection
