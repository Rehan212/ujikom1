@extends('layouts.dash')
@section('content')
<style type="text/css">
	th,td{
		text-align: center;
	}
</style>
<center><h1>Data Petugas</h1></center>


	<div class="col-md-12">
			<a href="{{url('/backend/petugas/create')}}" class="btn btn-primary form-control">Tambah Data</a><br><br>
            <table id="tab" class="table  table-striped table-bordered" style="width:100%">
			<!-- <table class="table table-default"> -->    
            <thead>
		    <tr class="bg-info">
		        <th><center>No</center></th>
		        <th><center>Kode petugas</center></th>
		        <th><center>Nama petugas</center></th>
				<th>Aksi</th>
				
		    </tr>
	        </thead>
	        <tbody>
		        @php
		        $no=1;
		        @endphp
		        @foreach($petugas as $petugas)
		            <tr>
			            <td>{{$no++}}</td>
			            <td>{{$petugas->petugas_kode}}</td>
			            <td>{{$petugas->petugas_nama}}</td>
			
						<td>              
                            <div class="icon-container">
                                <button class="btn-lg"><a  href="{{route('petugas.edit',$petugas->id)}}"><span class="ti-pencil"></span><span class="icon-name"></span></a></button>
                            </div>   
                        
                            <form action="{{ route('petugas.destroy', $petugas->id) }}" method="post">
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