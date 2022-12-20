<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\StatusDokumen;

class StatusDokumenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StatusDokumen::create([
            "status" => "Berlaku"
        ]);

        StatusDokumen::create([
            "status" => "Tidak Berlaku"
        ]);
    }
}
