@extends('layouts.user')
@include('layouts.partials.headeruser')

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="page-header d-flex align-items-center" style="background-image: url('');">
            <div class="container position-relative">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h2>Donasi</h2>
                        <p>Donasi Kapanpun dan Dimanapun.</p>
                    </div>
                </div>
            </div>
        </div>
        <nav>
            <div class="container">
                <ol>
                    <li><a href="/pengguna">Home</a></li>
                    <li>Donasi</li>
                </ol>
            </div>
        </nav>
    </div><!-- End Breadcrumbs -->

    <section id="blog" class="blog" style="overflow: unset;">
        <div class="container" data-aos="fade-up">


            <div class="section-header">
                <h2>Kategori</h2>
            </div><!-- End section header-->

            <div class="s003">
                <form method="post" action="{{ route('cari-donasi') }}">
                    @csrf
                    <div class="inner-form">
                        <div class="input-field first-wrap">
                            <div class="input-select">
                                <select data-trigger="" id="carikategori" name="kategori" style="position: relative;">
                                    <option value="-1">Semua</option>
                                    @foreach ($kategori as $item)
                                        <option value="{{ $item->id }}"
                                            @if (isset($id_kategori)) {{ $item->id == $id_kategori ? 'selected' : '' }} @endif>
                                            {{ $item->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="input-field second-wrap">
                            <input id="search" type="text" name="judul"
                                value="@isset($judul){{ $judul }}@endisset"
                                placeholder="Enter Keywords?" />
                        </div>
                        <div class="input-field third-wrap">
                            <button class="btn-search" type="submit">
                                <svg class="svg-inline--fa fa-search fa-w-16" aria-hidden="true" data-prefix="fas"
                                    data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512">
                                    <path fill="currentColor"
                                        d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z">
                                    </path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            @if (isset($result))
                <div class="row gy-4 posts-list">
                    @foreach ($result as $item)
                        <div class="col-xl-4 col-md-6">
                            <x-card-galang-dana :slug="$item->slug" :kategoris="$item->nama" :path_image="$item->path_image" :judul="$item->judul"
                                :goal="$item->goal" :nominal="$item->nominal" :end_date="$item->end_date">
                            </x-card-galang-dana>
                        </div><!-- End post list item -->
                    @endforeach
                </div><!-- End blog posts list -->
            @endif
            @if (isset($galang_dana))
                <div class="row gy-4 posts-list">
                    @foreach ($galang_dana as $item)
                        <div class="col-xl-4 col-md-6">
                            <x-card-galang-dana :kategoris="$item->nama" :slug="$item->slug" :path_image="$item->path_image" :judul="$item->judul"
                                :goal="$item->goal" :nominal="$item->nominal" :end_date="$item->end_date">
                            </x-card-galang-dana>
                        </div><!-- End post list item -->
                    @endforeach
                </div><!-- End blog posts list -->
                <ul class="d-flex mt-5 justify-content-center">
                    {{ $galang_dana->links() }}
                </ul>
            @endif
        </div>
    </section><!-- End Blog Section -->


    </div><!-- End Container Portofolio-->
</main><!-- End #main -->
@push('script')
    <script>
    
    </script>
@endpush
