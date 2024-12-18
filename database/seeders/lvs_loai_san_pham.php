<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class lvs_loai_san_pham extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('lvs_loai_san_pham')->insert([
            'lvs_Maloai'=>'L001',
            'lvs_TenLoai'=>'Cây Văn phong',
            'lvs_TrangThai' => 0
        ]);
    }
}