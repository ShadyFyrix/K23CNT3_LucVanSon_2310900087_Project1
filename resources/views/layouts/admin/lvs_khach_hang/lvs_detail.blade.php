@extends('layouts.admin.master')
@section('tittle', 'Chi Tiết Loại Sản Phẩm')
@section('content-body')
<div class="container border">
    <h1>Chi Tiết Loại Sản Phẩm</h1>
    <div class="row">
        <div class="col-6">
            <p><strong>Mã Loại:</strong> {{ $loaiSanPham->lvs_Maloai }}</p>
            <p><strong>Tên Loại:</strong> {{ $loaiSanPham->lvs_TenLoai }}</p>
            <p><strong>Trạng Thái:</strong> {{ $loaiSanPham->lvs_TrangThai ? 'Kích Hoạt' : 'Không Kích Hoạt' }}</p>
        </div>
    </div>
    <a href="{{ route('lvs-admin.lvs_loai_san_pham') }}" class="btn btn-primary">Quay Lại</a>
</div>
@endsection
