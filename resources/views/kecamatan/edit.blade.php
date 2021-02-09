@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Data Kecamatan') }}</div>

            {{-- Validasi --}}
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

                <div class="card-body">
                    
                    <form action="{{ route('kecamatan.update', $kecamatan->id)}}" method="POST" >
                        @csrf
                        @method('PUT')
                        
                        <div class="form-group">
                            <label for="">Nama Kota</label>
                            <select name="id_kota" class="form-control" required>
                                @foreach($kota as $data)
                                <option value="{{$data->id}}"
                                    {{$data->id == $kecamatan->id_kota ? "selected":""}}>{{$data->nama_kota}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <div class="mb-12>
                                <label for="exampleInputPassword1" class="form-label">kecamatan</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" name="nama_kecamatan"
                                value="{{$kecamatan->nama_kecamatan}}">
                            </div>
                             </div>

                        <button type="submit" class="btn btn-primary">Edit Data</button>
                      </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection