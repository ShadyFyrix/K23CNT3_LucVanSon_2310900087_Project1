@extends('layouts.admin.master')
@section('title', 'Thêm Mới Hóa Đơn')
@section('content-body')
<div class="container border rounded shadow-lg mt-4 p-4 animate__animated animate__fadeIn">
    <h2 class="text-center text-primary mb-4 animate__animated animate__fadeInDown" style="font-size: 30px;">
        <i class="fas fa-file-invoice"></i> Thêm Mới Hóa Đơn
    </h2>

    <!-- Form starts here -->
    <form action="{{ route('lvs.createHD') }}" method="POST">
        @csrf

        <!-- Mã Hóa Đơn -->
        <div class="form-group mb-4">
            <label for="lvs_MaHoaDon" class="form-label">
                <i class="fas fa-barcode"></i> Mã Hóa Đơn:
            </label>
            <input type="text" name="lvs_MaHoaDon" id="lvs_MaHoaDon" class="form-control" value="{{ old('lvs_MaHoaDon') }}" required>
            @error('lvs_MaHoaDon')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <!-- Mã Khách Hàng -->
        <div class="form-group mb-4">
            <label for="lvs_Makhachhang" class="form-label">
                <i class="fas fa-user"></i> Mã Khách Hàng:
            </label>
            <select name="lvs_Makhachhang" id="lvs_Makhachhang" class="form-control">
                @foreach($lvs_khach_hang as $khachhang)
                    <option value="{{ $khachhang->id }}" {{ old('lvs_Makhachhang') == $khachhang->id ? 'selected' : '' }}>
                        {{ $khachhang->lvs_Hotenkhachhang }}
                    </option>
                @endforeach
            </select>
            @error('lvs_Makhachhang')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <!-- Ngày Hóa Đơn -->
        <div class="form-group mb-4">
            <label for="lvs_NgayHoaDon" class="form-label">
                <i class="fas fa-calendar-alt"></i> Ngày Hóa Đơn:
            </label>
            <input type="date" name="lvs_NgayHoaDon" id="lvs_NgayHoaDon" class="form-control" value="{{ old('lvs_NgayHoaDon') }}" required>
            @error('lvs_NgayHoaDon')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <!-- Họ Tên Khách Hàng -->
        <div class="form-group mb-4">
            <label for="lvs_HotenKhachHang" class="form-label">
                <i class="fas fa-user-tag"></i> Họ Tên Khách Hàng:
            </label>
            <input type="text" name="lvs_HotenKhachHang" id="lvs_HotenKhachHang" class="form-control" value="{{ old('lvs_HotenKhachHang') }}" required>
            @error('lvs_HotenKhachHang')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <!-- Email -->
        <div class="form-group mb-4">
            <label for="lvs_Email" class="form-label">
                <i class="fas fa-envelope"></i> Email:
            </label>
            <input type="email" name="lvs_Email" id="lvs_Email" class="form-control" value="{{ old('lvs_Email') }}">
            @error('lvs_Email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <!-- Số Điện Thoại -->
        <div class="form-group mb-4">
            <label for="lvs_DienThoai" class="form-label">
                <i class="fas fa-phone-alt"></i> Số Điện Thoại:
            </label>
            <input type="text" name="lvs_DienThoai" id="lvs_DienThoai" class="form-control" value="{{ old('lvs_DienThoai') }}">
            @error('lvs_DienThoai')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <!-- Địa Chỉ -->
        <div class="form-group mb-4">
            <label for="lvs_DiaChi" class="form-label">
                <i class="fas fa-map-marker-alt"></i> Địa Chỉ:
            </label>
            <input type="text" name="lvs_DiaChi" id="lvs_DiaChi" class="form-control" value="{{ old('lvs_DiaChi') }}">
            @error('lvs_DiaChi')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <!-- Tổng Giá Trị -->
        <div class="form-group mb-4">
            <label for="lvs_TongGiaTri" class="form-label">
                <i class="fas fa-dollar-sign"></i> Tổng Giá Trị:
            </label>
            <input type="number" name="lvs_TongGiaTri" id="lvs_TongGiaTri" class="form-control" value="{{ old('lvs_TongGiaTri') }}" step="0.01" required>
            @error('lvs_TongGiaTri')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <!-- Trạng Thái -->
        <div class="form-group mb-4">
            <label class="form-label">
                <i class="fas fa-toggle-on"></i> Trạng Thái:
            </label>
            <div>
                <input type="radio" id="active" name="lvs_TrangThai" value="1" {{ old('lvs_TrangThai') == '1' ? 'checked' : '' }} checked>
                <label for="active">Hiển Thị</label>

                <input type="radio" id="inactive" name="lvs_TrangThai" value="0" {{ old('lvs_TrangThai') == '0' ? 'checked' : '' }}>
                <label for="inactive">Khóa</label>
            </div>
            @error('lvs_TrangThai')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <!-- Submit Button -->
        <div class="d-flex justify-content-between mt-4">
            <button type="submit" class="btn btn-success shadow">
                <i class="fas fa-plus-circle"></i> Thêm Mới
            </button>
            <a href="{{ route('lvs.listHD') }}" class="btn btn-secondary shadow">
                <i class="fas fa-arrow-left"></i> Quay Lại
            </a>
        </div>
    </form>
</div>
@endsection
