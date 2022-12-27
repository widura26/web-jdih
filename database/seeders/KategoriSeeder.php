<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kategori;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kategori::create([
            'singkatan' => 'Peraturan Desa',
            'jenis' => 'Perdes'
        ]);

        Kategori::create([
            'singkatan' => 'Peraturan Kepala Desa',
            'jenis' => 'Perkades'
        ]);

        Kategori::create([
            'singkatan' => 'Peraturan Bersama Kepala Desa',
            'jenis' => 'Permakades'
        ]);

        Kategori::create([
            'singkatan' => 'Surat Keputusan Kepala Desa',
            'jenis' => 'SK Kades'
        ]);
    }
}
