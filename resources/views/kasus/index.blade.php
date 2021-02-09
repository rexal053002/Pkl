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
                <div class="card-header">{{ __('Data kasus Local') }}
                <a href="{{route('kasus.create')}}" class="float-right btn btn-success">
                    Add data</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table">
                    <thead>
                      <tr>
                         <th>No</th>
                         <th class="text-center">Detail Data</th>      
                         <th >Nama RW</th>
                         <th class="text-center">Positif</th>
                         <th class="text-center">Sembuh</th>
                         <th class="text-center">Meninggal</th>
                         <th class="text-center">Tanggal</th>
                         <th class="text-center">Action</th>
                       </tr>  
                    </thead>
                    <tbody>
                         @php $no= 1; @endphp
                         @foreach($kasus as $data)
                            <tr>
                                <th scoppe="row">{{$no++}}</th>
                                <td>
                                    Provinsi: >  {{$data->rw->kelurahan->kecamatan->kota->provinsi->nama_provinsi}} <br>
                                    Provinsi: >  {{$data->rw->kelurahan->kecamatan->kota->nama_kota}} <br>
                                    Provinsi: >  {{$data->rw->kelurahan->kecamatan->nama_kecamatan}} <br>
                                    Provinsi: >  {{$data->rw->kelurahan->nama_kelurahan}} <br>
                                </td>


                                <td>{{$data->rw->nama_rw}}</td>
                                <td class="text-center">{{$data->positif}}</td>
                                <td class="text-center">{{$data->sembuh}}</td>
                                <td class="text-center">{{$data->meninggal}}</td>
                                <td class="text-center">{{$data->tanggal}}</td>
                                <td><form action="{{route('kasus.destroy',$data->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{route('kasus.show',$data->id)}}" class=" btn btn-outline-primary">Show</a>
                                    <a href="{{route('kasus.edit',$data->id)}}" class=" btn btn-outline-success">Edit</a>
                                    <button type="submit" class=" btn btn-outline-danger" onclick="return confirm('Yakin Hapus?')">Delete</button>
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