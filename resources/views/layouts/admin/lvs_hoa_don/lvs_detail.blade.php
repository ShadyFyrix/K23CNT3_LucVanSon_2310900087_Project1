@extends('layouts.admin.master')

@section('title', 'Chi tiết Hóa đơn')

@section('content-body')
<div class="container border">
    <h2>Chi Tiết Hóa Đơn</h2>
    <table class="table table-striped">
        <tr>
            <th>Mã Hóa Đơn:</th>
            <td>{{ $hoaDon->lvs_MaHoaDon }}</td>
        </tr>
        <tr>
            <th>Mã Khách Hàng:</th>
            <td>{{ $hoaDon->lvs_Makhachhang }}</td>
        </tr>
        <tr>
            <th>Ngày Hóa Đơn:</th>
            <td>{{ $hoaDon->lvs_NgayHoaDon }}</td>
        </tr>
        <tr>
            <th>Họ Tên Khách Hàng:</th>
            <td>{{ $hoaDon->lvs_HotenKhachHang }}</td>
        </tr>
        <tr>
            <th>Email:</th>
            <td>{{ $hoaDon->lvs_Email }}</td>
        </tr>
        <tr>
            <th>Điện Thoại:</th>
            <td>{{ $hoaDon->lvs_DienThoai }}</td>
        </tr>
        <tr>
            <th>Địa Chỉ:</th>
            <td>{{ $hoaDon->lvs_DiaChi }}</td>
        </tr>
        <tr>
            <th>Tổng Giá Trị:</th>
            <td>{{ number_format($hoaDon->lvs_TongGiaTri, 0, ',', '.') }} VND</td>
        </tr>
        <tr>
            <th>Trạng Thái:</th>
            <td>{{ $hoaDon->lvs_TrangThai ? 'Kích hoạt' : 'Vô hiệu hóa' }}</td>
        </tr>
    </table>
    <a href="{{ route('hoa_don.index') }}" class="btn btn-secondary">Quay lại danh sách</a>
</div>
@endsection
