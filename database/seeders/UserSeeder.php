<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Log;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'tester',
            'username' => 'superadmin',
            'password' => password_hash('1234', PASSWORD_DEFAULT),
            'alamat' => 'Tambong',
            'no_telp' => '081xxx',
            
        ]);

        $admin->assignRole('super admin');


    }
}
