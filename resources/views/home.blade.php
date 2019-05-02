@extends('layouts.app')
@section('navbar')
@include('inc.navbar')
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header"></div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <a href="/posts" class="btn btn-primary">My Posts</a>
            </div>
        </div>
    </div>
</div>
@endsection
