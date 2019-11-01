{{-- @extends('layouts.admin')
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
@endsection --}}
{{-- @extends('layouts.admin')
@section('content')

 <center><h1>Data Buku</h1></center>


	<div class="col-md-5">
            <table id="bs4-table" class="table table-striped table-bordered" style="width:100%">
			<!-- <table class="table table-default"> -->
				<tr class="danger">

			<a href="{{url('/backend/buku/create')}}"class="btn btn-primary form-control">Tambah Data</a><br><br>
			
			
    
            <thead>
		    <tr class="bg-info">
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
	        </thead>
	        <tbody>
		        @php
		        $no=1;
		        @endphp
		        @foreach($buku as $data)
		            <tr>
			            <td>{{$no++}}</td>
                        <td>{{ $data->buku_kode }}</td>
                        <td>{{ $data->kategori->kategori_nama }}</td>
                        <td>{{ $data->penerbit->penerbit_nama }}</td>
                        <td>{{ $data->buku_judul }}</td>
                        <td>{{ $data->buku_jumlah }}</td>
                        <td>{{ $data->buku_deskripsi }}</td>
                        <td>{{ $data->buku_pengarang }}</td>
                        <td>{{ $data->buku_tahun_terbit }}</td>
			
		                <td><a href="{{route('buku.edit',$data->id)}}" class="btn btn-warning">Update</a></td>	
	                    <td><form action="{{ route('buku.destroy', $data->id) }}" method="post">
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
</center>
@endsections --}}
@extends('layouts.dash')
@section('content')

<style type="text/css">
	th,td{
		text-align: center;
	}
</style>
<center><h1>Data Buku</h1></center>


	<div class="container-fluid">
            <table id="tab" class="table table-striped table-bordered" style="width:100%">
            @role('admin')
            <a href="{{url('/backend/buku/create')}}"class="btn btn-primary form-control">Tambah Data</a><br><br>
            @endrole
            <!-- <table class="table table-default"> -->
			
			
			
    
            <thead>
		    <tr class="bg-info">
		        <th><center>No</center></th>
		        <th>Kode Buku</th>
                <th>Kategori</th>
                <th>Penerbit</th>
                <th>Judul Buku</th>
                <th>Jumlah Buku</th>
                <th>Deskripsi Buku</th>
                <th>Pengarang Buku</th>
                <th>Tahun Terbit Buku</th>
		        <th><center>Action</center></th>
			
		    </tr>
	        </thead>
	        <tbody>
		        @php
		        $no=1;
		        @endphp
		        @foreach($buku as $data)
		            <tr>
			            <td>{{$no++}}</td>
			            <td>{{ $data->buku_kode }}</td>
                        <td>{{ $data->kategori->kategori_nama }}</td>
                        <td>{{ $data->penerbit->penerbit_nama }}</td>
                        <td>{{ $data->buku_judul }}</td>
                        <td>{{ $data->buku_jumlah }}</td>
                        <td>{!! substr($data->buku_deskripsi, 0, 100) !!}</td>
                        <td>{{ $data->buku_pengarang }}</td>
                        <td>{{ $data->buku_tahun_terbit }}</td>
			
		                <td>
                            @role('admin')             
                            <div class="icon-container">
                                <button class="btn-lg"><a  href="{{route('buku.edit',$data->id)}}"><span class="ti-pencil"></span><span class="icon-name"></span></a></button>
                            </div> 
                            @endrole  
                            <div class="icon-container">
                                <button class="btn-lg"><a  href="{{route('buku.show',$data->id)}}"><span class="ti-eye"></span><span class="icon-name"></span></a></button> 
                            </div>
                            @role('admin')
                            <form action="{{ route('buku.destroy', $data->id) }}" method="post">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <div class="icon-container">
                                <button class="btn-lg" type="submit"><span class="ti-trash"></span><span class="icon-name"></span></button>
                            </div>    
                            </form>
                            @endrole
                        </td>    
		            </tr>
		
		        @endforeach
            </tbody>
        </table>
    </div>
</center<h1>


@endsection