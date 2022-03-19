@extends('layouts.main')

@section('content')

    <div class="flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Users</h1>
    </div>

    <div class="row">
        <div class="card mx-auto">
            <div class="card-header">
                <a class="float-right" href="{{ route('users.create') }}">Create</a>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#Id</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Manage</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        @foreach ($users as $user)
                    <th scope="row">{{$user->id}}</th>
                            <td>{{$user->username}}</td>
                            <td>{{$user->email}}</td>
                            <td>Edit/Delete</td>
                        @endforeach
                        
                    </tr>
                    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection