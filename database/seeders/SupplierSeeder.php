<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['supplier_kode' => 'SPL01', 'supplier_nama' => 'Supplier A', 'supplier_alamat' => 'Jakarta'],
            ['supplier_kode' => 'SPL02', 'supplier_nama' => 'Supplier B', 'supplier_alamat' => 'Bandung'],
            ['supplier_kode' => 'SPL03', 'supplier_nama' => 'Supplier C', 'supplier_alamat' => 'Surabaya'],
        ];
        DB::table('m_supplier')->insert($data);
    }
}
