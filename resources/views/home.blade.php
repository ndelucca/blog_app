@extends('layouts.app')

@section('content')
<div class="container">    
    @if(isset($posts) && !empty($posts))
    <ul class="list-group">
        @foreach($posts as $post)
        <li class="list-group-item">
            <div class="post-header post-container">
                <div class="post-title">
                    {!!$post->title!!}
                </div>
                <div class="post-controls">
                    @if(auth()->user()->id == $post->user_id)
                    <form enctype="multipart/form-data" method="POST" action="{{ route('posts.destroy',$post->id) }}">
                        @csrf
                        @method('DELETE')
                        <button class="post-btn" type="submit">✘</button>
                    </form>
                    <a href="/posts/{{$post->id}}/edit" class="post-btn">✎</a></td>
                    @endif
                </div>
            </div>
            <div class="post post-container">
                <p>{!!$post->body!!}</p>
            </div>
            @if($post->file_type == "img")
            <div class="post-container">
                <a href="/storage/file_img/{{$post->file}}"><img style="width:100%;text-align:center;" src="/storage/file_img/{{$post->file}}"></a>
            </div>
            @endif
            
            <div class="post-footer post-container">
                <small>Created at {{$post->created_at}} by <a href="{{ action('UsersController@show',$post->user->id)}}">{{$post->user->name}}</a></small>
            </div>
        </li>
        @endforeach
    </ul>
    {{$posts->links()}}
    @else
        <h3 class="logo" style="text-align: center"></h3>
    @endif
</div>
@endsection
