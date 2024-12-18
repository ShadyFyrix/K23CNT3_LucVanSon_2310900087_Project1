<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class lvs_san_pham extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("lvs_san_pham")->insert([
            'lvs_MaSanPham'=>'VP01',
            'lvs_TenSanPham'=>'Cây Phú Quý',
            'lvs_HinhAnh'=>'',
            'lvs_SoLuong'=> 100,
            'lvs_DonGia'=>699000,
            'lvs_Maloai'=> 1,
            'lvs_TrangThai'=> 0
        ]);
        DB::table("lvs_san_pham")->insert([
            'lvs_MaSanPham'=>'VP02',
            'lvs_TenSanPham'=>'Cây Đại Phú Quý',
            'lvs_HinhAnh'=>'',
            'lvs_SoLuong'=> 100,
            'lvs_DonGia'=>199000,
            'lvs_Maloai'=> 1,
            'lvs_TrangThai'=> 0
        ]);
        DB::table("lvs_san_pham")->insert([
            'lvs_MaSanPham'=>'VP03',
            'lvs_TenSanPham'=>'Cây Hạnh Phúc',
            'lvs_HinhAnh'=>'',
            'lvs_SoLuong'=> 100,
            'lvs_DonGia'=>899000,
            'lvs_Maloai'=> 1,
            'lvs_TrangThai'=> 0
        ]);
        DB::table("lvs_san_pham")->insert([
            'lvs_MaSanPham'=>'VP04',
            'lvs_TenSanPham'=>'Cây Vạn Lộc',
            'lvs_HinhAnh'=>'',
            'lvs_SoLuong'=> 100,
            'lvs_DonGia'=>799000,
            'lvs_Maloai'=> 1,
            'lvs_TrangThai'=> 0
        ]);
        DB::table("lvs_san_pham")->insert([
            'lvs_MaSanPham'=>'PT001',
            'lvs_TenSanPham'=>'Cây Thiết Mộc Lan',
            'lvs_HinhAnh'=>'',
            'lvs_SoLuong'=> 100,
            'lvs_DonGia'=>150000,
            'lvs_Maloai'=> 1,
            'lvs_TrangThai'=> 0
        ]);
        DB::table("lvs_san_pham")->insert([
            'lvs_MaSanPham'=>'PT002',
            'lvs_TenSanPham'=>'Cây Trường Sinh',
            'lvs_HinhAnh'=>'',
            'lvs_SoLuong'=> 100,
            'lvs_DonGia'=>100000,
            'lvs_Maloai'=> 3,
            'lvs_TrangThai'=> 0
        ]);
        DB::table("lvs_san_pham")->insert([
            'lvs_MaSanPham'=>'PT003',
            'lvs_TenSanPham'=>'Cây Hạnh Phúc',
            'lvs_HinhAnh'=>'',
            'lvs_SoLuong'=> 100,
            'lvs_DonGia'=>200000,
            'lvs_Maloai'=> 3,
            'lvs_TrangThai'=> 0
        ]);
        DB::table("lvs_san_pham")->insert([
            'lvs_MaSanPham'=>'PT004',
            'lvs_TenSanPham'=>'Cây Hoa Nhài (Lai Ta)',
            'lvs_HinhAnh'=>'',
            'lvs_SoLuong'=> 100,
            'lvs_DonGia'=>100000,
            'lvs_Maloai'=> 3,
            'lvs_TrangThai'=> 0
        ]);
    }
}