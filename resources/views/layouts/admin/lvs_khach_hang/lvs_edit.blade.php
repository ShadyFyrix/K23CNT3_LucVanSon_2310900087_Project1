@extends('layouts.admin.master')
@section('title', 'Chỉnh Sửa Khách Hàng')
@section('content-body')
<div class="container py-4">
    <!-- Page Title -->
    <h1 class="text-center text-warning mb-4 animate__animated animate__fadeInDown" 
        style="font-weight: bold; font-size: 28px; text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);">
        <i class="fas fa-edit"></i> Chỉnh Sửa Khách Hàng
    </h1>

    <!-- Edit Customer Form -->
    <form method="POST" action="{{ route('lvs.updatekhachhang', $khachHang->id) }}" class="shadow-sm p-4 bg-light rounded">
        @csrf
        @method('PUT')

        <!-- Mã Khách Hàng -->
        <div class="form-group mb-3">
            <label for="lvs_Makhachhang" class="form-label">
                <i class="fas fa-id-card"></i> Mã Khách Hàng
            </label>
            <input type="text" name="lvs_Makhachhang" class="form-control" 
                   value="{{ $khachHang->lvs_Makhachhang }}" required>
        </div>

        <!-- Tên Khách Hàng -->
        <div class="form-group mb-3">
            <label for="lvs_Hotenkhachhang" class="form-label">
                <i class="fas fa-user"></i> Tên Khách Hàng
            </label>
            <input type="text" name="lvs_Hotenkhachhang" class="form-control" 
                   value="{{ $khachHang->lvs_Hotenkhachhang }}" required>
        </div>

         <!-- Mật khẩu -->
         <div class="mb-3 row">
            <label for="lvs_MatKhau" class="col-sm-2 col-form-label">
                <i class="fas fa-key"></i> Mật Khẩu
            </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="lvs_MatKhau" name="lvs_MatKhau" placeholder="Nhập mật khẩu mới nếu cần thay đổi">
                <small class="text-muted">Để trống nếu không muốn thay đổi mật khẩu.</small>
            </div>
        </div>
        <!-- Email -->
        <div class="form-group mb-3">
            <label for="lvs_Email" class="form-label">
                <i class="fas fa-envelope"></i> Email
            </label>
            <input type="email" name="lvs_Email" class="form-control" 
                   value="{{ $khachHang->lvs_Email }}" required>
        </div>

        <!-- Số Điện Thoại -->
        <div class="form-group mb-3">
            <label for="lvs_DienThoai" class="form-label">
                <i class="fas fa-phone"></i> Số Điện Thoại
            </label>
            <input type="text" name="lvs_DienThoai" class="form-control" 
                   value="{{ $khachHang->lvs_DienThoai }}" required>
        </div>

        <!-- Địa Chỉ -->
        <div class="form-group mb-3">
            <label for="lvs_DiaChi" class="form-label">
                <i class="fas fa-map-marker-alt"></i> Địa Chỉ
            </label>
            <textarea name="lvs_DiaChi" class="form-control" rows="3">{{ $khachHang->lvs_DiaChi }}</textarea>
        </div>

        <!-- Ngày Đăng Ký -->
        <div class="form-group mb-3">
            <label for="lvs_NgayDK" class="form-label">
                <i class="fas fa-calendar-alt"></i> Ngày Đăng Ký
            </label>
            <input type="date" name="lvs_NgayDK" class="form-control" 
                   value="{{ $khachHang->lvs_NgayDK }}" required>
        </div>

        <!-- Trạng Thái -->
        <div class="form-group mb-4">
            <label for="lvs_TrangThai" class="form-label">
                <i class="fas fa-toggle-on"></i> Trạng Thái
            </label>
            <select name="lvs_TrangThai" class="form-control">
                <option value="1" {{ $khachHang->lvs_TrangThai ? 'selected' : '' }}>Active</option>
                <option value="0" {{ !$khachHang->lvs_TrangThai ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <!-- Submit Button -->
        <div class="text-center">
            <button type="submit" class="btn btn-primary px-4">
                <i class="fas fa-save"></i> Cập Nhật
            </button>
            <a href="{{ route('lvs.listkhachhang') }}" class="btn btn-secondary px-4">
                <i class="fas fa-arrow-left"></i> Quay Lại
            </a>
        </div>
    </form>
</div>

<!-- CSS for Animations -->
<style>
    form {
        animation: fadeInUp 0.5s ease;
    }
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
@endsection
