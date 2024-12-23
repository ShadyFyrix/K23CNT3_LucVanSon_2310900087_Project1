@extends('layouts.admin.master')
@section('tittle','Danh Sách Loại Sản Phẩm')
@section('content-body')
<div class="container border">
    <div class="col-12">
        <h1>Danh Sách Loại Sản Phẩm</h1>
        <a href="{{ route('lvs-admin.lvs_loai_san_pham.create') }}" class="btn btn-success mb-3">
            <i class="fas fa-plus-circle"></i> Thêm Mới
        </a>
    </div>
    <div class="row">
        <div class="col">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Mã Loại</th>
                        <th>Tên Loại</th>
                        <th>Trạng Thái</th>
                        <th>Chức Năng</th>
                    </tr>
                </thead>
                <tbody>
                @php
                    $stt = 1;
                @endphp
                @forelse ($lvs_loai_san_pham as $item)
                <tr>
                    <td>{{ $stt++ }}</td>
                    <td>{{ $item->lvs_Maloai }}</td>
                    <td>{{ $item->lvs_TenLoai }}</td>
                    <td>{{ $item->lvs_TrangThai ? 'Hoạt Động' : 'Không Hoạt Động' }}</td>
                    <td>
                        <a href="{{ route('lvs-admin.lvs_loai_san_pham.show', $item->lvs_Maloai) }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-eye"></i> Chi Tiết
                        </a>
                        <a href="{{ route('lvs-admin.lvs_loai_san_pham.edit', $item->lvs_Maloai) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Sửa
                        </a>
                        <form action="{{ route('lvs-admin.lvs_loai_san_pham.destroy', $item->lvs_Maloai) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
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
@endsection
