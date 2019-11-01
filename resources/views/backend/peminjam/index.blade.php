

@extends('layouts.dash')
@section('content')
<center><h1>Data Peminjam</h1></center>


	<div class="col-md-12">
            <table id="tab" class="table table-striped table-bordered" style="width:100%">
			<!-- <table class="table table-default"> -->
				

			<a href="{{url('/backend/peminjam/create')}}"class="btn btn-primary form-control">Tambah Data</a><br><br>
			
			
    
            <thead>
		    <tr class="bg-info">
		        <th><center>No</center></th>
                <th>Kode Peminjam</th>
                <th>Nama Peminjam</th>
                <th>Alamat Peminjam</th>
                <th>Telp Peminjam</th>
                <th>Foto Peminjam</th>
		        <th><center>Action</center></th>
			
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
                        <td>{{ $data->peminjam_tlpn }}</td>
                        <td><img src="{{ asset('assets/img/peminjam/'.$data->peminjam_foto) }}" alt="" height="100px" width="100px"></td>       
			
		                <td>
							@role('admin')
								<div class="icon-container">
										<button class="btn-lg"><a  href="{{route('peminjam.edit',$data->id)}}"><span class="ti-pencil"></span><span class="icon-name"></span></a></button>
									</div>   
							@endrole 
							<div class="icon-container">
									<button class="btn-lg"><a  href="{{route('peminjam.show',$data->id)}}"><span class="ti-eye"></span><span class="icon-name"></span></a></button> 
								</div>
							@role('admin')
									<form action="{{ route('peminjam.destroy', $data->id) }}" method="post">
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