@extends('layouts.app')

@section('content')
    <div class="container">
        <ul class="list-group">
            <li class="list-group-item">Username: {{ $user->name }}</li>
            <li class="list-group-item">Full Name: {{ $user->name_last. " " . $user->name_first }}</li>
            <li class="list-group-item">Email: {{ $user->email }}</li>
            <li class="list-group-item">Joined on: {{ $user->created_at }}</li>
            <li class="list-group-item">Access Level: <?php switch($user->access){
                case 0: echo "Basic";break;
                case 1: echo "Moderate";break;
                case 100: echo "Admin";break;
            }  ?></li>
            <li class="list-group-item">Number of posts: {{ $user->postCount }}</li>
        </ul>
        <br>
        <a class="btn btn-primary" href="{{action('UsersController@edit',$user->id)}}">Edit</a>
    </div>
@endsection