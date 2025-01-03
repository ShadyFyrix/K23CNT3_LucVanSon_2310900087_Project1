<?php

namespace App\Http\Controllers;

use App\Models\lvs_quan_tri;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class lvs_quan_triController extends Controller
{
    // Hiển thị trang đăng nhập
    public function lvsLogin()
    {
        return view('layouts.admin.lvs_login.lvs_login');
    }
    // Xử lý đăng nhập
    public function lvs_Loginsubmit(Request $request)
    {
        $request->validate([
            'lvs_TaiKhoan' => 'required|string',
            'lvs_MatKhau' => 'required|min:6|max:12',
        ]);
    
        $email = $request->input('lvs_TaiKhoan');
        $password = $request->input('lvs_MatKhau');
    
        $user = lvs_quan_tri::where('lvs_TaiKhoan', $email)->first();
    
        if (!$user || !Hash::check($password, $user->lvs_MatKhau)) {
            return back()->withErrors(['lvs_TaiKhoan' => 'Sai tài khoản hoặc mật khẩu.']);
        }
    
        // Store user information in the session
        session(['admin_id' => $user->id, 'admin_name' => $user->lvs_TaiKhoan]);
    
        return redirect()->route('trangchu')->with('success', 'Đăng nhập thành công.');
    }

    // Đăng xuất
    public function lvs_logout()
    {
        session()->flush(); // Clear all session data
        return redirect()->route('trangchu')->with('success', 'Bạn đã đăng xuất thành công.');
    }    
    // Hiển thị danh sách quản trị
    public function lvs_listQT()
    {
        $lvs_quantri = lvs_quan_tri::all();
        return view('layouts.admin.lvs_quan_tri.lvs_list_quan_tri', ['lvs_quantri' => $lvs_quantri]);
    }

    // Hiển thị form thêm mới quản trị viên
    public function lvs_creatQT()
    {
        return view('layouts.admin.lvs_quan_tri.lvs_create');
    }

    // Xử lý thêm mới quản trị viên
    public function lvs_creatQTsubmit(Request $request)
    {
        $request->validate([
            'id' => 'required|unique:lvs_quan_tri,id',
            'lvs_TaiKhoan' => 'required|unique:lvs_quan_tri,lvs_TaiKhoan',
            'lvs_MatKhau' => 'required|min:6',
            'lvs_TrangThai' => 'required|boolean',
        ]);

        $lvs_quantri = new lvs_quan_tri;
        $lvs_quantri->id = $request->id;
        $lvs_quantri->lvs_TaiKhoan = $request->lvs_TaiKhoan;
        $lvs_quantri->lvs_MatKhau = Hash::make($request->lvs_MatKhau); // Mã hóa mật khẩu
        $lvs_quantri->lvs_TrangThai = $request->lvs_TrangThai;

        $lvs_quantri->save();

        return redirect()->route('lvs.listquantri')->with('success', 'Thêm quản trị viên thành công.');
    }

    // Hiển thị thông tin chi tiết quản trị viên
    public function lvs_chitietqt($id)
    {
        $lvs_quantri = lvs_quan_tri::find($id);
        
        if (!$lvs_quantri) {
            return redirect()->route('lvs.listquantri')->with('error', 'Không tìm thấy quản trị viên.');
        }

        return view('layouts.admin.lvs_quan_tri.lvs_ct_quan_tri', ['lvs_quantri' => $lvs_quantri]);
    }

    // Hiển thị form chỉnh sửa quản trị viên
    public function lvs_editQT($id)
    {
        $lvs_quantri = lvs_quan_tri::find($id);

        if (!$lvs_quantri) {
            return redirect()->route('lvs.listquantri')->with('error', 'Không tìm thấy quản trị viên.');
        }

        return view('layouts.admin.lvs_quan_tri.lvs_edit', ['lvs_quantri' => $lvs_quantri]);
    }

    // Xử lý cập nhật quản trị viên
    public function lvs_editQTsubmit(Request $request, $id)
    {
        $lvs_quantri = lvs_quan_tri::find($id);

        if (!$lvs_quantri) {
            return redirect()->route('lvs.listquantri')->with('error', 'Không tìm thấy quản trị viên.');
        }

        $request->validate([
            'lvs_TaiKhoan' => 'required|unique:lvs_quan_tri,lvs_TaiKhoan,' . $id,
            'lvs_MatKhau' => 'nullable|min:6',
            'lvs_TrangThai' => 'required|boolean',
        ]);

        $lvs_quantri->lvs_TaiKhoan = $request->lvs_TaiKhoan;
        if ($request->lvs_MatKhau) {
            $lvs_quantri->lvs_MatKhau = Hash::make($request->lvs_MatKhau); // Cập nhật mật khẩu nếu có
        }
        $lvs_quantri->lvs_TrangThai = $request->lvs_TrangThai;

        $lvs_quantri->save();

        return redirect()->route('lvs.listquantri')->with('success', 'Cập nhật thông tin thành công.');
    }

    // Xóa quản trị viên
    public function lvs_deleteQT($id)
    {
        $lvs_quantri = lvs_quan_tri::find($id);

        if (!$lvs_quantri) {
            return redirect()->route('lvs.listquantri')->with('error', 'Không tìm thấy quản trị viên.');
        }

        $lvs_quantri->delete();

        return redirect()->route('lvs.listquantri')->with('success', 'Xóa quản trị viên thành công.');
    }
}
