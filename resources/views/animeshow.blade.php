@extends('layouts.app')
@section('content')
<header>
    <ul>
        <li><a href="">今期アニメ</a></li>
        <li><a href="/anime/index">歴代アニメ</a></li>
        <li><a href="">ランキング</a></li>
    </ul>
</header>
<div>
    
    <h2>{{ $post->anime_name}}</h2>
    <div>
        <button>コメントを書く</button>
        <form action="/view/store/{{ $post->id }}" method="POST">
            {{ csrf_field() }}
            <input type="text" name="comment" placeholder="コメントを記入…">
            <input type="hidden" name="post_id" value={{ $post->id }}>
            <input type="submit" value="投稿"><input type="reset" value="やめる">
        </form>
    </div>
    @if (Auth::check())
    @if (App\Favorate::where('user_id',Auth::id())->where('post_id',$post->id)->exists())
    <form action="/favorate/destroy/{{ $post->id }}" method="POST" class="mb-4" >
    <input type="hidden" name="post_id" value={{ $post->id }}>
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
    <h4>コメント</h4>
<div>
    @foreach($views as $view)
    @php
    $viewname = App\User::where('id', $view->user_id)->first();
    @endphp
    　　<p>{{ $viewname->name }}</p>
        <p>{{ $view->comment }}</p>
    @endforeach
</div>
@endsection