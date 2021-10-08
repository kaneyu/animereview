@extends('layouts.app')
@section('content')
<header>
    <ul>
        <li><a href="/nowanime/index">今期アニメ</a></li>
        <li><a href="/">歴代アニメ</a></li>
        <li><a href="/rank/index">ランキング</a></li>
    </ul>
</header>
<h2>このアニメは良い数ランキング</h2>
<div>
    <h4>{{ $animegenre->genre_name }}</h4>
    @php
            $rank = 1;
            $cnt = 1;
            $before = 0;
    @endphp 
    @foreach($posts as $post) 
        @php
            if($before != $post->goods_count){
                $rank = $cnt;
            }
        @endphp    
            <p>{{ $rank }}位　{{ $post->anime_name }}</p> <p>いいね数　{{ $post->goods_count }}</p>
            
        @php
            $before = $post->goods_count;
            $cnt++;
        @endphp    
    @endforeach
</div>
@endsection