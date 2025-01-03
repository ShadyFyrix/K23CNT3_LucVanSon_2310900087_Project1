@extends('layouts.admin.master')
@section('title', 'Chi Tiết Khách Hàng')
@section('content-body')
<div class="container py-4">
    <!-- Page Title -->
    <h1 class="text-center text-primary mb-4 animate__animated animate__fadeInDown" 
        style="font-weight: bold; font-size: 28px; text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);">
        <i class="fas fa-user"></i> Chi Tiết Khách Hàng
    </h1>

    <!-- Customer Details Table -->
    <div class="table-responsive">
        <table class="table table-striped table-hover border">
            <tbody>
                <tr>
                    <th class="text-right align-middle text-primary">
                        <i class="fas fa-id-card"></i> Mã Khách Hàng
                    </th>
                    <td class="align-middle">{{ $khachHang->lvs_Makhachhang }}</td>
                </tr>
                <tr>
                    <th class="text-right align-middle text-primary">
                        <i class="fas fa-user"></i> Tên Khách Hàng
                    </th>
                    <td class="align-middle">{{ $khachHang->lvs_Hotenkhachhang }}</td>
                </tr>
                <tr>
                    <th class="text-right align-middle text-primary">
                        <i class="fas fa-key"></i> Mật Khẩu
                    </th>
                    <td class="align-middle">{{ $khachHang->lvs_MatKhau ?? 'Không có mật khẩu' }}</td>
                </tr>
                <tr>
                    <th class="text-right align-middle text-primary">
                        <i class="fas fa-envelope"></i> Email
                    </th>
                    <td class="align-middle">{{ $khachHang->lvs_Email }}</td>
                </tr>
                <tr>
                    <th class="text-right align-middle text-primary">
                        <i class="fas fa-phone"></i> Số Điện Thoại
                    </th>
                    <td class="align-middle">{{ $khachHang->lvs_DienThoai }}</td>
                </tr>
                <tr>
                    <th class="text-right align-middle text-primary">
                        <i class="fas fa-map-marker-alt"></i> Địa Chỉ
                    </th>
                    <td class="align-middle">{{ $khachHang->lvs_DiaChi }}</td>
                </tr>
                <tr>
                    <th class="text-right align-middle text-primary">
                        <i class="fas fa-calendar-alt"></i> Ngày Đăng Ký
                    </th>
                    <td class="align-middle">{{ $khachHang->lvs_NgayDK }}</td>
                </tr>
                <tr>
                    <th class="text-right align-middle text-primary">
                        <i class="fas fa-toggle-on"></i> Trạng Thái
                    </th>
                    <td class="align-middle">
                        <span class="badge {{ $khachHang->lvs_TrangThai ? 'bg-success' : 'bg-danger' }}">
                            {{ $khachHang->lvs_TrangThai ? 'Kích Hoạt' : 'Vô Hiệu Hóa' }}
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Back Button -->
    <div class="text-center mt-4">
        <a href="{{ route('lvs.listkhachhang') }}" class="btn btn-secondary shadow-sm">
            <i class="fas fa-arrow-left"></i> Quay Lại
        </a>
    </div>
</div>

<!-- CSS for Table Animation -->
<style>
    table tr {
        animation: fadeInUp 0.5s ease;
    }
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
@endsection
