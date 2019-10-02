@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Menampilkan Data Artikel</div>
                <div class="card-body">
    <div class="form-group">
        <label for="">Kode Peminjam</label>
        <input class="form-control" value="{{ $peminjam->peminjam_kode }}" type="text" name="peminjam_kode" disabled>
    </div>
    <div class="form-group">
        <label for="">Nama Peminjam</label>
        <input class="form-control" value="{{ $peminjam->peminjam_nama }}" type="text" name="peminjam_nama" disabled>
    </div>
    <div class="form-group">
        <label>Alamat</label>
        <textarea id="" rows="8" cols="30" type="text" name="peminjam_alamat" disabled>{{ $artikel->peminjam_alamat }}</textarea>
    </div>
    <div class="form-group">
        <label for="">Telp Peminjam</label>
        <input class="form-control" value="{{ $peminjam->peminjam_telp }}" type="text" name="peminjam_telp" disabled>
    </div>
    <div class="form-group">
        <label for="">Foto</label><br>
        <img src="{{ asset('assets/img/artikel/'.$artikel->peminjam_foto) }}" alt="" height="250px" width="250px">
        <input type="file" class="form-control" name="foto" disabled>
    </div>
    <div class="form-group">
        <a href="{{ url('admin/artikel') }}" class="btn btn-outline-info">Kembali</a>
    </div>
        </div>
            </div>
                </div>
                    </div>
                        </div>
                            @endsection
