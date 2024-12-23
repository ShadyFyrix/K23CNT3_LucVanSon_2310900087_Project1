@extends('layouts.admin.master')
@section('tittle', 'Chỉnh Sửa Loại Sản Phẩm')
@section('content-body')
<div class="container border">
    <h1>Chỉnh Sửa Loại Sản Phẩm</h1>
    <form action="{{ route('lvs-admin.lvs_loai_san_pham.update', $loaiSanPham->lvs_Maloai) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label for="lvs_Maloai">Mã Loại</label>
            <input type="text" name="lvs_Maloai" id="lvs_Maloai" value="{{ $loaiSanPham->lvs_Maloai }}" class="form-control" readonly>
        </div>
        <div class="form-group mb-3">
            <label for="lvs_TenLoai">Tên Loại</label>
            <input type="text" name="lvs_TenLoai" id="lvs_TenLoai" value="{{ $loaiSanPham->lvs_TenLoai }}" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label for="lvs_TrangThai">Trạng Thái</label>
            <select name="lvs_TrangThai" id="lvs_TrangThai" class="form-control" required>
                <option value="1" {{ $loaiSanPham->lvs_TrangThai == 1 ? 'selected' : '' }}>Kích Hoạt</option>
                <option value="0" {{ $loaiSanPham->lvs_TrangThai == 0 ? 'selected' : '' }}>Không Kích Hoạt</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Cập Nhật</button>
        <a href="{{ route('lvs-admin.lvs_loai_san_pham') }}" class="btn btn-secondary">Hủy</a>
    </form>
</div>
@endsection
