@extends('layouts.admin.master')
@section('title', 'Danh sách Hóa đơn')
@section('content-body')
<div class="container mt-4">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <h2 class="mb-4">Danh sách Hóa đơn</h2>
    <a href="{{ route('hoa_don.create') }}" class="btn btn-primary mb-3">
        <i class="fas fa-plus"></i> Thêm Hóa đơn mới
    </a>
    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Mã Hóa Đơn</th>
                <th>Mã Khách Hàng</th>
                <th>Ngày Hóa Đơn</th>
                <th>Họ Tên Khách Hàng</th>
                <th>Email</th>
                <th>Điện Thoại</th>
                <th>Địa Chỉ</th>
                <th>Tổng Giá Trị</th>
                <th>Trạng Thái</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($lvs_hoa_don as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->lvs_MaHoaDon }}</td>
                <td>{{ $item->lvs_Makhachhang }}</td>
                <td>{{ $item->lvs_NgayHoaDon }}</td>
                <td>{{ $item->lvs_HotenKhachHang }}</td>
                <td>{{ $item->lvs_Email }}</td>
                <td>{{ $item->lvs_DienThoai }}</td>
                <td>{{ $item->lvs_DiaChi }}</td>
                <td>{{ number_format($item->lvs_TongGiaTri, 0, ',', '.') }} VND</td>
                <td>{{ $item->lvs_TrangThai ? 'Kích hoạt' : 'Vô hiệu hóa' }}</td>
                <td>
                    <a href="{{ route('hoa_don.show', $item->lvs_MaHoaDon) }}" class="btn btn-info btn-sm">Xem</a>
                    <a href="{{ route('hoa_don.edit', $item->lvs_MaHoaDon) }}" class="btn btn-warning btn-sm">Sửa</a>
                    <form action="{{ route('hoa_don.destroy', $item->lvs_MaHoaDon) }}" method="POST" style="display:inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach            
        </tbody>
    </table>    
    <div class="d-flex justify-content-center">
        {{ $lvs_hoa_don->links() }}
    </div>
</div>
@endsection
