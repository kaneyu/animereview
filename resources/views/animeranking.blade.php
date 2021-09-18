@extends('layouts.app')
@section('content')
<header>
    <ul>
        <li><a href="">今期アニメ</a></li>
        <li><a href="">歴代アニメ</a></li>
        <li><a href="">ランキング</a></li>
    </ul>
</header>
@foreach ($animegenres as $animegenre)
               <div class='animerank'>
                    <p>[<a href=''>{{ $animegenre->genre_name }}</a>]</p>
               </div>
@endforeach
@endsection