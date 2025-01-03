@extends('layouts.admin.master')
@section('title', 'Danh Sách Sản Phẩm')

<head>
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Animation for table rows */
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

        /* Apply animation to each row */
        .animate-row {
            animation: fadeInUp 0.5s ease forwards;
            opacity: 0;
        }

        /* Pagination styles */
        .pagination {
            margin: 0 auto;
            display: flex;
            justify-content: center;
            list-style: none;
            padding: 0;
        }

        .pagination li {
            margin: 0 5px;
        }

        .pagination li a,
        .pagination li span {
            display: inline-block;
            padding: 10px 15px; /* Tăng kích thước nút */
            font-size: 16px; /* Phóng to chữ */
            color: #007bff;
            text-decoration: none;
            border: 1px solid #ddd;
            border-radius: 5px;
            transition: 0.3s;
        }

        .pagination li a:hover {
            background-color: #007bff;
            color: white;
        }

        .pagination li.active span {
            background-color: #007bff;
            color: white;
            border-color: #007bff;
        }

        /* Table hover effect */
        .table-hover tbody tr:hover {
            background-color: #f1f1f1;
            cursor: pointer;
        }

        /* Image size in table */
        table img {
            max-width: 80px;
            max-height: 80px;
            object-fit: cover;
        }
    </style>
</head>

@section('content-body')
<div class="container py-4">
    <!-- Page Title -->
    <h1 class="text-center text-primary mb-4 animate__animated animate__fadeInDown" 
        style="font-weight: bold; font-size: 28px; text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);">
        <i class="fas fa-box"></i> Danh Sách Sản Phẩm
    </h1>

    <!-- Add New Button and Search Form -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <!-- Add New Button -->
                <a href="{{ route('san_pham.create') }}" class="btn btn-success shadow-sm animate__animated animate__bounceIn">
                    <i class="fas fa-plus-circle"></i> Thêm Mới Sản Phẩm
                </a>

                <!-- Search Form -->
                <form method="GET" action="{{ route('productTypes.timkiem') }}" class="d-flex">
                    <input type="text" name="search" class="form-control" placeholder="Tìm kiếm..." value="{{ $search ?? '' }}">
                    <button class="btn btn-primary" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Notification Section -->
    <div class="row mb-3">
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
    </div>

    <!-- Product Table -->
    <div class="row mt-3">
        <div class="col-12">
            <table class="table table-bordered table-hover">
                <thead class="table-dark text-center">
                    <tr>
                        <th>#</th>
                        <th><i class="fas fa-barcode"></i> Mã Sản Phẩm</th>
                        <th><i class="fas fa-cogs"></i> Tên Sản Phẩm</th>
                        <th><i class="fas fa-image"></i> Hình Ảnh</th>
                        <th><i class="fas fa-boxes"></i> Số Lượng</th>
                        <th><i class="fas fa-dollar-sign"></i> Đơn Giá</th>
                        <th><i class="fas fa-list"></i> Mã Loại</th>
                        <th><i class="fas fa-toggle-on"></i> Trạng Thái</th>
                        <th><i class="fas fa-cogs"></i> Chức Năng</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($lvs_san_pham as $item)
                        <tr class="animate-row">
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $item->lvs_MaSanPham }}</td>
                            <td>{{ $item->lvs_TenSanPham }}</td>
                            <td class="text-center">
                                @if($item->lvs_HinhAnh)
                                    <img src="{{ asset('images/' . $item->lvs_HinhAnh) }}" alt="Hình ảnh">
                                @else
                                    Không có hình ảnh
                                @endif
                            </td>
                            <td class="text-center">{{ $item->lvs_SoLuong }}</td>
                            <td>{{ number_format($item->lvs_DonGia, 0, ',', '.') }} VND</td>
                            <td>{{ $item->lvs_MaLoai }}</td>
                            <td class="text-center">
                                <span class="badge {{ $item->lvs_TrangThai ? 'bg-success' : 'bg-danger' }}">
                                    {{ $item->lvs_TrangThai ? 'Kích hoạt' : 'Vô hiệu hóa' }}
                                </span>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('san_pham.show', $item->lvs_MaSanPham) }}" class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i> Xem
                                </a>
                                <a href="{{ route('san_pham.edit', $item->lvs_MaSanPham) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> Sửa
                                </a>
                                <form action="{{ route('san_pham.destroy', $item->lvs_MaSanPham) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                                        <i class="fas fa-trash"></i> Xóa
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center text-muted">
                                <i class="fas fa-info-circle"></i> Chưa có sản phẩm nào.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>

    <!-- Pagination -->
    <div class="row">
        <div class="d-flex justify-content-center">
            {{ $lvs_san_pham->links() }}
        </div>
    </div>
</div>

<!-- Keyframes Animation -->
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const rows = document.querySelectorAll("tbody tr");
        rows.forEach((row, index) => {
            row.style.animation = `fadeInUp 0.5s ease ${index * 0.1}s forwards`;
            row.style.opacity = 0;
        });
    });
</script>
@endsection
