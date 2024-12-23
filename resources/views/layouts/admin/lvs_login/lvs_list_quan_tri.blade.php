@extends('_layout.admins.master')
@section('title','Danh Sach Admin')
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
@section('content-body')
    <div class="container">
        <div class="row ">
            <div class="col-12">
                <h1>Danh Sách Admin</h1>
                <a href="{{route('admin-lvs_createsubmitQT')}}" class="btn btn-success">Thêm Mới </a>
            </div>
        </div>
        <div class="row">
            <table class="table table-bordered">
                <thead> 
                    <tr>
                        <th>#</th>
                        <th>id</th>
                        <th>Tài Khoản</th>
                        <th>Mật Khẩu </th>
                        <th>Trạng Thái</th>
                        <th>Chức Năng</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($lvs_quantri as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $item->id  }}</td>
                            <td>{{ $item->lvs_TaiKhoan  }}</td>
                            <td>{{ $item->lvs_MatKhau }}</td>
                            <td>{{ $item->lvs_TrangThai }}</td>
                            <td> 
                                <a href="{{ route('admin-lvs_.chitietqt', ['id' => $item->id]) }}" class="btn btn-primary">chi tiết <i class="fa-solid fa-circle-info"></i></a>
                                {{-- <a href="{{ route('admin-lvs_.chitiet', ['id' => $item->id]) }}" class="btn btn-primary">chi tiết <i class="fa-solid fa-circle-info"></i></a>
                                <a href="{{ route('admin-lvs_.edit', ['id' => $item->id]) }}" class="btn btn-primary">Sửa<i class="fa-solid fa-arrow-up-from-bracket"></i></a>
                                <a href="{{ route('admin-lvs_.delete', ['id' => $item->lvs_Maloai]) }}" 
                                    class="btn btn-danger"
                                    onclick="return confirm('Bạn có chắc chắn muốn xóa không?');">Xóa  <i class="fa-solid fa-trash"></i></a> --}}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <th colspan="5" class="text-center">Chưa có thông tin quan trị</th>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection