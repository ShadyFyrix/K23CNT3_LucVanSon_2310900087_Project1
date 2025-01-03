<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\lvs_hoa_don;
use App\Models\lvs_khach_hang;
use Illuminate\Support\Facades\Log; // Ghi log
use Illuminate\Support\Facades\File; // Xử lý file

class lvs_hoa_donController extends Controller
{
    public function lvs_listHD()
    {
    $lvs_hoa_don = lvs_hoa_don::paginate(5);
    return view('layouts.admin.lvs_hoa_don.lvs_list', ['lvs_hoa_don' => $lvs_hoa_don]);
    }


    # Insert
    public function lvs_createHD()
    {
        $lvs_khach_hang = lvs_khach_hang::all();
        return view('layouts.admin.lvs_hoa_don.lvs_create', ['lvs_khach_hang' => $lvs_khach_hang]);
    }

    # Insert submit
    public function lvs_createHDSubmit(Request $request)
{
    // Validate the request data
    $validatedData = $request->validate([
       'lvs_MaHoaDon' => 'required|string|max:255',
        'lvs_Makhachhang' => 'required|exists:lvs_khach_hang,id',
        'lvs_NgayHoaDon' => 'required|date',
        'lvs_HotenKhachHang' => 'required|string|max:255',
        'lvs_Email' => 'nullable|email',
        'lvs_DienThoai' => 'nullable|string|max:15',
        'lvs_DiaChi' => 'nullable|string|max:255',
        'lvs_TongGiaTri' => 'required|numeric|min:0',
        'lvs_TrangThai' => 'required|in:0,1',
    ]);

    try {
        // Enforce maximum allowed value for lvs_TongGiaTri
        $maxTongGiaTri = 99999999999999.99;
        $lvsTongGiaTri = min($request->lvs_TongGiaTri, $maxTongGiaTri);

        // Create and save the Hoa Don
        $hoaDon = new lvs_hoa_don();
        $hoaDon->lvs_MaHoaDon = $validatedData['lvs_MaHoaDon'];
        $hoaDon->lvs_Makhachhang = $validatedData['lvs_Makhachhang'];
        $hoaDon->lvs_NgayHoaDon = $validatedData['lvs_NgayHoaDon'];
        $hoaDon->lvs_HotenKhachHang = $validatedData['lvs_HotenKhachHang'];
        $hoaDon->lvs_Email = $validatedData['lvs_Email'];
        $hoaDon->lvs_DienThoai = $validatedData['lvs_DienThoai'];
        $hoaDon->lvs_DiaChi = $validatedData['lvs_DiaChi'];
        $hoaDon->lvs_TongGiaTri = $lvsTongGiaTri;
        $hoaDon->lvs_TrangThai = $validatedData['lvs_TrangThai'];

        $hoaDon->save();

        // Redirect on success
        return redirect()->route('lvs.listHD')->with('success', 'Thêm hóa đơn thành công!');
    } catch (\Exception $e) {
        // Log and display the error
        Log::error('Error saving Hoa Don: ' . $e->getMessage());
        return redirect()->back()->withErrors(['error' => 'Có lỗi xảy ra trong quá trình lưu hóa đơn!']);
    }
}

    # Chi tiết
    public function lvs_chiTietHD($lvs_MaHoaDon)
    {
        $lvs_hoa_don = lvs_hoa_don::find($lvs_MaHoaDon);

        if (!$lvs_hoa_don) {    
            return redirect()->route('lvs.listHD')->with('error', 'Không tìm thấy hóa đơn.');
        }

        $lvs_khach_hang = lvs_khach_hang::all();
        return view('layouts.admin.lvs_hoa_don.lvs_detail', compact('lvs_hoa_don', 'lvs_khach_hang'));
    }

    # Edit
    public function lvs_editHD($lvs_MaHoaDon)
    {
        $lvs_hoa_don = lvs_hoa_don::where('lvs_MaHoaDon', $lvs_MaHoaDon)->first();
    
        if (!$lvs_hoa_don) {
            return redirect()->route('lvs.listHD')->with('error', 'Không tìm thấy hóa đơn.');
        }
    
        $lvs_khach_hang = lvs_khach_hang::all();
    
        return view('layouts.admin.lvs_hoa_don.lvs_edit', compact('lvs_hoa_don', 'lvs_khach_hang'));
    }
    
    public function lvs_editHDSubmit(Request $request, $lvs_MaHoaDon)
    {
        // Validate the request data
        $request->validate([
            'lvs_MaHoaDon' => "required|string|unique:lvs_hoa_don,lvs_MaHoaDon,{$lvs_MaHoaDon},lvs_MaHoaDon",
            'lvs_Makhachhang' => 'required|exists:lvs_khach_hang,id',
            'lvs_NgayHoaDon' => 'required|date',
            'lvs_HotenKhachHang' => 'required|string|max:255',
            'lvs_Email' => 'nullable|email|max:255',
            'lvs_DienThoai' => 'nullable|string|max:15',
            'lvs_DiaChi' => 'nullable|string|max:255',
            'lvs_TongGiaTri' => 'required|numeric|min:0',
            'lvs_TrangThai' => 'required|in:0,1',
        ]);
    
        // Retrieve the invoice by ID
        $lvs_hoa_don = lvs_hoa_don::where('lvs_MaHoaDon', $lvs_MaHoaDon)->first();
    
        // Check if the invoice exists
        if (!$lvs_hoa_don) {
            return redirect()->route('lvs.listHD')->with('error', 'Không tìm thấy hóa đơn.');
        }
    
        // Limit the value of lvs_TongGiaTri
        $maxTongGiaTri = 99999999999999.99;
        $lvsTongGiaTri = min($request->lvs_TongGiaTri, $maxTongGiaTri);
    
        // Update the invoice data
        $lvs_hoa_don->lvs_MaHoaDon = $request->lvs_MaHoaDon;
        $lvs_hoa_don->lvs_Makhachhang = $request->lvs_Makhachhang;
        $lvs_hoa_don->lvs_NgayHoaDon = $request->lvs_NgayHoaDon;
        $lvs_hoa_don->lvs_HotenKhachHang = $request->lvs_HotenKhachHang;
        $lvs_hoa_don->lvs_Email = $request->lvs_Email;
        $lvs_hoa_don->lvs_DienThoai = $request->lvs_DienThoai;
        $lvs_hoa_don->lvs_DiaChi = $request->lvs_DiaChi;
        $lvs_hoa_don->lvs_TongGiaTri = $lvsTongGiaTri;
        $lvs_hoa_don->lvs_TrangThai = $request->lvs_TrangThai;
    
        // Save the changes
        if (!$lvs_hoa_don->save()) {
            return redirect()->route('lvs.listHD')->with('error', 'Cập nhật hóa đơn không thành công. Vui lòng thử lại.');
        }
    
        // Redirect to the list page with success message
        return redirect()->route('lvs.listHD')->with('success', 'Cập nhật hóa đơn thành công!');
    }    

    public function lvs_deleteHD($lvs_MaHoaDon)
    {
    $hoaDon = lvs_hoa_don::findOrFail($lvs_MaHoaDon); // Find the record or throw a 404 error if not found
    $hoaDon->delete(); // Delete the record
    return redirect()->route('lvs.listHD') // Redirect to the list route
        ->with('message', 'Hóa đơn đã được xóa thành công!'); // Success message
    }
}