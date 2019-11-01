
@extends('layouts.dash')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><center><h1>Membuat Data Detail Pinjam</h1></center></div>
                <div class="card-body">
                    <form action="{{ route('detailpinjam.store') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
<div class="form-group">
        <label for=""><b>Kode Detail Peminjaman</b></label>
        <input name="detail_kode" type="text" class="form-control" required/>
    </div>
    <div class="form-group">
        <label for=""><b>Kode Peminjam</b></label>
        <select class="form-control" name="peminjaman_kode" id="1">
            <option value="" disabled>-- Please select --</option>
            @foreach($peminjaman as $data)
                <option value="{{ $data->id }}">{{ $data->peminjaman_kode }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for=""><b>Judul Buku</b></label>
        <select class="form-control" name="buku_judul" id="2">
            <option value="" disabled>-- Please select --</option>
            @foreach($buku as $data)
                <option value="{{ $data->id }}">{{ $data->buku_judul }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for=""><b>Status Pinjam</b></label><br>
        <span class="input-group-addon">
            <input type="radio" class="with-gap" id="ig_radio" value="Dipinjam" name="detail_status_kembali">
            <label for="ig_radio">Dipinjam</b></label>
        </span>
        <span class="input-group-addon">
            <input type="radio" class="with-gap" id="ig_radio" value="Simpan" name="detail_status_kembali">
            <label for="ig_radio">Selesai</b></label>
        </span>
    </div>
    <div class="form-group">
        <label for=""><b>Detail Tanggal Kembali</b></label><br>
        <span class="input-group-addon">
            <i class="fa fa-table">     </i><br>
        </span>            
        <select class="form-control" name="detail_tgl_kembali" id="3">
            <option value="" disabled>-- Please select --</option>
            @foreach($peminjaman as $data)
                <option value="{{ $data->id }}">{{ $data->peminjaman_tgl_kembali }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for=""><b>Detail Denda</b></label><br>
        <span class="input-group-addon">
            <i class="material-icons">Rp.</i>
        </span> 
        <div class="form-line">
            <input name="detail_denda" type="text" class="form-control" required/>
        </div>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-outline-info">
        Simpan Data
        </button>
    </div>
    <div class="form-group">
        <a href="{{ url('/backend/detailpinjam') }}" class="btn btn-outline-info">Kembali</a>
    </div>
        </form>
            </div>
                </div>
                    </div>
                        </div>
                            </div>
@endsection