@extends('layouts.admin')
@section('body')
@include('layouts.partials.headeradmin')
{{-- @include('layouts.partials.headeradmin')
@include('layouts.partials.sidebaradmin') --}}
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
              <li class="breadcrumb-item active">Kategori</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12"> {{-- kenapa tidak col-lg-12 --}}

              <x-card>
                <x-slot name="header">
                  <a href = "{{ route('kategori.create') }}"class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah</a>
                </x-slot>

                {{-- COMPONENT  --}}
                <form action="" class="d-flex justify-content-between">
                  <x-dropdown-table />
                  <x-filter-table />
                </form>

                  <x-table>
                      <x-slot name="thead">
                          <th width="5%">No</th>
                          <th>Nama</th>
                          <th width="25%">Jumlah Projek</th>
                          <th width="15%"><i class="fas fa-cog"></i></th>
                      </x-slot>

                      @foreach ($kategori as $key => $item)
                              <tr>
                                {{-- COMPONENT / PAGINATION --}}
                                  <td> <x-number-table :key="$key" :model="$kategori" /> </td>
                                  <td>{{ $item->nama }}</td>
                                  <td>{{ $item->galangdanas->count() }}</td>
                                  <td>
                                    <form action="{{ route('kategori.destroy',['id'=>$item->id]) }}" method="post">
                                      @csrf
                                      @method('delete')

                                      <a href="{{ route('kategori.edit', ['id'=>$item->id]) }}" class="btn btn-link text-info"><i class="fas fa-edit"></i></a>
                                      <button  class="btn btn-link text-danger" onclick="return confirm('Yakin ingin menghapus data?')"><i class="fas fa-trash"></i></button>
                                    </form>
                                  </td>
                              </tr>
                      @endforeach
                  </x-table>

                  <x-pagination-table :model="$kategori" />
              </x-card>

            </div>
          </div>
        </div>


    </section>
<!-- End Main content -->
</div>

   <x-toast />
   @endsection

