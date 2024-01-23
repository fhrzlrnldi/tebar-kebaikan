@extends('layouts.admin')
@section('body')
@include('layouts.partials.headeradmin')
{{-- @include('layouts.partials.sidebaradmin') --}}
{{-- <button class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah</button> --}}

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Daftar Galang Dana</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Daftar Galang Dana</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">

              <x-card>
              
                  <x-table>
                      <x-slot name="thead">
                          <th width="5%">No</th>
                          <th>Nama Penggalang Dana</th>
                          <th>Nama Program</th>
                          <th>Detail</th>
                          <th>Aksi</th>
                      </x-slot>

                      
                  </x-table>

                  
              </x-card>

            </div>
          </div>
        </div>
        
    </section>
<!-- End Main content -->
</div>
  <x-toast />
  @includeIf('includes.datatable')

              
@push('scripts')
       <script>
      var table = $(`.table`).DataTable({
            processing: true,
            autoWidth: false,
            pageLength: 5,
                aLengthMenu: [
                    [5,10, 20, 30, -1],
                    [5,10, 20, 30, "All"]
                ],
            ajax: {
              url: '{{ route('daftar-galang-dana') }}'
            },
            columns: [
                {data: 'DT_RowIndex', searchable: false, sortable: false},
                {data: 'name'},
                {data: 'judul'},
                {data: 'detail'},
                {data: 'aksi'},
               
            ]
       });
       function aksi(id,aksi) {
        confirm('apakah anda yakin? tindakan tidak dapat diurungkan')?
        $.ajax({
          type: "post",
          url: "{{ route('daftar-galang-dana') }}",
          data: {
            'id':id,
            'status':aksi
          },
          success: function (response) {
            $('.table').DataTable().ajax.reload();
          }
        }):'';
       }
       </script>
@endpush

@endsection