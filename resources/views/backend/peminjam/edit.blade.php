@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Mengubah Data Peminjam</div>
                <div class="card-body">
                    <form action="{{ route('peminjam.update', $peminjam->id) }}" method="post" enctype="multipart/form-data">
                        <input name="_method" type="hidden" value="PATCH">
                        {{ csrf_field() }}
    <div class="form-group">
        <label for="">Kode Peminjam</label>
        <input class="form-control" value="{{ $peminjam->peminjam_kode }}" type="text" name="peminjam_kode">
    </div>
     <div class="form-group">
        <label for="">Nama Peminjam</label>
        <input class="form-control" value="{{ $peminjam->peminjam_nama }}" type="text" name="peminjam_nama">
    </div>
      <div class="form-group">
        <label>Alamat Peminjam</label>
        <textarea id="" name="peminjam_alamat" class="form-control" rows="10" cols="50">{{ $peminjam->peminjam_alamat }}</textarea>
    </div>
      <div class="form-group">
        <label for="">Nama Telp</label>
        <input class="form-control" value="{{ $peminjam->peminjam_telp }}" type="text" name="peminjam_telp">
    </div>
    <div class="form-group">
        <label for="">Foto</label><br>
        <img src="{{ asset('assets/img/peminjam/'.$peminjam->foto) }}" alt="" height="250px" width="250px">
        <input type="file" class="form-control" name="peminjam_foto">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-outline-info">
        Simpan Data
        </button>
    </div>
    <div class="form-group">
        <a href="{{ url('peminjam.index') }}" class="btn btn-outline-info">Kembali</a>
    </div>
        </form>
            </div>
                </div>
                    </div>
                        </div>
                            </div>
@endsection