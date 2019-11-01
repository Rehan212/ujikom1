@extends('layouts.dash')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><center><h1>Membuat Data User</h1></center></div>
                <div class="card-body">
                    <form action="{{ route('user.store') }}" method="post">
                        {{ csrf_field() }}
<div class="form-group">
        <label for="">Masukan Nama</label>
        <input class="form-control" type="text" name="name">
    </div>
    <div class="form-group">
        <label for="">Masukan Email Anda</label>
        <input class="form-control" type="text" name="email">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-outline-info">
        Simpan Data
        </button>
    </div>
    <div class="form-group">
        <a href="{{ url('backend/user') }}" class="btn btn-outline-info">Kembali</a>
    </div>
        </form>
            </div>
                </div>
                    </div>
                        </div>
                            </div>
@endsection