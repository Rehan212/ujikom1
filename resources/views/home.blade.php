@extends('layouts.dash')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><center><h2>Halaman</h2> </center>
                    
                </div>

                <div class="card-body">
                    @if (session('status'))                  
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <center>
                        <h1>Selamat datang '{{ Auth::user()->name }}'</h1>
                        <img src="/assets/templet/production/images/welcome.jpeg" width="1000px" height="1000px" alt="..." class="img-circle profile_img">
                    </center>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
