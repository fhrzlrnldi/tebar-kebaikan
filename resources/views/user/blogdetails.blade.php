<!DOCTYPE html>

@extends('layouts.user')
@include('layouts.partials.headeruser')

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="page-header d-flex align-items-center" style="background-image: url('');">
            <div class="container position-relative">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h2>Detail Artikel</h2>
                    </div>
                </div>
            </div>
        </div>
        <nav>
            <div class="container">
                <ol>
                    <li><a href="/">Home</a></li>
                    <li><a href="{{ route('artikel.user') }}">Artikel</a></li>
                    <li>DetailArtikel</li>
                </ol>
            </div>
        </nav>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Blog Details Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">

            <div class="">

                <div class="col">

                    <article class="blog-details">

                        <div class="post-img">
                            <img src="/assets/artikel/{{ $artikel->cover }}" alt="" class="img-fluid">
                        </div>

                        <h2 class="title text-center">{{ $artikel->judul }}</h2>

                        <div class="meta-top">
                            <ul>
                                <li class="d-flex align-items-center"><i
                                        class="bi bi-person"></i>{{ $artikel->penulis }}</li>
                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i>
                                    {{ date('M d, Y', strtotime($artikel->created_at)) }}</li>
                            </ul>
                        </div><!-- End meta top -->

                        <div class="content">
                            <p>
                              {!! $artikel->isi_konten !!}
                            </p>
                        </div>


                        {{-- <button type="button" class="d-flex justify-content-center btn btn-success">Success</button> --}}
                </div>
            </div>

        </div>
    </section><!-- End Blog Details Section -->

</main><!-- End #main -->
