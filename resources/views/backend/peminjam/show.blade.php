@extends('layouts.dash')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <center><h1><b>Data Pinjam</b></h1><br><br></center>
                        <div class="form-group-inner">  
                            <center>
                                <img src="{{ asset('assets/img/peminjam/'.$peminjam->peminjam_foto) }}" alt="" height="50%" width="50%">
                            </center>
                        </div>
                        <div class="form-group-inner">
                            <label>Kode Peminjam</label>
                                <input class="form-control" disabled type="text" name="peminjam_kode" value="{{$peminjam->peminjam_kode}}">
                        </div>
                        <div class="form-group-inner">
                            <label>Nama Peminjam</label>
                                <input class="form-control" disabled type="text" name="peminjam_nama" value="{{$peminjam->peminjam_nama}}">
                        </div>
                        <div class="form-group-inner">
                            <label>Alamat Peminjam</label>
                                <textarea id="" class="form-control" name="peminjam_alamat" rows="10" cols="50" disabled>{{$peminjam->peminjam_alamat}}</textarea>
                        </div>
                        <label>Telp Peminjam</label>
                        <div class="form-group-inner">
                                <input class="form-control" disabled type="number" name="peminjam_telp" value="{{$peminjam->peminjam_tlpn}}">
                        </div>       
                        <form action="/backend/peminjam">
                        <div class="button-demo">
                            <button type="submit" class="btn btn-danger  btn-lg waves-effect" onclick="return confirm('Are you sure you want to go back?')">
                            Kembali
                            </button>
                        </div>
                        <br>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection