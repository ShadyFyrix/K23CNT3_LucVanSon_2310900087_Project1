<?php
namespace App\Http\Controllers;

use App\Models\lvs_ct_hoa_don;
use App\Models\lvs_hoa_don;
use App\Models\lvs_khach_hang; // Thêm nếu cần
use Illuminate\Http\Request;

class lvs_ct_hoa_donController extends Controller
{
    public function lvs_listCTHD()
    {
        // Lấy danh sách tất cả chi tiết hóa đơn
        $ctHoaDon = lvs_ct_hoa_don::all();
        return view('layouts.admin.lvs_ct_hoa_don.lvs_list', ['ctHoaDon' => $ctHoaDon]);
    }

    # Insert
    public function lvs_createCTHD()
    {
        // Lấy danh sách hóa đơn và sản phẩm để chọn
        $hoaDon = lvs_hoa_don::all();
        $khachHang = lvs_khach_hang::all(); // Nếu có sản phẩm liên quan
        
        return view('layouts.admin.lvs_ct_hoa_don.lvs_create', [
            'hoaDon' => $hoaDon,
            'khachHang' => $khachHang, 
        ]);
    }

    # Insert Submit
    public function lvs_createCTHDSubmit(Request $request)
    {
        // Xác thực dữ liệu
        $request->validate([
            'lvs_HoaDonID' => 'required|exists:lvs_hoa_don,id',
            'lvs_SanPhamID' => 'required|integer',
            'lvs_SoLuongMua' => 'required|integer|min:1',
            'lvs_DonGiaMua' => 'required|numeric|min:0|max:9999999999.99',
            'lvs_ThanhTien' => 'nullable|numeric',
            'lvs_TrangThai' => 'required|boolean',
        ]);

        // Tạo chi tiết hóa đơn mới
        $ctHoaDon = new lvs_ct_hoa_don();
        $ctHoaDon->lvs_HoaDonID = $request->lvs_HoaDonID;
        $ctHoaDon->lvs_SanPhamID = $request->lvs_SanPhamID;
        $ctHoaDon->lvs_SoLuongMua = $request->lvs_SoLuongMua;
        $ctHoaDon->lvs_DonGiaMua = $request->lvs_DonGiaMua;
        $ctHoaDon->lvs_ThanhTien = $request->lvs_ThanhTien ?? $request->lvs_SoLuongMua * $request->lvs_DonGiaMua;
        $ctHoaDon->lvs_TrangThai = $request->lvs_TrangThai;

        // Lưu vào cơ sở dữ liệu
        $ctHoaDon->save();

        return redirect()->route('lvs_listCTHD')->with('success', 'Thêm chi tiết hóa đơn thành công!');
    }

    # Chi tiết
    public function lvs_detailCTHD($id)
    {
        $ctHoaDon = lvs_ct_hoa_don::find($id);

        if (!$ctHoaDon) {
            return redirect()->route('lvs_listCTHD')->with('error', 'Không tìm thấy chi tiết hóa đơn.');
        }
        $hoaDon = lvs_hoa_don::all();

        return view('layouts.admin.lvs_ct_hoa_don.lvs_detail', compact('ctHoaDon', 'hoaDon'));
    }

    # Edit
    public function lvs_editCTHD($id)
    {
        $ctHoaDon = lvs_ct_hoa_don::find($id);

        if (!$ctHoaDon) {
            return redirect()->route('lvs_listCTHD')->with('error', 'Không tìm thấy chi tiết hóa đơn.');
        }

        $hoaDon = lvs_hoa_don::all();

        return view('layouts.admin.lvs_ct_hoa_don.lvs_edit', compact('ctHoaDon', 'hoaDon'));
    }

    public function lvs_editCTHDSubmit(Request $request, $id)
    {
        $request->validate([
            'lvs_HoaDonID' => 'required|exists:lvs_hoa_don,id',
            'lvs_SanPhamID' => 'required|integer',
            'lvs_SoLuongMua' => 'required|integer|min:1',
            'lvs_DonGiaMua' => 'required|numeric|min:0|max:9999999999.99',
            'lvs_ThanhTien' => 'nullable|numeric|min:0|max:9999999999.99',
            'lvs_TrangThai' => 'required|boolean',
        ]);

        $ctHoaDon = lvs_ct_hoa_don::find($id);

        if (!$ctHoaDon) {
            return redirect()->route('lvs_listCTHD')->with('error', 'Không tìm thấy chi tiết hóa đơn.');
        }

        $ctHoaDon->update([
            'lvs_HoaDonID' => $request->lvs_HoaDonID,
            'lvs_SanPhamID' => $request->lvs_SanPhamID,
            'lvs_SoLuongMua' => $request->lvs_SoLuongMua,
            'lvs_DonGiaMua' => $request->lvs_DonGiaMua,
            'lvs_ThanhTien' => $request->lvs_ThanhTien ?? $request->lvs_SoLuongMua * $request->lvs_DonGiaMua,
            'lvs_TrangThai' => $request->lvs_TrangThai,
        ]);

        return redirect()->route('lvs_listCTHD')->with('success', 'Cập nhật chi tiết hóa đơn thành công!');
    }

    # Delete
    public function lvs_deleteCTHD($id)
    {
        $ctHoaDon = lvs_ct_hoa_don::findOrFail($id);
        $ctHoaDon->delete();

        return redirect()->route('lvs_listCTHD')->with('success', 'Chi tiết hóa đơn đã được xóa thành công!');
    }
}
