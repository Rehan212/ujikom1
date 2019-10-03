

@extends('layouts.admin')
@section('content')
<center><h1>Data Peminjam</h1></center>


	<div class="col-md-12">
            <table id="bs4-table" class="table table-striped table-bordered" style="width:100%">
			<!-- <table class="table table-default"> -->
				<tr class="danger">

			<a href="{{url('/backend/peminjam/create')}}"class="btn btn-primary form-control">Tambah Data</a><br><br>
			
			
    
            <thead>
		    <tr class="bg-info">
		        <th><center>No</center></th>
                <th>Kode Peminjam</th>
                <th>Nama Peminjam</th>
                <th>Alamat Peminjam</th>
                <th>Telp Peminjam</th>
                <th>Foto Peminjam</th>
		        <th colspan="3"><center>Action</center></th>
			
		    </tr>
	        </thead>
	        <tbody>
		        @php
		        $no=1;
		        @endphp
		        @foreach($peminjam as $data)
		            <tr>
			            <td>{{$no++}}</td>
                        <td>{{ $data->peminjam_kode }}</td>
                        <td>{{ $data->peminjam_nama }}</td>
                        <td>{{ $data->peminjam_alamat }}</td>
                        <td>{{ $data->peminjam_telp }}</td>
                        <td><img src="{{ asset('assets/img/peminjam/'.$data->foto) }}" alt="" height="100px" width="100px"></td>       
			
		                <td><a href="{{route('peminjam.edit',$data->id)}}" class="btn btn-warning">Update</a></td>	
	                    <td><form action="{{ route('peminjam.destroy', $data->id) }}" method="post">
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