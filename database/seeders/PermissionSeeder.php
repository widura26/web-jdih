<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Permission::insert([
            ['name' => 'read-document', 'label' => 'Melihat Dokumen', 'guard_name' => 'web'],
            ['name' => 'create-document', 'label' => 'Menambah Dokumen', 'guard_name' => 'web'],
            ['name' => 'update-document', 'label' => 'Merubah Dokumen',  'guard_name' => 'web'],
            ['name' => 'delete-document', 'label' => 'Menghapus Dokumen',  'guard_name' => 'web'],
            
            ['name' => 'read-admin', 'label' => 'Melihat Admin', 'guard_name' => 'web'],
            ['name' => 'create-admin', 'label' => 'Menambah Admin', 'guard_name' => 'web'],
            ['name' => 'update-admin', 'label' => 'Merubah Admin',  'guard_name' => 'web'],
            ['name' => 'delete-admin', 'label' => 'Menghapus Admin',  'guard_name' => 'web'],
            
            ['name' => 'read-role', 'label' => 'Melihat role', 'guard_name' => 'web'],
            ['name' => 'create-role', 'label' => 'Menambah role', 'guard_name' => 'web'],
            ['name' => 'update-role', 'label' => 'Merubah role',  'guard_name' => 'web'],
            ['name' => 'delete-role', 'label' => 'Menghapus role',  'guard_name' => 'web'],
            
            ['name' => 'read-permission', 'label' => 'Melihat Permission',  'guard_name' => 'web'],
            ['name' => 'update-permission', 'label' => 'Mengubah Permission',  'guard_name' => 'web']


            
        ]);
    }
}
