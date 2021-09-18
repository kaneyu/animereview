<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title></title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    </head>
    <body>
        <h1>アニメの追加</h1>
        <form action='/anime/store' method='POST'>
            {{ csrf_field() }}
            <div class="name">
                <h2>追加したいアニメ名を入力してね</h2>
                <input type="text" name="post[anime_name]" placeholder="アニメ名">
            </div>
            <div class="genre">
                <h2>アニメのジャンルで近いものを複数選んでね</h2>
                    @foreach($animegenres as $animegenre)
                    <lavel><input type="checkbox" name="animegenre[]" value="{{ $animegenre->id }}">{{ $animegenre->genre_name }}</lavel>
                    @endforeach
            </div>
            <div class="summary">
                <h2>追加するアニメのあらすじを書いてね</h2>
                <textarea name="post[summary]" placeholder="あらすじ"></textarea>
            </div>
            <input type="submit" value="保存">
        </form>
    </body>
</html>
