<?php

namespace App\Http\Controllers;

use App\Models\lvs_loai_san_pham; 
use App\Models\lvs_quan_tri; 
use App\Models\lvs_san_pham; 
use App\Models\lvs_hoa_don;
use App\Models\lvs_khach_hang;
use App\Models\lvs_ct_hoa_don;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class lvs_trang_chuController extends Controller
{
    public function lvs_trangchu()
    {
        $lvs_loai_san_pham = lvs_loai_san_pham::all();
        $lvs_quan_tri = lvs_quan_tri::all();
        $lvs_san_pham = lvs_san_pham::all();
        $lvs_khach_hang = lvs_khach_hang::all();
        $lvs_hoa_don = lvs_hoa_don::all();
        $lvs_ct_hoa_don = lvs_ct_hoa_don::all();
        
        return view('layouts.lvsAdmins.index', [
            'lvs_loai_san_pham' => $lvs_loai_san_pham,
            'lvs_quan_tri' => $lvs_quan_tri,
            'lvs_san_pham' => $lvs_san_pham,
            'lvs_khach_hang' => $lvs_khach_hang,
            'lvs_hoa_don' => $lvs_hoa_don,
            'lvs_ct_hoa_don' => $lvs_ct_hoa_don,
        ]);
    }

    public function datataboard(Request $request)
    {
        if ($request->session()->has('admin.id')) {
            $lvs_loai_san_pham = lvs_loai_san_pham::count();
            $lvs_quan_tri = lvs_quan_tri::count();
            $lvs_san_pham = lvs_san_pham::count();
            $lvs_khach_hang = lvs_khach_hang::count();
            $lvs_hoa_don = lvs_hoa_don::count();
            $lvs_ct_hoa_don = lvs_ct_hoa_don::count();
    
            Log::info("Số lượng loại sản phẩm: " . $lvs_loai_san_pham);
            Log::info("Số lượng admin: " . $lvs_quan_tri);
            Log::info("Số lượng sản phẩm: " . $lvs_san_pham);
            Log::info("Số lượng khách hàng: " . $lvs_khach_hang);
            Log::info("Số lượng hóa đơn: " . $lvs_hoa_don);
            Log::info("Số lượng chi tiết hóa đơn: " . $lvs_ct_hoa_don);
    
            return view('lvs_Admins.lvs_loai_san_pham.lvs_-trangchu', [
                'lvs_loai_san_pham' => $lvs_loai_san_pham,
                'lvs_quan_tri' => $lvs_quan_tri,
                'lvs_san_pham' => $lvs_san_pham,
                'lvs_khach_hang' => $lvs_khach_hang,
                'lvs_hoa_don' => $lvs_hoa_don,
                'lvs_ct_hoa_don' => $lvs_ct_hoa_don,
            ]);
        } else {
            return redirect('/lvs_Admins/lvs_-loai-san-pham');
        }
    }
}
