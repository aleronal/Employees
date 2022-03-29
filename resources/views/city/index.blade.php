@extends('layouts.main')

@section('content')

    <div class="flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">City</h1>
    </div>

    <div class="row">
        <div class="card mx-auto">
            <div>
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{session('message')}}
                    </div>
                @endif
            </div>

            <div class="card-header">
                <a class="float-right" href="{{ route('city.create') }}">Create</a>
                <div class="row">
                    <div class="col">
                    <form method="GET" action="{{route('city.index')}}">
                            <div class="form-row align-items-center">
                              <div class="col-auto">
                                <label class="sr-only" for="inlineFormInput">Name</label>
                                <input type="search" name="search" class="form-control mb-2" id="inlineFormInput" placeholder="Ohio">
                              </div>
                              <div class="col-auto">
                                <button type="submit" class="btn btn-primary mb-2">Search</button>
                              </div>
                            </div>
                          </form>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">State Name</th>
                        <th scope="col">Manage</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($cities as $city)
                    <tr>
                    <th scope="row">{{$city->id}}</th>
                            <td>{{$city->name}}</td>
                            <td>{{$city->state->name}}</td>
                            <td>
                                <a class='btn btn-sm btn-warning' href="{{route('city.edit', $city->id)}}">Edit</a>
                             
                            </td>
                        @endforeach
                        
                    </tr>
                    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection