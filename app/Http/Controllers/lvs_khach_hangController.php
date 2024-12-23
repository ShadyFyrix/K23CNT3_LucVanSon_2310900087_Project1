<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\lvs_khach_hang;

class lvs_khach_hangController extends Controller
{
    // Display the list of Loại Sản Phẩm
    public function index()
    {
        $lvs_khach_hang = lvs_khach_hang::all();
        return view('layouts.admin.lvs_loai_san_pham.lvs_list', compact('lvs_loai_san_pham'));
    }

    // Show the form for creating a new Loại Sản Phẩm
    public function create()
    {
        return view('layouts.admin.lvs_loai_san_pham.lvs_create');
    }

    // Store a new Loại Sản Phẩm in the database
    public function store(Request $request)
    {
        $request->validate([
            'lvs_Maloai' => 'required|unique:lvs_loai_san_pham,lvs_Maloai',
            'lvs_TenLoai' => 'required',
            'lvs_TrangThai' => 'required|boolean',
        ]);

        lvs_loai_san_pham::create($request->all());
        return redirect()->route('lvs-admin.lvs_loai_san_pham')->with('success', 'Loại sản phẩm được thêm thành công.');
    }

    // Show the details of a specific Loại Sản Phẩm
    public function show($lvs_Maloai)
    {
        $loaiSanPham = lvs_loai_san_pham::where('lvs_Maloai', $lvs_Maloai)->firstOrFail();
        return view('layouts.admin.lvs_loai_san_pham.lvs_detail', compact('loaiSanPham'));
    }

    // Show the form for editing a specific Loại Sản Phẩm
    public function edit($lvs_Maloai)
    {
        $loaiSanPham = lvs_loai_san_pham::where('lvs_Maloai', $lvs_Maloai)->firstOrFail();
        return view('layouts.admin.lvs_loai_san_pham.lvs_edit', compact('loaiSanPham'));
    }

    // Update the specific Loại Sản Phẩm in the database
    public function update(Request $request, $lvs_Maloai)
    {
        $request->validate([
            'lvs_Maloai' => "required|unique:lvs_loai_san_pham,lvs_Maloai,$lvs_Maloai,lvs_Maloai",
            'lvs_TenLoai' => 'required',
            'lvs_TrangThai' => 'required|boolean',
        ]);

        $loaiSanPham = lvs_loai_san_pham::where('lvs_Maloai', $lvs_Maloai)->firstOrFail();
        $loaiSanPham->update($request->all());
        return redirect()->route('lvs-admin.lvs_loai_san_pham')->with('success', 'Loại sản phẩm được cập nhật thành công.');
    }

    // Delete the specific Loại Sản Phẩm from the database
    public function destroy($lvs_Maloai)
    {
        $loaiSanPham = lvs_loai_san_pham::where('lvs_Maloai', $lvs_Maloai)->firstOrFail();
        $loaiSanPham->delete();
        return redirect()->route('lvs-admin.lvs_loai_san_pham')->with('success', 'Loại sản phẩm đã được xóa.');
    }
}
