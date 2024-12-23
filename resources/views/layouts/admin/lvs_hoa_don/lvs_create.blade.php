@extends('layouts.admin.master')
@section('title', 'Thêm Hóa đơn mới')

@section('content-body')
<div class="container mt-4">
    <h2 class="mb-4">Thêm Hóa đơn mới</h2>

    <form action="{{ route('hoa_don.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="lvs_MaHoaDon" class="form-label">Mã Hóa Đơn</label>
            <input type="text" name="lvs_MaHoaDon" class="form-control" id="lvs_MaHoaDon" required>
        </div>
        <div class="mb-3">
            <label for="lvs_Makhachhang" class="form-label">Mã Khách Hàng</label>
            <input type="number" name="lvs_Makhachhang" class="form-control" id="lvs_Makhachhang" required>
        </div>
        <div class="mb-3">
            <label for="lvs_NgayHoaDon" class="form-label">Ngày Hóa Đơn</label>
            <input type="date" name="lvs_NgayHoaDon" class="form-control" id="lvs_NgayHoaDon" required>
        </div>
        <div class="mb-3">
            <label for="lvs_HotenKhachHang" class="form-label">Họ Tên Khách Hàng</label>
            <input type="text" name="lvs_HotenKhachHang" class="form-control" id="lvs_HotenKhachHang" required>
        </div>
        <div class="mb-3">
            <label for="lvs_Email" class="form-label">Email</label>
            <input type="email" name="lvs_Email" class="form-control" id="lvs_Email" required>
        </div>
        <div class="mb-3">
            <label for="lvs_DienThoai" class="form-label">Số Điện Thoại</label>
            <input type="text" name="lvs_DienThoai" class="form-control" id="lvs_DienThoai" required>
        </div>
        <div class="mb-3">
            <label for="lvs_DiaChi" class="form-label">Địa Chỉ</label>
            <input type="text" name="lvs_DiaChi" class="form-control" id="lvs_DiaChi" required>
        </div>
        <div class="mb-3">
            <label for="lvs_TongGiaTri" class="form-label">Tổng Giá Trị</label>
            <input type="number" name="lvs_TongGiaTri" class="form-control" id="lvs_TongGiaTri" required>
        </div>
        <div class="mb-3">
            <label for="lvs_TrangThai" class="form-label">Trạng Thái</label>
            <select name="lvs_TrangThai" id="lvs_TrangThai" class="form-select">
                <option value="1">Kích hoạt</option>
                <option value="0">Vô hiệu hóa</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Lưu</button>
    </form>
</div>
@endsection
