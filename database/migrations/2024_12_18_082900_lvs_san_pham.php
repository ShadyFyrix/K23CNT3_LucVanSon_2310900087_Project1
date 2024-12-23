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
        Schema::create('lvs_san_pham', function (Blueprint $table) {
             $table->id();
            $table->string('lvs_MaSanPham', 255)->unique();
            $table->string('lvs_TenSanPham', 255);
            $table->string('lvs_HinhAnh', 255)->nullable();
            $table->integer('lvs_SoLuong');
            $table->float('lvs_DonGia', 10, 2); // 10 số, 2 chữ số thập phân
            $table->biginteger('lvs_Maloai')->references('id')->on('lvs_loai_san_pham');
            $table->tinyinteger('lvs_TrangThai');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lvs_san_pham');
    }
};
