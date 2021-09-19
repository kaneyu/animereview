@extends('layouts.app')
@section('content')
<header>
    <ul>
        <li><a href="">今期アニメ</a></li>
        <li><a href="">歴代アニメ</a></li>
        <li><a href="">ランキング</a></li>
    </ul>
</header>
<div>
    
    <h2>{{ $post->anime_name}}</h2>
    <button>コメントを書く</button>
    @if (Auth::check())
    @if (App\Favorate::where('user_id',Auth::id())->where('post_id',$post->id)->exists())
    <form action="/favorate/destroy/{{ $post->id }}" method="POST" class="mb-4" >
    <input type="hidden" name="post_id" value="{{ $post->id }}">
    @csrf
    @method('DELETE')
        <button type="submit">ブックマーク解除</button>
    </form>
    @else
    <form action="/favorate/store/{{ $post->id }}" method="POST" class="mb-4" >
    @csrf
    <input type="hidden" name="post_id" value={{ $post->id }}>
        <button type="submit">ブックマーク</button>
    </form>

    @endif
    @endif
    <button>このアニメは良い</button>
</div>
<did>
    <h4>あらすじ</h4>
    <p>{{ $post->summary }}</p>
</did>
<form action='/anime/' method='POST'>
    {{ csrf_field() }}
    <div class="comment">
        <p>投稿者の名前</p>
        <p>コメント</p>
    </div>
</form>
@endsection