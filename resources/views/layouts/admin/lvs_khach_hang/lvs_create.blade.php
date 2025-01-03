@extends('layouts.admin.master')
@section('title', 'Thêm Khách Hàng')

@section('content-body')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <!-- Form Card -->
            <form action="{{ route('lvs.storekhachhang') }}" method="POST" class="shadow-lg p-4 bg-light rounded animate__animated animate__fadeInUp">
                @csrf
                <div class="card border-0">
                    <div class="card-header bg-primary text-white text-center rounded">
                        <h2 class="mb-0">
                            <i class="fas fa-user-plus"></i> Thêm Mới Khách Hàng
                        </h2>
                    </div>

                    <div class="card-body">
                        <!-- Mã Khách Hàng -->
                        <div class="mb-3 row">
                            <label for="lvs_Makhachhang" class="col-sm-4 col-form-label fw-bold">
                                <i class="fas fa-id-card"></i> Mã Khách Hàng:
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="lvs_Makhachhang" name="lvs_Makhachhang" value="{{ old('lvs_Makhachhang') }}" required>
                                @error('lvs_Makhachhang')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Tên Khách Hàng -->
                        <div class="mb-3 row">
                            <label for="lvs_Hotenkhachhang" class="col-sm-4 col-form-label fw-bold">
                                <i class="fas fa-user"></i> Tên Khách Hàng:
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="lvs_Hotenkhachhang" name="lvs_Hotenkhachhang" value="{{ old('lvs_Hotenkhachhang') }}" required>
                                @error('lvs_Hotenkhachhang')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                            <!-- Mật khẩu -->
                            <div class="mb-3 row">
                                <label for="lvs_MatKhau" class="col-sm-3 col-form-label">
                                    <i class="fas fa-lock"></i> Mật Khẩu:
                                </label>
                                <div class="col-sm-9">
                                    <input 
                                        type="password" 
                                        class="form-control animate__animated animate__fadeInLeft" 
                                        id="lvs_MatKhau" 
                                        name="lvs_MatKhau" 
                                        placeholder="Nhập mật khẩu" 
                                        required 
                                    >
                                </div>
                            </div>
                        <!-- Email -->
                        <div class="mb-3 row">
                            <label for="lvs_Email" class="col-sm-4 col-form-label fw-bold">
                                <i class="fas fa-envelope"></i> Email:
                            </label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" id="lvs_Email" name="lvs_Email" value="{{ old('lvs_Email') }}" required>
                                @error('lvs_Email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Điện Thoại -->
                        <div class="mb-3 row">
                            <label for="lvs_DienThoai" class="col-sm-4 col-form-label fw-bold">
                                <i class="fas fa-phone"></i> Điện Thoại:
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="lvs_DienThoai" name="lvs_DienThoai" value="{{ old('lvs_DienThoai') }}" required>
                                @error('lvs_DienThoai')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Địa Chỉ -->
                        <div class="mb-3 row">
                            <label for="lvs_DiaChi" class="col-sm-4 col-form-label fw-bold">
                                <i class="fas fa-map-marker-alt"></i> Địa Chỉ:
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="lvs_DiaChi" name="lvs_DiaChi" value="{{ old('lvs_DiaChi') }}" required>
                                @error('lvs_DiaChi')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Ngày Đăng Ký -->
                        <div class="mb-3 row">
                            <label for="lvs_NgayDK" class="col-sm-4 col-form-label fw-bold">
                                <i class="fas fa-calendar-alt"></i> Ngày Đăng Ký:
                            </label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control" id="lvs_NgayDK" name="lvs_NgayDK" value="{{ old('lvs_NgayDK') }}" required>
                                @error('lvs_NgayDK')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Trạng Thái -->
                        <div class="mb-3 row">
                            <label for="lvs_TrangThai" class="col-sm-4 col-form-label fw-bold">
                                <i class="fas fa-toggle-on"></i> Trạng Thái:
                            </label>
                            <div class="col-sm-8">
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" id="lvs_TrangThai1" name="lvs_TrangThai" value="1" checked>
                                    <label for="lvs_TrangThai1" class="form-check-label">Active</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" id="lvs_TrangThai0" name="lvs_TrangThai" value="0">
                                    <label for="lvs_TrangThai0" class="form-check-label">Inactive</label>
                                </div>
                                @error('lvs_TrangThai')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-success px-4">
                            <i class="fas fa-save"></i> Ghi Lại
                        </button>
                        <a href="{{ route('lvs.listkhachhang') }}" class="btn btn-secondary px-4">
                            <i class="fas fa-arrow-left"></i> Quay Lại
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- CSS for Animations -->
<style>
    form {
        animation: fadeInUp 0.5s ease-in-out;
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
