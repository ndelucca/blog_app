@extends('layouts.app')
@section('navbar')
@include('inc.navbar_posts')
@endsection
@section('content')
<div class="container">
    <form class="card" enctype="multipart/form-data" method="POST" action="{{ route('posts.update',$post->id) }}">
        @csrf
        @method('PUT')
        <fieldset class="form-group row">
            <label for="title">Title</label>
            <input class="form-control" type="text" name="title" id="title" value="{{$post->title}}">
        </fieldset>
        <fieldset class="form-group row">
            <label for="body">Post</label>
            <textarea class="form-control" rows="6" cols="50" maxlength="300" name="body" id="body">{!!$post->body!!}</textarea>
        </fieldset>
        <fieldset class="form-group row" hidden>
            <label for="file_img">File</label>
            <input type="file" name="file_img" id="file_img" accept=".png,.jpg,.gif">
        </fieldset>
        <fieldset class="form-group row" hidden>
            <label for="file_music">File</label>
            <input type="file" name="file_music" id="file_music" accept=".mp3">
        </fieldset>
        <fieldset class="form-group row" hidden>
            <label for="file_video">File</label>
            <input type="file" name="file_video" id="file_video" accept=".mp4,.avi">
        </fieldset>
        <fieldset class="form-group row">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="user_only" id="user_only" {{($post->user_only) == 1 ? "checked" : ""}}>
                <label class="form-check-label" for="user_only">User Only</label>
            </div>
        </fieldset>
        <fieldset class="form-group row">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="public" id="public" {{($post->public == 1) ? "checked" : ""}}>
                <label class="form-check-label" for="public">Public Post</label>
            </div>
        </fieldset>
        <fieldset class="form-group row">
            <button class="btn btn-primary" type="submit">Submit</button>
        </fieldset>
    </form>
</div>
@endsection