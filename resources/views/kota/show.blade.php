@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Data Kota') }}</div>

                <div class="card-body">
                   <div class="form-group">
                    <div class="mb-12>
                        <label for="exampleInputEmail1" class="form-label">Kode Kota</label>
                        <input type="number" name="kode_kota" value="{{$kota->kode_kota}}" 
                        class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" readonly>
                    </div>

                    <div class="form-group">
                        <label for="">Asal Provinsi</label>
                        <input type="text" name="id_provinsi" class="form-control" value="{{$kota->provinsi->nama_provinsi}}" readonly>
                    </div>

                     </div>
                      <div class="form-group">
                    <div class="mb-12>
                        <label for="exampleInputPassword1" class="form-label">Kota</label>
                        <input type="text" name="nama_kota" value="{{$kota->nama_kota}}" 
                        class="form-control" id="exampleInputPassword1" readonly>
                    </div>
                     </div>
                     <div class="form-group">
                         <div><a href="{{url()->previous()}}" class="btn btn-primary">Kembali</a></div>
                     </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection