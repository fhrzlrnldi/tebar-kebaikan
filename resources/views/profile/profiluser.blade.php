@extends('layouts.user')
@include('layouts.partials.headeruser')

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="page-header d-flex align-items-center" style="background-image: url('');">
            <div class="container position-relative">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h2>User Profile</h2>
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
                                                <a class="nav-link active" data-bs-toggle="tab" href="#tab1"
                                                    style="color:#008374">Edit Profile</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-bs-toggle="tab" href="#tab2"
                                                    style="color:#008374">Setting Password</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('histori-donasi') }}"
                                                    style="color:#008374">History Donasi</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('favorit-donasi') }}"
                                                    style="color:#008374">Favorit Donasi</a>
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
                                        <form method="POST" action="" enctype="multipart/form-data"
                                            class="tab-content">
                                            @csrf
                                            <div class="tab-pane fade show active" id="tab1">

                                                {{-- <div class="text-center">
                                                        <img src="" alt=""
                                                            class="img-thumbnail preview-path_image" width="200">
                                                    </div> --}}
                                                <div class="form-group mt-3">
                                                    <div class="custom-file">
                                                        <input type="file" class="form-control" id="path_image"
                                                            name="path_image">

                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="username" class="col-4 col-form-label">Nama</label>
                                                    <div class="col-8">
                                                        <input value="{{ auth()->user()->name }}" id="username"
                                                            name="name" placeholder="Username"
                                                            class="form-control here" type="text">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="name" class="col-4 col-form-label">Email</label>
                                                    <div class="col-8">
                                                        <input value="{{ auth()->user()->email }}" id="name"
                                                            name="email" placeholder="First Name" disabled
                                                            class="form-control here" type="text">
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label for="text" class="col-4 col-form-label">No
                                                        Telp</label>
                                                    <div class="col-8">
                                                        <input value="{{ auth()->user()->phone }}" id="text"
                                                            name="phone" placeholder="No Telpon"
                                                            class="form-control here" type="number">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="select" class="col-4 col-form-label">Jenis
                                                        Kelamin</label>
                                                    <div class="col-8">
                                                        <select id="select" name="gender" class="custom-select">
                                                            @if (auth()->user()->gender == null)
                                                                <option selected disabled>Jenis Kelamin</option>
                                                            @endif
                                                            <option value="laki-laki"
                                                                {{ auth()->user()->gender == 'Laki-Laki' ? 'selected' : '' }}>
                                                                Laki-Laki</option>
                                                            <option value="perempuan"
                                                                {{ auth()->user()->gender == 'Perempuan' ? 'selected' : '' }}>
                                                                Perempuan</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="email" class="col-4 col-form-label">Tanggal
                                                        Lahir</label>
                                                    <div class="col-8">
                                                        <input value="{{ auth()->user()->birth_date }}" id="tgllahir"
                                                            name="birth_date" placeholder="Tanggal Lahir"
                                                            class="form-control here" type="date">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="website"
                                                        class="col-4 col-form-label">Pekerjaan</label>
                                                    <div class="col-8">
                                                        <input value="{{ auth()->user()->job }}" id="job"
                                                            name="job" placeholder="Pekerjaan"
                                                            class="form-control here" type="text">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="publicinfo"
                                                        class="col-4 col-form-label">Alamat</label>
                                                    <div class="col-8">
                                                        <textarea id="address" name="address" cols="40" rows="4" class="form-control">{{ auth()->user()->address }}</textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="publicinfo"
                                                        class="col-4 col-form-label">Tentang</label>
                                                    <div class="col-8">
                                                        <textarea id="about" name="about" cols="40" rows="4" class="form-control">{{ auth()->user()->about }}</textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="offset-4 col-8">
                                                        <button type="reset" class="btn btn-dark">Reset</button>
                                                        <button class="btn btn-success">Simpan</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </form>
                                        <form action="{{ route('ganti-password') }}" method="POST">
                                            @csrf
                                            <div class="tab-pane fade" id="tab2">

                                                <div class="form-group row">
                                                    <label for="newpass" class="col-4 col-form-label">Password
                                                        Aktif </label>
                                                    <div class="col-8">
                                                        <input type="password" class="form-control here"
                                                            name="current_password" id="current_password">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="newpass" class="col-4 col-form-label">Password
                                                        Baru</label>
                                                    <div class="col-8">
                                                        <input type="password" class="form-control" name="password"
                                                            id="password">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="newpass" class="col-4 col-form-label">Konfirmasi
                                                        Password</label>
                                                    <div class="col-8">
                                                        <input type="password" class="form-control"
                                                            name="password_confirmation" id="password_confirmation">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="offset-4 col-8">
                                                        <button type="reset" class="btn btn-dark">Reset</button>
                                                        <button class="btn btn-success">Simpan</button>
                                                    </div>
                                                </div>

                                            </div>


                                        </form>
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
    @if (session()->has('payment'))
        <script>
            $(document).ready(function() {
                $('a[href="#tab3"]').tab('show');
            });
        </script>
    @endif


</main><!-- End #main -->
@push('script')
    <script>
        $(document).ready(function() {
            // $('a[href="#tab3"]').tab('show');

        });
    </script>
@endpush
