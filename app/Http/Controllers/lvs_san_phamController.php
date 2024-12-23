<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\lvs_san_pham;
use App\Models\lvs_loai_san_pham;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class lvs_san_phamController extends Controller
{
    // List all records
    public function index()
    {
        $lvs_san_pham = lvs_san_pham::paginate(10);
        return view('layouts.admin.lvs_san_pham.lvs_list', compact('lvs_san_pham'));
    }

    // Show create form
    public function create()
    {
        $lvs_san_pham = lvs_san_pham::paginate(10);
        $lvs_loai_san_pham = lvs_loai_san_pham::all();
        dd($lvs_loai_san_pham);
        return view('layouts.admin.lvs_san_pham.lvs_create', compact('lvs_loai_san_pham'));
    }

    // Store a new record
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'lvs_MaSanPham' => 'required|string|max:255',
        'lvs_TenSanPham' => 'required|string|max:255',
        'lvs_SoLuong' => 'required|integer|min:0',
        'lvs_DonGia' => 'required|numeric|min:0',
        'lvs_MaLoai' => 'required|exists:lvs_loai_san_pham,lvs_MaLoai', // Validate against lvs_MaLoai
        'lvs_TrangThai' => 'required|boolean',
        'lvs_HinhAnh' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);    
    $validatedData['lvs_MaSanPham'] = $validatedData['lvs_MaSanPham'] ?? 'SP' . str_pad(rand(1, 99999), 5, '0', STR_PAD_LEFT);

    if ($request->hasFile('lvs_HinhAnh')) {
        $validatedData['lvs_HinhAnh'] = $request->file('lvs_HinhAnh')->store('san_pham_images', 'public');
    }

    try {
        lvs_san_pham::create($validatedData);
        return redirect()->route('san_pham.index')->with('success', 'Sản phẩm được thêm thành công!');
    } catch (\Exception $e) {
        Log::error('Error inserting product: ' . $e->getMessage());
        return back()->withErrors('Không thể thêm sản phẩm. Vui lòng thử lại.');
    }
}
    // Show edit form
    public function edit($lvs_MaSanPham)
    {
        $lvs_san_pham = lvs_san_pham::where('lvs_MaSanPham', $lvs_MaSanPham)->firstOrFail();
        $lvs_loai_san_pham = lvs_loai_san_pham::all();
        return view('layouts.admin.lvs_san_pham.lvs_edit', compact('lvs_san_pham', 'lvs_loai_san_pham'));
    }

    // Update a record
    public function update(Request $request, $lvs_MaSanPham)
    {
        $validatedData = $request->validate([
            'lvs_TenSanPham' => 'required|string|max:255',
            'lvs_HinhAnh' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'lvs_SoLuong' => 'required|integer|min:0',
            'lvs_DonGia' => 'required|numeric|min:0',
            'lvs_MaLoai' => 'required|exists:lvs_loai_san_pham,lvs_MaLoai',
            'lvs_TrangThai' => 'required|boolean',
        ]);

        $lvs_san_pham = lvs_san_pham::where('lvs_MaSanPham', $lvs_MaSanPham)->firstOrFail();

        if ($request->hasFile('lvs_HinhAnh')) {
            if ($lvs_san_pham->lvs_HinhAnh) {
                Storage::disk('public')->delete($lvs_san_pham->lvs_HinhAnh);
            }
            $path = $request->file('lvs_HinhAnh')->store('san_pham_images', 'public');
            $validatedData['lvs_HinhAnh'] = $path;
        }

        try {
            $lvs_san_pham->update($validatedData);
            return redirect()->route('san_pham.index')->with('success', 'Sản phẩm được cập nhật thành công!');
        } catch (\Exception $e) {
            Log::error('Error updating data: ' . $e->getMessage());
            return back()->withErrors('Không thể cập nhật sản phẩm. Vui lòng thử lại.');
        }
    }

    // Show a single record
    public function show($lvs_MaSanPham)
    {
        $lvs_san_pham = lvs_san_pham::where('lvs_MaSanPham', $lvs_MaSanPham)->firstOrFail();
        return view('layouts.admin.lvs_san_pham.lvs_detail', compact('lvs_san_pham'));
    }
}
