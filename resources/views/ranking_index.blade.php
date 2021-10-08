@extends('layouts.app')
@section('content')
<header>
    <ul>
        <li><a href="/nowanime/index">今期アニメ</a></li>
        <li><a href="/">歴代アニメ</a></li>
        <li><a href="/rank/index">ランキング</a></li>
    </ul>
</header>
@foreach ($animegenres as $animegenre)
               <div class='animegenre'>
                    <p>・<a href="/rank/show/{{ $animegenre->id }}">{{ $animegenre->genre_name }}</a></p>
               </div>
@endforeach
@endsection