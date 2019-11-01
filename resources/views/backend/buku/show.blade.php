@extends('layouts.dash')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                        <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group-inner">  
                                        <center>
                                            <img src="{{ asset('assets/img/buku/'.$buku->buku_foto) }}" alt="" height="25%" width="25%">
                                        </center>
                                    </div>
                                    <br>
                                    <div class="from-group-inner">
                                            <label>Kode Buku</label>
                                            <input name="buku_kode" type="text" class="form-control" required readonly disabled value="{{$buku->buku_kode}}"/>
                                    </div>
                                    <br>
                                    <div class="from-group-inner">
                                            <label>Judul Buku</label>
                                            <input name="buku_judul" type="text" class="form-control" required readonly disabled value="{{$buku->buku_judul}}"/>
                                    </div>
                                    <br>
                                    <div class="from-group-inner">
                                            <label>Deskripsi Buku</label>
                                            <textarea class="ckeditor" name="buku_deskripsi" id="ck" cols="30" rows="5" required readonly disabled>{{$buku->buku_deskripsi}}</textarea>
                                    </div>
                                    <br>
                                     <div class="from-group-inner">  
                                            <label>Jumlah Buku</label>
                                            <input class="form-control mobile-phone-number" type="number" name="buku_jumlah" required readonly disabled value="{{$buku->buku_jumlah}}"/>
                                    </div>
                                    <br>
                                    <div class="from-group-inner">
                                            <label>Pengarang Buku</label>
                                            <input name="buku_pengarang" type="text" class="form-control" required readonly disabled value="{{$buku->buku_pengarang}}"/>
                                    </div>
                                    <br>
                                    <div class="from-group-inner">
                                            <label>Tahun Terbit Buku</label>                                
                                            <input name="buku_tahun_terbit" type="date" class="form-control" required readonly disabled value="{{$buku->buku_tahun_terbit}}"/>
                                    </div>
                                    <br>   
                                    <div class="form-group-inner">
                                        <label>Kategori Buku</label>
                                            <select class="form-control" name="kategori_nama" id="1" required readonly disabled>
                                                @foreach($kategori as $data)
                                                <option value="{{ $data->id }}">{{ $data->kategori_nama }}</option>
                                                @endforeach
                                            </select>
                                    </div>
                                    <div class="form-group-inner">
                                        <label>Penerbit Buku</label>
                                            <select class="form-control" name="penerbit_nama" id="2" required readonly disabled>
                                                @foreach($penerbit as $data)
                                                <option value="{{ $data->id }}">{{ $data->penerbit_nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <form action="/backend/buku">
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
@section('js')
    <script>
        CKEDITOR.replace( 'ck' );
    </script>
@endsection
