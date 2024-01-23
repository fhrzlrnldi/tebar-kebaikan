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
                        <h2>Detail Donasi</h2>
                    </div>
                </div>
            </div>
        </div>
        <nav>
            <div class="container">
                <ol>
                    <li><a href="/home">Home</a></li>
                    <li><a href="/donasi">Donasi</a></li>
                    <li>DetailDonasi</li>
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
                            <img src="/assets/galangdana/{{ $detaildonasi->path_image }}" alt=""
                                class="img-fluid">
                        </div>
                        <div class="meta-top">
                            <ul>
                                <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                        href="#">{{ $detaildonasi->user->name }}</a></li>
                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                        href="#"><time
                                            datetime="">{{ date('d/m/Y', strtotime($detaildonasi->publish_date)) }}</time></a>
                                </li>
                            </ul>
                        </div><!-- End meta top -->
                        <h2 class="title">{{ $detaildonasi->judul }}</h2>
                        <br>
                        <div class="tulisan">
                            <div class="kiri">
                                <h3>Rp. {{ number_format($detaildonasi->goal, 0, ',', '.') }}</h3>
                                <h5>
                                    <p>Terkumpulnya
                                        : <strong>{{ number_format($detaildonasi->nominal, 0, ',', '.') }}</strong>
                                </h5>
                                </p>
                            </div>
                            <div class="kanan">
                                <h5>
                                    @php
                                        $date1 = new DateTime($detaildonasi->end_date);
                                        $date2 = new DateTime(date('Y-m-d'));
                                        $diff = $date1->diff($date2);
                                    @endphp
                                    {{ $diff->format('%a') > 0 ? $diff->format('%a') : '-' }} hari lagi
                                </h5>
                            </div>
                        </div>


                        <div class="progress" role="progressbar" aria-label="Success example" aria-valuenow="25"
                            aria-valuemin="0" aria-valuemax="100">
                            @php
                                if ($detaildonasi->nominal == 0) {
                                    # code...
                                    $persentase = 0;
                                } else {
                                    $persentase = ($detaildonasi->nominal / $detaildonasi->goal) * 100;
                                }
                            @endphp
                            <div class="progress-bar bg-success" style="width: {{ $persentase }}%"></div>
                        </div>


                        <div class="content">
                            <strong for="">Latar Belakang</strong>
                            <p>
                                {!! $detaildonasi->short_description !!}
                            </p>
                            <strong for="">Tujuan</strong>
                            <p>
                                {!! $detaildonasi->body !!}
                            </p>
                            <strong for="">Penerima</strong>
                            <p>
                                {!! $detaildonasi->penerima !!}
                            </p>

                        </div>


                        <div class="d-flex justify-content-between">
                            <button type="button" id="addFavorite" data-program-id="{{ $id }}"
                                class="bi bi-heart-fill btn btn-danger"> </button>
                            @if ($detaildonasi->status == 'publish')
                                <a href="{{ route('invoice', ['slug' => $detaildonasi->slug]) }}" type="submit"
                                    class="btn btn-success">Donasi Sekarang</a>
                            @endif
                        </div>
                </div>
            </div>
            <br>
            <h2>Doa Doa #Orang Baik</h2>
            @if (!$detaildonasi->donasis->isEmpty() && $detaildonasi->donasis[0]->status == 'confirmed')
                <div class="post-author d-flex align-items-center">
                    @php
                        if ($detaildonasi->donasis[0]->anonim == true) {
                            $src = 'https://cdn.onlinewebfonts.com/svg/img_218090.png';
                        } else {
                            $detaildonasi->donasis[0]->user->path_image == null ? ($src = 'https://cdn.onlinewebfonts.com/svg/img_218090.png') : ($src = '/assets/fotoprofil/' . $detaildonasi->donasis[0]->user->path_image);
                        }
                    @endphp
                    <img src="{{ $src }}" class="rounded-circle flex-shrink-0" alt="">
                    <div>
                        @php
                            $nama;
                            $detaildonasi->donasis[0]->anonim == true ? ($nama = 'Anonim') : ($nama = $detaildonasi->donasis[0]->user->name);
                        @endphp
                        <h4>{{ $nama }}</h4>
                        <i class="bi bi-quote quote-icon-left"></i>
                        {{ $detaildonasi->donasis[0]->dukungan }}
                        <i class="bi bi-quote quote-icon-right"></i>
                    </div>
                </div><!-- End post author -->
            @endif

            <br>


            <!-- ======= Testimonials Section ======= -->
            <section id="testimonials" class="testimonials">
                <div class="container" data-aos="fade-up">

                    <div style="float:right;"><a
                            href="{{ route('lihatorangdonasi', ['slug' => $detaildonasi->slug]) }}" type="submit"
                            class="btn btn-success">Lihat
                            Lainnya <i class="bi bi-arrow-right"></i></a></div>
                    <h2>Donasi</h2>

                    <div class="slides-3 swiper" data-aos="fade-up" data-aos-delay="100">
                        <div class="swiper-wrapper">
                            @foreach ($detaildonasi->donasis as $item)
                                @if ($item->status == 'confirmed')
                                    <div class="swiper-slide">
                                        <div class="testimonial-wrap">
                                            <div class="testimonial-item">
                                                <div class="d-flex align-items-center">
                                                    @php
                                                        if ($item->anonim == true) {
                                                            $src = 'https://cdn.onlinewebfonts.com/svg/img_218090.png';
                                                        } else {
                                                            $item->user->path_image == null ? ($src = 'https://cdn.onlinewebfonts.com/svg/img_218090.png') : ($src = '/assets/fotoprofil/' . $item->user->path_image);
                                                        }
                                                    @endphp
                                                    <img src="{{ $src }}"
                                                        class="testimonial-img flex-shrink-0" alt="">
                                                    <div>
                                                        @php
                                                            $nama;
                                                            $item->anonim == true ? ($nama = 'Anonim') : ($nama = $item->user->name);
                                                        @endphp
                                                        <h3>{{ $nama }}</h3>
                                                    </div>
                                                </div>
                                                <p>Berdonasi Sebesar:<strong>
                                                        {{ number_format($item->nominal, 0, ',', '.') }}</strong></p>
                                                <p><i class="bi bi-clock">
                                                        {{ date('Y-m-d', strtotime($item->created_at)) }}</i></p>
                                            </div>
                                        </div>
                                    </div><!-- End testimonial item -->
                                @endif
                            @endforeach
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>

                </div>
            </section><!-- End Testimonials Section -->

        </div>


    </section><!-- End Blog Details Section -->



</main><!-- End #main -->
@push('script')
    <script>
        $(document).ready(function() {
            $.ajax({
                type: "get",
                url: "{{ route('cek-favorit') }}",
                data: {
                    program_id: '{{ $id }}'
                },
                success: function(response) {
                    $('#addFavorite').html(response);
                }
            });
            $('#addFavorite').click(function() {
                var programId = $(this).data('program-id');
                var buttonId = $(this);

                $.ajax({
                    url: '/toggle-favorite',
                    method: 'POST',
                    data: {
                        program_id: programId
                    },
                    success: function(response) {
                        // Tangani respon dari server
                        if (response.message == 'Program ditambahkan ke favorit') {
                            // Program ditambahkan ke favorit, ubah teks tombol menjadi "Favourited"
                            $(buttonId).text(' Favourited');
                        } else if (response.message == 'Program dihapus dari favorit') {
                            // Program dihapus dari favorit, ubah teks tombol menjadi "Tambahkan ke Favorit"
                            $(buttonId).text(' Tambahkan ke Favorit');
                        }
                    },
                    error: function(xhr, status, error) {
                        // Tangani kesalahan saat melakukan permintaan
                        console.log('Terjadi kesalahan: ' + error);
                    }
                });
            });
        });
    </script>
@endpush
