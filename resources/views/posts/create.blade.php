@extends('layouts.app')
@section('navbar')
@include('inc.navbar_posts')
@endsection
@section('content')
<div class="container">
    <form class="card" enctype="multipart/form-data" method="POST" accept-charset="UTF-8" action="{{ route('posts.store') }}">
        @csrf
        <fieldset class="form-group row">
            <label for="title">Title</label>
            <input class="form-control" type="text" name="title" id="title">
        </fieldset>
        <fieldset class="form-group row">
            <label for="summary-ckeditor">Post</label>
            <textarea class="form-control" rows="6" cols="50" maxlength="300" name="body" id="summary-ckeditor"></textarea>
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
            <label for="visibility_select">Visibility</label>
            <select id="visibility_select" class="custom-select" name="visibility">
                @include('posts.inc.visibility_options',['visibility' => 'public'])
            </select>
        </fieldset>
        <fieldset class="form-group row">
            <button class="btn btn-primary" type="submit">Submit</button>
        </fieldset>
    </form>
</div>
@endsection