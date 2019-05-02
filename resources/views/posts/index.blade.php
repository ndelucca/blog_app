@extends('layouts.app')
@section('navbar')
@include('inc.navbar_posts')
@endsection
@section('content')
<div class="container">
    @include('inc.messages')
    <ul class="list-group">
        @foreach($posts as $post)
        <li class="list-group-item">
            <?php //<h4><a href="/posts/{{$post->id}}">{!!$post->title!!}</a></h4> ?>
            <h4>{!!$post->title!!}</h4>
            <p>{!!$post->body!!}</p>
            <small>Created at {{$post->created_at}}</small>
            <div class="edit-remove-container">
                <form enctype="multipart/form-data" method="POST" action="{{ route('posts.destroy',$post->id) }}">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">✘</button>
                </form>
                <a href="/posts/{{$post->id}}/edit" class="btn btn-primary">✎</a></td>
            </div>
        </li>
        @endforeach
    </ul>
    {{$posts->links()}}
</div>
@endsection
