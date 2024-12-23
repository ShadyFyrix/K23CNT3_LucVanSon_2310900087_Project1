<?php
use App\Http\Controllers\lvs_hoa_donController;
use App\Http\Controllers\lvs_loai_san_phamController;
use App\Models\lvs_quan_tri;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\lvs_san_phamController;
Route::get('/', function () {
    return view('welcome');
});

# Admin Layout
Route::get('/lvs_admins', function () {
    return view('layouts.lvsAdmins.index');
});
# Login and Logout 
Route::get('/lvs_admins/lvs_login',[lvs_quan_tri::class,'lvsLogin'])->name('login.lvslog');
Route::post('/lvs_admins/lvs_login',[lvs_quan_tri::class,'lvsLoginsubmit'])->name('login.lvslogsubmit');
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
#Hoá Đơn - Router
Route::prefix('lvs_admins/lvs_hoa_don')->group(function () {
    Route::get('/', [lvs_hoa_donController::class, 'index'])->name('hoa_don.index');
    Route::get('/create', [lvs_hoa_donController::class, 'create'])->name('hoa_don.create');
    Route::post('/store', [lvs_hoa_donController::class, 'store'])->name('hoa_don.store');
    Route::get('/{lvs_MaHoaDon}/edit', [lvs_hoa_donController::class, 'edit'])->name('hoa_don.edit');
    Route::put('/{lvs_MaHoaDon}', [lvs_hoa_donController::class, 'update'])->name('hoa_don.update');
    Route::delete('/{lvs_MaHoaDon}', [lvs_hoa_donController::class, 'destroy'])->name('hoa_don.destroy');
    Route::get('/{lvs_MaHoaDon}', [lvs_hoa_donController::class, 'show'])->name('hoa_don.show');
});
Route::prefix('san_pham')->group(function () {
    Route::get('/', [lvs_san_phamController::class, 'index'])->name('san_pham.index');
    Route::get('/create', [lvs_san_phamController::class, 'create'])->name('san_pham.create');
    Route::post('/', [lvs_san_phamController::class, 'store'])->name('san_pham.store');
    Route::get('/{lvs_MaSanPham}', [lvs_san_phamController::class, 'show'])->name('san_pham.show');
    Route::get('/{lvs_MaSanPham}/edit', [lvs_san_phamController::class, 'edit'])->name('san_pham.edit');
    Route::put('/{lvs_MaSanPham}', [lvs_san_phamController::class, 'update'])->name('san_pham.update');
    Route::delete('/{lvs_MaSanPham}', [lvs_san_phamController::class, 'destroy'])->name('san_pham.destroy');
});



