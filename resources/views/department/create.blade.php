@extends('layouts.main')

@section('content')

    <div class="flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Department</h1>
    </div>
<div class="container">
    <div class="row">
        <div class="card mx-auto" style="width:450px;">
            <div class="card-header">
                Create New Department
                <a class="float-right m-2" href="{{route('department.index')}}">Back</a>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('department.store')}}">
                    @csrf

                    <div class="row mb-3">
                        
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    

                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Store Department') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection