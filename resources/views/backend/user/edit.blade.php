@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Mengubah Data Petugas</div>
                <div class="card-body">
                    <form action="{{ route('user.update', $user->id) }}" method="post">
                        <input name="_method" type="hidden" value="PATCH">
                        {{ csrf_field() }}
    <div class="form-group">
        <label for="">Nama</label>
        <input class="form-control" value="{{ $user->name }}" type="text" name="name">
    </div>
     <div class="form-group">
        <label for="">Email</label>
        <input class="form-control" value="{{ $user->email }}" type="text" name="email">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-outline-info">
        Simpan Data
        </button>
    </div>
    <div class="form-group">
        <a href="{{ url('user.index') }}" class="btn btn-outline-info">Kembali</a>
    </div>
        </form>
            </div>
                </div>
                    </div>
                        </div>
                            </div>
@endsection