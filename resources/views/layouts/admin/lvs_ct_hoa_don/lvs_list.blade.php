@extends('layouts.admin.master')
@section('title', 'Danh Sách Chi Tiết Hóa Đơn')
@section('content-body')
<div class="container border rounded shadow-lg mt-4 p-4">
    <div class="col-12">
        <h1 class="text-center text-primary mb-4 animate__animated animate__fadeInDown" style="font-size: 30px;">
            <i class="fas fa-file-invoice"></i> Danh Sách Chi Tiết Hóa Đơn
        </h1>
        <div class="text-end mb-3">
            <a href="{{ route('lvs_createCTHD') }}" class="btn btn-success shadow-sm animate__animated animate__bounceIn">
                <i class="fas fa-plus-circle"></i> Thêm Chi Tiết Hóa Đơn
            </a>
        </div>
        
        <!-- Success message -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-hover table-striped align-middle">
                <thead class="table-dark text-center">
                    <tr>
                        <th><i class="fas fa-id-badge"></i> ID</th>
                        <th><i class="fas fa-file-invoice"></i> Hóa Đơn</th>
                        <th><i class="fas fa-cogs"></i> Sản Phẩm</th>
                        <th><i class="fas fa-box"></i> Số Lượng Mua</th>
                        <th><i class="fas fa-dollar-sign"></i> Đơn Giá</th>
                        <th><i class="fas fa-dollar-sign"></i> Thành Tiền</th>
                        <th><i class="fas fa-toggle-on"></i> Trạng Thái</th>
                        <th class="text-center"><i class="fas fa-cogs"></i> Hành Động</th>
                    </tr>
                </thead>
                <tbody class="animate__animated animate__fadeInUp">
                    @foreach ($ctHoaDon as $ct)
                        <tr>
                            <td>{{ $ct->id }}</td>
                            <td>{{ $ct->lvs_HoaDonID }}</td>
                            <td>{{ $ct->lvs_SanPhamID }}</td>
                            <td>{{ $ct->lvs_SoLuongMua }}</td>
                            <td>{{ number_format($ct->lvs_DonGiaMua, 0, ',', '.') }} VNĐ</td>
                            <td>{{ number_format($ct->lvs_ThanhTien, 0, ',', '.') }} VNĐ</td>
                            <td>
                                <span class="badge {{ $ct->lvs_TrangThai ? 'bg-success' : 'bg-secondary' }}">
                                    {{ $ct->lvs_TrangThai ? 'Hoạt Động' : 'Không Hoạt Động' }}
                                </span>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('lvs_detailCTHD', $ct->id) }}" class="btn btn-info btn-sm shadow-sm">
                                    <i class="fas fa-eye"></i> Chi Tiết
                                </a>
                                <a href="{{ route('lvs_editCTHD', $ct->id) }}" class="btn btn-warning btn-sm shadow-sm">
                                    <i class="fas fa-edit"></i> Sửa
                                </a>
                                <form action="{{ route('lvs_deleteCTHD', $ct->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm shadow-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                                        <i class="fas fa-trash-alt"></i> Xóa
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
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
