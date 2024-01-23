<!-- Main Sidebar Container -->@extends('layouts.admin')
@include('layouts.partials.headeradmin')
@section('body')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Profile</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Profile</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <x-card-profile></x-card-profile>
                    <!-- /.col -->

                    <div class="col">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="#update"
                                            data-toggle="tab">Profil</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Reset
                                            Password</a></li>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">

                                    <div class="active tab-pane" id="update">
                                        <!-- The timeline -->

                                        <form method="POST" action="{{ route('profile') }}" enctype="multipart/form-data"
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
                                                            name="name" placeholder="Username" class="form-control here"
                                                            type="text">
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
                                                            name="phone" placeholder="No Telpon" class="form-control here"
                                                            type="text">
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
                                                    <label for="website" class="col-4 col-form-label">Pekerjaan</label>
                                                    <div class="col-8">
                                                        <input value="{{ auth()->user()->job }}" id="job"
                                                            name="job" placeholder="Pekerjaan" class="form-control here"
                                                            type="text">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="publicinfo" class="col-4 col-form-label">Alamat</label>
                                                    <div class="col-8">
                                                        <textarea id="address" name="address" cols="40" rows="4" class="form-control">{{ auth()->user()->address }}</textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="publicinfo" class="col-4 col-form-label">Tentang</label>
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


                                    </div>
                                    <!-- /.tab-pane -->

                                    <div class="tab-pane fade" id="settings">
                                        <form action="{{ route('ganti-password') }}" method="POST">
                                            @csrf
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

                                        </form>
                                    </div>


                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
