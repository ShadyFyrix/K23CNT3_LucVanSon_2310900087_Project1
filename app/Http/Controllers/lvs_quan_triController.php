<?php

namespace App\Http\Controllers;
use App\Models\lvs_quan_tri; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class lvs_quan_triController extends Controller
{
    public function lvsLogin(){
        return view('layouts.admin.lvs_login.lvs_login');
    }
    public function lvs_Loginsubmit(Request $request) {
        // Validation form
        $validationData = $request->validate([
            'lvs_TaiKhoan' => 'required|string',
            'lvs_MatKhau' => 'required|min:6|max:12'
        ]);
        // Lấy giá trị từ form
        $email = $request->input('lvs_TaiKhoan');
        $password = $request->input('lvs_MatKhau');
        // Kiểm tra tài khoản
        $user = lvs_quan_tri::where('lvs_TaiKhoan', $email)->first();
        if (!$user) {
            return back()->withErrors(['lvs_TaiKhoan' => 'Tài khoản không tồn tại.']);
        }
        // Kiểm tra mật khẩu (nếu chưa mã hóa)
        if ($user->lvs_MatKhau !== $password) {
            return back()->withErrors(['lvs_MatKhau' => 'Mật khẩu không đúng.']);
        }
        // Đăng nhập thành công, chuyển hướng
        return redirect('/layouts.lvsAdmins.index');
    }
    public function lvs_logout()
    {
        $messages_count = 3; // Số tin nhắn
        $notifications_count = 15; // Số thông báo
        return view('lvs_login.lvs_home-logout', [
            'messages_count' => $messages_count,
            'notifications_count' => $notifications_count
        ]);
    }
    public function lvs_listQT()
    {   
        $lvs_quantri = lvs_quan_tri::all();
        return view('lvs_login.lvs_-listQT',['lvs_quantri' => $lvs_quantri]);
    }
       //them mowi
       public function lvs_creatQT(){
        return view('lvs_login.lvs_quantri.lvs_-createqt');
    }
    public function lvs_creatQTsubmit(Request $request){
        $request->validate([
            'id' => 'required|unique:lvs_quan_tri,id', // Đảm bảo duy nhất
            'lvs_TaiKhoan' => 'required|unique:lvs_quan_tri,lvs_TaiKhoan', // Đảm bảo duy nhất
            'lvs_MatKhau' => 'required',
            'lvs_TrangThai' => 'required|boolean',
        ]);
        
        $lvs_quantri = new lvs_quan_tri;
        $lvs_quantri->id = $request->id;
        $lvs_quantri->lvs_TaiKhoan = $request->lvs_TaiKhoan;
        $lvs_quantri->lvs_MatKhau = $request->lvs_MatKhau;
        $lvs_quantri->lvs_TrangThai = $request->lvs_TrangThai;
        
        $lvs_quantri->save();
    
        return redirect()->route('lvs_-admins-listQT');
    }
    public function lvs_chitietqt($id)
    {
        // Tìm bản ghi theo id
        $lvs_quantri = lvs_quan_tri::find($id);
    
        // Kiểm tra nếu không tìm thấy bản ghi
        if (!$lvs_quantri) {
            return redirect('lvs_-admins-listQT')->with('error', 'Không tìm thấy thông tin sản phẩm.');
        }
    
        // Trả về view với dữ liệu
        return view('lvs_login.lvs_quantri.lvs_-chitietqt', ['lvs_quantri' => $lvs_quantri]);
    }
    

}