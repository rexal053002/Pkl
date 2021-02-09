@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Data Kasus Lokal') }}</div>

                <div class="card-body">
                     <div class="form-group">
                        <label for="">RW</label>
                        <input type="text" name="id_rw" class="form-control" value="{{$kasus->rw->nama_rw}}" value="{{'kasus->'}}"readonly>
                    </div>
                      <div class="form-group">
                    <div class="mb-12>
                        <label for="exampleInputPassword1" class="form-label">Positif</label>
                        <input type="number" class="form-control" id="exampleInputPassword1" name="positif"
                         value="{{$kasus->positif}}"readonly>
                    </div>
                     </div>
                     <div class="form-group">
                    <div class="mb-12>
                        <label for="exampleInputPassword1" class="form-label">Sembuh</label>
                        <input type="number" class="form-control" id="exampleInputPassword1" name="sembuh"
                        value="{{$kasus->sembuh}}" readonly>
                    </div>
                     </div>
                     <div class="form-group">
                    <div class="mb-12>
                        <label for="exampleInputPassword1" class="form-label">Meninggal</label>
                        <input type="number" class="form-control" id="exampleInputPassword1" name="meninggal"
                        value="{{$kasus->meninggal}}" readonly>
                    </div>
                     </div>
                     <div class="form-group">
                    <div class="mb-12>
                        <label for="exampleInputPassword1" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" id="exampleInputPassword1" name="tanggal"
                        value="{{$kasus->tanggal}}" readonly>
                    </div>
                     </div>
                     <div><a href="{{url()->previous()}}" class="btn btn-primary">Kembali</a></div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection