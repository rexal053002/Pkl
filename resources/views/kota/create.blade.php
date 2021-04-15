@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tambah Data Kota') }}</div>

                {{-- Validasi  --}}

                <div class="card-body">
                    
                    <form action="{{ route('kota.store')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Kode Kota</label>
                          <input type="text" name="kode_kota" class="form-control" id="exampleInputEmail1" 
                          aria-describedby="emailHelp">

                          @if($errors->has('kode_kota'))
                            <span class="text-danger">{{$errors->first('kode_kota')}}</span>
                        @endif

                          <div id="emailHelp" class="form-text"></div>
                        </div>

                        <div class="form-group">
                            <label for="">Nama Provinsi</label>
                            <select name="id_provinsi" class="form-control" required>
                                @foreach($provinsi as $data)
                                    <option value="{{$data->id}}">{{$data->nama_provinsi}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label">Nama Kota</label>
                          <input type="text" name="nama_kota"  class="form-control" id="exampleInputPassword1">

                          @if($errors->has('nama_kota'))
                            <span class="text-danger">{{$errors->first('kode_kota')}}</span>
                        @endif
                        
                        </div>
                        <button type="submit" class="btn btn-primary">Add Data</button>
                      </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection