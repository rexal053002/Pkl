@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    HAlo
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- <table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Provinsi</th>
        <th scope="col">Positif</th>
        <th scope="col">Sembuh</th>
        <th scope="col">Meninggal</th>
      </tr>
    </thead>
    <tbody>
      @php
          $no = 1;
      @endphp
      @foreach ($data as $dataCorona)
      <tr>
        <th scope="row">{{ $no++ }}</th>
        <td>{{ $dataCorona['attributes']['provinsi']}}</td>
        <td>{{ $dataCorona['attributes']['positif']}}</td>
        <td>{{ $dataCorona['attributes']['sembuh']}}</td>
        <td>{{ $dataCorona['attributes']['meninggal']}}</td>
      </tr>
      @endforeach
    </tbody>
  </table> --}}