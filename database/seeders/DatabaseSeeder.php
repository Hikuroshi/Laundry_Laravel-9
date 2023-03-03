<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Outlet;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        Outlet::create([
            'nama' => 'Kambenk Hejo',
            'slug' => 'kambenk-hejo',
            'alamat' => 'Jepang',
            'telepon' => '083214653796'
        ]);

        User::create([
            'nama' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin1'),
            'outlet_id' => '1',
            'roles' => 'Admin'
        ]);
    }
}
