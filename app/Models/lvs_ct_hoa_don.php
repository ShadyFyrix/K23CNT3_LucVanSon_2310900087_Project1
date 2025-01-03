<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lvs_ct_hoa_don extends Model
{
    use HasFactory;

    protected $table = 'lvs_ct_hoa_don';

    protected $fillable = [
        'lvs_HoaDonID',
        'lvs_SanPhamID',
        'lvs_SoLuongMua',
        'lvs_DonGiaMua',
        'lvs_ThanhTien',
        'lvs_TrangThai',
        'created_at',
        'updated_at',
    ];
}
