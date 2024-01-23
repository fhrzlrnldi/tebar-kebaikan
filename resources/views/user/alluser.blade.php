@extends('layouts.admin')
@include('layouts.partials.headeradmin')
@section('body')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <x-table>
                    <x-slot name="thead">
                        <tr>
                            <td>No</td>
                            <td>Email</td>
                            <td>Nama</td>
                            <td>Gender</td>
                            <td>Job</td>
                            <td>No hp</td>
                        </tr>
                    </x-slot>
                    <x-slot name="slot">
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($user as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->gender }}</td>
                                <td>{{ $item->job }}</td>
                                <td>{{ $item->phone }} </td>
                            </tr>
                        @endforeach
                    </x-slot>
                </x-table>
            </div>
        </div>
    </div>
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
            });
        });
    </script>
    @endpush
@endsection
