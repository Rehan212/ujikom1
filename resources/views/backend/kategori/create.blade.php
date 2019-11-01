@extends('layouts.dash')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><center><h1>Membuat Data Kategori</h1></center></div>
                <div class="card-body">
                    <form action="{{ route('kategori.store') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                                <label for="">Kode kategori</label>
                                <input class="form-control" type="text" name="kategori_kode">
                            </div>
                            <div class="form-group">
                                <label for="">Nama kategori</label>
                                <input class="form-control" type="text" name="kategori_nama">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-outline-info">
                                Simpan Data
                                </button>
                            </div>
                            <div class="form-group">
                                <a href="{{ url('kategori') }}" class="btn btn-outline-info">Kembali</a>
                            </div>
                                </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
@endsection