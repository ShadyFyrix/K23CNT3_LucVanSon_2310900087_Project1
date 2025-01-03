@extends('layouts.admin.master')
@section('title', 'Thông Tin Chi Tiết')
@section('content-body')
<section class="container my-4">
    <div class="card shadow animate__animated animate__fadeIn">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0"><i class="fas fa-info-circle"></i> Thông Tin Chi Tiết</h3>
        </div>
        <div class="card-body">
            @if ($lvs_quantri)
                <p class="card-text">
                    <b><i class="fas fa-id-badge"></i> ID Admin:</b> {{ $lvs_quantri->id }}
                </p>
                <p class="card-text">
                    <b><i class="fas fa-user"></i> Tài Khoản:</b> {{ $lvs_quantri->lvs_TaiKhoan }}
                </p>
                <p class="card-text">
                    <b><i class="fas fa-key"></i> Mật Khẩu:</b> 
                    <span class="text-danger">
                        {{ $lvs_quantri->lvs_MatKhau ?? 'Không có mật khẩu' }}
                    </span>
                </p>
                <p class="card-text">
                    <b><i class="fas fa-toggle-on"></i> Trạng Thái:</b> 
                    <span class="{{ $lvs_quantri->lvs_TrangThai ? 'text-success' : 'text-danger' }}">
                        {{ $lvs_quantri->lvs_TrangThai ? 'Hoạt động' : 'Không hoạt động' }}
                    </span>
                </p>
            @else
                <p class="text-danger">Không tìm thấy thông tin quản trị viên.</p>
            @endif
        </div>
        <div class="card-footer text-end">
            <a href="{{ route('lvs.listquantri') }}" class="btn btn-primary animate__animated animate__bounceIn">
                <i class="fas fa-arrow-left"></i> Quay Lại
            </a>
        </div>
    </div>
</section>
@endsection