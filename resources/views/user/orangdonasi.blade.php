@extends('layouts.user')
@include('layouts.partials.headeruser')

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="page-header d-flex align-items-center" style="background-image: url('');">
            <div class="container position-relative">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h2>DONASI</h2>
                    </div>
                </div>
            </div>
        </div>
        <nav>
            <div class="container">
                <ol>
                    <li><a href="{{ route('detaildonasi', ['slug' => $orangdonasi->slug]) }}">detaildonasi</a></li>
                    <li>daftardonasi</li>
                </ol>
            </div>
        </nav>
    </div><!-- End Breadcrumbs -->



    <section class="sample-page">
        <div class="container" data-aos="fade-up">
            {{-- 
            <div class="section-header">
                <h2>Donasi</h2>
            </div> --}}
            @foreach ($orangdonasi->donasis as $item)
            @if ($item->status=='confirmed')
                <div class="donation">
                    <div class="donation__donor">
                        @php
                            if ($item->anonim == true) {
                                $src = 'https://cdn.onlinewebfonts.com/svg/img_218090.png';
                            } else {
                                $item->user->path_image == null ? ($src = 'https://cdn.onlinewebfonts.com/svg/img_218090.png') : ($src = '/assets/fotoprofil/' . $item->user->path_image);
                            }
                        @endphp
                        <img src="{{ $src }}" alt="Profil Donatur">
                        <div class="donation__donor-info">
                            @php
                            $nama ;
                            $item->anonim==true?$nama='Anonim':$nama =$item->user->name;
                          @endphp

                            <h2 class="donation__name">{{ $nama }}</h2>
                            <div class="donation__details">
                                <span class="donation__label">Jumlah Donasi:</span>
                                <span class="donation__value">Rp.{{ number_format($item->nominal) }}</span>
                            </div>
                            <div class="donation__details">
                                <span class="donation__label">Waktu Donasi:</span>
                                <span class="donation__value">
                                    {{ date('d M Y, H:i', strtotime($item->created_at)) }} WIB
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            @endforeach

    </section>
</main><!-- End #main -->
