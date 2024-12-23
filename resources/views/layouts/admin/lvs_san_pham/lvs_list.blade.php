@extends('layouts.admin.master')
@section('title', 'Danh sách Sản phẩm')
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
    <h2 class="mb-4">Danh sách Sản phẩm</h2>
    <a href="{{ route('san_pham.create') }}" class="btn btn-primary mb-3">
        <i class="fas fa-plus"></i> Thêm Sản phẩm mới
    </a>
    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Mã Sản Phẩm</th>
                <th>Tên Sản Phẩm</th>
                <th>Hình Ảnh</th>
                <th>Số Lượng</th>
                <th>Đơn Giá</th>
                <th>Mã Loại</th>
                <th>Trạng Thái</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($lvs_san_pham as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->lvs_MaSanPham }}</td>
                <td>{{ $item->lvs_TenSanPham }}</td>
                <td>
                    @if ($item->lvs_HinhAnh)
                        <img src="{{ asset('storage/' . $item->lvs_HinhAnh) }}" alt="Hình Ảnh" width="100" class="img-thumbnail">
                    @else
                        <span class="text-muted">Chưa có hình ảnh</span>
                    @endif
                </td>
                <td>{{ $item->lvs_SoLuong }}</td>
                <td>{{ number_format($item->lvs_DonGia, 0, ',', '.') }} VND</td>
                <td>{{ $item->lvs_MaLoai ?? 'Không rõ' }}</td>
                <td>{{ $item->lvs_TrangThai ? 'Kích hoạt' : 'Vô hiệu hóa' }}</td>
                <td>
                    <a href="{{ route('san_pham.show', $item->lvs_MaSanPham) }}" class="btn btn-info btn-sm">Xem</a>
                    <a href="{{ route('san_pham.edit', $item->lvs_MaSanPham) }}" class="btn btn-warning btn-sm">Sửa</a>
                    <form action="{{ route('san_pham.destroy', $item->lvs_MaSanPham) }}" method="POST" style="display:inline-block">
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
        {{ $lvs_san_pham->links() }}
    </div>
</div>
@endsection
