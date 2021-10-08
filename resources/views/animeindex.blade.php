@extends('layouts.app')
@section('content')
<header>
    <ul>
        <li><a href="/nowanime/index">今期アニメ</a></li>
        <li><a href="/">歴代アニメ</a></li>
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
    @foreach ($casts_arrays as $casts_array)
            <p>・<a href='/anime/show/{{ $casts_array['id'] }}'>{{ $casts_array['anime_name'] }}</a></p>
    @endforeach
</div>
  
<a href='/anime/create'><button>他のアニメを追加する</button></a>

<script>
    const loginurl='https://eae4c3b99f674a56bfc115be4859ded8.vfs.cloud9.ap-northeast-1.amazonaws.com/login';
    const registerurl='https://eae4c3b99f674a56bfc115be4859ded8.vfs.cloud9.ap-northeast-1.amazonaws.com/register';
    window.onload=()=>{
        if(document.getElementById('navbarDropdown')!=null && document.referrer.match(loginurl)){
            alert("ログインされました");
        }else if(document.getElementById('navbarDropdown')!=null && document.referrer.match(registerurl)){
            alert("登録されました");
        }
    }
</script>
@endsection