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
        Schema::create('lvs_ct_hoa_don', function (Blueprint $table) {
            $table->id();
           
            $table->integer('lvs_HoaDonID')->reference('id')->on('lvs_hoa_don');
            $table->integer('lvs_SanPhamID')->reference('id')->on('lvs_san_pham');
            $table->integer('lvs_SoLuongMua');
            $table->float('lvs_DonGiaMua');
            $table->float('lvs_ThanhTien');
            $table->tinyInteger('lvs_TrangThai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lvs_ct_hoa_don');
    }
};
