@extends('layouts.admin.master')
@section('title', 'Sửa Sản Phẩm')
@section('content-body')

<!-- Include Font Awesome and Custom CSS for Animations -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
<style>
    /* Fade-in animation for the form */
    .fade-in {
        animation: fadeIn 1s ease-in-out;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Button hover effect */
    .btn:hover {
        transform: scale(1.05);
        transition: transform 0.3s ease-in-out;
    }

    /* Error alert slide-down effect */
    .alert {
        animation: slideDown 0.5s ease-out;
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

<div class="container mt-4 fade-in">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h2 class="mb-4">
                <i class="fas fa-edit"></i> Sửa Sản Phẩm
            </h2>

            @if ($lvs_san_pham)
            <form action="{{ route('san_pham.update', $lvs_san_pham->lvs_MaSanPham) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Display Errors -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Tên Sản Phẩm -->
                <div class="form-group mb-3">
                    <label for="lvs_TenSanPham" class="form-label">
                        <i class="fas fa-tag"></i> Tên Sản Phẩm
                    </label>
                    <input type="text" class="form-control" id="lvs_TenSanPham" name="lvs_TenSanPham" 
                           value="{{ old('lvs_TenSanPham', $lvs_san_pham->lvs_TenSanPham) }}" required>
                </div>

                <!-- Số Lượng -->
                <div class="form-group mb-3">
                    <label for="lvs_SoLuong" class="form-label">
                        <i class="fas fa-boxes"></i> Số Lượng
                    </label>
                    <input type="number" class="form-control" id="lvs_SoLuong" name="lvs_SoLuong" 
                           value="{{ old('lvs_SoLuong', $lvs_san_pham->lvs_SoLuong) }}" required>
                </div>

                <!-- Đơn Giá -->
                <div class="form-group mb-3">
                    <label for="lvs_DonGia" class="form-label">
                        <i class="fas fa-dollar-sign"></i> Đơn Giá
                    </label>
                    <input type="number" class="form-control" id="lvs_DonGia" name="lvs_DonGia" 
                           value="{{ old('lvs_DonGia', $lvs_san_pham->lvs_DonGia) }}" required>
                </div>

                <!-- Loại Sản Phẩm -->
                <div class="form-group mb-3">
                    <label for="lvs_MaLoai" class="form-label">
                        <i class="fas fa-list"></i> Loại Sản Phẩm
                    </label>
                    <select class="form-select" id="lvs_MaLoai" name="lvs_MaLoai" required>
                        <option value="">-- Chọn loại sản phẩm --</option>
                        @foreach ($lvs_loai_san_pham as $loai)
                            <option value="{{ $loai->id }}" 
                                    {{ old('lvs_MaLoai', $lvs_san_pham->lvs_MaLoai) == $loai->id ? 'selected' : '' }}>
                                {{ $loai->lvs_TenLoai }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Hình Ảnh -->
                <div class="form-group mb-3">
                    <label for="lvs_HinhAnh" class="form-label">
                        <i class="fas fa-image"></i> Hình Ảnh
                    </label>
                    <input type="file" class="form-control" id="lvs_HinhAnh" name="lvs_HinhAnh" accept="image/*">
                    @if ($lvs_san_pham->lvs_HinhAnh)
                        <div class="mt-3">
                            <p>Hình ảnh hiện tại:</p>
                            <img src="{{ asset('images/' . $lvs_san_pham->lvs_HinhAnh) }}" alt="Hình ảnh sản phẩm" width="150">
                        </div>
                    @endif
                </div>

                <!-- Trạng Thái -->
                <div class="form-group mb-4">
                    <label for="lvs_TrangThai" class="form-label">
                        <i class="fas fa-toggle-on"></i> Trạng Thái
                    </label>
                    <select class="form-select" id="lvs_TrangThai" name="lvs_TrangThai" required>
                        <option value="1" {{ old('lvs_TrangThai', $lvs_san_pham->lvs_TrangThai) == 1 ? 'selected' : '' }}>Kích hoạt</option>
                        <option value="0" {{ old('lvs_TrangThai', $lvs_san_pham->lvs_TrangThai) == 0 ? 'selected' : '' }}>Không kích hoạt</option>
                    </select>
                </div>

                <!-- Buttons -->
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Cập Nhật
                    </button>
                    <a href="{{ route('san_pham.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Quay lại
                    </a>
                </div>
            </form>
            @else
                <p class="text-danger">Không tìm thấy sản phẩm để sửa!</p>
            @endif
        </div>
    </div>
</div>

@endsection
