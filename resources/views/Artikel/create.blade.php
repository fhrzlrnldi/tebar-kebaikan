@extends('layouts.admin')
@section('body')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid p-2">
                <form action="{{ route('artikel.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <h1 class="mb-5">Tambah Artikel</h1>
                    <x-card>
                        <x-slot name="slot">

                            <div class="mb-3">
                                <div class="form-group">
                                    <label for="fileInput">Pilih File</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="fileInput" name="cover-artikel">
                                            <label class="custom-file-label" for="fileInput">Pilih file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="judul" class="form-label">Judul</label>
                                <input type="text" class="form-control" name="judul" id="judul"
                                    placeholder="Masukkan Judul">
                            </div>
                            <div class="mb-3">
                                <label for="penulis" class="form-label">Penulis</label>
                                <input type="text" class="form-control" name="penulis" id="penulis"
                                    placeholder="Masukkan Penulis">
                            </div>
                            <div class="mb-3">
                                <div class="form-group">
                                    <label for="body">Konten</label>
                                    <textarea name="isi_konten" id="body" rows="3" class="form-control summernote"></textarea>
                                </div>
                            </div>
                        </x-slot>
                        <x-slot name="footer">
                            <a href="{{ route('artikel.index') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i>
                                Kembali</a>
                                <button type="submit" class="ms-3 btn btn-info">Kirim</button>
                        </x-slot>
                    </x-card>
                </form>
            </div>
        </div>
    </div>
@endsection
@includeIf('includes.summernote')
