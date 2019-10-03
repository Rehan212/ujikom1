@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('buku.store') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row clearfix">
                            <center><h1>Isi data Buku</h1></center>
                                <div class="col-sm-12">
                                    <br>
                                   
                                    <div class="input-group">
                                        <div class="form-line">
                                            <b>Kode Buku</b>
                                            <input name="buku_kode" type="text" class="form-control" required/>
                                        </div>
                                    </div>
                                    <div class="input-group">
                                        <div class="form-line">
                                            <b>Judul Buku</b>
                                            <input name="buku_judul" type="text" class="form-control" required/>
                                        </div>
                                    </div>
                                    <div class="input-group">
                                        <div class="form-line">
                                            <b>Deskripsi Buku</b>
                                            <textarea class="form-control no-resize" name="buku_deskripsi" id="ck" cols="30" rows="5" required></textarea>
                                        </div>
                                    </div>
                                     <div class="input-group">  
                                        <div class="form-line">
                                            <b>Jumlah Buku</b>
                                            <input class="form-control mobile-phone-number" type="number" name="buku_jumlah" required>
                                        </div>
                                    </div>
                                     <div class="input-group">
                                        <div class="form-line">
                                            <b>Pengarang Buku</b>
                                            <input name="buku_pengarang" type="text" class="form-control" required/>
                                        </div>
                                    </div>
                                    <b>Tahun Terbit Buku</b>
                                    <div class="input-group"> 
                                        <span class="input-group-addon">
                                            <i class="material-icons">date_range</i>
                                        </span>                               
                                        <div class="form-line">
                                            <input name="buku_tahun_terbit" type="date" class="form-control" required/>
                                        </div>   
                                    </div>
                                    <div class="input-group">
                                        <div class="form-line">
                                        <b>Kategori Buku</b>
                                        <select class="form-control" name="kategori_nama">
                                            <option value="">-- Please select --</option>
                                            @foreach($kategori as $data)
                                            <option value="{{ $data->id }}">{{ $data->kategori_nama }}</option>
                                            @endforeach
                                        </select>
                                        </div>
                                    </div>
                                    <div class="input-group">
                                        <div class="form-line">
                                        <b>Penerbit Buku</b>
                                        <select class="form-control" name="penerbit_nama">
                                            <option value="">-- Please select --</option>
                                            @foreach($penerbit as $data)
                                            <option value="{{ $data->id }}">{{ $data->penerbit_nama }}</option>
                                            @endforeach
                                        </select>
                                        </div>
                                    </div>
                            
                                </div>
                            </div>
                            <div class="button-demo">
                                <button type="submit" class="btn btn-success  btn-lg waves-effect">
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
@section('js')
    <script>
        CKEDITOR.replace('ck')
    </script>
@endsection