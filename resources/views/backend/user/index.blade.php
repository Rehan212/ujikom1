{{-- @extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h2>Halaman User</div>
                <br>
                <center><a href="{{ route('user.create') }}" class="btn btn-primary">Tambah</a></center>
                    <br>
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <center>
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th clospan="3" style="text-align: center;">Aksi</th>
                                </center>
                            </tr>
                @php $no =1; @endphp
                @foreach($user as $data)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->email }}</td>        
                    <td><a href="{{ route('user.edit', $data->id) }}" class="btn btn-warning">Edit Data</a></td>
                    <td><a href="{{ route('user.show', $data->id) }}" class="btn btn-success">Detail Data</a></td>
                    <td><form action="{{ route('user.destroy', $data->id) }}" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn -sm btn-danger" type="submit">Hapus Data</button>
                    </form>
                    </td>
                    </<form>
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
<center><h1>Data User</h1></center>


	<div class="col-md-12">
            <table id="bs4-table" class="table table-striped table-bordered" style="width:100%">
			<!-- <table class="table table-default"> -->
				<tr class="danger">

			<a href="{{url('/backend/user/create')}}"class="btn btn-primary form-control">Tambah Data</a><br><br>
			
			
    
            <thead>
		    <tr class="bg-info">
		        <th><center>No</center></th>
		        <th><center>Nama</center></th>
		        <th><center>Email</center></th>
		        <th colspan="3"><center>Action</center></th>
			
		    </tr>
	        </thead>
	        <tbody>
		        @php
		        $no=1;
		        @endphp
		        @foreach($user as $data)
		            <tr>
			            <td>{{$no++}}</td>
			            <td>{{$data->name}}</td>
			            <td>{{$data->email}}</td>
			
			
		                <td><a href="{{route('user.edit',$data->id)}}" class="btn btn-warning">Update</a></td>	
	                    <td><form action="{{ route('user.destroy', $data->id) }}" method="post">
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