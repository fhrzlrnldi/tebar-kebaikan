@extends('layouts.admin')
@section('body')
    {{-- @include('layouts.partials.headeradmin') --}}
    {{-- @include('layouts.partials.sidebaradmin') --}}
    {{-- <button class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah</button> --}}

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Detail Galang Dana</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url()->previous() }}">Galang Dana</a></li>
                            <li class="breadcrumb-item active">Detail Galang Dana</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8">
                        <x-card>
                            <x-slot name="header">
                                <div class="row d-flex justify-content-between">
                                    <h4>{{ $galangDana->judul }}</h4>
                                    <div style="font-size: 16px;font-weight: 600" class="btn btn-light">
                                        {{ $galangDana->kategori->nama }}</div>
                                </div>
                                <p>{{ $galangDana->created_at }}</p>
                            </x-slot>
                            <x-slot name='slot'>
                                <label for="">Target</label>
                                <p>
                                    {!! $galangDana->goal !!}
                                </p>
                                <label for="">Latar Belakang</label>
                                <p>
                                    {!! $galangDana->short_description !!}
                                </p>
                                <label for="">Tujuan</label>
                                <p>
                                    {!! $galangDana->body !!}
                                </p>
                                <label for="">Penerima</label>
                                <p>
                                    {!! $galangDana->penerima !!}
                                </p>

                            </x-slot>

                        </x-card>
                        <x-card>
                            <x-slot name="slot">
                                <img width="100%" style="object-fit: fill" height="100%"
                                    src="{{ asset("assets/galangdana/$galangDana->path_image") }}" alt="">
                            </x-slot>
                        </x-card>
                    </div>
                    <div class="col-lg-4">
                        <x-card>
                            <x-slot name="header">
                                <h4>Penggalang Dana</h4>
                            </x-slot>
                            <x-slot name="slot">
                                <p>Nama</p>
                                <input type="text" class="mb-3 form-control" value="{{ $galangDana->user->name }}"
                                    disabled>
                                <p>Tanggal Lahir</p>
                                <input type="text" class="mb-3 form-control" value="{{ $galangDana->user->gender }}"
                                    disabled>
                                <p>Alamat </p>
                                <textarea name="" style="width: 100%" id="" disabled rows="3" class="form-control mb-3">{{ $galangDana->user->address }}</textarea>
                                <p>Nomor Handphone</p>
                                <input type="text" class="mb-3 form-control" value="{{ $galangDana->user->phone }}"
                                    disabled>
                                <p>Jenis Kelamin</p>
                                <input type="text" class="mb-3 form-control" value="{{ $galangDana->user->gender }}"
                                    disabled>
                                <p>Pekerjaan</p>
                                <input type="text" class="mb-3 form-control" value="{{ $galangDana->user->job }}"
                                    disabled>
                                @php
                                    $galangDana->user->path_image == null ? ($src = 'https://cdn.onlinewebfonts.com/svg/img_218090.png') : ($src = asset('assets/fotoprofil'));
                                @endphp
                                <p>Foto</p>
                                <img width="100" height="100" style="object-fit: contain" src="{{ $src }}"
                                    alt="">
                            </x-slot>
                        </x-card>
                    </div>
                </div>

            </div>

        </section>
        <!-- End Main content -->
    </div>
    <x-toast />



    @push('scripts')
        <script></script>
    @endpush
@endsection
