<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::create([
        //     'username' => 'user1',
        //     'nama_pengguna' => 'user pertama',
        //     'password' => bcrypt('password'),
        //     'alamat' => 'ajkdkand',
        //     'whatsapp' => rand(1,100),
        // ]);

        \App\Models\Admin::create([
            'username' => 'admin',
            'nama_admin' => 'admin pertama',
            "password" => bcrypt('password'),
        ]);
    }
}
