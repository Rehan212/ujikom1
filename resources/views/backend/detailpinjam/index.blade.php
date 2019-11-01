
@extends('layouts.dash')
@section('content')
<style type="text/css">
	th,td{
		text-align: center;
	}
</style>
<center><h1>Data Detail Pinjam</h1></center>


	<div class="col-md-12">
            <table id="tab" class="table table-striped table-bordered" style="width:100%">
			<!-- <table class="table table-default"> -->

			<a href="{{url('/backend/detailpinjam/create')}}"class="btn btn-primary form-control">Tambah Data</a><br><br>
			
			
    
            <thead>
		    <tr class="bg-info">
		        <th>No</th>
                <th>Kode Detail Peminjaman</th>
                <th>Peminjaman Kode</th>
                <th>Judul Buku</th>
                <th>Detail Status Kembali</th>
                <th>Detail Tanggal Kembali</th>
				<th>Detail Denda</th>
		        <th><center>Action</center></th>
			
		    </tr>
	        </thead>
	        <tbody>
		        @php
		        $no=1;
		        @endphp
		        @foreach($detailpinjam as $data)
		            <tr>
			            <td>{{$no++}}</td>
			            <td>{{ $data->detailpinjam_kode }}</td>
                        <td>{{ $data->peminjaman->peminjaman_kode }}</td>
                        <td>{{ $data->buku->buku_judul }}</td>
                        <td>{{ $data->detail_status_kembali }}</td>
                        <td>{{ $data->peminjaman->peminjaman_tgl_kembali }}</td>
						<td>{{ $data->detail_denda }}</td>
			
	                    <td>              
							@role('admin')
								<div class="icon-container">
									<button class="btn-lg"><a  href="{{route('detailpinjam.edit',$data->id)}}"><span class="ti-pencil"></span><span class="icon-name"></span></a></button>
								</div> 
							@endrole	
								{{-- <div class="icon-container">
									<button class="btn-lg"><a  href="{{route('detailpinjam.show',$data->id)}}"><span class="ti-eye"></span><span class="icon-name"></span></a></button> 
								</div> --}}
							@role('admin')	
								<form action="{{ route('detailpinjam.destroy', $data->id) }}" method="post">
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