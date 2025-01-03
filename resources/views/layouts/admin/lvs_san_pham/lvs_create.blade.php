@extends('layouts.admin.master')
@section('title', 'Thêm Mới Sản Phẩm')
@section('content-body')

<!-- Add Font Awesome for Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

<!-- Add Animate.css -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

<style>
    /* Custom Animation */
    @keyframes slideIn {
        0% {
            transform: translateY(-20px);
            opacity: 0;
        }
        100% {
            transform: translateY(0);
            opacity: 1;
        }
    }

    .slide-in {
        animation: slideIn 0.5s ease-in-out;
    }

    /* Image Preview Styling */
    #preview {
        border: 2px dashed #ddd;
        padding: 10px;
        max-width: 200px;
        max-height: 200px;
        display: none;
    }

    .form-label-icon {
        font-size: 1.2rem;
        color: #007bff;
        margin-right: 5px;
    }
</style>

<div class="container animate__animated animate__fadeInUp">
    <div class="row">
        <div class="col">
            <form action="{{ route('san_pham.store') }}" method="POST" enctype="multipart/form-data" class="slide-in">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h2 class="animate__animated animate__fadeInDown">
                            <i class="fas fa-plus-circle"></i> Thêm Mới Sản Phẩm
                        </h2>
                    </div>
                </div>

                <div class="card-body container-fluid">
                    <!-- Mã SP -->
                    <div class="mb-1 row">
                        <label for="lvs_MaSanPham" class="col-sm-1 col-form-label" style="font-weight: bold">
                            <i class="fas fa-barcode form-label-icon"></i> Mã SP:
                        </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="lvs_MaSanPham" name="lvs_MaSanPham" value="{{ old('lvs_MaSanPham') }}">
                            @error('lvs_MaSanPham')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Tên SP -->
                    <div class="mb-1 row">
                        <label for="lvs_TenSanPham" class="col-sm-1 col-form-label" style="font-weight: bold">
                            <i class="fas fa-tag form-label-icon"></i> Tên SP:
                        </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="lvs_TenSanPham" name="lvs_TenSanPham" value="{{ old('lvs_TenSanPham') }}">
                            @error('lvs_TenSanPham')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Hình SP -->
                    <div class="mb-1 row">
                        <label for="lvs_HinhAnh" class="col-sm-1 col-form-label" style="font-weight: bold">
                            <i class="fas fa-image form-label-icon"></i> Hình SP:
                        </label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" id="lvs_HinhAnh" name="lvs_HinhAnh" onchange="previewImage(event)">
                            @error('lvs_HinhAnh')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="mt-3">
                                <img id="preview" alt="Hình xem trước">
                            </div>
                        </div>
                    </div>

                    <!-- Số Lượng -->
                    <div class="mb-1 row">
                        <label for="lvs_SoLuong" class="col-sm-1 col-form-label" style="font-weight: bold">
                            <i class="fas fa-boxes form-label-icon"></i> Số Lượng:
                        </label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="lvs_SoLuong" name="lvs_SoLuong" value="{{ old('lvs_SoLuong') }}">
                            @error('lvs_SoLuong')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Đơn Giá -->
                    <div class="mb-1 row">
                        <label for="lvs_DonGia" class="col-sm-1 col-form-label" style="font-weight: bold">
                            <i class="fas fa-dollar-sign form-label-icon"></i> Đơn Giá:
                        </label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="lvs_DonGia" name="lvs_DonGia" value="{{ old('lvs_DonGia') }}">
                            @error('lvs_DonGia')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Loại Sản Phẩm -->
                    <div class="mb-3">
                        <label for="lvs_MaLoai">
                            <i class="fas fa-list form-label-icon"></i> Loại sản phẩm:
                        </label>
                        <select id="lvs_MaLoai" name="lvs_MaLoai" class="form-control" required>
                            <option value="">Chọn loại sản phẩm</option>
                            @foreach($lvs_loai_san_pham as $item)
                                <option value="{{ $item->id }}">{{ $item->lvs_TenLoai }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Trạng Thái -->
                    <div class="mb-1 row">
                        <label for="lvs_TrangThai" class="col-sm-1 col-form-label" style="font-weight: bold">
                            <i class="fas fa-toggle-on form-label-icon"></i> Trạng Thái:
                        </label>
                        <div class="col-sm-10">
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" id="lvs_TrangThai1" name="lvs_TrangThai" value="1" checked>
                                <label for="lvs_TrangThai1" class="form-check-label">Hiển Thị</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" id="lvs_TrangThai0" name="lvs_TrangThai" value="0">
                                <label for="lvs_TrangThai0" class="form-check-label">Khóa</label>
                            </div>
                            @error('lvs_TrangThai')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <button class="btn btn-success">
                        <i class="fas fa-save"></i> Ghi Lại
                    </button>
                    <a href="{{ route('san_pham.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Quay lại
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- JavaScript for Image Preview -->
<script>
    function previewImage(event) {
        const input = event.target;
        const preview = document.getElementById('preview');

        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection
