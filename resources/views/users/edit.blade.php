@extends('layouts.app')

@section('header')
@endsection

@section('content')
<div class="container">
    <form class="card" enctype="multipart/form-data" method="POST" action="{{ route('users.update',$user->id) }}">
        @csrf
        @method('PUT')
        <fieldset class="form-group row">
            <label for="title">User name</label>
            <input class="form-control" type="text" name="name" id="name" value="{{$user->name}}">
        </fieldset>
        <fieldset class="form-group row">
            <label for="title">First name</label>
            <input class="form-control" type="text" name="name_first" id="name_first" value="{{$user->name_first}}">
        </fieldset>
        <fieldset class="form-group row">
            <label for="title">Last name</label>
            <input class="form-control" type="text" name="name_last" id="name_last" value="{{$user->name_last}}">
        </fieldset>
        <fieldset class="form-group row">
            <label for="title">Email</label>
            <input class="form-control" type="text" name="email" id="email" value="{{$user->email}}">
        </fieldset>
        <fieldset class="form-group row">
            <button class="btn btn-primary" type="submit">Submit</button>
        </fieldset>
    </form>
</div>
@endsection

@section('scripts')

@endsection