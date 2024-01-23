<?php

namespace Database\Seeders;

use App\Models\Artikel;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ArtikelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    for ($i=0; $i < 10; $i++) { 
        Artikel::create([
            'cover'=>'penanganan-pohon-tumbang-di-bandung.jpeg',
            'judul'=>'2 Hari Hujan Disertai Angin di Bandung, 26 Pohon Tumbang',
            'penulis'=>'Wisma Putra',
            'isi_konten'=>'<strong>Bandung</strong> - Sebanyak 26 pohon tercatat tumbang saat hujan disertai angin mengguyur wilayah Kota Bandung dalam dua hari. Jalan Soekarno-Hatta Bandung jadi titik terbanyak pohon yang tumbang.
            Kepala UPT Penghijuan dan Pemeliharaan DPKP Kota Bandung Roslina mengatakan, penanganan pohon tumbang yang dilakukan pihaknya selama dua hari atau pada Sabtu (25/3) dan Minggu (26/3) sebanyak 26 pohon.
            "Kalau yang kita cover ada 21 (pohon) di hari Sabtu dan 5 (pohon) di hari Minggu, itu yang ditangani kita ya, tapi kan ada yang ditangani Damkar dan warga," kata Roslina via sambungan telepon, Selasa (28/3/2023). Dari sekian banyak pohon yang tumbang, satu di antaranya menimpa mobil. "Jalan Ahmad Dahlan, baru tercatat, mobil. Dilihat kerusakannya, kita berikan santunan maksimal Rp 20 juta," ujar Roslina.
            Roslina mengungkapkan, pohon yang tumbang ini notabene kondisinya sehat. Namun pertumbuhan akar kurang baik.
            "Kebanyakan selain akarnya terganggu, ada yang dipotong tumbuh tak sempurna, kemudian pohon tercekik jalan dan tembok, dia gak punya nutrisi air yang baik sehingga tumbuhnya serabut, banyak akar mati, makannya gak kuat menahan pohon yang besar," ungkapnya.
            Roslina menyebut, pihaknya rutin melakukan pemeliharaan pohon di Kota Bandung. Ada empat tim yang bertugas melakukan pemeliharaan hingga pemangkasan pohon.
            "Makannya kita lakukan pemangkasan, perampingan, agar pohon tetap hidup tapi tidak terlalu tinggi. Dilakukan setiap hari dan ada juga laporan dari masyarakat," jelasnya.
            "Hujan angin tidak terprediksi, kadang-kadang pohon sehat juga patah karena kekuatan anginnya besar, misalnya memang kondisi cuaca ekstrim berteduh di tempat aman saja," pungkasnya.'
        ]);
        Artikel::create([
            'cover'=>'kondisi-banjir-bandang-yang-menerjang-cianjur.jpeg',
            'judul'=>'Banjir Bandang Terjang Cianjur, Ratusan Rumah Terendam-Jembatan Putus',
            'penulis'=>'Ikbal Selamet',
            'isi_konten'=>'<strong>Cianjur</strong> -Banjir kembali melanda sejumlah kecamatan di Kabupaten Cianjur, dengan yang terparah terjadi di Kecamatan Sukanagara. Akibatnya ratusan rumah terendam dan jembatan desa putus.
            Camat Sukanagara Robby Erlangga mengatakan banjir yang disebabkan luapan anak Sungai Sukanagara merendam pemukiman di lima desa.
            "Kejadiannya tadi sore sekitar pukul 17.00 WIB. Penyebabnya hujan deras selama beberapa jam, sehingga aliran anak sungai Sukanagara meluap," kata dia, Minggu (26/3/2023). Menurutnya dari laporan yang diterima, lebih dari 100 rumah yang terendam banjir di lema desa yang terdampak.
            "Meskipun banjirnya tidak separah yang terjadi pada akhir tahun lalu, tetapi cukup berdampak. Total ada lima desa yang dilanda banjir, terparah di Desa Sukalaksana," kata dia.
            "Tetapi tidak ada warga yang jadi korban. Banjir juga terpantau berangsur surut pada pukul 19.30 Wib," tambahnya.
            Sementara itu Sekretaris BPBD Kabupaten Cianjur Rudi Labis, mengatakan selain Kecamatan Sukanagara banjir juga terjadi di tiga kecamatan lainnya, yakni Kecamatan Cibinong, Kecamatan Pacet, dan Kecamatan Sukaresmi.
            Di Kecamatan Sukaresmi, tepatnya di Desa Cikanyere banjir menyebabkan jembatan desa putus hingga tak bisa lagi dilalui kendaraan.
            "Total ada empat kecamatan yang dilanda banjir. Untuk Sukanagara, Cibinong, dan Pacet menyebabkan pemukiman terendam. Sedangkan di Kecamatan Sukaresmi, banjir menyebabkan jembatan desa terputus," tuturnya Rudi menambahkan petugas dan relawan masih bersiaga di titik-titik terdampak banjir bandang. "Petugas masih data kerusakan dan kebutuhan warga terdampak. Kita koordinasi dengan dinas terkait agar fasilitas yang rusak segera diperbaiki," pungkasnya.
            '
        ]);
    }
    }
}
