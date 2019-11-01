
@extends('layouts.dash')
@section('content')
<style type="text/css">
	th,td{
		text-align: center;
	}
</style>
<center><h1>Data Kartu Pendaftaran</h1></center>


	<div class="col-md-12">
            <table id="tab" class="table table-striped table-bordered" style="width:100%">
			<!-- <table class="table table-default"> -->
				

			<a href="{{url('/backend/kartupendaftaran/create')}}"class="btn btn-primary form-control">Tambah Data</a><br><br>
			
			
    
            <thead>
		    <tr class="bg-info">
		        <th>No</th>
                    <th>Kode kartu</th>
                    <th>Petugas</th>
                    <th>Peminjam</th>
                    <th>Tanggal Pembuatan Kartu</th>
                    <th>Tanggal Akhir Kartu</th>
                    <th>Status Aktif Kartu</th>
		            <th><center>Action</center></th>
			
		    </tr>
	        </thead>
	        <tbody>
		        @php
		        $no=1;
		        @endphp
		        @foreach($kartu as $data)
		            <tr>
			        <td>{{ $no++ }}</td>
                    <td>{{ $data->kartupendaftaran_kode }}</td>
                    <td>{{ $data->petugas->petugas_nama }}</td>
                    <td>{{ $data->peminjam->peminjam_nama }}</td>
                    <td>{{ $data->kartu_tanggal_pembuatan }}</td>
                    <td>{{ $data->kartu_tanggal_akhir}}</td>
                    <td>{{ $data->kartu_status_aktif }}</td>
                    <td>
                        @role('admin')    
                        <div class="icon-container">
                                <button class="btn-lg"><a  href="{{route('kartupendaftaran.edit',$data->id)}}"><span class="ti-pencil"></span><span class="icon-name"></span></a></button>
                            </div>   
                       
                            <form action="{{ route('kartupendaftaran.destroy', $data->id) }}" method="post">
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