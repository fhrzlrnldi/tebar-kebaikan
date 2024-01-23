<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    //
    Kategori::create([
        'nama'=>'pendidikan',
        'slug'=>'pendidikan',
    ]);
    Kategori::create([
        'nama'=>'sosial',
        'slug'=>'sosial',
    ]);
    Kategori::create([
        'nama'=>'bencana',
        'slug'=>'bencana',
    ]);
    }
}
