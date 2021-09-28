@extends('layouts.app')
@section('content')
<header>
    <ul>
        <li><a href="">今期アニメ</a></li>
        <li><a href="/anime/index">歴代アニメ</a></li>
        <li><a href="/rank/index">ランキング</a></li>
    </ul>
</header>
@foreach ($animegenres as $animegenre)
               <div class='animegenre'>
                    <p>・<a href="/rank/show/{{ $animegenre->id }}">{{ $animegenre->genre_name }}</a></p>
               </div>
@endforeach
@endsection