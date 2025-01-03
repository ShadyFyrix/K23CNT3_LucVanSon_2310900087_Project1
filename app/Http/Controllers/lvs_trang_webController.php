<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\lvs_loai_san_pham;
use App\Models\lvs_san_pham;

class lvs_trang_webController extends Controller
{
    public function index(Request $request)
    {
        // Lấy danh sách loại sản phẩm
        $lvs_loai_san_pham = lvs_loai_san_pham::all();

        // Lấy loại sản phẩm được chọn (nếu có)
        $selected_category = $request->query('category', null);

        // Lọc sản phẩm theo loại (nếu có chọn loại)
        $lvs_san_pham = $selected_category
            ? lvs_san_pham::where('lvs_MaLoai', $selected_category)->get()
            : lvs_san_pham::all();

        return view('layouts.index', compact('lvs_san_pham', 'lvs_loai_san_pham', 'selected_category'));
    }
}
