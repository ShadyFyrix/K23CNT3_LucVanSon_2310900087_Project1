@extends('layouts.admin.master')
@section('title', 'Chỉnh Sửa Hóa Đơn')
@section('content-body')
<div class="container border">
    <h1>Chỉnh Sửa Hóa Đơn</h1>
    <form action="{{ route('hoa_don.update', $hoaDon->lvs_MaHoaDon) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="lvs_MaHoaDon">Mã Hóa Đơn</label>
            <input type="text" name="lvs_MaHoaDon" id="lvs_MaHoaDon" value="{{ $hoaDon->lvs_MaHoaDon }}" class="form-control" readonly>
        </div>

        <div class="form-group mb-3">
            <label for="lvs_Makhachhang">Mã Khách Hàng</label>
            <input type="text" name="lvs_Makhachhang" id="lvs_Makhachhang" value="{{ $hoaDon->lvs_Makhachhang }}" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label for="lvs_HotenKhachHang">Họ Tên Khách Hàng</label>
            <input type="text" name="lvs_HotenKhachHang" id="lvs_HotenKhachHang" value="{{ $hoaDon->lvs_HotenKhachHang }}" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label for="lvs_TongGiaTri">Tổng Giá Trị</label>
            <input type="number" name="lvs_TongGiaTri" id="lvs_TongGiaTri" value="{{ $hoaDon->lvs_TongGiaTri }}" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label for="lvs_Email">Email</label>
            <input type="email" name="lvs_Email" id="lvs_Email" value="{{ $hoaDon->lvs_Email }}" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label for="lvs_DienThoai">Điện Thoại</label>
            <input type="text" name="lvs_DienThoai" id="lvs_DienThoai" value="{{ $hoaDon->lvs_DienThoai }}" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label for="lvs_DiaChi">Địa Chỉ</label>
            <input type="text" name="lvs_DiaChi" id="lvs_DiaChi" value="{{ $hoaDon->lvs_DiaChi }}" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label for="lvs_TrangThai">Trạng Thái</label>
            <select name="lvs_TrangThai" id="lvs_TrangThai" class="form-control" required>
                <option value="1" {{ $hoaDon->lvs_TrangThai == 1 ? 'selected' : '' }}>Kích Hoạt</option>
                <option value="0" {{ $hoaDon->lvs_TrangThai == 0 ? 'selected' : '' }}>Không Kích Hoạt</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Cập Nhật</button>
        <a href="{{ route('hoa_don.index') }}" class="btn btn-secondary">Hủy</a>
    </form>
</div>
@endsection
