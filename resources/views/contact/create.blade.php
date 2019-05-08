@extends('layouts.app')

@section('header')
@endsection

@section('content')
<div class="container">
    <section id="introduction">
        <h3 class="logo" style="text-align: center">
            Want to get in touch with me?
            <br>
            Feel free to write!
        </h3>
    </section>
    <form class="card" method="POST" accept-charset="UTF-8" action="{{ action('ContactFormController@store') }}">
        @csrf
        <fieldset class="form-group row">
            <label for="name">Name</label>
            <input class="form-control" type="text" name="name" id="name" value="{{old('name')}}">
        </fieldset>
        <fieldset class="form-group row">
                <label for="email">Email</label>
                <input class="form-control" type="text" name="email" id="email" value="{{old('email')}}">
            </fieldset>
        <fieldset class="form-group row">
            <label for="message">Message</label>
            <textarea class="form-control" rows="6" cols="50" maxlength="300" name="message" id="message">{{old('message')}}</textarea>
        </fieldset>
        <fieldset class="form-group row">
            <button class="btn btn-primary" type="submit">Submit</button>
        </fieldset>
    </form>
</div>
@endsection
