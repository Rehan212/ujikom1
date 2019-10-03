
@extends('layouts.admin')
@section('content')
<style type="text/css">
	th,td{
		text-align: center;
	}
</style>
<center><h1>Data Detail Pinjam</h1></center>


	<div class="col-md-12">
            <table id="bs4-table" class="table table-striped table-bordered" style="width:100%">
			<!-- <table class="table table-default"> -->
				<tr class="danger">

			<a href="{{url('/backend/detailpinjam/create')}}"class="btn btn-primary form-control">Tambah Data</a><br><br>
			
			
    
            <thead>
		    <tr class="bg-info">
		        <th>Kode Buku</th>
                <th>Kategori</th>
                <th>Penerbit</th>
                <th>Judul Buku</th>
                <th>Jumlah Buku</th>
                <th>Deskripsi Buku</th>
                <th>Pengarang Buku</th>
                <th>Tahun Terbit Buku</th>
		        <th colspan="3"><center>Action</center></th>
			
		    </tr>
	        </thead>
	        <tbody>
		        @php
		        $no=1;
		        @endphp
		        @foreach($detailpinjam as $detailpinjam)
		            <tr>
			            <td>{{$no++}}</td>
			            <td>{{$detailpinjam->detailpinjam_kode}}</td>
			            <td>{{$detailpinjam->detailpinjam_nama}}</td>
			
			
		                <td><a href="{{route('detailpinjam.edit',$detailpinjam->id)}}" class="btn btn-warning">Update</a></td>	
	                    <td><form action="{{ route('detailpinjam.destroy', $detailpinjam->id) }}" method="post">
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