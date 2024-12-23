@extends('layouts.admin.master')
@section('title', 'Chi tiết Sản phẩm')
@section('content-body')
<div class="container mt-4">
    <h2 class="mb-4">Chi tiết Sản phẩm</h2>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $lvs_san_pham->lvs_TenSanPham }}</h5>
            <p><strong>Mã Sản Phẩm:</strong> {{ $lvs_san_pham->lvs_MaSanPham }}</p>
            <p><strong>Số Lượng:</strong> {{ $lvs_san_pham->lvs_SoLuong }}</p>
            <p><strong>Đơn Giá:</strong> {{ number_format($lvs_san_pham->lvs_DonGia, 0, ',', '.') }} VND</p>
            <p><strong>Mã Loại:</strong> {{ $lvs_san_pham->lvs_MaLoai }}</p>
            <p><strong>Trạng Thái:</strong> {{ $lvs_san_pham->lvs_TrangThai ? 'Kích hoạt' : 'Vô hiệu hóa' }}</p>
            <p>
                <strong>Hình Ảnh:</strong><br>
                @if ($lvs_san_pham->lvs_HinhAnh)
                    <img src="{{ asset('storage/' . $lvs_san_pham->lvs_HinhAnh) }}" alt="Hình Ảnh" width="200" class="img-thumbnail">
                @else
                    <span class="text-muted">Chưa có hình ảnh</span>
                @endif
            </p>
            <a href="{{ route('san_pham.index') }}" class="btn btn-secondary">Quay lại</a>
        </div>
    </div>
</div>
@endsection
