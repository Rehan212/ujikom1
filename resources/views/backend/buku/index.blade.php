@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Halaman Buku</div>
                <br>
                <center><a href="{{ route('buku.create') }}" class="btn btn-primary">Tambah</a></center>
                <br>
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th>No</th>
                            <th>Kode Buku</th>
                            <th>Kategori</th>
                            <th>Penerbit</th>
                            <th>Judul Buku</th>
                            <th>Jumlah Buku</th>
                            <th>Deskripsi Buku</th>
                            <th>Pengarang Buku</th>
                            <th>Tahun Terbit Buku</th>
                            <th clospan="3" style="text-align: center;">Aksi</th>
                        </tr>
                        @php $no =1; @endphp
                        @foreach($buku as $data)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $data->buku_kode }}</td>
                            <td>{{ $data->kategori->kategori_nama }}</td>
                            <td>{{ $data->penerbit->penerbit_nama }}</td>
                            <td>{{ $data->buku_judul }}</td>
                            <td>{{ $data->buku_jumlah }}</td>
                            <td>{{ $data->buku_deskripsi }}</td>
                            <td>{{ $data->buku_pengarang }}</td>
                            <td>{{ $data->buku_tahun_terbit }}</td>
                            <td><a href="{{ route('buku.edit', $data->id) }}" class="btn btn-warning">Edit</a></td>
                            <td><a href="{{ route('buku.show', $data->id) }}" class="btn btn-success">Detail Data</a></td>
                            <td><form action="{{ route('buku.destroy', $data->id) }}" method="post">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="btn btn -sm btn-danger" type="submit">Hapus Data</button>
                            </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
