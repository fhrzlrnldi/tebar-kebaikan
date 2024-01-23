@extends('layouts.admin')
@section('body')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid p-2">
                <form action="{{ route('artikel.update',['artikel'=>$artikel->id]) }}" method="post" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <h1 class="mb-5">Ubah Artikel</h1>
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
                                <input type="text" class="form-control" value="{{ $artikel->judul }}" name="edit-judul" id="judul"
                                    placeholder="Masukkan Judul">
                            </div>
                            <div class="mb-3">
                                <label for="penulis" class="form-label">Penulis</label>
                                <input type="text" class="form-control" name="edit-penulis"  value="{{ $artikel->penulis }}" id="penulis"
                                    placeholder="Masukkan Penulis">
                            </div>
                            <div class="mb-3">
                                <div class="form-group">
                                    <label for="body">Konten</label>
                                    <textarea name="edit-isi" id="body" rows="3" class="form-control summernote">{{ $artikel->isi_konten }}"</textarea>
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
