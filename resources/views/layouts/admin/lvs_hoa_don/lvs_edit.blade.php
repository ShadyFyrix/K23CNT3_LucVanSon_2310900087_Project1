@extends('layouts.admin.master')

@section('title', 'Chỉnh Sửa Hóa Đơn')

@section('content-body')
<style>
    .form-label {
        font-weight: bold;
    }

    .card-header {
        background-color: #0d6efd;
        color: white;
        animation: fadeInDown 1s ease-in-out;
    }

    .btn-primary {
        transition: all 0.3s ease-in-out;
    }

    .btn-primary:hover {
        background-color: #0a58ca;
        transform: scale(1.05);
    }

    .btn-secondary:hover {
        transform: scale(1.05);
        opacity: 0.9;
    }

    @keyframes fadeInUp {
        0% {
            opacity: 0;
            transform: translateY(20px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .card {
        animation: fadeInUp 1s ease-in-out;
    }

    .form-control {
        transition: all 0.3s ease;
    }

    .form-control:focus {
        box-shadow: 0 0 10px #0d6efd;
        border-color: #0d6efd;
    }
</style>

<section class="container mt-5">
    <form action="{{ route('lvs.editHDSubmit', ['lvs_MaHoaDon' => $lvs_hoa_don->lvs_MaHoaDon]) }}" method="POST">
        @csrf
        <div class="card shadow-lg">
            <div class="card-header text-center">
                <h3><i class="fas fa-edit"></i> Thông Tin Hóa Đơn</h3>
            </div>
            <div class="card-body">
                <!-- Mã hóa đơn -->
                <div class="mb-3 row">
                    <label for="lvs_MaHoaDon" class="col-sm-2 col-form-label"><i class="fas fa-barcode"></i> Mã Hóa Đơn</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="lvs_MaHoaDon" name="lvs_MaHoaDon" value="{{ $lvs_hoa_don->lvs_MaHoaDon }}" readonly>
                    </div>
                </div>
                <!-- Mã khách hàng -->
                <div class="mb-3 row">
                    <label for="lvs_Makhachhang" class="col-sm-2 col-form-label"><i class="fas fa-user"></i> Mã KH</label>
                    <div class="col-sm-10">
                        <select class="form-select" id="lvs_Makhachhang" name="lvs_Makhachhang" required>
                            @foreach ($lvs_khach_hang as $khachHang)
                                <option value="{{ $khachHang->id }}" {{ $lvs_hoa_don->lvs_Makhachhang == $khachHang->id ? 'selected' : '' }}>
                                    {{ $khachHang->id }} - {{ $khachHang->lvs_Hotenkhachhang }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <!-- Họ tên khách hàng -->
                <div class="mb-3 row">
                    <label for="lvs_HotenKhachHang" class="col-sm-2 col-form-label"><i class="fas fa-address-card"></i> Họ Tên Khách Hàng</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="lvs_HotenKhachHang" name="lvs_HotenKhachHang" value="{{ $lvs_hoa_don->lvs_HotenKhachHang }}">
                    </div>
                </div>
                <!-- Ngày hóa đơn -->
                <div class="mb-3 row">
                    <label for="lvs_NgayHoaDon" class="col-sm-2 col-form-label"><i class="fas fa-calendar-alt"></i> Ngày Hóa Đơn</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="lvs_NgayHoaDon" name="lvs_NgayHoaDon" value="{{ $lvs_hoa_don->lvs_NgayHoaDon }}" required>
                    </div>
                </div>
                <!-- Email -->
                <div class="mb-3 row">
                    <label for="lvs_Email" class="col-sm-2 col-form-label"><i class="fas fa-envelope"></i> Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="lvs_Email" name="lvs_Email" value="{{ $lvs_hoa_don->lvs_Email }}" required>
                    </div>
                </div>
                <!-- Điện thoại -->
                <div class="mb-3 row">
                    <label for="lvs_DienThoai" class="col-sm-2 col-form-label"><i class="fas fa-phone"></i> Điện Thoại</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="lvs_DienThoai" name="lvs_DienThoai" value="{{ $lvs_hoa_don->lvs_DienThoai }}" required>
                    </div>
                </div>
                <!-- Địa chỉ -->
                <div class="mb-3 row">
                    <label for="lvs_DiaChi" class="col-sm-2 col-form-label"><i class="fas fa-map-marker-alt"></i> Địa Chỉ</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="lvs_DiaChi" name="lvs_DiaChi" value="{{ $lvs_hoa_don->lvs_DiaChi }}" required>
                    </div>
                </div>
                <!-- Tổng giá trị -->
                <div class="mb-3 row">
                    <label for="lvs_TongGiaTri" class="col-sm-2 col-form-label"><i class="fas fa-money-bill"></i> Tổng Giá Trị</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="lvs_TongGiaTri" name="lvs_TongGiaTri" value="{{ $lvs_hoa_don->lvs_TongGiaTri }}" step="0.01" min="0" required>
                    </div>
                </div>
                <!-- Trạng thái -->
                <div class="mb-3 row">
                    <label for="lvs_TrangThai" class="col-sm-2 col-form-label"><i class="fas fa-toggle-on"></i> Trạng Thái</label>
                    <div class="col-sm-10">
                        <div>
                            <input type="radio" id="lvs_TrangThai1" name="lvs_TrangThai" value="0" {{ $lvs_hoa_don->lvs_TrangThai == 0 ? 'checked' : '' }}>
                            <label for="lvs_TrangThai1">Không hoạt động</label>
                        </div>
                        <div>
                            <input type="radio" id="lvs_TrangThai2" name="lvs_TrangThai" value="1" {{ $lvs_hoa_don->lvs_TrangThai == 1 ? 'checked' : '' }}>
                            <label for="lvs_TrangThai2">Hoạt động</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-end">
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Cập nhật</button>
                <a href="{{ route('lvs.listHD') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Quay lại</a>
            </div>
        </div>
    </form>
</section>
@endsection
