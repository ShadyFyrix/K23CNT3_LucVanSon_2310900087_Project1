@extends('layouts.admin.master')
@section('title', 'Cập Nhật Admin')
@section('content-body')
    <div class="container mt-4 animate__animated animate__fadeIn">
        <form action="{{ route('lvs.updatequantri', ['id' => $lvs_quantri->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card shadow">
                <div class="card-header bg-primary text-white animate__animated animate__fadeInDown">
                    <h3><i class="fas fa-user-edit"></i> Cập Nhật Thông Tin Quản Trị Viên</h3>
                </div>
                <div class="card-body">
                    <!-- Tài khoản -->
                    <div class="mb-3 row">
                        <label for="lvs_TaiKhoan" class="col-sm-2 col-form-label">
                            <i class="fas fa-user"></i> Tài Khoản
                        </label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control" id="lvs_TaiKhoan" name="lvs_TaiKhoan" value="{{ $lvs_quantri->lvs_TaiKhoan }}">
                        </div>
                    </div>

                    <!-- Mật khẩu -->
                    <div class="mb-3 row">
                        <label for="lvs_MatKhau" class="col-sm-2 col-form-label">
                            <i class="fas fa-key"></i> Mật Khẩu
                        </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="lvs_MatKhau" name="lvs_MatKhau" placeholder="Nhập mật khẩu mới nếu cần thay đổi">
                            <small class="text-muted">Để trống nếu không muốn thay đổi mật khẩu.</small>
                        </div>
                    </div>

                    <!-- Trạng thái -->
                    <div class="mb-3 row">
                        <label for="lvs_TrangThai" class="col-sm-2 col-form-label">
                            <i class="fas fa-toggle-on"></i> Trạng Thái
                        </label>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="lvs_TrangThai1" name="lvs_TrangThai" value="0" {{ $lvs_quantri->lvs_TrangThai == 0 ? 'checked' : '' }}>
                                <label for="lvs_TrangThai1" class="form-check-label">Không hoạt động</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="lvs_TrangThai2" name="lvs_TrangThai" value="1" {{ $lvs_quantri->lvs_TrangThai == 1 ? 'checked' : '' }}>
                                <label for="lvs_TrangThai2" class="form-check-label">Hoạt động</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-success animate__animated animate__bounceIn">
                        <i class="fas fa-save"></i> Cập nhật
                    </button>
                    <a href="{{ route('lvs.listquantri') }}" class="btn btn-secondary animate__animated animate__bounceIn">
                        <i class="fas fa-arrow-left"></i> Quay lại
                    </a>
                </div>
            </div>
        </form>
    </div>
@endsection
