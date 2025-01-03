<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class lvs_quan_tri extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            $lvs_MatKhau = Hash::make('10');
    
            DB::table('lvs_quan_tri')->insert([
                'lvs_TaiKhoan' => 'shadyfyrix@gmail.com',
                'lvs_MatKhau' => $lvs_MatKhau,
                'lvs_TrangThai' => 0
            ]);
        
    }
}
