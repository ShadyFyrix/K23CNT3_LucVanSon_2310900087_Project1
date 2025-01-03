<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\lvs_san_pham;
use App\Models\lvs_loai_san_pham;
use Illuminate\Support\Facades\Log; // Ghi log
use Illuminate\Support\Facades\File; // Xử lý file

class lvs_san_phamController extends Controller
{
    // List sản phẩm
    public function index(Request $request)
    {
        $search = $request->input('search', null); // Lấy giá trị tìm kiếm hoặc null
        $lvs_san_pham = lvs_san_pham::paginate(5);
        return view('layouts.admin.lvs_san_pham.lvs_list', ['lvs_san_pham' => $lvs_san_pham, 'search' => $search]);
    }

    // Form thêm mới sản phẩm
    public function create()
    {
        $lvs_loai_san_pham = lvs_loai_san_pham::all();
        $availableImages = File::allFiles(public_path('images'));
        return view('layouts.admin.lvs_san_pham.lvs_create', ['lvs_loai_san_pham' => $lvs_loai_san_pham, 'availableImages' => $availableImages]);
    }

    // Xử lý thêm mới sản phẩm
    public function store(Request $request)
    {
        $request->validate([
            'lvs_MaSanPham' => 'required|string|unique:lvs_san_pham',
            'lvs_TenSanPham' => 'required|string',
            'lvs_HinhAnh' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'lvs_SoLuong' => 'required|numeric',
            'lvs_DonGia' => 'required|numeric',
            'lvs_MaLoai' => 'required',
            'lvs_TrangThai' => 'required|boolean',
        ]);

        $loaiSanPham = lvs_loai_san_pham::where('id', $request->lvs_MaLoai)->first();
        if (!$loaiSanPham) {
            return redirect()->back()->withErrors(['lvs_MaLoai' => 'Mã loại sản phẩm không hợp lệ.']);
        }

        $sanPham = new lvs_san_pham();
        $sanPham->lvs_MaSanPham = $request->lvs_MaSanPham;
        $sanPham->lvs_TenSanPham = $request->lvs_TenSanPham;

        if ($request->hasFile('lvs_HinhAnh')) {
            $file = $request->file('lvs_HinhAnh');
            $imageName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $imageName);
            $sanPham->lvs_HinhAnh = $imageName;
        } elseif ($request->lvs_HinhAnhSelected) {
            $sanPham->lvs_HinhAnh = $request->lvs_HinhAnhSelected;
        }

        $sanPham->lvs_SoLuong = $request->lvs_SoLuong;
        $sanPham->lvs_DonGia = $request->lvs_DonGia;
        $sanPham->lvs_MaLoai = $loaiSanPham->id;
        $sanPham->lvs_TrangThai = $request->lvs_TrangThai;
        $sanPham->save();

        return redirect()->route('san_pham.index')->with('success', 'Thêm sản phẩm thành công!');
    }
// Edit sản phẩm form
public function edit($lvs_MaSanPham)
{
    $lvs_san_pham = lvs_san_pham::where('lvs_MaSanPham', $lvs_MaSanPham)->firstOrFail();
    $lvs_loai_san_pham = lvs_loai_san_pham::all(); 
    return view('layouts.admin.lvs_san_pham.lvs_edit', compact('lvs_san_pham', 'lvs_loai_san_pham'));
}

// Update sản phẩm in the database
public function update(Request $request, $lvs_MaSanPham)
{
    $request->validate([
        'lvs_TenSanPham' => 'required|string',
        'lvs_HinhAnh' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        'lvs_SoLuong' => 'required|numeric',
        'lvs_DonGia' => 'required|numeric',
        'lvs_MaLoai' => 'required|exists:lvs_loai_san_pham,id',
        'lvs_TrangThai' => 'required|boolean',
    ]);

    $sanPham = lvs_san_pham::where('lvs_MaSanPham', $lvs_MaSanPham)->firstOrFail();
    $sanPham->lvs_TenSanPham = $request->lvs_TenSanPham;

    if ($request->hasFile('lvs_HinhAnh')) {
        $file = $request->file('lvs_HinhAnh');
        $imageName = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('images'), $imageName);
        $sanPham->lvs_HinhAnh = $imageName;
    }

    $sanPham->lvs_SoLuong = $request->lvs_SoLuong;
    $sanPham->lvs_DonGia = $request->lvs_DonGia;
    $sanPham->lvs_MaLoai = $request->lvs_MaLoai;
    $sanPham->lvs_TrangThai = $request->lvs_TrangThai;
    $sanPham->save();

    return redirect()->route('san_pham.index')->with('success', 'Cập nhật sản phẩm thành công!');
}   
    // Xóa sản phẩm
    public function destroy($lvs_MaSanPham)
    {
        // Find the product by `lvs_MaSanPham`
        $sanPham = lvs_san_pham::where('lvs_MaSanPham', $lvs_MaSanPham)->first();
    
        if (!$sanPham) {
            return redirect()->route('san_pham.index')->with('error', 'Sản phẩm không tồn tại.');
        }
    
        // Check and delete the image if it exists
        if ($sanPham->lvs_HinhAnh && File::exists(public_path('images/' . $sanPham->lvs_HinhAnh))) {
            File::delete(public_path('images/' . $sanPham->lvs_HinhAnh));
        }
    
        // Delete the product
        $sanPham->delete();
    
        return redirect()->route('san_pham.index')->with('success', 'Sản phẩm đã được xóa thành công!');
    }    
    // Chi tiết sản phẩm
    public function show($lvs_MaSanPham)
    {
        $lvs_san_pham = lvs_san_pham::where('lvs_MaSanPham', $lvs_MaSanPham)->firstOrFail();
        $lvs_loai_san_pham = lvs_loai_san_pham::all();
        return view('layouts.admin.lvs_san_pham.lvs_detail', compact('lvs_san_pham', 'lvs_loai_san_pham'));
    }
    public function search(Request $request)
    {
        // Lấy từ khóa tìm kiếm từ người dùng
        $search = $request->input('search', null);
    
        // Truy vấn dữ liệu từ bảng
        $lvs_san_pham = lvs_san_pham::when($search, function ($query, $search) {
            return $query->where('lvs_MaSanPham', 'LIKE', "%$search%")
                         ->orWhere('lvs_TenSanPham', 'LIKE', "%$search%");
        })->paginate(3); // Sử dụng paginate thay vì get()
    
        // Trả về view
        return view('layouts.admin.lvs_san_pham.lvs_list', [
            'lvs_san_pham' => $lvs_san_pham,
            'search' => $search
        ]);
    }
    
}
