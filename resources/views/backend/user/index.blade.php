
@extends('layouts.dash')
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
			
			
		                <td>
                                <div class="icon-container">
                                        <button class="btn-lg"><a  href="{{route('user.edit',$data->id)}}"><span class="ti-pencil"></span><span class="icon-name"></span></a></button>
                                    </div>   
                            
                                    <form action="{{ route('user.destroy', $data->id) }}" method="post">
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