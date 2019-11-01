
@extends('layouts.dash')
@section('content')
@role('admin')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><center><h1>Membuat Data Buku</h1></center></div>
                <div class="card-body">
                        <form action="{{ route('buku.update', $buku->id) }}" method="post" enctype="multipart/form-data">
                                <input name="_method" type="hidden" value="PATCH">
                                {{ csrf_field() }}
<div class="form-group">
        <label for="">Kode Buku</label>
        <input name="buku_kode" type="text" class="form-control" required value="{{ $buku->buku_kode}}"/>
    </div>
    <div class="form-group">
        <label for="">Judul Buku</label>
        <input name="buku_judul" type="text" class="form-control" required value="{{ $buku->buku_judul}}"/>
    </div>
    <div class="form-group">    
        <label for="">Deskripsi Buku</label>
        <textarea class="form-control no-resize" name="buku_deskripsi" id="ck" cols="30" rows="5" required>{{ $buku->buku_deskripsi}}</textarea>
    </div>
    <div class="form-group">    
        <label for="">Jumlah Buku</label>
        <input class="form-control mobile-phone-number" type="number" name="buku_jumlah" required value="{{ $buku->buku_jumlah}}"/>
    </div>
    <div class="form-group">
        <label for="">Pengarang Buku</label>
        <input name="buku_pengarang" type="text" class="form-control" required value="{{ $buku->buku_pengarang}}"/>
    </div>
    <div class="form-group">
        <label for="">Tahun Penerbit Buku</label>
        <span class="input-group-addon">
                <i class="material-icons"></i>
            </span>                               
            <div class="form-line">
                <input name="buku_tahun_terbit" type="date" class="form-control" required value="{{ $buku->buku_tahun_terbit}}"/>
            </div>   
    </div>
    <div class="form-group">
        <label for="">Kategori Buku</label>
        <select class="form-control" name="kategori_nama">
                <option value="">-- Pilih Data Kategori--</option>
                @foreach($kategori as $data)
                <option value="{{ $data->id }}">{{ $data->kategori_nama }}</option>
                @endforeach
            </select>
    </div>
    <div class="form-group">
        <label for="">Penerbit Buku</label>
        <select class="form-control" name="penerbit_nama">
                <option value="">-- Pilih Data Penerbit --</option>
                @foreach($penerbit as $data)
                <option value="{{ $data->id }}">{{ $data->penerbit_nama }}</option>
                @endforeach
            </select>
    </div>

    <br>
    <div class="form-group">
            <button type="submit" class="btn btn-outline-info">
            Simpan Data
            </button>
        </div>
    <div class="form-group">
        <a href="{{ url('/backend/buku') }}" class="btn btn-outline-info">Kembali</a>
    </div>
        </form>
            </div>
                </div>
                    </div>
                        </div>
                            </div>
@endsection
@endrole
@section('js')
    <script>
        CKEDITOR.replace('ck')
    </script>
@endsection