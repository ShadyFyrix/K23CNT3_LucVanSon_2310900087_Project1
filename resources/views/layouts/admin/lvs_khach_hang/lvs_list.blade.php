@extends('layouts.admin.master')

@section('title', 'Danh Sách Khách Hàng')

@section('content-body')
<div class="container border rounded shadow-lg mt-4 p-4">
    <div class="col-12">
        <h1 class="text-center text-primary mb-4 animate__animated animate__fadeInDown" style="font-size: 30px;">
            <i class="fas fa-users"></i> Danh Sách Khách Hàng
        </h1>
        
        <!-- Success message -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="text-end mb-3">
            <a href="{{ route('lvs.createkhachhang') }}" class="btn btn-success shadow-sm animate__animated animate__bounceIn">
                <i class="fas fa-user-plus"></i> Thêm Khách Hàng
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-hover table-striped align-middle">
                <thead class="table-dark text-center">
                    <tr>
                        <th><i class="fas fa-id-badge"></i> ID</th>
                        <th><i class="fas fa-user"></i> Mã KH</th>
                        <th><i class="fas fa-user-tag"></i> Tên Khách Hàng</th>
                        <th><i class="fa-solid fa-lock"></i> Mật Khẩu</th>
                        <th><i class="fas fa-envelope"></i> Email</th>
                        <th><i class="fas fa-phone"></i> Điện Thoại</th>
                        <th><i class="fas fa-toggle-on"></i> Trạng Thái</th>
                        <th class="text-center"><i class="fas fa-cogs"></i> Hành Động</th>
                    </tr>
                </thead>
                <tbody class="animate__animated animate__fadeInUp">
                    @foreach ($lvsKhachHang as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->lvs_Makhachhang }}</td>
                            <td>{{ $item->lvs_Hotenkhachhang }}</td>
                            <td class="text-muted"> {{ $item->lvs_MatKhau ? str_repeat('*', strlen($item->lvs_MatKhau)) : 'Không có mật khẩu'}}
                            <td>{{ $item->lvs_Email }}</td>
                            <td>{{ $item->lvs_DienThoai }}</td>
                            <td>
                                <span class="badge {{ $item->lvs_TrangThai ? 'bg-success' : 'bg-secondary' }}">
                                    {{ $item->lvs_TrangThai ? 'Hoạt Động' : 'Không Hoạt Động' }}
                                </span>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('lvs.detailkhachhang', $item->id) }}" class="btn btn-info btn-sm shadow-sm">
                                    <i class="fas fa-eye"></i> Chi Tiết
                                </a>
                                <a href="{{ route('lvs.editkhachhang', $item->id) }}" class="btn btn-warning btn-sm shadow-sm">
                                    <i class="fas fa-edit"></i> Sửa
                                </a>
                                <form action="{{ route('lvs.deletekhachhang', $item->id) }}" method="POST" style="display:inline;">
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
