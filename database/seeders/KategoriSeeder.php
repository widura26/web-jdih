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
            'jenis' => 'Perdes'
        ]);

        Kategori::create([
            'jenis' => 'Perkades'
        ]);

        Kategori::create([
            'jenis' => 'Permakades'
        ]);

        Kategori::create([
            'jenis' => 'SK Kades'
        ]);
    }
}
