@extends('layouts.admin.master')

@section('title', 'Danh Sách Loại Sản Phẩm')

@section('content-body')
<div class="container border rounded shadow-lg mt-4 p-4">
    <div class="col-12">
        <h1 class="text-center text-primary mb-4 animate__animated animate__fadeInDown" style="font-size: 30px;">
            <i class="fas fa-cogs"></i> Danh Sách Loại Sản Phẩm
        </h1>

        <!-- Thêm mới -->
        <div class="text-end mb-3">
            <a href="{{ route('lvs-admin.lvs_loai_san_pham.create') }}" class="btn btn-success shadow-sm animate__animated animate__bounceIn">
                <i class="fas fa-plus-circle"></i> Thêm Mới
            </a>
        </div>

        <!-- Bảng dữ liệu -->
        <div class="table-responsive">
            <table class="table table-hover table-striped align-middle">
                <thead class="table-dark text-center">
                    <tr>
                        <th style="width: 5%;"><i class="fas fa-id-badge"></i> #</th>
                        <th style="width: 15%;"><i class="fas fa-cogs"></i> Mã Loại</th>
                        <th style="width: 25%;"><i class="fas fa-cogs"></i> Tên Loại</th>
                        <th style="width: 15%;"><i class="fas fa-toggle-on"></i> Trạng Thái</th>
                        <th class="text-center" style="width: 20%;"><i class="fas fa-cogs"></i> Chức Năng</th>
                    </tr>
                </thead>
                <tbody class="animate__animated animate__fadeInUp">
                    @php
                        $stt = 1;
                    @endphp
                    @forelse ($lvs_loai_san_pham as $item)
                        <tr>
                            <td>{{ $stt++ }}</td>
                            <td>{{ $item->lvs_Maloai }}</td>
                            <td>{{ $item->lvs_TenLoai }}</td>
                            <td>
                                <span class="badge {{ $item->lvs_TrangThai ? 'bg-success' : 'bg-secondary' }}">
                                    {{ $item->lvs_TrangThai ? 'Hoạt Động' : 'Không Hoạt Động' }}
                                </span>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('lvs-admin.lvs_loai_san_pham.show', $item->lvs_Maloai) }}" class="btn btn-info btn-sm shadow-sm">
                                    <i class="fas fa-eye"></i> Chi Tiết
                                </a>
                                <a href="{{ route('lvs-admin.lvs_loai_san_pham.edit', $item->lvs_Maloai) }}" class="btn btn-warning btn-sm shadow-sm">
                                    <i class="fas fa-edit"></i> Sửa
                                </a>
                                <form action="{{ route('lvs-admin.lvs_loai_san_pham.destroy', $item->lvs_Maloai) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm shadow-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                                        <i class="fas fa-trash-alt"></i> Xóa
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Chưa Có Thông Tin</td>
                        </tr>
                    @endforelse
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

    /* Tăng padding và viền cho các ô */
    td, th {
        padding: 15px;
        border: 1px solid #ddd;
        vertical-align: middle;
    }

    /* Cải thiện hiệu ứng hover */
    tbody tr:hover {
        background-color: #f5f5f5;
        transform: scale(1.02);
        transition: background-color 0.3s, transform 0.3s;
    }
</style>

@endsection
