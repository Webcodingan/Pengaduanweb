<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'Admin@localhost.com',
            'role' => 'admin',
            'nik' => '01929202',
            'telp' => '081384681305',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'name' => 'Petugas',
            'email' => 'petugasr@localhost.com',
            'role' => 'petugas',
            'nik' => '092382',
            'telp' => '082211279980',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'name' => 'Masyarakat',
            'email' => 'masyarakat@localhost.com',
            'role' => 'masyarakat',
            'nik' => '0138058',
            'telp' => '081214965840',
            'password' => bcrypt('password'),
        ]);
    }

}
