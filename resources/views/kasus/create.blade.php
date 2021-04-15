@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        {{-- @if (session('message'))
                <div class="alert alert-success" role="alert">
                {{ session('message') }}
                </div>
            @elseif(session('message1'))
                <div class="alert alert-danger" role="alert">
                {{ session('message1') }}
                </div>
            @endif --}}
            <div class="card">
                <div class="card-header">{{ __('Tambah Data kasus Lokal') }}

                </div>
                <div class="card-body">
                    <form action="{{route('kasus.store')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col">
                                @livewire('dropdown')
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Positif</label>
                                    <input type="number" name="positif" min="0" class="form-control" required>

                                @if($errors->has('positif'))
                                    <span class="text-danger">{{$errors->first('positif')}}</span>
                                @endif

                                </div>
                                <div class="form-group">
                                    <label for="">Sembuh</label>
                                    <input type="number" name="sembuh" min="0" class="form-control" required>

                                @if($errors->has('sembuh'))
                                    <span class="number">{{$errors->first('positif')}}</span>
                                @endif

                                <div class="form-group">
                                    <label for="">negatif</label>
                                    <input type="number" name="negatif" class="form-control" required>
                                </div>

                                </div>
                                <div class="form-group">
                                    <label for="">meninggal</label>
                                    <input type="number" name="meninggal" min="0" class="form-control" required>

                                @if($errors->has('meninggal'))
                                    <span class="text-danger">{{$errors->first('positif')}}</span>
                                @endif
                                </div>
                                <div class="form-group">
                                    <label for="">Tanggal</label>
                                    <input type="date" name="tanggal" class="form-control" required>
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