@extends('layouts.admin.master')
@section('tittle', 'Chỉnh Sửa Loại Sản Phẩm')
@section('content-body')
<div class="container border animate__animated animate__fadeIn mt-4 p-4">
    <h1 class="animate__animated animate__fadeInDown mb-4"><i class="fas fa-edit"></i> Chỉnh Sửa Loại Sản Phẩm</h1>
    <form action="{{ route('lvs-admin.lvs_loai_san_pham.update', $loaiSanPham->lvs_Maloai) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3 animate__animated animate__fadeInLeft">
            <label for="lvs_Maloai"><i class="fas fa-barcode"></i> Mã Loại</label>
            <input type="text" name="lvs_Maloai" id="lvs_Maloai" value="{{ $loaiSanPham->lvs_Maloai }}" class="form-control" readonly>
        </div>

        <div class="form-group mb-3 animate__animated animate__fadeInRight">
            <label for="lvs_TenLoai"><i class="fas fa-tag"></i> Tên Loại</label>
            <input type="text" name="lvs_TenLoai" id="lvs_TenLoai" value="{{ $loaiSanPham->lvs_TenLoai }}" class="form-control" required>
        </div>

        <div class="form-group mb-3 animate__animated animate__fadeInLeft">
            <label for="lvs_TrangThai"><i class="fas fa-toggle-on"></i> Trạng Thái</label>
            <select name="lvs_TrangThai" id="lvs_TrangThai" class="form-control" required>
                <option value="1" {{ $loaiSanPham->lvs_TrangThai == 1 ? 'selected' : '' }}>Kích Hoạt</option>
                <option value="0" {{ $loaiSanPham->lvs_TrangThai == 0 ? 'selected' : '' }}>Không Kích Hoạt</option>
            </select>
        </div>

        <div class="d-flex justify-content-between mt-4">
            <button type="submit" class="btn btn-success animate__animated animate__zoomIn"><i class="fas fa-save"></i> Cập Nhật</button>
            <a href="{{ route('lvs-admin.lvs_loai_san_pham') }}" class="btn btn-secondary animate__animated animate__zoomIn"><i class="fas fa-times"></i> Hủy</a>
        </div>
    </form>
</div>
@endsection
