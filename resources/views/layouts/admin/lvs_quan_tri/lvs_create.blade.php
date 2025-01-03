@extends('layouts.admin.master')
@section('title', 'Thêm Admin')
@section('content-body')
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <form action="{{ route('lvs.storequantri') }}" method="post">
                    @csrf
                    <div class="card shadow animate__animated animate__fadeInDown">
                        <div class="card-header bg-primary text-white">
                            <h2>
                                <i class="fas fa-user-plus"></i> Thêm Mới Admin
                            </h2>
                        </div>
                        <div class="card-body">
                            <!-- ID -->
                            <div class="mb-3 row">
                                <label for="id" class="col-sm-3 col-form-label">
                                    <i class="fas fa-id-card"></i> ID Admin:
                                </label>
                                <div class="col-sm-9">
                                    <input 
                                        type="text" 
                                        class="form-control animate__animated animate__fadeInLeft" 
                                        id="id" 
                                        name="id" 
                                        placeholder="Nhập ID Admin" 
                                        required 
                                    >
                                </div>
                            </div>

                            <!-- Tài khoản -->
                            <div class="mb-3 row">
                                <label for="lvs_TaiKhoan" class="col-sm-3 col-form-label">
                                    <i class="fas fa-user"></i> Tài Khoản:
                                </label>
                                <div class="col-sm-9">
                                    <input 
                                        type="text" 
                                        class="form-control animate__animated animate__fadeInLeft" 
                                        id="lvs_TaiKhoan" 
                                        name="lvs_TaiKhoan" 
                                        placeholder="Nhập tài khoản" 
                                        required 
                                    >
                                </div>
                            </div>

                            <!-- Mật khẩu -->
                            <div class="mb-3 row">
                                <label for="lvs_MatKhau" class="col-sm-3 col-form-label">
                                    <i class="fas fa-lock"></i> Mật Khẩu:
                                </label>
                                <div class="col-sm-9">
                                    <input 
                                        type="password" 
                                        class="form-control animate__animated animate__fadeInLeft" 
                                        id="lvs_MatKhau" 
                                        name="lvs_MatKhau" 
                                        placeholder="Nhập mật khẩu" 
                                        required 
                                    >
                                </div>
                            </div>

                            <!-- Trạng thái -->
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">
                                    <i class="fas fa-toggle-on"></i> Trạng Thái:
                                </label>
                                <div class="col-sm-9">
                                    <div class="form-check form-check-inline">
                                        <input 
                                            type="radio" 
                                            class="form-check-input animate__animated animate__fadeInLeft" 
                                            id="lvs_TrangThai1" 
                                            name="lvs_TrangThai" 
                                            value="1" 
                                            checked 
                                        />
                                        <label for="lvs_TrangThai1" class="form-check-label">Hiển Thị</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input 
                                            type="radio" 
                                            class="form-check-input animate__animated animate__fadeInLeft" 
                                            id="lvs_TrangThai0" 
                                            name="lvs_TrangThai" 
                                            value="0" 
                                        />
                                        <label for="lvs_TrangThai0" class="form-check-label">Khóa</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer text-end">
                            <button 
                                type="submit" 
                                class="btn btn-success mx-2 animate__animated animate__pulse animate__infinite"
                            >
                                <i class="fas fa-save"></i> Ghi Lại
                            </button>
                            <a 
                                href="{{ route('lvs.listquantri') }}" 
                                class="btn btn-secondary animate__animated animate__fadeInRight"
                            >
                                <i class="fas fa-arrow-left"></i> Quay Lại
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
