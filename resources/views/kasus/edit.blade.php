@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        @if (session('message'))
                <div class="alert alert-success" role="alert">
                {{ session('message') }}
                </div>
            @elseif(session('message1'))
                <div class="alert alert-danger" role="alert">
                {{ session('message1') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">{{ __('Edit Data kasus Local') }}

                </div>
                <div class="card-body">
                    <form action="{{route('kasus.update', $kasus->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col">
                                @livewire('dropdown', ['selectedRw'=>$kasus->id_rw, 'selectedKelurahan'=>$kasus->rw->id_kelurahan,
                                'selectedKecamatan'=>$kasus->rw->kelurahan->id_kecamatan, 'selectedKota'=>$kasus->rw->kelurahan->kecamatan->id_kota,
                                'selectedProvinsi'=>$kasus->rw->kelurahan->kecamatan->kota->id_provinsi])
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Positif</label>
                                    <input type="number" name="positif" class="form-control" value="{{$kasus->positif}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Sembuh</label>
                                    <input type="number" name="sembuh" class="form-control" value="{{$kasus->sembuh}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="">meninggal</label>
                                    <input type="number" name="meninggal" class="form-control" value="{{$kasus->meninggal}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Tanggal</label>
                                    <input type="date" name="tanggal" class="form-control" value="{{$kasus->tanggal}}" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Save</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection