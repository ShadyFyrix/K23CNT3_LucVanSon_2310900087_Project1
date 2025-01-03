@extends('layouts.admin.master')
@section('title', 'Chi tiết Sản phẩm')
@section('content-body')

<!-- Include Font Awesome and Custom CSS for Animations -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
<style>
    /* Card fade-in animation */
    .fade-in {
        animation: fadeIn 1s ease-in-out;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Button hover effect */
    .btn:hover {
        transform: scale(1.05);
        transition: transform 0.3s ease-in-out;
    }

    /* Thumbnail hover effect */
    .img-thumbnail:hover {
        transform: scale(1.1);
        transition: transform 0.3s ease-in-out;
        border: 2px solid #007bff;
    }
</style>

<div class="container mt-4 fade-in">
    <h2 class="mb-4">
        <i class="fas fa-info-circle"></i> Chi tiết Sản phẩm
    </h2>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                <i class="fas fa-box"></i> {{ $lvs_san_pham->lvs_TenSanPham }}
            </h5>
            <p>
                <i class="fas fa-barcode"></i> <strong>Mã Sản Phẩm:</strong> {{ $lvs_san_pham->lvs_MaSanPham }}
            </p>
            <p>
                <i class="fas fa-cubes"></i> <strong>Số Lượng:</strong> {{ $lvs_san_pham->lvs_SoLuong }}
            </p>
            <p>
                <i class="fas fa-money-bill-wave"></i> <strong>Đơn Giá:</strong> {{ number_format($lvs_san_pham->lvs_DonGia, 0, ',', '.') }} VND
            </p>
            <p>
                <i class="fas fa-list"></i> <strong>Mã Loại:</strong> {{ $lvs_san_pham->loaiSanPham->lvs_TenLoai ?? 'Không xác định' }}
            </p>
            <p>
                <i class="fas fa-toggle-on"></i> <strong>Trạng Thái:</strong> 
                <span class="{{ $lvs_san_pham->lvs_TrangThai ? 'text-success' : 'text-danger' }}">
                    {{ $lvs_san_pham->lvs_TrangThai ? 'Kích hoạt' : 'Vô hiệu hóa' }}
                </span>
            </p>
            <p>
                <i class="fas fa-image"></i> <strong>Hình Ảnh:</strong><br>
                @if ($lvs_san_pham->lvs_HinhAnh)
                <div class="mt-3">
                    <p>Hình ảnh hiện tại:</p>
                    <img src="{{ asset('images/' . $lvs_san_pham->lvs_HinhAnh) }}" alt="Hình ảnh sản phẩm" width="150">
                </div>
                @else
                <span class="text-muted">Chưa có hình ảnh</span>
            @endif
            </p>
            <a href="{{ route('san_pham.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Quay lại
            </a>
        </div>
    </div>
</div>

@endsection
