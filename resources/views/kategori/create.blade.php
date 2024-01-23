@extends('layouts.admin')
{{-- @section('title', 'Kategori') --}}
@include('layouts.partials.headeradmin')
@include('layouts.partials.sidebaradmin')
{{-- <button class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah</button> --}}

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Kategori</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="admin.admin">Home</a></li>
              {{-- <li class="breadcrumb-item"><a href="{{ route('kategori.index') }}">Kategori</a></li> --}}
              <li class="breadcrumb-item"><a href ="/kategori/index">Kategori</a></li>
              <li class="breadcrumb-item active">Tambah</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <div class="row">
              <div class="col-12">
                <form action="{{ route('kategori.store') }}" method="post">
                  @csrf 
                  <x-card>                  
                      <div class="form-group">
                          <label for="name">Nama</label>
                          <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" required>
                          @error('nama')
                          <div id="validationServer03Feedback" class="invalid-feedback">
                            {{ $message }}
                          </div>
                          @enderror
                      </div>
                      <x-slot name="footer">
                        <button type="reset" class="btn btn-dark">Reset</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                      </x-slot>
                  </x-card>
                </form>
              </div>
          </div>
        </div>
        {{-- </div> --}}
    </section>
<!-- End Main content -->
</div>
<!-- /.container-fluid -->
