@extends('layouts.admin.master')
@section('tittle', 'Chi tiết hóa đơn')
@section('content-body')
<div class="container border rounded shadow-lg mt-4 p-4">
    <h2 class="text-center text-primary mb-4"><i class="fas fa-receipt"></i> Chi Tiết Hóa Đơn</h2>
    <div class="table-responsive">
        <table class="table table-hover table-striped table-bordered align-middle">
            <tbody>
                <tr>
                    <th class="table-dark">ID</th>
                    <td>{{ $ctHoaDon->id }}</td>
                </tr>
                <tr>
                    <th class="table-dark">Hóa Đơn</th>
                    <td>{{ $ctHoaDon->lvs_HoaDonID }}</td>
                </tr>
                <tr>
                    <th class="table-dark">Sản Phẩm</th>
                    <td>{{ $ctHoaDon->lvs_SanPhamID }}</td>
                </tr>
                <tr>
                    <th class="table-dark">Số Lượng Mua</th>
                    <td>{{ $ctHoaDon->lvs_SoLuongMua }}</td>
                </tr>
                <tr>
                    <th class="table-dark">Đơn Giá</th>
                    <td>{{ number_format($ctHoaDon->lvs_DonGiaMua, 0, ',', '.') }} VNĐ</td>
                </tr>
                <tr>
                    <th class="table-dark">Thành Tiền</th>
                    <td>{{ number_format($ctHoaDon->lvs_ThanhTien, 0, ',', '.') }} VNĐ</td>
                </tr>
                <tr>
                    <th class="table-dark">Trạng Thái</th>
                    <td>
                        <span class="badge {{ $ctHoaDon->lvs_TrangThai ? 'bg-success' : 'bg-secondary' }}">
                            {{ $ctHoaDon->lvs_TrangThai ? 'Hoạt Động' : 'Không Hoạt Động' }}
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="text-center mt-4">
        <a href="{{ route('lvs_listCTHD') }}" class="btn btn-primary">
            <i class="fas fa-arrow-left"></i> Quay Lại
        </a>
    </div>
</div>

<!-- Animation on Scroll -->
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const table = document.querySelector(".table");
        table.style.animation = "fadeIn 0.5s ease forwards";
        table.style.opacity = 0;
    });
</script>

<style>
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: scale(0.9);
        }
        to {
            opacity: 1;
            transform: scale(1);
        }
    }
</style>
@endsection
