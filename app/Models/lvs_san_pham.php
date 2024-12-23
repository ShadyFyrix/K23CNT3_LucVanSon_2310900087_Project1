<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lvs_san_pham extends Model
{
    use HasFactory;

    protected $table = 'lvs_san_pham'; // Ensure this matches your table name

    protected $primaryKey = 'lvs_MaSanPham'; // Ensure the primary key is correctly set
    public $incrementing = false; // If primary key is not auto-incrementing

    protected $fillable = [
        'lvs_MaSanPham',
        'lvs_TenSanPham',
        'lvs_HinhAnh',
        'lvs_SoLuong',
        'lvs_DonGia',
        'lvs_MaLoai',
        'lvs_TrangThai',
    ];
    public function loaiSanPham()
{
    return $this->belongsTo(lvs_loai_san_pham::class, 'lvs_MaLoai', 'lvs_MaLoai');
}
}
