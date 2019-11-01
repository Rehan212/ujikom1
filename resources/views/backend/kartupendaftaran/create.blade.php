@extends('layouts.dash')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('kartupendaftaran.store') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row clearfix">
                                <div class="col-sm-12">
                                        <center> <h2>Tambah Data Kartu Pendaftaran</h2> </center>
                                    <br>
                                        <div class="input-group">
                                            <div class="form-line">
                                                <b>Kode Kartu</b>
                                                <input name="kartupendaftaran_kode" type="text" class="form-control" required/>
                                            </div>
                                        </div>
                                        <div class="input-group">
                                            <div class="form-line">
                                            <b>Nama Petugas</b>
                                            <select class="form-control" name="petugas_nama" id="1">
                                                <option value="">-- Please select --</option>
                                                @foreach($petugas as $data)
                                                    <option value="{{ $data->id }}">{{ $data->petugas_nama }}</option>
                                                @endforeach
                                            </select>
                                            </div>
                                        </div>
                                        <div class="input-group">
                                            <div class="form-line">
                                            <b>Nama Peminjam</b>
                                            <select class="form-control" name="peminjam_nama" id="2">
                                                <option value="">-- Please select --</option>
                                                @foreach($peminjam as $data)
                                                    <option value="{{ $data->id }}">{{ $data->peminjam_nama }}</option>
                                                @endforeach
                                            </select>
                                            </div>
                                        </div>
                                        <b>Tanggal Pembuatan Kartu</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-table"></i>
                                            </span>            
                                            <input name="kartu_tgl_pembuatan" type="date" class="form-control" required/>
                                        </div>
                                        <b>Tanggal Akhir Kartu</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-table"></i>
                                            </span>            
                                            <input name="kartu_tgl_akhir" type="date" class="form-control" required/>
                                        </div>
                                        <b>Status Kartu</b>
                                        <div class="form-group">
                                            <input class="with-gap" type="radio" name="kartu_status_aktif" id="on" value="Aktif">
                                            <label class="form-check-label" for="on">
                                                Aktif
                                            </label>
                                            <input class="with-gap" type="radio" name="kartu_status_aktif" id="off" value="Tidak Aktif">
                                            <label class="m-l-20" for="off">
                                                Tidak Aktif
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="button-demo">
                                <button type="submit" class="btn btn-success  btn-lg waves-effect" onclick="return confirm('Are you sure you want to save?')">
                                <i class="material-icons"></i>
                                <span>Simpan Data</span>
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