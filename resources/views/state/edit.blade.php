@extends('layouts.main')

@section('content')

    <div class="flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">State</h1>
    </div>
<div class="container">
    <div class="row">
        <div class="card mx-auto" style="width:450px;">
            <div class="card-header">
                Edit State
                <a class="float-right m-2" href="{{route('state.index')}}">Back</a>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('state.update', $state->id)}}">
                    @csrf
                    @method('PUT')

                    <div class="row mb-3">
                        
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $state->name) }}" required>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="country_id" class="col-md-4 col-form-label text-md-end">{{ __('Country') }}</label>

                        <div class="col-md-6">
                            <select name="country_id" class="form-control" aria-label="Default select example">
                                <option selected disabled> Select Country </option>

                                @foreach ($countries as $country)
                                    <option value="{{$country->id}}"{{$country->id == $state->country->id ? 'selected' : '' }}>{{$country->name}}</option>  
                                @endforeach
                               
                              </select>

                            @error('country_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Update State') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="container m-3">
            <div class="col-md-12">
                <form method="POST" action="{{route('state.destroy', $state->id)}}">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Delete {{$state->name}}</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection