@extends('layouts.app')
@section('content')
<header>
    <ul>
        <li><a href="">今期アニメ</a></li>
        <li><a href="/anime/index">歴代アニメ</a></li>
        <li><a href="">ランキング</a></li>
    </ul>
    
    <form class="form-inline my-2 my-lg-0 ml-2">
        <div class="form-group">
            <input type="search" class="form-control mr-sm-2" name="search"  value="{{request('search')}}" placeholder="アニメ名のキーワードを入力" aria-label="検索...">
        </div>
        <input type="submit" value="検索" class="btn btn-info">
    </form>
</header>
@foreach ($articles as $article)
    <div class='animename'>
        <p>・<a href='/anime/show/{{ $article->id }}'>{{ $article->anime_name }}</a></p>
    </div>

@endforeach
  <div class="d-flex justify-content-center ">
        {{ $articles->links() }}
  </div>
  
<a href='/anime/create'><button>他のアニメを追加する</button></a>
@endsection