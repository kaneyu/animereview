@extends('layouts.app')
@section('content')
<header>
    <ul>
        <li><a href="/nowanime/index">今期アニメ</a></li>
        <li><a href="/anime/index">歴代アニメ</a></li>
        <li><a href="/rank/index">ランキング</a></li>
    </ul>
</header>
    <form class="form-inline my-2 my-lg-0 ml-2">
        <div class="form-group">
            <input type="search" class="form-control mr-sm-2" name="search"  value="{{request('search')}}" placeholder="アニメ名のキーワードを入力" aria-label="検索...">
        </div>
        <input type="submit" value="検索" class="btn btn-info">
    </form>
<div class='animename'>
    @foreach ($nowanimes as $nowanime)
            <p>・<a href='/anime/show/{{ $nowanime->post_id }}'>{{ $nowanime->post->anime_name }}</a></p>
    @endforeach
</div>
@endsection