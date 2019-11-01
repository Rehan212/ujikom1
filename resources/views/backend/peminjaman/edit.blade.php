@extends('layouts.dash')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><center><h1>Mengubah Data Peminjaman</h1></center></div><br>
                <div class="card-body">
                    <form action="{{ route('peminjaman.update', $peminjaman->id) }}" method="post" enctype="multipart/form-data">
                        <input name="_method" type="hidden" value="PATCH">
                        {{ csrf_field() }}
    <div class="form-group">
        <label for="">Kode Peminjaman</label>
        <input class="form-control" value="{{ $peminjaman->peminjaman_kode }}" type="text" name="peminjaman_kode">
    </div>
     <div class="form-group">
        <label for="">Petugas</label>
        <select required class="form-control" name="petugas_nama" id="1">
            @foreach($petugas as $data)
            <option value="{{ $data->id }}">{{ $data->petugas_nama }}</option>
            @endforeach
        </select>
    </div>
      <div class="form-group">
        <label>Peminjam</label>
        <select required class="form-control" name="peminjam_nama" id="2">
            @foreach($peminjam as $data)
            <option value="{{ $data->id }}">{{ $data->peminjam_nama }}</option>
            @endforeach
        </select>
    </div>
      <div class="form-group">
        <label for="">Tanggal Peminjaman</label>
        <span class="input-group-addon">
            <i class="material-icons">Kalender</i>
        </span>                               
        <div class="form-line">
            <input name="peminjaman_tgl" type="date" class="form-control" value="{{$peminjaman->peminjaman_tgl}}" required/>
        </div>   
    </div>
    <div class="form-group">
        <label for="">Tanggal Pengembalian</label><br>
        <span class="input-group-addon">
            <i class="material-icons">Kalender</i>
        </span>                               
        <div class="form-line">
            <input name="peminjaman_tgl_kembali" type="date" class="form-control" value="{{$peminjaman->peminjaman_tgl_kembali}}" required/>
        </div>  
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-outline-info">
        Simpan Data
        </button>
    </div>
    <div class="form-group">
        <a href="{{ url('backend/peminjaman') }}" class="btn btn-outline-info">Kembali</a>
    </div>
        </form>
            </div>
                </div>
                    </div>
                        </div>
                            </div>
@endsection