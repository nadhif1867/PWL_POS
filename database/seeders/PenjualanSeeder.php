<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['user_id' => 1, 'pembeli' => 'Iqbal', 'penjualan_kode' => 'TSC01', 'penjualan_tanggal' => now()],
            ['user_id' => 2, 'pembeli' => 'Arif', 'penjualan_kode' => 'TSC02', 'penjualan_tanggal' => now()],
            ['user_id' => 3, 'pembeli' => 'Aldi', 'penjualan_kode' => 'TSC03', 'penjualan_tanggal' => now()],
            ['user_id' => 1, 'pembeli' => 'Lisa', 'penjualan_kode' => 'TSC04', 'penjualan_tanggal' => now()],
            ['user_id' => 2, 'pembeli' => 'Nasywa', 'penjualan_kode' => 'TSC05', 'penjualan_tanggal' => now()],
            ['user_id' => 3, 'pembeli' => 'Nala', 'penjualan_kode' => 'TSC06', 'penjualan_tanggal' => now()],
            ['user_id' => 1, 'pembeli' => 'Athif', 'penjualan_kode' => 'TSC07', 'penjualan_tanggal' => now()],
            ['user_id' => 2, 'pembeli' => 'Dane', 'penjualan_kode' => 'TSC08', 'penjualan_tanggal' => now()],
            ['user_id' => 3, 'pembeli' => 'Salwa', 'penjualan_kode' => 'TSC09', 'penjualan_tanggal' => now()],
            ['user_id' => 1, 'pembeli' => 'Nadhif', 'penjualan_kode' => 'TSC10', 'penjualan_tanggal' => now()],
        ];
        DB::table('t_penjualan')->insert($data);
    }
}
