


@extends('layouts.dash')
@section('content')
<center><h1>Data Peminjaman</h1></center>


	<div class="col-md-12">
            <table id="tab" class="table table-striped table-bordered" style="width:100%">
			<!-- <table class="table table-default"> -->
				

			<a href="{{url('/backend/peminjaman/create')}}"class="btn btn-primary form-control">Tambah Data</a><br><br>
			
			
    
            <thead>
		    <tr class="bg-info">
		        <th><center>No</center></th>
                <th>Kode Peminjaman</th>
                <th>Petugas</th>
                <th>Peminjam</th>
                <th>Tanggal Peminjaman</th>
                <th>Tanggal Harus Kembali Peminjaman</th>
		        <th><center>Action</center></th>
            </tr>
            
	        </thead>
	        <tbody>
		        @php
		        $no=1;
		        @endphp
		        @foreach($peminjaman as $data)
		            <tr>
			            <td>{{$no++}}</td>
                        <td>{{ $data->peminjaman_kode }}</td>
                        <td>{{ $data->petugas->petugas_nama }}</td>
                        <td>{{ $data->peminjam->peminjam_nama }}</td>
                        <td>{{ $data->peminjaman_tgl }}</td>
                        <td>{{ $data->peminjaman_tgl_kembali }}</td>
                       
			
		                <td>
                            @role('admin')
                            <div class="icon-container">
                                    <button class="btn-lg"><a  href="{{route('peminjaman.edit',$data->id)}}"><span class="ti-pencil"></span><span class="icon-name"></span></a></button>
                                </div>   
                            @endrole
                            {{-- <div class="icon-container">
								<button class="btn-lg"><a  href="{{route('peminjaman.show',$data->id)}}"><span class="ti-eye"></span><span class="icon-name"></span></a></button> 
							</div> --}}
                            @role('admin')
                                <form action="{{ route('peminjaman.destroy', $data->id) }}" method="post">
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
</center


@endsection
