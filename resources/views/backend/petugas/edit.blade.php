@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Mengubah Data Petugas</div>
                <div class="card-body">
                    <form action="{{ route('petugas.update', $petugas->id) }}" method="post">
                        <input name="_method" type="hidden" value="PATCH">
                        {{ csrf_field() }}
    <div class="form-group">
        <label for="">Kode Petugas</label>
        <input class="form-control" value="{{ $petugas->petugas_kode }}" type="text" name="petugas_kode">
    </div>
     <div class="form-group">
        <label for="">Nama Petugas</label>
        <input class="form-control" value="{{ $petugas->petugas_nama }}" type="text" name="petugas_nama">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-outline-info">
        Simpan Data
        </button>
    </div>
    <div class="form-group">
        <a href="{{ url('petugas.index') }}" class="btn btn-outline-info">Kembali</a>
    </div>
        </form>
            </div>
                </div>
                    </div>
                        </div>
                            </div>
@endsection