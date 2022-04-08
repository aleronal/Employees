@extends('layouts.main')

@section('content')

<div class="container">
    <div class="row">
@foreach ($value as $item => $value)

    <div class="col-md-4 m-3">
      <div class="card" style="width: 18rem;">
          <div class="card-body">
            <h5 class="card-title">{{$value['id']}}</h5>
            <p class="card-text">{{$value['text']}}</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
      </div>

@endforeach
    </div>
  </div>

  
@endsection