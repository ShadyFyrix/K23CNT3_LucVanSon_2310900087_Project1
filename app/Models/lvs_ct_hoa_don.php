<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lvs_loai_san_pham extends Model
{
    use HasFactory;

    protected $table = 'lvs_loai_san_pham';
    protected $fillable = ['lvs_Maloai', 'lvs_TenLoai', 'lvs_TrangThai'];
}
