@extends('layouts.admin.master')
@section('title', 'Chỉnh Sửa Chi Tiết Hóa Đơn')
@section('content-body')
<div class="container border rounded shadow-lg mt-5 p-4 bg-light" 
     style="max-width: 800px; background: #f8f9fa; font-family: Arial, sans-serif; border-radius: 8px;">
    <!-- Tiêu đề -->
    <h2 class="text-center text-primary mb-4 animate__animated animate__fadeInDown" 
        style="font-weight: bold; font-size: 24px; text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);">
        <i class="fas fa-edit"></i> Chỉnh Sửa Chi Tiết Hóa Đơn
    </h2>

    <!-- Hiển thị lỗi -->
    @if ($errors->any())
        <div class="alert alert-danger animate__animated animate__shakeX" 
             style="border: 1px solid #dc3545; border-radius: 5px; padding: 10px;">
            <ul style="margin: 0; padding-left: 20px; list-style-type: none;">
                @foreach ($errors->all() as $error)
                    <li style="color: #dc3545; font-size: 14px;">
                        <i class="fas fa-exclamation-circle"></i> {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form -->
    <form action="{{ route('lvs_editCTHDSubmit', $ctHoaDon->id) }}" method="POST" class="animate__animated animate__fadeInUp">
        @csrf
        @method('POST')

        <!-- Hóa Đơn -->
        <div class="mb-4">
            <label for="lvs_HoaDonID" class="form-label" 
                   style="font-weight: bold; font-size: 16px;"><i class="fas fa-receipt"></i> Hóa Đơn</label>
            <select name="lvs_HoaDonID" id="lvs_HoaDonID" class="form-select shadow-sm" 
                    style="border-radius: 5px; padding: 10px; font-size: 14px;">
                @foreach ($hoaDon as $hd)
                    <option value="{{ $hd->id }}" {{ $ctHoaDon->lvs_HoaDonID == $hd->id ? 'selected' : '' }}>
                        {{ $hd->id }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Sản Phẩm -->
        <div class="mb-4">
            <label for="lvs_SanPhamID" class="form-label" 
                   style="font-weight: bold; font-size: 16px;"><i class="fas fa-box"></i> Sản Phẩm</label>
            <input type="number" name="lvs_SanPhamID" id="lvs_SanPhamID" class="form-control shadow-sm" 
                   style="border-radius: 5px; padding: 10px; font-size: 14px;" 
                   value="{{ $ctHoaDon->lvs_SanPhamID }}" required>
        </div>

        <!-- Số Lượng Mua -->
        <div class="mb-4">
            <label for="lvs_SoLuongMua" class="form-label" 
                   style="font-weight: bold; font-size: 16px;"><i class="fas fa-cart-plus"></i> Số Lượng Mua</label>
            <input type="number" name="lvs_SoLuongMua" id="lvs_SoLuongMua" class="form-control shadow-sm" 
                   style="border-radius: 5px; padding: 10px; font-size: 14px;" 
                   value="{{ $ctHoaDon->lvs_SoLuongMua }}" required>
        </div>

        <!-- Đơn Giá -->
        <div class="mb-4">
            <label for="lvs_DonGiaMua" class="form-label" 
                   style="font-weight: bold; font-size: 16px;"><i class="fas fa-dollar-sign"></i> Đơn Giá</label>
            <input type="number" step="0.01" name="lvs_DonGiaMua" id="lvs_DonGiaMua" class="form-control shadow-sm" 
                   style="border-radius: 5px; padding: 10px; font-size: 14px;" 
                   value="{{ $ctHoaDon->lvs_DonGiaMua }}" required>
        </div>

        <!-- Thành Tiền -->
        <div class="mb-4">
            <label for="lvs_ThanhTien" class="form-label" 
                   style="font-weight: bold; font-size: 16px;"><i class="fas fa-money-bill-wave"></i> Thành Tiền</label>
            <input type="number" step="0.01" name="lvs_ThanhTien" id="lvs_ThanhTien" class="form-control shadow-sm" 
                   style="border-radius: 5px; padding: 10px; font-size: 14px;" 
                   value="{{ $ctHoaDon->lvs_ThanhTien }}">
        </div>

        <!-- Trạng Thái -->
        <div class="mb-4">
            <label for="lvs_TrangThai" class="form-label" 
                   style="font-weight: bold; font-size: 16px;"><i class="fas fa-toggle-on"></i> Trạng Thái</label>
            <select name="lvs_TrangThai" id="lvs_TrangThai" class="form-select shadow-sm" 
                    style="border-radius: 5px; padding: 10px; font-size: 14px;">
                <option value="1" {{ $ctHoaDon->lvs_TrangThai ? 'selected' : '' }}>Hoạt Động</option>
                <option value="0" {{ !$ctHoaDon->lvs_TrangThai ? 'selected' : '' }}>Không Hoạt Động</option>
            </select>
        </div>

        <!-- Nút hành động -->
        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-success shadow-sm" 
                    style="padding: 10px 20px; font-size: 16px; border-radius: 5px;">
                <i class="fas fa-save"></i> Lưu Thay Đổi
            </button>
            <a href="{{ route('lvs_listCTHD') }}" class="btn btn-secondary shadow-sm" 
               style="padding: 10px 20px; font-size: 16px; border-radius: 5px;">
                <i class="fas fa-arrow-left"></i> Quay Lại
            </a>
        </div>
    </form>
</div>
@endsection
