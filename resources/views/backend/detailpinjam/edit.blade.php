@extends('layouts.dash')
@section('content')
@role('admin')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><center><h1>Mengubah Data Detail Pinjam</h1></center></div>
                <div class="card-body">
                    <form action="{{ route('detailpinjam.update', $detailpinjam->id) }}" method="post" enctype="multipart/form-data">
                        <input name="_method" type="hidden" value="PATCH">
                        {{ csrf_field() }}
<div class="form-group">
        <label for=""><b>Kode Detail Peminjaman</b></label>
        <input name="detail_kode" type="text" class="form-control" required value="{{ $detailpinjam->detailpinjam_kode }}"/>
     </div>
    <div class="form-group">
        <label for=""><b>Kode Peminjam</b></label>
        <select class="form-control" name="peminjaman_kode" id="1">
            @foreach($peminjaman as $data)
                <option value="{{ $data->id }}">{{ $data->peminjaman_kode }}</option>
            @endforeach
        </select>   
    </div>
    <div class="form-group">
        <label for=""><b>Judul Buku</b></label>
        <select class="form-control" name="buku_judul" id="2">
            @foreach($buku as $data)
                <option value="{{ $data->id }}">{{ $data->buku_judul }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for=""><b>Status Pinjam</b></label><br>
        <input class="with-gap" <?php echo ($detailpinjam->detail_status_kembali=='Dipinjam')?'checked':'' ?> type="radio" name="detail_status_kembali" id="exampleRadios1" value="Dipinjam">
        <label class="form-check-label" for="exampleRadios1">
            Dipinjam
        </label>
        <input class="with-gap" <?php echo ($detailpinjam->detail_status_kembali=='Selesai')?'checked':'' ?> type="radio" name="detail_status_kembali" id="exampleRadios2" value="Selesai">
        <label class="form-check-label" for="exampleRadios2">
            Selesai
        </label>
    </div>
    <div class="form-group">
        <label for=""><b>Detail Tanggal Kembali</b></label><br>
        <span class="input-group-addon">
            <i class="fa fa-table"> </i><br>
    </span>            
    <select class="form-control" name="detail_tgl_kembali" id="3">
        @foreach($peminjaman as $data)
            <option value="{{ $data->id }}">{{ $data->peminjaman_tgl_kembali }}</option>
        @endforeach
    </select>
    </div>
    <div class="form-group">
        <label for=""><b>Detail Denda</b></label><br>
        <span class="input-group-addon">
            <i class="material-icons">Rp.</i>
        </span> 
        <div class="form-line">
            <input name="detail_denda" type="text" class="form-control" required value="{{ $detailpinjam->detail_denda }}"/>
        </div>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-outline-info">
        Simpan Data
        </button>
    </div>
    <div class="form-group">
        <a href="{{ url('/backend/detailpinjam') }}" class="btn btn-outline-info">Kembali</a>
    </div>
        </form>
            </div>
                </div>
                    </div>
                        </div>
                            </div>
@endsection
@endrole