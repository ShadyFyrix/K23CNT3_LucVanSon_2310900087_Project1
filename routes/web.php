<?php
use App\Http\Controllers\lvs_hoa_donController;
use App\Http\Controllers\lvs_ct_hoa_donController;
use App\Http\Controllers\lvs_loai_san_phamController;
use App\Models\lvs_quan_tri;
use App\Http\Controllers\lvs_quan_triController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\lvs_san_phamController;
use App\Http\Controllers\lvs_khach_hangController;
use App\Http\Controllers\lvs_trang_chuController;
use App\Http\Controllers\lvs_trang_webController;

Route::get('/lvs_admins', function () {
    return view('home');
})->name('home');
#Login and Sign Up Khách
Route::get('/login', [lvs_khach_hangController::class, 'lvs_guestlogin'])->name('lvs_guestlogin');
Route::post('/login', [lvs_khach_hangController::class, 'lvs_guestloginsubmit'])->name('lvs_guestloginsubmit');
Route::post('/logout', [lvs_khach_hangController::class, 'lvs_guestlogout'])->name('lvs_guestlogout');
Route::get('/signup', [lvs_khach_hangController::class, 'lvs_guestsignup'])->name('lvs_guestsignup');
Route::post('/signup', [lvs_khach_hangController::class, 'lvs_guestsignupsubmit'])->name('lvs_guestsignupsubmit');
#Giao Điện Chính Thức
Route::get('/', [lvs_trang_webController::class, 'index'])->name('lvs_home');
# Admin Layout
Route::get('/lvs_admins/home', [lvs_trang_chuController::class, 'lvs_trangchu'])->name('trangchu');
Route::get('/lvs_admins/databoard', [lvs_trang_chuController::class, 'datataboard'])->name('databoard');
# Login and Logout Ở Admin
Route::get('/lvs_admins/lvs_login',[lvs_quan_triController::class,'lvsLogin'])->name('login.lvslog');
Route::post('/lvs_admins/lvs_login',[lvs_quan_triController::class,'lvs_Loginsubmit'])->name('login.lvslogsubmit');
Route::post('/lvs_admin/logout', [lvs_quan_triController::class, 'lvs_logout'])->name('lvs_logout');
# Đăng nhập để thực hiện các chức năng trong Web
Route::middleware(['auth.admin'])->group(function (){
# Quản Trị Router
Route::get('lvs_admins/lvs_quantri/', [lvs_quan_triController::class, 'lvs_listQT'])->name('lvs.listquantri'); // Hiển thị danh sách quản trị viên
Route::get('lvs_admins/lvs_quantri/create', [lvs_quan_triController::class, 'lvs_creatQT'])->name('lvs.createquantri'); // Hiển thị form thêm mới
Route::post('lvs_admins/lvs_quantri/', [lvs_quan_triController::class, 'lvs_creatQTsubmit'])->name('lvs.storequantri'); // Xử lý thêm mới
Route::get('lvs_admins/lvs_quantri/{id}', [lvs_quan_triController::class, 'lvs_chitietqt'])->name('lvs.detailquantri'); // Hiển thị chi tiết
Route::get('lvs_admins/lvs_quantri/{id}/edit', [lvs_quan_triController::class, 'lvs_editQT'])->name('lvs.editquantri'); // Hiển thị form chỉnh sửa
Route::put('lvs_admins/lvs_quantri/{id}', [lvs_quan_triController::class, 'lvs_editQTsubmit'])->name('lvs.updatequantri'); // Xử lý cập nhật
Route::delete('lvs_admins/lvs_quantri/{id}', [lvs_quan_triController::class, 'lvs_deleteQT'])->name('lvs.deletequantri'); // Xử lý xóa
# Loại Sản Phẩm Routes
Route::prefix('lvs_admins/lvs_loai_san_pham')->group(function () {
    Route::get('/', [lvs_loai_san_phamController::class, 'index'])->name('lvs-admin.lvs_loai_san_pham');
    Route::get('/create', [lvs_loai_san_phamController::class, 'create'])->name('lvs-admin.lvs_loai_san_pham.create');
    Route::post('/store', [lvs_loai_san_phamController::class, 'store'])->name('lvs-admin.lvs_loai_san_pham.store');
    Route::get('/{id}', [lvs_loai_san_phamController::class, 'show'])->name('lvs-admin.lvs_loai_san_pham.show');
    Route::get('/{id}/edit', [lvs_loai_san_phamController::class, 'edit'])->name('lvs-admin.lvs_loai_san_pham.edit');
    Route::put('/{id}', [lvs_loai_san_phamController::class, 'update'])->name('lvs-admin.lvs_loai_san_pham.update');
    Route::delete('/{id}', [lvs_loai_san_phamController::class, 'destroy'])->name('lvs-admin.lvs_loai_san_pham.destroy');
});
#Sản Phẩm - Router (The Hardest One)
    Route::get('lvs_admins/lvs_san_pham/timkiem', [lvs_san_phamController::class, 'search'])->name('productTypes.timkiem');
    Route::get('lvs_admins/lvs_san_pham/', [lvs_san_phamController::class, 'index'])->name('san_pham.index');
    Route::get('lvs_admins/lvs_san_pham/create', [lvs_san_phamController::class, 'create'])->name('san_pham.create');
    Route::post('lvs_admins/lvs_san_pham/store', [lvs_san_phamController::class, 'store'])->name('san_pham.store');
    Route::get('lvs_admins/lvs_san_pham/{lvs_MaSanPham}', [lvs_san_phamController::class, 'show'])->name('san_pham.show');
    Route::get('lvs_admins/lvs_san_pham/{lvs_MaSanPham}/edit', [lvs_san_phamController::class, 'edit'])->name('san_pham.edit');
    Route::put('lvs_admins/lvs_san_pham/{lvs_MaSanPham}', [lvs_san_phamController::class, 'update'])->name('san_pham.update');    
    Route::delete('lvs_admins/lvs_san_pham/{lvs_MaSanPham}', [lvs_san_phamController::class, 'destroy'])->name('san_pham.destroy');
    #Khách Hàng - Router 
    Route::get('lvs_admins/lvs_khachhang', [Lvs_khach_hangController::class, 'lvsListKH'])->name('lvs.listkhachhang');
    Route::get('lvs_admins/lvs_khachhang/create', [Lvs_khach_hangController::class, 'lvsCreateKH'])->name('lvs.createkhachhang');
    Route::post('lvs_admins/lvs_khachhang', [Lvs_khach_hangController::class, 'lvsCreateKHSubmit'])->name('lvs.storekhachhang');
    Route::get('lvs_admins/lvs_khachhang/{id}', [Lvs_khach_hangController::class, 'lvsDetailKH'])->name('lvs.detailkhachhang');
    Route::get('lvs_admins/lvs_khachhang/{id}/edit', [Lvs_khach_hangController::class, 'lvsEditKH'])->name('lvs.editkhachhang');
    Route::put('lvs_admins/lvs_khachhang/{id}', [Lvs_khach_hangController::class, 'lvsEditKHSubmit'])->name('lvs.updatekhachhang');
    Route::delete('lvs_admins/lvs_khachhang/{id}', [Lvs_khach_hangController::class, 'lvsDeleteKH'])->name('lvs.deletekhachhang');
    # Hóa Đơn - Router 
    Route::get('lvs_admins/lvs_hoadon', [lvs_hoa_donController::class, 'lvs_listHD'])->name('lvs.listHD'); // List Hóa Đơn
    Route::get('lvs_admins/lvs_hoadon/create', [lvs_hoa_donController::class, 'lvs_createHD'])->name('lvs.createHD'); // Create Form
    Route::post('/lvs_admins/lvs_hoadon/create', [lvs_hoa_donController::class, 'lvs_createHDSubmit'])->name('lvs.createHD');
    Route::get('lvs_admins/lvs_hoadon/{lvs_MaHoaDon}', [lvs_hoa_donController::class, 'lvs_chiTietHD'])->name('lvs.detailHD'); // Detail Hóa Đơn
    Route::get('/lvs_admins/lvs_hoadon/{lvs_MaHoaDon}/edit', [lvs_hoa_donController::class, 'lvs_editHD'])->name('lvs.editHD');
    Route::post('/lvs_admins/lvs_hoadon/{lvs_MaHoaDon}/edit', [lvs_hoa_donController::class, 'lvs_editHDSubmit'])->name('lvs.editHDSubmit');
    Route::delete('lvs_admins/lvs_hoadon/{lvs_MaHoaDon}', [lvs_hoa_donController::class, 'lvs_deleteHD'])->name('lvs.deleteHD');
    # Chi Tiết Hoá Đơn
    Route::get('lvs_admins/lvs_cthoadon', [lvs_ct_hoa_donController::class, 'lvs_listCTHD'])->name('lvs_listCTHD'); // List Chi Tiết Hóa Đơn
    Route::get('lvs_admins/lvs_cthoadon/create', [lvs_ct_hoa_donController::class, 'lvs_createCTHD'])->name('lvs_createCTHD'); // Form Create
    Route::post('lvs_admins/lvs_cthoadon/create', [lvs_ct_hoa_donController::class, 'lvs_createCTHDSubmit'])->name('lvs_createCTHDSubmit'); // Submit Form Create
    Route::get('lvs_admins/lvs_cthoadon/{id}', [lvs_ct_hoa_donController::class, 'lvs_detailCTHD'])->name('lvs_detailCTHD'); // Detail Chi Tiết Hóa Đơn
    Route::get('lvs_admins/lvs_cthoadon/{id}/edit', [lvs_ct_hoa_donController::class, 'lvs_editCTHD'])->name('lvs_editCTHD'); // Form Edit
    Route::post('lvs_admins/lvs_cthoadon/{id}/edit', [lvs_ct_hoa_donController::class, 'lvs_editCTHDSubmit'])->name('lvs_editCTHDSubmit'); // Submit Form Edit
    Route::delete('lvs_admins/lvs_cthoadon/{id}', [lvs_ct_hoa_donController::class, 'lvs_deleteCTHD'])->name('lvs_deleteCTHD'); // Delete Chi Tiết Hóa Đơn
});
    



