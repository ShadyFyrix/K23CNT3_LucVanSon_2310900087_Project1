<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\lvs_khach_hang;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class lvs_khach_hangController extends Controller
{
    // Hiển thị trang đăng nhập
    public function lvs_guestlogin()
    {
        return view('layouts.admin.lvs_khach_hang.lvs_login');
    }

    // Xử lý đăng nhập
    public function lvs_guestloginsubmit(Request $request)
{
    $credentials = $request->validate([
        'lvs_Email' => 'required|email',
        'lvs_MatKhau' => 'required|min:6',
    ]);

    // Tìm người dùng theo email
    $user = lvs_khach_hang::where('lvs_Email', $credentials['lvs_Email'])->first();

    // Kiểm tra nếu người dùng tồn tại và mật khẩu chính xác
    if ($user && $credentials['lvs_MatKhau'] === $user->lvs_MatKhau) {
        // Lưu thông tin người dùng vào session
        Session::put('user', $user);

        return redirect()->route('lvs_home')->with('success', 'Đăng nhập thành công!');
    }

    return back()->withErrors(['lvs_Email' => 'Email hoặc mật khẩu không chính xác.']);
}


    // Xử lý đăng xuất
    public function lvs_guestlogout()
    {
        Session::forget('user');
        return redirect()->route('lvs_home')->with('success', 'Bạn đã đăng xuất thành công.');
    }

    // Hiển thị trang đăng ký
    public function lvs_guestsignup()
    {
        return view('layouts.admin.lvs_khach_hang.lvs_signup');
    }

    // Xử lý đăng ký
    public function lvs_guestsignupsubmit(Request $request)
    {
        $data = $request->validate([
            'lvs_Makhachhang' => 'required|string|unique:lvs_khach_hang,lvs_Makhachhang',
            'lvs_Hotenkhachhang' => 'required|string',
            'lvs_Email' => 'required|email|unique:lvs_khach_hang,lvs_Email',
            'lvs_MatKhau' => 'required|min:6',
            'lvs_DienThoai' => 'required|string|unique:lvs_khach_hang,lvs_DienThoai',
            'lvs_DiaChi' => 'required|string',
        ]);

        // Mã hóa mật khẩu trước khi lưu
        $data['lvs_NgayDK'] = now();
        $data['lvs_TrangThai'] = 1;

        lvs_khach_hang::create($data);

        return redirect()->route('lvs_guestlogin')->with('success', 'Đăng ký thành công! Vui lòng đăng nhập.');
    }

    // Hiển thị danh sách khách hàng
    public function lvsListKH()
    {
        $lvsKhachHang = lvs_khach_hang::all();
        return view('layouts.admin.lvs_khach_hang.lvs_list', ['lvsKhachHang' => $lvsKhachHang]);
    }
     // Show the form to create a new customer
     public function lvsCreateKH()
     {
         return view('layouts.admin.lvs_khach_hang.lvs_create');
     }
 
     // Submit new customer data
     public function lvsCreateKHSubmit(Request $request)
     {
         $request->validate([
         'lvs_Makhachhang' => 'required|unique:lvs_khach_hang,lvs_Makhachhang|max:255',
         'lvs_Hotenkhachhang' => 'required|max:255',
         'lvs_Email' => 'required|email|unique:lvs_khach_hang,lvs_Email|max:255',
         'lvs_MatKhau' => 'required|min:6|max:255',
         'lvs_DienThoai' => 'required|unique:lvs_khach_hang,lvs_DienThoai|max:255',
         'lvs_DiaChi' => 'required|max:255',
         'lvs_NgayDK' => 'required|date',
         'lvs_TrangThai' => 'required|boolean',
 ]);
 
         $khachHang = new lvs_khach_hang();
         $khachHang->lvs_Makhachhang = $request->lvs_Makhachhang;
         $khachHang->lvs_Hotenkhachhang = $request->lvs_Hotenkhachhang;
         $khachHang->lvs_Email = $request->lvs_Email;
         $khachHang->lvs_MatKhau = $request->lvs_MatKhau;
         $khachHang->lvs_DienThoai = $request->lvs_DienThoai;
         $khachHang->lvs_DiaChi = $request->lvs_DiaChi;
         $khachHang->lvs_NgayDK = $request->lvs_NgayDK;
         $khachHang->lvs_TrangThai = $request->lvs_TrangThai;
 
         $khachHang->save();
 
         return redirect()->route('lvs.listkhachhang')->with('success', 'Khách hàng được tạo thành công!');
     }

    // Hiển thị chi tiết khách hàng
    public function lvsDetailKH($id)
    {
        $khachHang = lvs_khach_hang::find($id);

        if (!$khachHang) {
            return redirect()->route('lvs.listkhachhang')->with('error', 'Không tìm thấy khách hàng.');
        }

        return view('layouts.admin.lvs_khach_hang.lvs_detail', ['khachHang' => $khachHang]);
    }

    // Hiển thị form sửa thông tin khách hàng
    public function lvsEditKH($id)
    {
        $khachHang = lvs_khach_hang::find($id);

        if (!$khachHang) {
            return redirect()->route('lvs.listkhachhang')->with('error', 'Khách hàng không tồn tại.');
        }

        return view('layouts.admin.lvs_khach_hang.lvs_edit', compact('khachHang'));
    }

    // Cập nhật thông tin khách hàng
    public function lvsEditKHSubmit(Request $request, $id)
    {
        $request->validate([
            'lvs_Hotenkhachhang' => 'required|string|max:255',
            'lvs_Email' => 'required|email|max:255|unique:lvs_khach_hang,lvs_Email,' . $id,
            'lvs_MatKhau' => 'nullable|min:6|max:255',
            'lvs_DienThoai' => 'required|string|max:255|unique:lvs_khach_hang,lvs_DienThoai,' . $id,
            'lvs_DiaChi' => 'required|string|max:255',
            'lvs_TrangThai' => 'required|boolean',
        ]);

        $khachHang = lvs_khach_hang::find($id);

        if (!$khachHang) {
            return redirect()->route('lvs.listkhachhang')->with('error', 'Khách hàng không tồn tại.');
        }

        $khachHang->lvs_Hotenkhachhang = $request->lvs_Hotenkhachhang;
        $khachHang->lvs_Email = $request->lvs_Email;

        // Kiểm tra nếu mật khẩu được cập nhật
        if ($request->filled('lvs_MatKhau')) {
            $khachHang->lvs_MatKhau = Hash::make($request->lvs_MatKhau);
        }

        $khachHang->lvs_DienThoai = $request->lvs_DienThoai;
        $khachHang->lvs_DiaChi = $request->lvs_DiaChi;
        $khachHang->lvs_TrangThai = $request->lvs_TrangThai;

        $khachHang->save();

        return redirect()->route('lvs.listkhachhang')->with('success', 'Khách hàng đã được cập nhật thành công.');
    }

    // Xóa khách hàng
    public function lvsDeleteKH($id)
    {
        $khachHang = lvs_khach_hang::findOrFail($id);
        $khachHang->delete();

        return redirect()->route('lvs.listkhachhang')->with('success', 'Khách hàng đã được xóa thành công!');
    }
}
