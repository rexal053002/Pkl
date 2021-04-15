@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @if (session('message'))
                <div class="alert alert-success" role="alert">
                    {{ session('message') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">{{ __('Data Provinsi') }}
                <a href="{{route('provinsi.create')}}" class="float-right btn btn-success">
                    Add data</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table">
                    <thead>
                      <tr>
                         <th>No</th>
                         <th class="text-center">Kode Provinsi</th>
                         <th class="text-center">Nama Provinsi</th>
                         <th class="text-center">Action</th>
                       </tr>  
                    </thead>
                    <tbody>
                         @php $no= 1; @endphp
                         @foreach($provinsi as $data)
                            <tr>
                                <th scoppe="row">{{$no++}}</th>
                                <td class="text-center">{{$data->kode_provinsi}}</td>
                                <td class="text-center">{{$data->nama_provinsi}}</td>
                                <td><form action="{{route('provinsi.destroy',$data->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{route('provinsi.edit',$data->id)}}" class="float-right btn btn-outline-success">Edit</a>
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
@endsection