@extends('layouts.user')
@include('layouts.partials.headeruser')

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="page-header d-flex align-items-center" style="background-image: url('');">
            <div class="container position-relative">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h2>Favorit Donasi</h2>
                    </div>
                </div>
            </div>
        </div>
        <nav>
            <div class="container">
                <ol>
                    <li><a href="/pengguna">Home</a></li>
                    <li>User Profile</li>
                </ol>
            </div>
        </nav>
    </div><!-- End Breadcrumbs -->

    <section class="sample-page">
        <div class="container" data-aos="fade-up">


            <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet"
                id="bootstrap-css">
            <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
            <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <!------ Include the above in your HEAD tag ---------->

            <div class="container">
                <div class="row">
                    <div class="col-md-3 ">

                    <x-card-profile></x-card-profile>

                    </div>


                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <ul class="nav nav-tabs">
                                            <li class="nav-item">
                                                <a class="nav-link " href="{{ route('profile') }}"
                                                    style="color:#008374">Edit Profile</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('profile') }}"
                                                    style="color:#008374">Setting Password</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('histori-donasi') }}"
                                                    style="color:#008374">History Donasi</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link active" style="color:#008374">Favorit Donasi</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('riwayat-program') }}"
                                                    style="color:#008374">Riwayat Program</a>
                                            </li>
                                        </ul>
                                        <br>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="" id="">
                                            <div class="favorite-donations">
                                                <div class="favorite-list">
                                                    @foreach ($favorit as $item)
                                                        <div class="favorite-item">
                                                            <img src="/assets/galangdana/{{ $item->path_image }}"
                                                                alt="Donasi untuk Panti Asuhan ABC"
                                                                class="favorite-img">
                                                            <div class="favorite-item-body">
                                                                <h4 class="favorite-title">{{ $item->judul }}
                                                                </h4>
                                                                <p class="favorite-description">
                                                                    {{ $item->short_description }}</p>
                                                                <hr>
                                                                <button type="button" data-id="{{ $item->id }}"
                                                                    class="bi bi-trash btn btn-danger hapus">
                                                                    Hapus</button>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>

                                        </div>


                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>



</main><!-- End #main -->
<form id="formFavorit" action="{{ route('hapus-favorit') }}" method="POST">
    @csrf
    <input type="hidden" value="" id="id_galang_dana" name="id_galang_dana">
</form>
@push('script')
    <script>
        $(document).ready(function() {
            $('.hapus').on('click', function() {
                console.log($(this).attr('data-id'))
                if (!confirm('Apakah anda yakin ?')) {
                    return;
                }
                $('#id_galang_dana').val($(this).attr('data-id'));
                $('#formFavorit').submit();
            });
        });
    </script>
@endpush
