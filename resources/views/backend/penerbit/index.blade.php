@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Halaman penerbit</div>
                <br>
                <center><a href="{{ route('penerbit.create') }}" class="btn btn-primary">Tambah</a></center>
                    <br>
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>No</th>
                                <th>Kode Penerbit</th>
                                <th>Nama Penerbit</th>
                                <th>Alamat Penerbit</th>
                                <th>Telp Penerbit</th>
                                <th clospan="3" style="text-align: center;">Aksi</th>
                            </tr>
                @php $no =1; @endphp
                @foreach($penerbit as $data)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $data->penerbit_kode }}</td>
                     <td>{{ $data->penerbit_nama }}</td>
                      <td>{{ $data->penerbit_alamat }}</td>
                       <td>{{ $data->penerbit_telp }}</td>
                    <td><img src="{{ asset('assets/img/artikel/'.$data->foto) }}" alt="" height="500px" width="500px"></td>         
                    <td><a href="{{ route('penerbit.edit', $data->id) }}" class="btn btn-warning">Edit</a></td>
                    <td><a href="{{ route('penerbit.show', $data->id) }}" class="btn btn-success">Detail Data</a></td>
                    <td><form action="{{ route('penerbit.destroy', $data->id) }}" method="post">
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
