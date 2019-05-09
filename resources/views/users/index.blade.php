@extends('layouts.app')

@section('content')
<div class="container">    
    @if(isset($users) && !empty($users))
    <table class="table table-striped table-hover">
            <thead class="">
              <tr>
                <th scope="col">id</th>
                <th scope="col">Nick</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Email</th>
                <th scope="col">Access</th>
                <th scope="col">Banned</th>
                <th scope="col">Created</th>
                <th scope="col">Updated</th>
                @if(auth()->user()->access === 100)
                    <th scope="col">Actions</th>
                @endif
              </tr>
            </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->name_first }}</td>
            <td>{{ $user->name_last }}</td>
            <td>{{ $user->email }}</td>
            <td><?php
            switch($user->access){
                case 0: echo "Basic";break;
                case 1: echo "Moderate";break;
                case 100: echo "Admin";break;
            }  
            ?></td>
            <td>{{ $user->banned ? "YES" : "NO"}}</td>
            <td>{{ $user->created_at }}</td>
            <td>{{ $user->updated_at }}</td>
            @if(auth()->user()->access === 100)
                <td><a href="{{action('UsersController@edit',$user->id)}}">Edit</a></td>
            @endif
        </tr>
        @endforeach
    </tbody>
    @endif
</div>
@endsection
