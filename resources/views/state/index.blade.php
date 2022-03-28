@extends('layouts.main')

@section('content')

    <div class="flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">State</h1>
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
                <a class="float-right" href="{{ route('state.create') }}">Create</a>
                <div class="row">
                    <div class="col">
                    <form method="GET" action="{{route('state.index')}}">
                            <div class="form-row align-items-center">
                              <div class="col-auto">
                                <label class="sr-only" for="inlineFormInput">Name</label>
                                <input type="search" name="search" class="form-control mb-2" id="inlineFormInput" placeholder="Jane Doe">
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
                        <th scope="col">Country Id</th>
                        <th scope="col">Manage</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($states as $state)
                    <tr>
                    <th scope="row">{{$state->id}}</th>
                            <td>{{$state->name}}</td>
                            <td>{{$state->country_code}}</td>
                            <td>
                                <a class='btn btn-sm btn-warning' href="{{route('state.edit', $state->id)}}">Edit</a>
                             
                            </td>
                        @endforeach
                        
                    </tr>
                    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection