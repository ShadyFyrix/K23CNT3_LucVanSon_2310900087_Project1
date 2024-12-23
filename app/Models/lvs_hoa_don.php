<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lvs_hoa_don extends Model
{
    use HasFactory;

    protected $table = 'lvs_hoa_don';
    protected $primaryKey = 'lvs_MaHoaDon';
    public $incrementing = false; // If IDs are not auto-incremented
    protected $keyType = 'string'; // If IDs are not integers

    protected $fillable = [
        'lvs_MaHoaDon',
        'lvs_Makhachhang',
        'lvs_NgayHoaDon',
        'lvs_HotenKhachHang',
        'lvs_TongGiaTri',
        'lvs_TrangThai',
        'lvs_Email',
        'lvs_DienThoai',
        'lvs_DiaChi',
    ];    
}
