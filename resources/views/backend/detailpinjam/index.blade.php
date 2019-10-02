@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Halaman detail pinjam</div>
                <br>
                <center><a href="{{ route('detailpinjam.create') }}" class="btn btn-primary">Tambah</a></center>
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
                @foreach($detailpinjam as $data)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $data->peminjaman->peminjaman_tgl }}</td>
                    <td>{{ $data->buku->buku_judul }}</td>
                    <td>{{ $data->detail_tgl_kembali }}</td>
                    <td>{{ $data->detail_detail }}</td>
                    <td>{{ $data->detail_status_kembali }}</td>
                    <td><a href="{{ route('detailpinjamuku.edit', $data->id) }}" class="btn btn-warning">Edit</a></td>
                    <td><a href="{{ route('detailpinjamku.show', $data->id) }}" class="btn btn-success">Detail Data</a></td>
                    <td><form action="{{ route('detailpinjam.destroy', $data->id) }}" method="post">
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
@endsection