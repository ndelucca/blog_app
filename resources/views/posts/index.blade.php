@extends('layouts.app')
@section('navbar')
@include('inc.navbar_posts')
@endsection
@section('content')
<div class="container">
    @include('inc.messages')
    @if(isset($posts) && !empty($posts))
    <ul class="list-group">
        @foreach($posts as $post)
        <li class="list-group-item">
                <div class="post-header post-container">
                    <div class="post-title">
                        {!!$post->title!!}
                    </div>
                    <div class="post-controls">
                        <form enctype="multipart/form-data" method="POST" action="{{ route('posts.destroy',$post->id) }}">
                            @csrf
                            @method('DELETE')
                            <button class="post-btn" type="submit">✘</button>
                        </form>
                        <a href="/posts/{{$post->id}}/edit" class="post-btn">✎</a></td>
                    </div>
                </div>
                
                    
                
                <div class="post post-container">
                    <p>{!!$post->body!!}</p>
                </div>
                <div class="post-footer post-container">
                    <small>Created at {{$post->created_at}} by {{$post->user->name}}</small>
                </div>
        </li>
        @endforeach
    </ul>
    {{$posts->links()}}
    @else
        <div>No posts yet!</div>
    @endif
</div>
@endsection
