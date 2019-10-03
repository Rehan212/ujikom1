


@extends('layouts.admin')
@section('content')
<center><h1>Data Peminjaman</h1></center>


	<div class="col-md-12">
            <table id="bs4-table" class="table table-striped table-bordered" style="width:100%">
			<!-- <table class="table table-default"> -->
				<tr class="danger">

			<a href="{{url('/backend/peminjaman/create')}}"class="btn btn-primary form-control">Tambah Data</a><br><br>
			
			
    
            <thead>
		    <tr class="bg-info">
		        <th><center>No</center></th>
                <th>Kode Peminjaman</th>
                <th>Petugas</th>
                <th>Peminjam</th>
                <th>Tanggal Peminjaman</th>
                <th>Tanggal Harus Kembali Peminjaman</th>
		        <th colspan="3"><center>Action</center></th>
			
		    </tr>
	        </thead>
	        <tbody>
		        @php
		        $no=1;
		        @endphp
		        @foreach($peminjaman as $data)
		            <tr>
			            <td>{{$no++}}</td>
                        <td>{{ $data->peminjaman_kode }}</td>
                        <td>{{ $data->petugas->petugas_nama }}</td>
                        <td>{{ $data->peminjam->peminjam_nama }}</td>
                        <td>{{ $data->peminjaman_tgl }}</td>
                        <td>{{ $data->peminjamana_tgl_kembali }}</td>
                        <td>{{ $data->kartu_status_aktif }}</td>
			
		                <td><a href="{{route('peminjaman.edit',$data->id)}}" class="btn btn-warning">Update</a></td>	
	                    <td><form action="{{ route('peminjaman.destroy', $data->id) }}" method="post">
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