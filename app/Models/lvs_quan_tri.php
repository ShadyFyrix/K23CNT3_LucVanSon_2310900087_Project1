<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class lvs_quan_tri extends Authenticatable
{
    use Notifiable;

    protected $table = 'lvs_quan_tri';

    protected $fillable = [
        'lvs_TaiKhoan', 
        'lvs_MatKhau', 
        'lvs_TrangThai'
    ];

    protected $hidden = [
        'lvs_MatKhau', // Hide password from arrays
    ];

    /**
     * Custom password field mapping for Laravel auth
     */
    public function getAuthPassword()
    {
        return $this->lvs_MatKhau;
    }
}
