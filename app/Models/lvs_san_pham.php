<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lvs_san_pham extends Model
{
    use HasFactory;

    protected $table = 'lvs_san_pham';
    protected $fillable = [
        'lvs_MaSanPham',
        'lvs_TenSanPham',
        'lvs_HinhAnh',
        'lvs_SoLuong',
        'lvs_DonGia',
        'lvs_Maloai',
        'lvs_TrangThai',
    ];
    public $timestamps = false;
}
