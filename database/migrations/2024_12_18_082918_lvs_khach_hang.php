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
        Schema::create('lvs_khach_hang', function (Blueprint $table) {
            $table->id();
            $table->string('lvs_Makhachhang',255)->unique();
            $table->string('lvs_Hotenkhachhang',255);
            $table->string('lvs_Email',255);
            $table->string('lvs_DienThoai',255);
            $table->string('lvs_DiaChi',255);
            $table->date('lvs_NgayDK');
            $table->tinyInteger('lvs_TrangThai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lvs_khach_hang');
    }
};