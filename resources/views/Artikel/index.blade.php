@extends('layouts.admin')
@include('layouts.partials.headeradmin')
@section('body')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid p-2">
                <h1 class="mb-5">Artikel</h1>
                <x-card>
                    <x-slot name="header" >
                            <a href="{{ route('artikel.create') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah</a>
                    </x-slot>
                    <x-slot name="slot">
                        <x-table>

                            <x-slot name="thead">
                                <tr>
                                    <td class="ps-3">No</td>
                                    <td>Judul</td>
                                    <td>Penulis</td>
                                    <td>Tanggal Upload</td>
                                    <td class="d-flex justify-content-center " style="height: 50px">Aksi</td>
                                </tr>
                            </x-slot>

                        </x-table>
                    </x-slot>
                </x-card>
            </div>
        </div>
    </div>
@endsection
@include('includes.datatable')

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.table').DataTable({
                // dom: 'flrtip',
                pageLength: 5,
                aLengthMenu: [
                    [5,10, 20, 30, -1],
                    [5,10, 20, 30, "All"]
                ],
                "processing": true,
                "serverSide": true,
                "ajax": {
                    url: "/artikel",
                    type: "get",
                },
                "columns": [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'judul',
                        name: 'judul'
                    },
                    {
                        data: 'penulis',
                        name: 'penulis'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        data: 'edithapus',
                        name: 'edithapus',
                        orderable: false,
                        searchable: true
                    },
                ],

            });
        });

        function hapusartikel(params) {
            if (!confirm('Apakah anda yakin?')) {
                return;
            }
            $.ajax({
                type: "delete",
                url: "/artikel/" + params,
                success: function(response) {
                    alert(response);
                    $(".table").DataTable().ajax.reload();
                },
                error: function(xhr) {
                    console.log(xhr)
                    alert(xhr.statusText);
                }
            });
        }
    </script>
@endpush
