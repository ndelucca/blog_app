@extends('layouts.app')
@section('navbar')
@include('inc.navbar_posts')
@endsection
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
        </ul>
    </div>
@endsection