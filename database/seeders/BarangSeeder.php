<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['kategori_id' => 1, 'barang_kode' => 'BRG01',  'barang_nama' => 'Laptop', 'harga_beli' => 4000000, 'harga_jual' => 5000000],
            ['kategori_id' => 1, 'barang_kode' => 'BRG02',  'barang_nama' => 'Handphone', 'harga_beli' => 1000000, 'harga_jual' => 2000000],
            ['kategori_id' => 1, 'barang_kode' => 'BRG03',  'barang_nama' => 'Televisi', 'harga_beli' => 2000000, 'harga_jual' => 3000000],
            ['kategori_id' => 2, 'barang_kode' => 'BRG04', 'barang_nama' => 'Kaos', 'harga_beli' => 50000, 'harga_jual' => 80000],
            ['kategori_id' => 2, 'barang_kode' => 'BRG05', 'barang_nama' => 'Jaket', 'harga_beli' => 150000, 'harga_jual' => 200000],
            ['kategori_id' => 2, 'barang_kode' => 'BRG06', 'barang_nama' => 'Jeans', 'harga_beli' => 200000, 'harga_jual' => 300000],
            ['kategori_id' => 3, 'barang_kode' => 'BRG07', 'barang_nama' => 'Cromboloni', 'harga_beli' => 20000, 'harga_jual' => 35000],
            ['kategori_id' => 3, 'barang_kode' => 'BRG08', 'barang_nama' => 'Makaroni', 'harga_beli' => 10000, 'harga_jual' => 15000],
            ['kategori_id' => 3, 'barang_kode' => 'BRG09', 'barang_nama' => 'Spaghetti', 'harga_beli' => 25000, 'harga_jual' => 45000],
            ['kategori_id' => 4, 'barang_kode' => 'BRG10', 'barang_nama' => 'Jus Buah', 'harga_beli' => 5000, 'harga_jual' => 15000],
            ['kategori_id' => 4, 'barang_kode' => 'BRG11', 'barang_nama' => 'Soft Drink', 'harga_beli' => 7000, 'harga_jual' => 10000],
            ['kategori_id' => 4, 'barang_kode' => 'BRG12', 'barang_nama' => 'Susu', 'harga_beli' => 4000, 'harga_jual' => 8000],
            ['kategori_id' => 5, 'barang_kode' => 'BRG13', 'barang_nama' => 'Meja', 'harga_beli' => 150000, 'harga_jual' => 300000],
            ['kategori_id' => 5, 'barang_kode' => 'BRG14', 'barang_nama' => 'Kursi', 'harga_beli' => 80000, 'harga_jual' => 140000],
            ['kategori_id' => 5, 'barang_kode' => 'BRG15', 'barang_nama' => 'Lemari', 'harga_beli' => 200000, 'harga_jual' => 400000],
        ];
        DB::table('m_barang')->insert($data);
    }
}
