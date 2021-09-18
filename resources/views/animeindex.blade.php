@extends('layouts.app')
@section('content')
<header>
    <ul>
        <li><a href="">今期アニメ</a></li>
        <li><a href="">歴代アニメ</a></li>
        <li><a href="">ランキング</a></li>
    </ul>
</header>
@foreach ($posts as $post)
               <div class='animename'>
                    <p>・<a href='/anime/show/{{ $post->id }}'>{{ $post->anime_name }}</a></p>
               </div>
@endforeach
<a href='/anime/create'><button>他のアニメを追加する</button></a>
@endsection