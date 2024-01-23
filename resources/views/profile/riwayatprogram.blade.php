@extends('layouts.user')
@include('layouts.partials.headeruser')

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="page-header d-flex align-items-center" style="background-image: url('');">
            <div class="container position-relative">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h2>Riwayat Program</h2>
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
                                                <a class="nav-link " href="{{ route('favorit-donasi') }}"
                                                    style="color:#008374">Favorit Donasi</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link active" style="color:#008374">Riwayat Program</a>
                                            </li>
                                        </ul>
                                        <br>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="tab-pane " id="tab5">

                                            <div class="program-history">
                                                @foreach ($galangdanas as $item)
                                                    <div class="program-item">
                                                        <img src="{{ asset("assets/galangdana/$item->path_image") }}" alt="Gambar Program 1">
                                                        <div class="program-info">
                                                            <h3 class="program-title">{{ $item->judul }}
                                                            </h3>
                                                            <hr>
                                                            @php
                                                                switch ($item->status) {
                                                                    case 'publish':
                                                                        $color = 'completed';
                                                                        break;
                                                                    
                                                                    case 'archived':
                                                                        $color = 'pending';
                                                                        break;
                                                                    
                                                                    default:
                                                                    $color = 'ongoing';
                                                                        break;
                                                                }
                                                            @endphp
                                                            <p class="program-status">
                                                                Status:
                                                                <span class="status-badge {{ $color }}">{{ $item->status }}</span>
                                                            </p>
                                                            @if ($item->status == 'publish')
                                                            <a href="{{ route('detaildonasi',['slug'=>$item->slug]) }}" class="view-button">Lihat Donasi</a>
                                                            @endif
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
    </section>



</main><!-- End #main -->
