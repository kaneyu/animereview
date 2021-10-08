@extends('layouts.app')
@section('content')
<header>
    <ul>
        <li><a href="/nowanime/index">今期アニメ</a></li>
        <li><a href="/">歴代アニメ</a></li>
        <li><a href="/rank/index">ランキング</a></li>
    </ul>
</header>
<h2>{{ $username->name }}</h2>
<h4>お気に入り作品</h4>
@foreach ($myfavorates as $myfavorate)
@if(in_array($myfavorate->post_id, $deleted_ids))
@else
    <div class='favorate'>
        <p>・<a href="/anime/show/{{ $myfavorate->post->id }}">{{ $myfavorate->post->anime_name }}</a></p>
    </div>
@endif
   
@endforeach

<div>
    <h4>削除した投稿</h4>
    @foreach($deleted_animes as $deleted_anime)
    @if($deleted_anime->user_id == Auth::id())
        <p>・{{ $deleted_anime->anime_name }}</p>
        <form action="anime/restore/{{ $deleted_anime->id }}" method="POST">
        <input type="hidden" name="post_id" value={{ $deleted_anime->id }}>
            {{ csrf_field() }}
            <button type="submit">このアニメを復元する</button>
        </form>
        <form action="anime/forcedelete/{{ $deleted_anime->id }}" class="forcedelete" method="post">
        <input type="hidden" name="post_id" value={{ $deleted_anime->id }}>
            {{ csrf_field() }}
            @method('DELETE')
            <button type="submit">このアニメを完全に削除する</button>
        </form>
    @endif
    @endforeach
</div>

@endsection