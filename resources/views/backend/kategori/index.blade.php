
@extends('layouts.admin')
@section('content')
<center><h1>Data Kategori</h1></center>


	<div class="col-md-12">
            <table id="bs4-table" class="table table-striped table-bordered" style="width:100%">
			<!-- <table class="table table-default"> -->
				<tr class="danger">

			<a href="{{url('/backend/kategori/create')}}"class="btn btn-primary form-control">Tambah Data</a><br><br>
			
			
    
            <thead>
		    <tr class="bg-info">
		        <th><center>No</center></th>
		        <th>Kode Kategori</th>
                <th>Nama Kategori</th>
		        <th colspan="3"><center>Action</center></th>
			
		    </tr>
	        </thead>
	        <tbody>
		        @php
		        $no=1;
		        @endphp
		        @foreach($kategori as $data)
		            <tr>
			            <td>{{$no++}}</td>
			            <td>{{ $data->kategori_kode }}</td>
                        <td>{{ $data->kategori_nama }}</td>   
			
			
		                <td><a href="{{route('kategori.edit',$data->id)}}" class="btn btn-warning">Update</a></td>	
	                    <td><form action="{{ route('kategori.destroy', $data->id) }}" method="post">
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