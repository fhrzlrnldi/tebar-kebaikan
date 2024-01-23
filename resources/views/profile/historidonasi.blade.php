@extends('layouts.user')
@include('layouts.partials.headeruser')

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="page-header d-flex align-items-center" style="background-image: url('');">
            <div class="container position-relative">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h2>Histori Donasi</h2>
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
                                                <a class="nav-link "  href="{{ route('profile') }}"
                                                    style="color:#008374">Edit Profile</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link"  href="{{ route('profile') }}"
                                                    style="color:#008374">Setting Password</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link active" 
                                                    style="color:#008374">History Donasi</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link"  href="{{ route('favorit-donasi') }}"
                                                    style="color:#008374">Favorit Donasi</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link"  href="{{ route('riwayat-program') }}"
                                                    style="color:#008374">Riwayat Program</a>
                                            </li>
                                        </ul>
                                        <br>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="" id="tab3">

                                          <div class="donation-history">
                                            <div class="donation-list">
                                                @foreach ($donasi as $item)
                                                    <div class="donation-item">
                                                        <div class="donation-item-header">
                                                            <div class="donation-item-title">
                                                                <h4>{{ $item->judul }}</h4>
                                                                <span
                                                                    class="donation-date">{{ date('d M Y T', strtotime($item->created_at)) }}</span>
                                                            </div>
                                                            <div>
                                                                <div>{{ $item->status }}</div>

                                                            </div>
                                                        </div>
                                                        <div class="donation-item-body">
                                                            <p class="donation-amount">Jumlah donasi: Rp
                                                                {{ number_format($item->nominal, 0, ',', '.') }}
                                                            </p>
                                                            <p class="donation-method">Metode pembayaran:
                                                                Transfer Bank {{ $item->jenis_pembayaran }}
                                                            </p>
                                                            <p class="donation-method">No Virtual Account:
                                                                {{ $item->no_va }}</p>
                                                            @php
                                                                // Mendapatkan nilai created_at dari variabel
                                                                $createdDate = $item->created_at;
                                                                
                                                                // Mengubah created_at menjadi timestamp
                                                                $timestamp = strtotime($createdDate);
                                                                
                                                                // Menambahkan 1 hari (86400 detik)
                                                                $newTimestamp = $timestamp + 86400;
                                                                
                                                                // Mengubah kembali menjadi format tanggal
                                                                $newDate = date('Y-m-d H:i:s', $newTimestamp);
                                                            @endphp
                                                            <p> Bayar Sebelum : {{ $newDate }}</p>
                                                        </div>
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
