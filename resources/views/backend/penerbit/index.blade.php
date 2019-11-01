
@extends('layouts.dash')
@section('content')
<style type="text/css">
	th,td{
		text-align: center;
	}
</style>
<center><h1>Data Penerbit</h1></center>


	<div class="col-md-12">
            <table id="bs4-table" class="table table-striped table-bordered" style="width:100%">
			<!-- <table class="table table-default"> -->
				<tr class="danger">

			<a href="{{url('/backend/penerbit/create')}}"class="btn btn-primary form-control">Tambah Data</a><br><br>
			
			
    
            <thead>
		    <tr class="bg-info">
		        <th><center>No</center></th>
		        <th>Kode Penerbit</th>
                <th>Nama Penerbit</th>
                <th>Alamat Penerbit</th>
                <th>Telp Penerbit</th>
		        <th colspan="3"><center>Action</center></th>
			
		    </tr>
	        </thead>
	        <tbody>
		        @php
		        $no=1;
		        @endphp
		        @foreach($penerbit as $data)
		            <tr>
			            <td>{{$no++}}</td>
                        <td>{{ $data->penerbit_kode }}</td>
                        <td>{{ $data->penerbit_nama }}</td>
                        <td>{{ $data->penerbit_alamat }}</td>
                        <td>{{ $data->penerbit_tlpn }}</td>  
		                <td>
                                <div class="icon-container">
                                        <button class="btn-lg"><a  href="{{route('penerbit.edit',$data->id)}}"><span class="ti-pencil"></span><span class="icon-name"></span></a></button>
                                    </div>   
                            
                                    <form action="{{ route('penerbit.destroy', $data->id) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <div class="icon-container">
                                        <button class="btn-lg" type="submit"><span class="ti-trash"></span><span class="icon-name"></span></button>
                                    </div>    
                                    </form>
                            </td>        
		            </tr>
		
		        @endforeach
            </tbody>
        </table>
    </div>
</center<h1>


@endsection