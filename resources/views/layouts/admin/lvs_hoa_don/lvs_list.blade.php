@extends('layouts.admin.master')
@section('title', 'Danh Sách Bản Ghi')
@section('content-body')
<div class="container py-4">
    <!-- Tiêu đề -->
    <h1 class="text-center text-primary mb-4 animate__animated animate__fadeInDown" 
        style="font-weight: bold; font-size: 28px; text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);">
        <i class="fas fa-file-alt"></i> Danh Sách Hoá Đơn
    </h1>

    <!-- Nút thêm mới -->
    <div class="mb-3">
        <a href="{{ route('lvs.createHD') }}" class="btn btn-success shadow-sm animate__animated animate__bounceIn">
            <i class="fas fa-plus-circle"></i> Thêm Mới
        </a>
    </div>

    <!-- Bảng dữ liệu -->
    <table class="table table-hover table-bordered animate__animated animate__fadeInUp" 
           style="box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);">
        <thead class="table-dark text-center">
            <tr>
                <th>#</th>
                <th><i class="fas fa-barcode"></i> Mã Hóa Đơn</th>
                <th><i class="fas fa-id-card"></i> Mã Khách Hàng</th>
                <th><i class="fas fa-calendar-alt"></i> Ngày Hóa Đơn</th>
                <th><i class="fas fa-user"></i> Họ Tên Khách Hàng</th>
                <th><i class="fas fa-envelope"></i> Email</th>
                <th><i class="fas fa-phone"></i> Điện Thoại</th>
                <th><i class="fas fa-map-marker-alt"></i> Địa Chỉ</th>
                <th><i class="fas fa-dollar-sign"></i> Tổng Giá Trị</th>
                <th><i class="fas fa-toggle-on"></i> Trạng Thái</th>
                <th><i class="fas fa-cogs"></i> Chức Năng</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($lvs_hoa_don as $hoaDon)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $hoaDon->lvs_MaHoaDon }}</td>
                    <td>{{ $hoaDon->lvs_Makhachhang }}</td>
                    <td>{{ $hoaDon->lvs_NgayHoaDon }}</td>
                    <td>{{ $hoaDon->lvs_HotenKhachHang }}</td>
                    <td>{{ $hoaDon->lvs_Email }}</td>
                    <td>{{ $hoaDon->lvs_DienThoai }}</td>
                    <td>{{ $hoaDon->lvs_DiaChi }}</td>
                    <td class="text-end">{{ number_format($hoaDon->lvs_TongGiaTri, 0, ',', '.') }} VNĐ</td>
                    <td class="text-center">
                        <span class="badge {{ $hoaDon->lvs_TrangThai ? 'bg-success' : 'bg-danger' }}">
                            {{ $hoaDon->lvs_TrangThai ? 'Hoạt Động' : 'Không Hoạt Động' }}
                        </span>
                    </td>
                    <td class="text-center">
                        <div class="btn-group">
                            <a href="{{ route('lvs.detailHD', ['lvs_MaHoaDon' => $hoaDon->lvs_MaHoaDon]) }}" 
                               class="btn btn-primary btn-sm shadow-sm">
                                <i class="fas fa-eye"></i> Chi Tiết
                            </a>
                            <a href="{{ route('lvs.editHD', ['lvs_MaHoaDon' => $hoaDon->lvs_MaHoaDon]) }}" 
                               class="btn btn-warning btn-sm shadow-sm">
                                <i class="fas fa-edit"></i> Sửa
                            </a>
                            <form action="{{ route('lvs.deleteHD', ['lvs_MaHoaDon' => $hoaDon->lvs_MaHoaDon]) }}" 
                                  method="POST" 
                                  onsubmit="return confirm('Bạn có chắc chắn muốn xóa hóa đơn này?');" 
                                  style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm shadow-sm">
                                    <i class="fas fa-trash"></i> Xóa
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="11" class="text-center text-muted">
                        <i class="fas fa-info-circle"></i> Chưa có bản ghi nào.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Phân trang -->
    <div class="d-flex justify-content-center mt-4">
        {{ $lvs_hoa_don->links() }}
    </div>
</div>
<!-- Animation on Scroll -->
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const rows = document.querySelectorAll("tbody tr");
        rows.forEach((row, index) => {
            row.style.animation = `fadeInUp 0.5s ease ${index * 0.1}s forwards`;
            row.style.opacity = 0;
        });
    });
</script>

<!-- Keyframes Animation -->
<style>
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
