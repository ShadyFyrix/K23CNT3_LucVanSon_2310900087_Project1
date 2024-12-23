<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\lvs_hoa_don;

class lvs_hoa_donController extends Controller
{
    // List all records
    public function index()
    {
        $lvs_hoa_don = lvs_hoa_don::paginate(10); // Fetch data from the database
        return view('layouts.admin.lvs_hoa_don.lvs_list', compact('lvs_hoa_don'));
    }

    // Show create form
    public function create()
    {
        return view('layouts.admin.lvs_hoa_don.lvs_create'); // Load a separate form for creating
    }

    // Store a new record
    public function store(Request $request)
    {
        // Validate and create a new record
        $validatedData = $request->validate([
            'lvs_MaHoaDon' => 'required|unique:lvs_hoa_don,lvs_MaHoaDon',
            'lvs_Makhachhang' => 'required',
            'lvs_NgayHoaDon' => 'required|date',
            'lvs_HotenKhachHang' => 'required',
            'lvs_TongGiaTri' => 'required|numeric',
            'lvs_TrangThai' => 'required|boolean',
            'lvs_Email' => 'required|email',
            'lvs_DienThoai' => 'required|string|max:15',
            'lvs_DiaChi' => 'required|string|max:255',
        ]);

        lvs_hoa_don::create($validatedData);

        // Redirect to index after creation
        return redirect()->route('hoa_don.index')->with('success', 'Hóa đơn được tạo thành công!');
    }

    // Show detail page
    public function show($lvs_MaHoaDon)
    {
    // Try fetching the record
    $hoaDon = lvs_hoa_don::where('lvs_MaHoaDon', $lvs_MaHoaDon)->first();

    if (!$hoaDon) {
        return redirect()->route('hoa_don.index')->with('error', 'Hóa đơn không tồn tại!');
    }

    return view('layouts.admin.lvs_hoa_don.lvs_detail', compact('hoaDon'));
    }
    // Show edit form
    public function edit($lvs_MaHoaDon)
    {
    $hoaDon = lvs_hoa_don::find($lvs_MaHoaDon);
    if (!$hoaDon) {
        return redirect()->route('hoa_don.index')->with('error', 'Hóa đơn không tồn tại!');
    }
    return view('layouts.admin.lvs_hoa_don.lvs_edit', compact('hoaDon'));
    }
    // Update a record
    public function update(Request $request, $lvs_MaHoaDon)
{
    $request->validate([
        'lvs_Makhachhang' => 'required|string|max:255',
        'lvs_HotenKhachHang' => 'required|string|max:255',
        'lvs_TongGiaTri' => 'required|numeric|min:0',
        'lvs_Email' => 'required|email|max:255',
        'lvs_DienThoai' => 'required|string|max:20',
        'lvs_DiaChi' => 'required|string|max:255',
        'lvs_TrangThai' => 'required|boolean',
    ]);    
    // Find the record by ID
    $hoaDon = lvs_hoa_don::where('lvs_MaHoaDon', $lvs_MaHoaDon)->first();

    if (!$hoaDon) {
        return redirect()->route('hoa_don.index')->with('error', 'Hóa đơn không tồn tại!');
    }

    // Update fields
    $hoaDon->lvs_Makhachhang = $request->lvs_Makhachhang;
    $hoaDon->lvs_HotenKhachHang = $request->lvs_HotenKhachHang;
    $hoaDon->lvs_TongGiaTri = $request->lvs_TongGiaTri;
    $hoaDon->lvs_Email = $request->lvs_Email;
    $hoaDon->lvs_DienThoai = $request->lvs_DienThoai;
    $hoaDon->lvs_DiaChi = $request->lvs_DiaChi;
    $hoaDon->lvs_TrangThai = $request->lvs_TrangThai;

    // Save the record
    $hoaDon->save();

    // Redirect with success message
    return redirect()->route('hoa_don.index')->with('success', 'Hóa đơn được cập nhật thành công!');
}

    // Delete a record
    public function destroy($lvs_MaHoaDon)
    {
        try {
            $hoaDon = lvs_hoa_don::where('lvs_MaHoaDon', $lvs_MaHoaDon)->first();
            $hoaDon->delete();

            return redirect()->route('hoa_don.index')->with('success', 'Hóa đơn được xóa thành công!');
        } catch (\Exception $e) {
            return redirect()->route('hoa_don.index')->with('error', 'Xóa hóa đơn thất bại!');
        }
    }
}
