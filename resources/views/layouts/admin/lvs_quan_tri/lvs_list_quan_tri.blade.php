@extends('layouts.admin.master')
@section('title', 'Danh sách Admin')

<head>
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Custom Animation -->
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

        tbody tr {
            opacity: 0;
            animation: fadeInUp 0.5s ease-in-out forwards;
        }

        tbody tr:nth-child(n) {
            animation-delay: calc(0.1s * var(--i));
        }
    </style>
</head>

@section('content-body')
    <div class="container py-4">
        <!-- Page Header -->
        <div class="row mb-4">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h1 class="text-primary" style="font-weight: bold;">
                    <i class="fa-solid fa-user-shield"></i> Danh Sách Admin
                </h1>
                <a href="{{ route('lvs.createquantri') }}" class="btn btn-success">
                    <i class="fa-solid fa-plus-circle"></i> Thêm Mới
                </a>
            </div>
        </div>

        <!-- Notification Section -->
        <div class="row mb-3">
            @if (session('success'))
                <div class="alert alert-success">
                    <i class="fa-solid fa-check-circle"></i> {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    <i class="fa-solid fa-times-circle"></i> {{ session('error') }}
                </div>
            @endif
        </div>

        <!-- Admin Table -->
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered table-hover">
                    <thead class="table-dark text-center">
                        <tr>
                            <th>#</th>
                            <th><i class="fa-solid fa-id-badge"></i> ID</th>
                            <th><i class="fa-solid fa-user"></i> Tài Khoản</th>
                            <th><i class="fa-solid fa-lock"></i> Mật Khẩu</th>
                            <th><i class="fa-solid fa-toggle-on"></i> Trạng Thái</th>
                            <th><i class="fa-solid fa-cogs"></i> Chức Năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($lvs_quantri as $item)
                            <tr style="--i: {{ $loop->iteration }}">
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->lvs_TaiKhoan }}</td>
                                <td class="text-muted"> {{ $item->lvs_MatKhau ? str_repeat('*', strlen($item->lvs_MatKhau)) : 'Không có mật khẩu'}}
                                </td>
                                <td class="text-center">
                                    <span class="badge {{ $item->lvs_TrangThai ? 'bg-success' : 'bg-danger' }}">
                                        {{ $item->lvs_TrangThai ? 'Hoạt động' : 'Không hoạt động' }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('lvs.detailquantri', ['id' => $item->id]) }}" class="btn btn-primary btn-sm">
                                        <i class="fa-solid fa-circle-info"></i> Chi Tiết
                                    </a>
                                    <a href="{{ route('lvs.editquantri', ['id' => $item->id]) }}" class="btn btn-warning btn-sm">
                                        <i class="fa-solid fa-edit"></i> Sửa
                                    </a>
                                    <form action="{{ route('lvs.deletequantri', ['id' => $item->id]) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa không?');">
                                            <i class="fa-solid fa-trash"></i> Xóa
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted">
                                    <i class="fa-solid fa-info-circle"></i> Chưa có thông tin quản trị
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
@endsection
