@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Halaman Kartupendaftaran</div>
                <br>
                <center><a href="{{ route('kartupendaftaran.create') }}" class="btn btn-primary">Tambah</a></center>
                    <br>
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>No</th>
                                <th>Kode Peminjaman</th>
                                <th>Petugas</th>
                                <th>Peminjam</th>
                                <th>Tanggal Peminjaman</th>
                                <th>Tanggal Harus Kembali Peminjaman</th>
                                <th clospan="3" style="text-align: center;">Aksi</th>
                            </tr>
                @php $no =1; @endphp
                @foreach($kartu as $data)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $data->peminjaman_kode }}</td>
                    <td>{{ $data->petugas->petugas_nama }}</td>
                    <td>{{ $data->peminjam->peminjam_nama }}</td>
                    <td>{{ $data->peminjaman_tgl }}</td>
                    <td>{{ $data->peminjamana_tgl_kembali }}</td>
                    <td>{{ $data->kartu_status_aktif }}</td>
                    <td><a href="{{ route('kartupendaftaran.edit', $data->id) }}" class="btn btn-warning">Edit</a></td>
                    <td><a href="{{ route('kartupendaftaran.show', $data->id) }}" class="btn btn-success">Detail Data</a></td>
                    <td><form action="{{ route('kartupendaftaran.destroy', $data->id) }}" method="post">
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