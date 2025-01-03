@extends('layouts.admin.master')

@section('tittle', 'Quản Trị Nội Dung')

@section('container-body')
@section('content-body')
<div class="container my-4">
    <div class="row mb-4">
        <h1 class="text-center text-primary">Dashboard - Quản Trị Nội Dung</h1>
    </div>

    <!-- Statistics Cards -->
    <div class="row text-center">
        <!-- Tổng Loại Sản Phẩm -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm border-success animate__animated animate__fadeInUp">
                <div class="card-body">
                    <h5 class="card-title text-success">
                        <i class="fas fa-box-open me-2"></i> Tổng Loại Sản Phẩm
                    </h5>
                    <p class="card-text">
                        @if($lvs_loai_san_pham)
                            Số lượng: <span class="fw-bold">{{ $lvs_loai_san_pham->count() }}</span>
                        @else
                            Không có loại sản phẩm nào.
                        @endif
                    </p>
                </div>
                <div class="card-footer bg-transparent border-success">
                    <a href="{{ route('lvs-admin.lvs_loai_san_pham') }}" class="btn btn-outline-success btn-sm">
                        Quản Lý Loại Sản Phẩm
                    </a>
                </div>
            </div>
        </div>

        <!-- Tổng Số Admin -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm border-primary animate__animated animate__fadeInUp">
                <div class="card-body">
                    <h5 class="card-title text-primary">
                        <i class="fas fa-users-cog me-2"></i> Tổng Số Admin
                    </h5>
                    <p class="card-text">
                        @if($lvs_quan_tri)
                            Số lượng: <span class="fw-bold">{{ $lvs_quan_tri->count() }}</span>
                        @else
                            Không có admin nào.
                        @endif
                    </p>
                </div>
                <div class="card-footer bg-transparent border-primary">
                    <a href="{{ route('lvs.listquantri') }}" class="btn btn-outline-primary btn-sm">
                        Quản Lý Admin
                    </a>
                </div>
            </div>
        </div>

        <!-- Tổng Số Sản Phẩm -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm border-danger animate__animated animate__fadeInUp">
                <div class="card-body">
                    <h5 class="card-title text-danger">
                        <i class="fas fa-cogs me-2"></i> Tổng Số Sản Phẩm
                    </h5>
                    <p class="card-text">
                        @if($lvs_san_pham)
                            Số lượng: <span class="fw-bold">{{ $lvs_san_pham->count() }}</span>
                        @else
                            Không có sản phẩm nào.
                        @endif
                    </p>
                </div>
                <div class="card-footer bg-transparent border-danger">
                    <a href="{{ route('san_pham.index') }}" class="btn btn-outline-danger btn-sm">
                        Quản Lý Sản Phẩm
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row text-center">
        <!-- Tổng Số Khách Hàng -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm border-warning animate__animated animate__fadeInUp">
                <div class="card-body">
                    <h5 class="card-title text-warning">
                        <i class="fas fa-users me-2"></i> Tổng Số Khách Hàng
                    </h5>
                    <p class="card-text">
                        @if($lvs_khach_hang)
                            Số lượng: <span class="fw-bold">{{ $lvs_khach_hang->count() }}</span>
                        @else
                            Không có khách hàng nào.
                        @endif
                    </p>
                </div>
                <div class="card-footer bg-transparent border-warning">
                    <a href="{{ route('lvs.listkhachhang') }}" class="btn btn-outline-warning btn-sm">
                        Quản Lý Khách Hàng
                    </a>
                </div>
            </div>
        </div>

        <!-- Tổng Số Hóa Đơn -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm border-info animate__animated animate__fadeInUp">
                <div class="card-body">
                    <h5 class="card-title text-info">
                        <i class="fas fa-file-invoice-dollar me-2"></i> Tổng Số Hóa Đơn
                    </h5>
                    <p class="card-text">
                        @if($lvs_hoa_don)
                            Số lượng: <span class="fw-bold">{{ $lvs_hoa_don->count() }}</span>
                        @else
                            Không có hóa đơn nào.
                        @endif
                    </p>
                </div>
                <div class="card-footer bg-transparent border-info">
                    <a href="{{ route('lvs.listHD') }}" class="btn btn-outline-info btn-sm">
                        Quản Lý Hóa Đơn
                    </a>
                </div>
            </div>
        </div>

        <!-- Tổng Số Chi Tiết Hóa Đơn -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm border-secondary animate__animated animate__fadeInUp">
                <div class="card-body">
                    <h5 class="card-title text-secondary">
                        <i class="fas fa-file-alt me-2"></i> Tổng Số Chi Tiết Hóa Đơn
                    </h5>
                    <p class="card-text">
                        @if($lvs_ct_hoa_don)
                            Số lượng: <span class="fw-bold">{{ $lvs_ct_hoa_don->count() }}</span>
                        @else
                            Không có chi tiết hóa đơn nào.
                        @endif
                    </p>
                </div>
                <div class="card-footer bg-transparent border-secondary">
                    <a href="{{ route('lvs_listCTHD') }}" class="btn btn-outline-secondary btn-sm">
                        Quản Lý Chi Tiết Hóa Đơn
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
