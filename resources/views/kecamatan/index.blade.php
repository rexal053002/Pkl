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
                <div class="card-header">{{ __('Data Kecamatan') }}
                <a href="{{route('kecamatan.create')}}" class="float-right btn btn-success">
                    Add data</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table">
                    <thead>
                      <tr>
                         <th>No</th>      
                         <th class="text-center">Nama Kota</th>
                         <th class="text-center">Nama Kecamatan</th>
                         <th class="text-center">Action</th>
                       </tr>  
                    </thead>
                    <tbody>
                         @php $no= 1; @endphp
                         @foreach($kecamatan as $data)
                            <tr>
                                <th scoppe="row">{{$no++}}</th>
                                <td class="text-center">{{$data->kota->nama_kota}}</td>
                                <td class="text-center">{{$data->nama_kecamatan}}</td>
                                <td><form action="{{route('kecamatan.destroy',$data->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{route('kecamatan.show',$data->id)}}" class="float-right btn btn-outline-primary">Show</a>
                                    <a href="{{route('kecamatan.edit',$data->id)}}" class="float-right btn btn-outline-success">Edit</a>
                                    <button type="submit" class="float-right btn btn-outline-danger" onclick="return confirm('Yakin Hapus?')">Delete</button>
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
    </div>
</div>
</div>
@endsection