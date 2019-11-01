@extends('layouts.dash')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><center><h1>Membuat Data Peminjaman</h1></center></div>
                <div class="card-body">
                    <form action="{{ route('peminjaman.store') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}

    <div class="form-group">
        <label for="">Kode Peminjaman</label>
        <input class="form-control" type="text" name="peminjaman_kode">
    </div>
       <div class="form-group">
        <label for="">Petugas</label>
        <select class="form-control" name="petugas_nama" id="1">
            <option value="">-- Please select --</option>
            @foreach($petugas as $data)
            <option value="{{ $data->id }}">{{ $data->petugas_nama }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Peminjam</label>
        <select class="form-control" name="peminjam_nama" id="2">
            <option value="">-- Please select --</option>
            @foreach($peminjam as $data)
            <option value="{{ $data->id }}">{{ $data->peminjam_nama }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="">Tanggal Peminjam</label>
        <span class="input-group-addon">
            <i class="material-icons">Kalender</i>
        </span>                               
        <div class="form-line">
            <input name="peminjaman_tgl" type="date" class="form-control" required/>
        </div>   
    </div>
    <div class="form-group">
        <label for="">Tanggal Pengembalian</label>
        <span class="input-group-addon">
            <i class="material-icons">Kalender</i>
        </span>                               
        <div class="form-line">
            <input name="peminjaman_tgl_kembali" type="date" class="form-control" required/>
        </div>  
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-outline-info">
        Simpan Data
        </button>
    </div>
    <div class="form-group">
        <a href="{{ url('/backend/peminjaman') }}" class="btn btn-outline-info">Kembali</a>
    </div>
        </form>
            </div>
                </div>
                    </div>
                        </div>
                            </div>
@endsection