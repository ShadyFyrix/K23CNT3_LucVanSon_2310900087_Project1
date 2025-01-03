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
            $table->id(); // Primary key
            $table->string('lvs_MaSanPham', 255)->unique(); // Unique product code
            $table->string('lvs_TenSanPham', 255); // Product name
            $table->string('lvs_HinhAnh', 255)->nullable(); // Image path (nullable)
            $table->integer('lvs_SoLuong'); // Quantity
            $table->float('lvs_DonGia', 10, 2); // Price (10 digits, 2 decimal points)
            $table->biginteger('lvs_MaLoai')->references('id')->on('lvs_loai_san_pham ');
            $table->tinyInteger('lvs_TrangThai'); // Status
            $table->timestamps(); // Created at and updated at
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
