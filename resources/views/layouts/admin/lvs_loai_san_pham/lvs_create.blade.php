@extends('layouts.admin.master')
@section('tittle', 'Thêm Loại Sản Phẩm')
@section('content-body')
<div class="container border mt-4 animate__animated animate__fadeIn">
    <h1 class="mb-4 animate__animated animate__fadeInDown">
        <i class="fas fa-plus-circle"></i> Thêm Loại Sản Phẩm
    </h1>
    <form action="{{ route('lvs-admin.lvs_loai_san_pham.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="lvs_Maloai"><i class="fas fa-barcode"></i> Mã Loại</label>
            <input type="text" name="lvs_Maloai" id="lvs_Maloai" class="form-control" required placeholder="Nhập mã loại...">
        </div>
        <div class="form-group mb-3">
            <label for="lvs_TenLoai"><i class="fas fa-tag"></i> Tên Loại</label>
            <input type="text" name="lvs_TenLoai" id="lvs_TenLoai" class="form-control" required placeholder="Nhập tên loại...">
        </div>
        <div class="form-group mb-3">
            <label for="lvs_TrangThai"><i class="fas fa-toggle-on"></i> Trạng Thái</label>
            <select name="lvs_TrangThai" id="lvs_TrangThai" class="form-control" required>
                <option value="1">Hoạt Động</option>
                <option value="0">Không Hoạt Động</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success mt-3 animate__animated animate__bounceIn">
            <i class="fas fa-save"></i> Lưu
        </button>
        <a href="{{ route('lvs-admin.lvs_loai_san_pham') }}" class="btn btn-secondary mt-3 animate__animated animate__bounceIn">
            <i class="fas fa-arrow-left"></i> Quay Lại
        </a>
    </form>
</div>
@endsection
