
@extends('layouts.dash')
@section('content')
@role('admin')
<center><h1>Data Kategori</h1></center>


	<div class="col-md-12">
            <table id="tab" class="table table-striped table-bordered" style="width:100%">
			<!-- <table class="table table-default"> -->
				

			<a href="{{url('/backend/kategori/create')}}"class="btn btn-primary form-control">Tambah Data</a><br><br>
			
			
    
            <thead>
		    <tr class="bg-info">
		        <th><center>No</center></th>
		        <th>Kode Kategori</th>
                <th>Nama Kategori</th>
		        <th><center>Action</center></th>
			
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
			
		               
						<td>
								<div class="icon-container">
										<button class="btn-lg"><a  href="{{route('kategori.edit',$data->id)}}"><span class="ti-pencil"></span><span class="icon-name"></span></a></button>
									</div>   
							   
									<form action="{{ route('kategori.destroy', $data->id) }}" method="post">
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
@endrole