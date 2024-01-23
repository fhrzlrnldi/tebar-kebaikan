<?php

namespace Database\Seeders;

use App\Models\GalangDana;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GalangDanaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        GalangDana::create([
            'user_id'=>'2',
           'kategori_id'=>1,
           'judul'=>'Bantu anak bersekolah',
           'slug'=>'Bantu-anak-bersekolah',
           'short_description'=>'halo gaes david disini',
           'body'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui impedit, nisi eligendi vel itaque ea quod autem necessitatibus temporibus ipsa. Dolorum nisi explicabo distinctio at eum mollitia quo quidem porro.',
           'goal'=>'1000000',
           'status'=>'publish',
        //    'nominal'=>10000000,
           'end_date'=>'2024-05-16 21:26:07',
           'penerima'=>'Lainnya',   
           'path_image'=>'kucing.jpeg',
         
        ]);
        GalangDana::create([
            'user_id'=>'2',
           'kategori_id'=>1,
           'judul'=>'Bantu mereka bersekolah',
           'slug'=>'Bantu-mereka-bersekolah',
           'short_description'=>'halo gaes david disini',
           'body'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui impedit, nisi eligendi vel itaque ea quod autem necessitatibus temporibus ipsa. Dolorum nisi explicabo distinctio at eum mollitia quo quidem porro.',
           'goal'=>'1000000',
           'status'=>'publish',
           'end_date'=>'2024-05-16 21:26:07',
           'penerima'=>'Lainnya',   
           'path_image'=>'kucing.jpeg',
         

        ]);
        GalangDana::create([
            'user_id'=>'2',
           'kategori_id'=>1,
           'judul'=>'kenapa kalian sekolah',
           'slug'=>'kenapa-kalian-sekolah',
           'short_description'=>'halo gaes david disini',
           'body'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui impedit, nisi eligendi vel itaque ea quod autem necessitatibus temporibus ipsa. Dolorum nisi explicabo distinctio at eum mollitia quo quidem porro.',
           'goal'=>'1000000',
           'end_date'=>'2024-05-16 21:26:07',
           'penerima'=>'Lainnya',   
           'path_image'=>'kucing.jpeg',
         

           
        ]);
        GalangDana::create([
            'user_id'=>'2',
           'kategori_id'=>1,
           'judul'=>'lho kalian sekolah',
           'slug'=>'lho-kalian-sekolah',
           'short_description'=>'halo gaes david disini',
           'body'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui impedit, nisi eligendi vel itaque ea quod autem necessitatibus temporibus ipsa. Dolorum nisi explicabo distinctio at eum mollitia quo quidem porro.',
           'goal'=>'1000000',
           'end_date'=>'2024-05-16 21:26:07',
           'penerima'=>'Lainnya',   
           'path_image'=>'kucing.jpeg',
         
        ]);
        GalangDana::create([
            'user_id'=>'1',
           'kategori_id'=>1,
           'judul'=>'gausah sekolah',
           'slug'=>'gausah-sekolah',
           'short_description'=>'halo gaes david disini',
           'body'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui impedit, nisi eligendi vel itaque ea quod autem necessitatibus temporibus ipsa. Dolorum nisi explicabo distinctio at eum mollitia quo quidem porro.',
           'goal'=>'2000000',
           'end_date'=>'2024-05-16 21:26:07',
           'penerima'=>'Lainnya',   
           'path_image'=>'kucing.jpeg',
         
        ]);
    }
}
