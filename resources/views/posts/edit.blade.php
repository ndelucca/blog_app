@extends('layouts.app')

@section('header')
    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
@endsection

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
            <label for="summary-ckeditor">Post</label>
            <textarea class="form-control" rows="6" cols="50" maxlength="300" name="body" id="summary-ckeditor">{!!$post->body!!}</textarea>
        </fieldset>
        <fieldset class="form-group row">
            <label for="file_img">File</label>
            @if($post->file_type == "img")
                <a style="margin: 10px 0;" href="/storage/file_img/{{$post->file}}"><img style="width:100%;text-align:center;" src="/storage/file_img/{{$post->file}}"></a>
                <h6 style="color:orangered">Post can only store one image. New images overrides older ones.</h6>
                <input type="hidden" name="old_file_img" value="{{$post->file}}">
            @else
                <input type="hidden" name="old_file_img" value="0">
            @endif
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
                    @include('posts.inc.visibility_options',['visibility' => $post->visibility])
                </select>
            </fieldset>
        <fieldset class="form-group row">
            <button class="btn btn-primary" type="submit">Submit</button>
        </fieldset>
    </form>
</div>
@endsection

@section('scripts')
    <script>
        CKEDITOR.replace( 'summary-ckeditor' );
    </script>
@endsection