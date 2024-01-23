<!DOCTYPE html>
@extends('layouts.user')
@include('layouts.partials.headeruser')

<!-- ======= Hero Section ======= -->
<section id="hero" class="hero">
    <div class="container position-relative">
        <div class="row gy-5" data-aos="fade-in">
            <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center text-center text-lg-start">
                <h2>OPEN DONASI SEKARANG JUGA!!<span></span></h2>
                <p>Ayo bantu saudara kita sekarang juga, berapapun nominalnya bersama kita Tebar Kebaikan.</p>
                {{-- <div class="d-flex justify-content-center justify-content-lg-start">
            <a href="#about" class="btn-get-started">Selanjutnya</a>
         </div> --}}
            </div>
            <div class="col-lg-6 order-1 order-lg-2">
                <img src="assets/img/logo.png" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="100">
            </div>
        </div>
    </div>

    <div class="icon-boxes position-relative">
        <div class="container position-relative">
            <div class="row gy-4 mt-5 d-flex justify-content-center">

                <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="icon-box">
                        <div class="icon"><i class="bi bi-easel"></i></div>
                        <p>Ingin tahu apa saja kategori donasi?</P>
                        <h4 class="title"><a href="/donasi" class="stretched-link">Kategori Donasi</a></h4>
                    </div>
                </div>
                <!--End Icon Box -->


                <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="icon-box">
                        <div class="icon"><i class="bi bi-geo-alt"></i></div>
                        <p>Ingin Menggalang Dana?</P>
                        <h4 class="title"><a href="/formcampaign" class="stretched-link">Galang Dana</a></h4>
                    </div>
                </div>
                <!--End Icon Box -->

                <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="500">
                    <div class="icon-box">
                        <div class="icon"><i class="bi bi-command"></i></div>
                        <p>Ingin Donasi?</P>
                        <h4 class="title"><a href="/donasi" class="stretched-link">Donasi</a></h4>
                    </div>
                </div>
                <!-- End Icon Box -->

            </div>
        </div>
    </div>

    </div>
</section>
<!-- End Hero Section -->

<main id="main">

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>Tentang Kami</h2>
            </div>

            <div class="row gy-4">
                <div class="col-lg-6">
                    <h3>Tebar Kebaikan</h3>
                    <img src="assets/img/donasi.png" class="img-fluid rounded-4 mb-4" alt="">
                    <p>Sebuah aplikasi donasi berbasis website yang dapat membuka kegiatan penggalangan dana, sekaligus
                        menyalurkan dana donasi yang telah berhasil dikumpulkan. Dengan menggunakan media aplikasi
                        donasi berbasis website ini, penggalang dana dan donatur bisa lebih leluasa dalam kegiatan
                        berdonasi dana,
                        dan mengajak masyarakat untuk ikut memberikan dana untuk orang-orang yang membutuhkan..</p>
                    <p>“TebarKebaikan” menyediakan pengalangan dana yang berfokus hanya pada dua kategori saja, yaitu
                        kategori pendidikan dan bencana. Dari kedua kategori galang dana tersebut.</p>
                </div>
                <div class="col-lg-6">
                    <div class="content ps-0 ps-lg-5">
                        <p class="fst-italic">
                            “TebarKebaikan” akan berusaha untuk menyediakan kegiatan penggalangan dana donasi yang
                        </p>
                        <ul>
                            <li><i class="bi bi-check-circle-fill"></i> Mudah.</li>
                            <li><i class="bi bi-check-circle-fill"></i> Aman.</li>
                            <li><i class="bi bi-check-circle-fill"></i> Terpercaya.</li>
                            <li><i class="bi bi-check-circle-fill"></i> Cepat.</li>
                        </ul>
                        <p>
                            “TebarKebaikan” akan berusaha semaksimal mungkin
                        </p>
                        <div class="position-relative mt-4">
                            <img src="assets/img/hoo.png" class="img-fluid rounded-4" alt="">
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section><!-- End About Us Section -->

    <!-- ======= Our Services Section ======= -->
    <section id="services" class="services sections-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>Doa Doa #Orang Baik</h2>
            </div>

            <div class="splide">
                <div class="splide__track">
                    <ul class="splide__list">
                        @foreach ($dukungan as $item)
                            <li class="splide__slide">
                                <div class="donation-card">
                                    <div class="donation-card__image">
                                        @php
                                            $item->path_image == null ? ($src = 'https://cdn.onlinewebfonts.com/svg/img_218090.png') : ($src = "/assets/fotoprofil/$item->path_image");
                                        @endphp
                                        <img src="{{ $src }}" alt="Donation Image">
                                    </div>
                                    <div class="donation-card__info" style="">
                                        @php
                                            $nama;
                                            $item->anonim == true ? ($nama = 'Anonim') : ($nama = $item->name);
                                        @endphp
                                        <h3 class="donation-card__title">{{ $nama }}</h3>
                                        <hr>
                                        <p class="donation-card__description"
                                            style="height:130px;max-height:130px;overflow: hidden; text-overflow: ellipsis;white-space:normal">
                                            {{ $item->dukungan }}</p>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>


        </div>
    </section><!-- End Our Services Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>Donasi Segera</h2>
                <div style="float:right;"><a href="/donasi" type="submit" class="btn btn-success">Lihat Lainnya <i
                            class="bi bi-arrow-right"></i></a></div>
            </div>

            <div class="slides-3 swiper" data-aos="fade-up" data-aos-delay="100">
                <div class="swiper-wrapper">
                    @foreach ($galangdana as $item)
                        <div class="swiper-slide">
                            <div class="testimonial-wrap">
                                <x-card-galang-dana :kategoris="$item->nama" :slug="$item->slug" :path_image="$item->path_image" :judul="$item->judul"
                                    :goal="$item->goal" :nominal="$item->nominal" :end_date="$item->end_date">
                                </x-card-galang-dana>
                            </div>
                        </div>
                    @endforeach

                </div>
                <br>
                <div class="swiper-pagination"></div>
            </div>

        </div>
    </section><!-- End Testimonials Section -->


    <!-- ======= Recent Blog Posts Section ======= -->
    <section id="artikel" class="recent-posts sections-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>Artikel</h2>
            </div>

            <div class="row gy-4">
                @foreach ($artikel as $item)
                <x-card-artikel :id="$item->id" :judul="$item->judul" :cover="$item->cover" :author="$item->penulis" :time="date('M d, Y',strtotime($item->created_at))"></x-card-artikel>
             @endforeach
            </div><!-- End recent posts list -->
            <div class="mt-5 d-flex justify-content-center">
                {{ $artikel->links() }}
            </div>

        </div>
    </section><!-- End Recent Blog Posts Section -->

</main><!-- End #main -->
