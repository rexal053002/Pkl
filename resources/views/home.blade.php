@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <hr><b><center><h3> Selamat Datang di Halaman Admin KawalCorona </h3></center></b>
                    <hr>
                    <b><center><h3>{{Auth::user()->name}}</center></h3></b>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection