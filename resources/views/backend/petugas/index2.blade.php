@section('content')
<section class="page-content container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <h5 class="card-header"><center><h3>Data Tables Petugas</h3></center></h5><br>
                <center>
                        <a href="{{ route('petugas.create') }}"
                            class="la la-cloud-upload btn btn-info btn-rounded btn-floating btn-outline">&nbsp;Tambah Data
                        </a>
                </center>
                <div class="card-body">
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Petugas</th>
                                <th>Nama Petugas</th>
                                <th style="text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                                @php $no =1; @endphp
                            @foreach ($petugas as $data)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{$data->petugas_kode}}</td>
                                <td>{{$data->petugas_nama}}</td>

								<td style="text-align: center;">
                                    <form action="{{route('petugas.destroy', $data->id)}}" method="post">
                                        {{csrf_field()}}
									<a href="{{route('petugas.edit', $data->id)}}"
										class="zmdi zmdi-edit btn btn-warning btn-rounded btn-floating btn-outline"> Edit
									</a>
                                        {{-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; --}}
										<input type="hidden" name="_method" value="DELETE">
										<button type="submit" class="zmdi zmdi-delete  btn-rounded btn-floating btn btn-dangerbtn btn-danger btn-outline"> Delete</button>
									</form>
								</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection