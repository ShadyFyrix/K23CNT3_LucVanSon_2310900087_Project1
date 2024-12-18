<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('lvs_hoa_don', function (Blueprint $table) {
            $table->id();
            $table->string('lvs_MaHoaDon',255)->unique();
            $table->bigInteger('lvs_Makhachhang')->references('id')->on('lvs_khach_hang');
            $table->date('lvs_NgayHoaDon');
            $table->string('lvs_HotenKhachHang',255);
            $table->string('lvs_Email',255);
            $table->string('lvs_DienThoai',255);
            $table->string('lvs_DiaChi',255);
            $table->float('lvs_TongGiaTri');
            $table->tinyInteger('lvs_TrangThai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lvs_hoa_don');
    }
};
