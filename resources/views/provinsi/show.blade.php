@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Data Provinsi') }}</div>

                <div class="card-body">
                   <div class="form-group">
                    <div class="mb-12>
                        <label for="exampleInputEmail1" class="form-label">Kode Provinsi</label>
                        <input type="number" name="kode_provinsi" value="{{$provinsi->kode_provinsi}}" 
                        class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" readonly>
                    </div>
                     </div>
                      <div class="form-group">
                    <div class="mb-12>
                        <label for="exampleInputPassword1" class="form-label">Provinsi</label>
                        <input type="text" name="nama_provinsi" value="{{$provinsi->nama_provinsi}}" 
                        class="form-control" id="exampleInputPassword1" readonly>
                    </div>
                     </div>
                     <a href="{{url()->previous()}}" class="btn btn-primary">Kembali</a>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection