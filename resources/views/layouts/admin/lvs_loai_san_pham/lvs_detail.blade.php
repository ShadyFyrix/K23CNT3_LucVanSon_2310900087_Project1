@extends('layouts.admin.master')
@section('tittle', 'Chi Tiết Loại Sản Phẩm')
@section('content-body')
<div class="container border animate__animated animate__fadeIn mt-4 p-4">
    <h1 class="animate__animated animate__fadeInDown mb-4">
        <i class="fas fa-info-circle"></i> Chi Tiết Loại Sản Phẩm
    </h1>
    <div class="row">
        <div class="col-6">
            <p class="animate__animated animate__fadeInLeft"><strong><i class="fas fa-barcode"></i> Mã Loại:</strong> {{ $loaiSanPham->lvs_Maloai }}</p>
            <p class="animate__animated animate__fadeInRight"><strong><i class="fas fa-tag"></i> Tên Loại:</strong> {{ $loaiSanPham->lvs_TenLoai }}</p>
            <p class="animate__animated animate__fadeInLeft"><strong><i class="fas fa-toggle-on"></i> Trạng Thái:</strong> 
                {{ $loaiSanPham->lvs_TrangThai ? 'Kích Hoạt' : 'Không Kích Hoạt' }}
            </p>
        </div>
    </div>
    <a href="{{ route('lvs-admin.lvs_loai_san_pham') }}" class="btn btn-primary mt-3 animate__animated animate__zoomIn">
        <i class="fas fa-arrow-left"></i> Quay Lại
    </a>
</div>
@endsection
