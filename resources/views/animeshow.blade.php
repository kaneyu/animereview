@extends('layouts.app')
@section('content')
<header>
    <ul>
        <li><a href="">今期アニメ</a></li>
        <li><a href="/anime/index">歴代アニメ</a></li>
        <li><a href="/rank/index">ランキング</a></li>
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
    <div>
    @if (Auth::check())
    @if (App\Favorate::where('user_id',Auth::id())->where('post_id',$post->id)->exists())
    <form action="/favorate/destroy/{{ $post->id }}" method="POST" class="mb-4" >
    <input type="hidden" name="post_id" value={{ $post->id }}>
    @csrf
    @method('DELETE')
        <button type="submit">お気に入りを外す</button>
    </form>
    @else
    <form action="/favorate/store/{{ $post->id }}" method="POST" class="mb-4" >
    @csrf
    <input type="hidden" name="post_id" value={{ $post->id }}>
        <button type="submit">お気に入りに追加</button>
    </form>
    @endif
    @endif
    </div>
    <div>
        @if (Auth::check())
    @if (App\Good::where('user_id',Auth::id())->where('post_id',$post->id)->exists())
    <form action="/good/destroy/{{ $post->id }}" method="POST" class="mb-4" >
    <input type="hidden" name="post_id" value={{ $post->id }}>
    @csrf
    @method('DELETE')
        <button type="submit">このアニメは良い！を取り消す</button>
    </form>
    @else
    <form action="/good/store/{{ $post->id }}" method="POST" class="mb-4" >
    @csrf
    <input type="hidden" name="post_id" value={{ $post->id }}>
        <button type="submit">このアニメは良い！</button>
    </form>
    @endif
    @endif
    </div>
</div>
<did>
    <h4>あらすじ</h4>
    <p>{{ $post->summary }}</p>
</did>
<div>
    <h4>コメント</h4>
    @foreach($views as $view)
    　　<p>{{ $view->user->name }}</p>
        <p>{{ $view->comment }}</p>
        <div>
            @if($view->user_id == Auth::id())
            <form action="/view/delete/{{ $post->id }}" class="view_delete" method="post" style="display:inline">
                <input type="hidden" name="id" value={{ $view->id }}>
                @csrf
                @method('DELETE')
                <button type="submit">このコメントを削除する</button>
            </form>
            @endif
        </div>
        <div>
            <button>返信を書く</button>
            <form action="/reply/store/{{ $post->id }}" method="POST">
                {{ csrf_field() }}
                <input type="text" name="comment" placeholder="返信を記入…">
                <input type="hidden" name="viewpost_id" value={{ $view->id }}>
                <input type="submit" value="投稿"><input type="reset" value="やめる">
            </form>
        </div>
        @php
        $replies = App\Reply::with('viewpost')->where('replies.viewpost_id',$view->id)->get();
        @endphp
        @foreach($replies as $reply)
        <p>{{ $reply->user->name}}</p>
        <p>{{ $reply->comment}}</p>
        @if($reply->user_id == Auth::id())
            <form action="/reply/delete/{{ $post->id }}" class="reply_delete" method="post" style="display:inline">
                <input type="hidden" name="id" value={{ $reply->id }}>
                @csrf
                @method('DELETE')
                <button type="submit">このコメントを削除する</button>
            </form>
            @endif
        @endforeach
        <p></p>
    @endforeach
</div>
<div>
    @if($post->user_id == Auth::id())
    <form action="/anime/delete/{{ $post->id }}" class="anime_delete" method="post" style="display:inline">
    @csrf
    @method('DELETE')
    <button type="submit">このアニメを削除する</button>
    @else
    </form>
    @endif
</div>
@endsection