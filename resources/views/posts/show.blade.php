@extends('layouts.app')
@section('navbar')
@include('inc.navbar_posts')
@endsection
@section('content')

    <h3>{{$post->title}}</h3>

    <div>
        {!!$post->body!!}
    </div>
    <hr>
    <small>Written on {{$post->created_at}}</small>


@endsection