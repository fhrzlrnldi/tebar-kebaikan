<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\DonasiSeeder;
use Database\Seeders\KategoriSeeder;
use Database\Seeders\GalangDanaSeeder;

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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::create([
            'role_id'=>'2',
            'name'=>'admin',
            'email'=>'admin@admin.com',
            'password'=>bcrypt('admin'),
        ]);
        User::create([
            'role_id'=>'1',
            'name'=>'rizal',
            'email'=>'rizal@gmail.com',
            'password'=>bcrypt('admin'),
            'birth_date'=>'2003-01-01'
        ]);
        
        $this->call(KategoriSeeder::class);
        $this->call(GalangDanaSeeder::class);
        $this->call(DonasiSeeder::class);
    }
}
