@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Membuat Data Penerbit</div>
                <div class="card-body">
                    <form action="{{ route('penerbit.store') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                                <label for="">Kode penerbit</label>
                                <input class="form-control" type="text" name="penerbit_kode">
                            </div>
                            <div class="form-group">
                                <label for="">Nama penerbit</label>
                                <input class="form-control" type="text" name="penerbit_nama">
                            </div>
                             <div class="form-group">
                                <label for="">Alamat penerbit</label>
                                <textarea id="" name="penerbit_alamat" class="form-control" rows="10" cols="50"></textarea>
                            </div>
                             <div class="form-group">
                                <label for="">Penerbit tlpn</label>
                                <input class="form-control" type="number" name="penerbit_telp">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-outline-info">
                                Simpan Data
                                </button>
                            </div>
                            <div class="form-group">
                                <a href="{{ url('penerbit') }}" class="btn btn-outline-info">Kembali</a>
                            </div>
                                </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
@endsection