@extends('layouts.admin.master')

@section('title', 'Chi tiết Hóa đơn')

@section('content-body')
<div class="container border rounded shadow-lg mt-4 p-4 animate__animated animate__fadeIn">
    <h2 class="text-center text-primary mb-4 animate__animated animate__fadeInDown" style="font-size: 30px;">
        <i class="fas fa-file-invoice"></i> Chi Tiết Hóa Đơn
    </h2>
    <table class="table table-bordered table-striped shadow-sm animate__animated animate__fadeInUp">
        <tbody>
            <tr>
                <th class="bg-light text-primary" style="width: 30%;">
                    <i class="fas fa-barcode"></i> Mã Hóa Đơn:
                </th>
                <td>{{ $lvs_hoa_don->lvs_MaHoaDon }}</td>
            </tr>
            <tr>
                <th class="bg-light text-primary">
                    <i class="fas fa-user"></i> Mã Khách Hàng:
                </th>
                <td>{{ $lvs_hoa_don->lvs_Makhachhang }}</td>
            </tr>
            <tr>
                <th class="bg-light text-primary">
                    <i class="fas fa-calendar-alt"></i> Ngày Hóa Đơn:
                </th>
                <td>{{ $lvs_hoa_don->lvs_NgayHoaDon }}</td>
            </tr>
            <tr>
                <th class="bg-light text-primary">
                    <i class="fas fa-user-tag"></i> Họ Tên Khách Hàng:
                </th>
                <td>{{ $lvs_hoa_don->lvs_HotenKhachHang }}</td>
            </tr>
            <tr>
                <th class="bg-light text-primary">
                    <i class="fas fa-envelope"></i> Email:
                </th>
                <td>{{ $lvs_hoa_don->lvs_Email }}</td>
            </tr>
            <tr>
                <th class="bg-light text-primary">
                    <i class="fas fa-phone-alt"></i> Điện Thoại:
                </th>
                <td>{{ $lvs_hoa_don->lvs_DienThoai }}</td>
            </tr>
            <tr>
                <th class="bg-light text-primary">
                    <i class="fas fa-map-marker-alt"></i> Địa Chỉ:
                </th>
                <td>{{ $lvs_hoa_don->lvs_DiaChi }}</td>
            </tr>
            <tr>
                <th class="bg-light text-primary">
                    <i class="fas fa-dollar-sign"></i> Tổng Giá Trị:
                </th>
                <td>{{ number_format($lvs_hoa_don->lvs_TongGiaTri, 0, ',', '.') }} VND</td>
            </tr>
            <tr>
                <th class="bg-light text-primary">
                    <i class="fas fa-toggle-on"></i> Trạng Thái:
                </th>
                <td>
                    <span class="badge {{ $lvs_hoa_don->lvs_TrangThai ? 'bg-success' : 'bg-danger' }}">
                        {{ $lvs_hoa_don->lvs_TrangThai ? 'Kích hoạt' : 'Vô hiệu hóa' }}
                    </span>
                </td>
            </tr>
        </tbody>
    </table>
    <div class="text-center mt-4">
        <a href="{{ route('lvs.listHD') }}" class="btn btn-secondary shadow">
            <i class="fas fa-arrow-left"></i> Quay Lại Danh Sách
        </a>
    </div>
</div>
@endsection
