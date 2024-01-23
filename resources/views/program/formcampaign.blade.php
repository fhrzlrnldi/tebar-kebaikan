@extends('layouts.user')
@include('layouts.partials.headeruser')

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="page-header d-flex align-items-center" style="background-image: url('');">
            <div class="container position-relative">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h2>Galang Dana</h2>
                        <p>Silahkan Mengisi Data Terlebih Dahulu Untuk Membuka Galang Dana Tersbut</p>
                    </div>
                </div>
            </div>
        </div>
        <nav>
            <div class="container">
                <ol>
                    <li><a href="/pengguna">Home</a></li>
                    <li>galang dana</li>
                </ol>
            </div>
        </nav>
    </div><!-- End Breadcrumbs -->

    <section class="sample-page">
        <div class="container" data-aos="fade-up">

            <div class="form-container">
                <form method="POST" enctype="multipart/form-data" action="{{ route('buat-galang-dana-user') }}">
                    @csrf
                    {{-- <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" id="username" name="username" required>
                          </div>
                    </div>
                </div> --}}

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="title">Judul</label>
                                <input type="text" name="judul" class="form-control">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="select">Kategori</label>
                                <div class="col">
                                    <select name="kategori_id" class="form-select form-select"
                                        aria-label=".form-select-lg example">
                                        @foreach ($kategori as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="short-description">Latar Belakang:</label>
                        <textarea id="short-description" name="short_description" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="content">Tujuan:</label>
                        <textarea id="content" name="body" required></textarea>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="publish-date">Tanggal Publish:</label>
                                <input type="date" id="publish_date" name="publish_date" required>
                            </div>
                        </div>
                        {{-- <div class="col">
                    <div class="form-group">
                        <label for="select">Status</label>
                        <div class="col">
                            <select class="form-select form-select" aria-label=".form-select-lg example">
                                <option selected disabled>Pilih salah satu</option>
                            <option value="">Publish</option>
                            <option value="">Diarsipkan</option>
                            </select>
                        </div>
                      </div>
                </div> --}}
                        <div class="col">
                            <!-- Date and time -->
                            <div class="form-group">
                                <label for="end_date">Tanggal Selasi:</label>
                                <input type="date" id="end_date" name="end_date" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="goal">Goal</label>
                                <input type="number" name="goal" id="goal" class="form-control">
                            </div>
                        </div>
                    </div>
                    {{-- <div class="form-group">
                        <label for="invitation">Ajakan Singkat:</label>
                        <textarea id="invitation" name="invitation" required></textarea>
                    </div> --}}

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="select">Penerima:</label>
                                <div class="col">
                                    <select name="penerima" class="form-select form-select"
                                        aria-label=".form-select-lg example">
                                        <option selected disabled>Pilih salah satu</option>
                                        <option value="Saya Sendiri">Saya Sendiri</option>
                                        <option value="Keluarga / Kerabat">Keluarga / Kerabat</option>
                                        <option value="Organisasi / Lembaga">Organisasi / Lembaga</option>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <!-- Date and time -->
                            <div class="form-group">
                                <label for="image">Gambar:</label>
                                <input type="file" id="image" name="path_image" required>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <div class="offset-5 col-8 ">
                            <button type="reset" class="btn btn-secondary">Reset</button>
                            <button class="btn btn-success">Simpan</button>
                        </div>
                    </div>
                    {{-- <button type="submit-ya" style="float: right" class ="btn btn-success">Submit</button> --}}
                </form>

            </div>
    </section>

</main><!-- End #main -->

