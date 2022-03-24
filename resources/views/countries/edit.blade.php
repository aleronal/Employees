@extends('layouts.main')

@section('content')

    <div class="flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Country</h1>
    </div>

    @if (session()->has('message'))
        <div class="alert alert-danger">{{ session('message') }}</div>
    @endif

    <div class="row">
        <div class="card mx-auto">
            <div class="card-header">
                Edit Country
                <a class="float-right m-2" href="{{route('country.index')}}">Back</a>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('country.update',$country->id)}}">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$country->name}}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="country_code" class="col-md-4 col-form-label text-md-end">{{ __('Country Code') }}</label>

                        <div class="col-md-6">
                            <input id="country_code" type="text" class="form-control @error('country_code') is-invalid @enderror" name="country_code" value="{{$country->country_code }}" required autocomplete="country_code" autofocus>

                            @error('country_code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Update Country') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            
        </div>
            </div>
    
    </div>
    <div class="container m-3">
        <div class="col-md-12">
            <form method="POST" action="{{route('country.destroy', $country->id)}}">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">Delete {{$country->name}}</button>
            </form>
        </div>
    </div>
</div>
   
@endsection