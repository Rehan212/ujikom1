{{-- @extends('layouts.admin')
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
                                <th>Kode kartu</th>
                                <th>Petugas</th>
                                <th>Peminjam</th>
                                <th>Tanggal Pembuatan Kartu</th>
                                <th>Tanggal Akhir Kartu</th>
                                <th>Status Aktif Kartu</th>
                                <th clospan="3" style="text-align: center;">Aksi</th>
                            </tr>
                @php $no =1; @endphp
                @foreach($kartu as $data)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $data->kartu_kode }}</td>
                    <td>{{ $data->petugas->petugas_nama }}</td>
                    <td>{{ $data->peminjam->peminjam_nama }}</td>
                    <td>{{ $data->kartu_tgl_pembuatan }}</td>
                    <td>{{ $data->kartu_tgl_akhir }}</td>
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
@endsection --}}

@extends('layouts.admin')
@section('content')
<style type="text/css">
	th,td{
		text-align: center;
	}
</style>
<center><h1>Data Kartu Pendaftaran</h1></center>


	<div class="col-md-12">
            <table id="bs4-table" class="table table-striped table-bordered" style="width:100%">
			<!-- <table class="table table-default"> -->
				<tr class="danger">

			<a href="{{url('/backend/kartu/create')}}"class="btn btn-primary form-control">Tambah Data</a><br><br>
			
			
    
            <thead>
		    <tr class="bg-info">
		        <th>No</th>
                    <th>Kode kartu</th>
                    <th>Petugas</th>
                    <th>Peminjam</th>
                    <th>Tanggal Pembuatan Kartu</th>
                    <th>Tanggal Akhir Kartu</th>
                    <th>Status Aktif Kartu</th>
		        <th colspan="3"><center>Action</center></th>
			
		    </tr>
	        </thead>
	        <tbody>
		        @php
		        $no=1;
		        @endphp
		        @foreach($kartu as $kartu)
		            <tr>
			            <td>{{ $no++ }}</td>
                    <td>{{ $data->kartu_kode }}</td>
                    <td>{{ $data->petugas->petugas_nama }}</td>
                    <td>{{ $data->peminjam->peminjam_nama }}</td>
                    <td>{{ $data->kartu_tgl_pembuatan }}</td>
                    <td>{{ $data->kartu_tgl_akhir }}</td>
                    <td>{{ $data->kartu_status_aktif }}</td>
			
		                <td><a href="{{route('kartu.edit',$kartu->id)}}" class="btn btn-warning">Update</a></td>	
	                    <td><form action="{{ route('kartu.destroy', $kartu->id) }}" method="post">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <button class="btn btn -sm btn-danger" type="submit">Hapus Data</button>
                            </form>
                        </td>    
		            </tr>
		
		        @endforeach
            </tbody>
        </table>
    </div>
</center<h1>


@endsection