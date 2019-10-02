@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Membuat Data Peminjam</div>
                <div class="card-body">
                    <form action="{{ route('peminjam.store') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}

    <div class="form-group">
        <label for="">Kode Peminjam</label>
        <input class="form-control" type="text" name="peminjam_kode">
    </div>
       <div class="form-group">
        <label for="">Nama Peminjam</label>
        <input class="form-control" type="text" name="peminjam_nama">
    </div>
    <div class="form-group">
        <label>Alamat Peminjam</label>
        <textarea id="" class="form-control" name="peminjam_alamat" rows="10" cols="50"></textarea>
    </div>
    <div class="form-group">
        <label for="">Telp Peminjam</label>
        <input class="form-control" type="text" name="peminjam_telp">
    </div>
    <div class="form-group">
        <label for="">Foto</label>
        <input type="file" class="form-control" name="peminjam_foto">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-outline-info">
        Simpan Data
        </button>
    </div>
    <div class="form-group">
        <a href="{{ url('peminjam') }}" class="btn btn-outline-info">Kembali</a>
    </div>
        </form>
            </div>
                </div>
                    </div>
                        </div>
                            </div>
@endsection