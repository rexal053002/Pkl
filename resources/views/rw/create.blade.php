@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Data RW') }}</div>

            {{-- Validasi  --}}
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
                <form  action="{{route('rw.store')}}" method="post">
                    @csrf
                     <div class="form-group">
                        <label for="">Nama kelurahan</label>
                        <select name="id_kelurahan" class="form-control" required>
                            @foreach($kelurahan as $data)
                                <option value="{{$data->id}}">{{$data->nama_kelurahan}}</option>
                            @endforeach
                        </select>
                    </div>
                      <div class="form-group">
                    <div class="mb-12>
                        <label for="exampleInputPassword1" class="form-label">Nama RW</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="nama_rw">
                    </div>
                     </div>
                    <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection