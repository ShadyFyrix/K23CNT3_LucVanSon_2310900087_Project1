@extends('layouts.admin.master')
@section('tittle', 'Thêm Loại Sản Phẩm')
@section('content-body')
<div class="container">
    <h1>Thêm Loại Sản Phẩm</h1>
    <form action="{{ route('lvs-admin.lvs_loai_san_pham.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="lvs_Maloai">Mã Loại</label>
            <input type="text" name="lvs_Maloai" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="lvs_TenLoai">Tên Loại</label>
            <input type="text" name="lvs_TenLoai" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="lvs_TrangThai">Trạng Thái</label>
            <select name="lvs_TrangThai" class="form-control" required>
                <option value="1">Hoạt Động</option>
                <option value="0">Không Hoạt Động</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Lưu</button>
    </form>
</div>
@endsection
