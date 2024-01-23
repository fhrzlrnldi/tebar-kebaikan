@extends('layouts.admin')
@section('body')
    


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $total_donasi }}</h3>

                            <p>Donasi Terkumpul</p>
                        </div>
                        <div class="icon">
                          <i class="fas fa-money-bill"></i>

                        </div>
                        
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $jumlah_galdan }}</h3>

                            <p>Galang Dana</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $jumlah_user }}</h3>

                            <p>Users</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person"></i>
                        </div>
                        
                    </div>
                </div>
                
            </div>
            <!-- /.row -->

            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        {{-- <i class="fas fa-chart-pie mr-1"></i> --}}
                      5 Donatur Ter-sering
                    </h3>
                    <div class="card-tools">
                        <ul class="nav nav-pills ml-auto">
                         
                        </ul>
                    </div>
                </div><!-- /.card-header -->
                <div class="card-body">
                  <x-table>
                    <x-slot name="thead">
                      <tr>
                        <td>No</td>
                        <td>Nama</td>
                        <td>Email</td>
                        <td>Jumlah Donasi</td>
                        <td>Frekuensi Donasi</td>
                      </tr>
                    </x-slot>
                    <x-slot name="slot">
                        @php
                        $no=1;
                    @endphp
                      @foreach ($sipaling_rajin as $item)
                      <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->nominal }}</td>
                        <td>{{ $item->total_donasi }}</td>
                      </tr>
                      @endforeach
                    </x-slot>
                  </x-table>
                </div><!-- /.card-body -->
            </div>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        {{-- <i class="fas fa-chart-pie mr-1"></i> --}}
                      5 Donatur Ter-banyak 
                    </h3>
                    <div class="card-tools">
                        <ul class="nav nav-pills ml-auto">
                         
                        </ul>
                    </div>
                </div><!-- /.card-header -->
                <div class="card-body">
                  <x-table>
                    <x-slot name="thead">
                      <tr>
                        <td>No</td>
                        <td>Nama</td>
                        <td>Email</td>
                        <td>Jumlah Donasi</td>
                      </tr>
                    </x-slot>
                    <x-slot name="slot">
                        @php
                        $no=1;
                    @endphp
                      @foreach ($sipaling_kaya as $item)
                      <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->nominal }}</td>
                      </tr>
                      @endforeach
                    </x-slot>
                  </x-table>
                </div><!-- /.card-body -->
            </div>
            <!-- /.card -->

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
@endsection

@push('scripts')
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('assets/admin/dist/js/demo.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('assets/admin/dist/js/pages/dashboard.js') }}"></script>
@endpush
