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
                        <h2>Artikel</h2>
                        <p>TebarKebaikan Menyediakan Artikel untuk dibaca.</p>
                    </div>
                </div>
            </div>
        </div>
        <nav>
            <div class="container">
                <ol>
                    <li><a href="/">Home</a></li>
                    <li>Artikel</li>
                </ol>
            </div>
        </nav>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">

            <div class="row gy-4 posts-list">
                @foreach ($artikel as $item)
                   <x-card-artikel :id="$item->id" :judul="$item->judul" :cover="$item->cover" :author="$item->penulis" :time="date('M d, Y',strtotime($item->created_at))"></x-card-artikel>
                @endforeach


            </div><!-- End blog posts list -->

            <div class="justify-content-center">

            </div>

        </div>
    </section><!-- End Blog Section -->

</main><!-- End #main -->
