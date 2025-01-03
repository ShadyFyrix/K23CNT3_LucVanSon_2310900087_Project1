<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lvs_khach_hang extends Model
{
    use HasFactory;

    protected $table = 'lvs_khach_hang';
    protected $primaryKey = 'id'; // Uses the `Id` field as the primary key

    protected $fillable = [
        'lvs_Makhachhang',
        'lvs_Hotenkhachhang',
        'lvs_Email',
        'lvs_MatKhau',
        'lvs_DienThoai',
        'lvs_DiaChi',
        'lvs_NgayDK',
        'lvs_TrangThai',
        'created_at',
        'updated_at',
    ];
    public $timestamps = false;
}
