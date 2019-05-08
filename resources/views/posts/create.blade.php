@extends('layouts.app')

@section('header')
@endsection

@section('content')
<div class="container">
    <form class="card" enctype="multipart/form-data" method="POST" onsubmit="" accept-charset="UTF-8" action="{{ route('posts.store') }}">
        @csrf
        <fieldset class="form-group row">
            <label for="title">Title</label>
        <input class="form-control" type="text" name="title" id="title" value="{{old('title')}}">
        </fieldset>
        <fieldset class="form-group row">
            <label for="ckeditor">Post</label>
            <textarea class="form-control" rows="6" cols="50" maxlength="300" name="body" id="ckeditor" value="{{old('body')}}"></textarea>
            {{-- <ckeditor :editor="editor" v-model="editorData" :config="editorConfig"></ckeditor> --}}
        </fieldset>
        <fieldset class="form-group row">
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

@section('scripts')

<script>

    
</script>

@endsection