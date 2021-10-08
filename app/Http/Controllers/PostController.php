<?php

namespace App\Http\Controllers;

use App\Post;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Animegenre;
use App\Favorate;
use App\Viewpost;
use App\Reply;
use GuzzleHttp\Client;

class PostController extends Controller
{
    //
    
    public function store(Post $post, Postrequest $request)
    {
        //dd($request['post.anime_name']);
        $appid = 'dj00aiZpPU5CWjI0aGtmVEU1QSZzPWNvbnN1bWVyc2VjcmV0Jng9ZjQ-';
        $url = "https://jlp.yahooapis.jp/FuriganaService/V2/furigana";
        $method = "POST";
        $client = new Client();
            
        $option = [
            'http_errors' => true,                             //エラーを出力
            'verify'      => false,                            //SSL認証を無視

            'headers' =>    //ヘッダーにBASIC認証などを追加
            [
                'Content-Type'  => "application/json",               //コンテントタイプを指定　無くてもできました。
                "User-Agent" => "Yahoo AppID: ".$appid,
            ],

            'json' => //application / x-www-form-urlencoded POSTリクエストを送信するために使用
            [
                "id" => "1234-1",
                "jsonrpc" => "2.0",
                "method" => "jlp.furiganaservice.furigana",
                "params" => [
                    "q" => $request['post.anime_name'],
                    "grade" => "1",
                ],
            ],
        ];
        
        //$post = json_encode($option);
        
        $response = $client->request($method, $url, $option);
        //dd($response);
        $posts = $response->getBody()->getContents();
        //dd($posts);
        $posts = json_decode($posts, true);
        //dd($posts);
        
        //dd(Auth::id());
        //dd($request['post.anime_name']);
        if (array_key_exists('furigana',$posts['result']['word'][0]))
        {
        $post = Post::firstOrCreate([
            'anime_name' => $request['post.anime_name'],
            ],[
            'user_id' => Auth::id(),
            'summary' => $request['post.summary'],
            'anime_initial' => $posts['result']['word'][0]['furigana'],
            ]);
        }
        else
        {
        $post = Post::firstOrCreate([
            'anime_name' => $request['post.anime_name'],
            ],[
            'user_id' => Auth::id(),
            'summary' => $request['post.summary'],
            'anime_initial' => $posts['result']['word'][0]['surface'],
            ]);
        }
        
        //dd($post);
        //$post->anime_name->save();
        //$post->save();
        $post->animegenres()->sync($request['animegenre']);
             //dd(Post::find(4)->animegenres);
        // $animes = Post::all();
        // $casts = [];
        // foreach ($animes as $anime)
        // {
        //     $post = [
        //         'anime_name' => $anime->anime_name,
        //         'anime_initial' => $anime->anime_initial,
        //     ];   
        //     array_push($casts, $post);
        // }
        // foreach ($casts as $key => $value) {
        //     $standard_key_array[$key] = $value['anime_initial'];
        // }
        // array_multisort($standard_key_array, SORT_ASC, $casts);
        //$collection = collect($animes);
        //$sorted = $collection->sortBy('animei_initial');
             
        return redirect('/');
    }
    
    public function create()
    {
        $animegenres = Animegenre::all();
         return view("animecreate")->with(['animegenres' => $animegenres]);
    }
    
    public function show(Post $post)
    {
        $views = Viewpost::where('post_id',$post->id)->get();
        //dd($views);
        //$replies = Reply::with('viewpost')->where('replies.viewpost_id',$view->id)->get();
        return view("animeshow")->with(['post' => $post, 'views' => $views]);
        
        //$favorate = Favorate::where('user_id',Auth::id())->where('post_id',$post->id)->exists();
        //return view("animeshow")->with(['favorate' => $favorate, 'post' => $post]);
    }
    
    public function index(Post $post)
    {
        $animes = Post::all();
        
        $articles = Post::where(function ($query) {

            if ($search = request('search')) {
                $query->where('anime_name', 'LIKE', "%{$search}%");
            }

        })->paginate(20);
        $casts_arrays = $this->japaneseReordering($articles);
        //dd($casts_arrays);
        
        return view('animeindex')->with(['posts' => $post->getPaginateByLimit(), 'casts_arrays' => $casts_arrays]);
    }
    
    public function japaneseReordering($animes)
    {
        $casts = [];
        foreach ($animes as $anime)
        {
            $post = [
                'id' => $anime->id,
                'anime_name' => $anime->anime_name,
                'anime_initial' => $anime->anime_initial,
            ];   
            array_push($casts, $post);
        }
        foreach ($casts as $key => $value) {
            $standard_key_array[$key] = $value['anime_initial'];
        }
        array_multisort($standard_key_array, SORT_ASC, $casts);
        
        return $casts;
    }
    
    public function edit(Post $post)
    {
        //dd($post);
        $animegenres = Animegenre::all();
        
        return view('anime_edit')->with(['post' => $post, 'animegenres' => $animegenres]);
    }
    
    public function update(Post $post, Postrequest $request)
    {
        $appid = 'dj00aiZpPU5CWjI0aGtmVEU1QSZzPWNvbnN1bWVyc2VjcmV0Jng9ZjQ-';
        $url = "https://jlp.yahooapis.jp/FuriganaService/V2/furigana";
        $method = "POST";
        $client = new Client();
            
        $option = [
            'http_errors' => true,                             //エラーを出力
            'verify'      => false,                            //SSL認証を無視

            'headers' =>    //ヘッダーにBASIC認証などを追加
            [
                'Content-Type'  => "application/json",               //コンテントタイプを指定　無くてもできました。
                "User-Agent" => "Yahoo AppID: ".$appid,
            ],

            'json' => //application / x-www-form-urlencoded POSTリクエストを送信するために使用
            [
                "id" => "1234-1",
                "jsonrpc" => "2.0",
                "method" => "jlp.furiganaservice.furigana",
                "params" => [
                    "q" => $request['post.anime_name'],
                    "grade" => "1",
                ],
            ],
        ];
        
        //$post = json_encode($option);
        
        $response = $client->request($method, $url, $option);
        //dd($response);
        $posts = $response->getBody()->getContents();
        //dd($posts);
        $posts = json_decode($posts, true);
        //dd($posts);
        $anime_initial = Post::where('id', $post->id)->first();
        if (array_key_exists('furigana',$posts['result']['word'][0]))
        {
        $anime_initial->anime_initial = $posts['result']['word'][0]['furigana'];
        $anime_initial->save();
        }
        else
        {
        $anime_initial->anime_initial = $posts['result']['word'][0]['surface'];
        $anime_initial->save();
        }
        
        $input = $request['post'];
        $post->fill($input)->save();
        
        $post->animegenres()->sync($request['animegenre']);
        
        return redirect('anime/show/'.$post->id);
    }
    
    public function destroy(Post $post)
    {
    //dd($post);
    $post->delete();
    return redirect('/');
    }
    
    public function restore(Request $request)
    {
        //dd($request['post_id']);
        $animerestore = Post::onlyTrashed()->find($request['post_id']);
        
        $animerestore->restore();
        return redirect('mypage');
    }
    
    public function forcedelete(Request $request)
    {
        //dd($request);
        $forcedelete = Post::onlyTrashed()->find($request['post_id']);
        //dd($forcedelete);
        $forcedelete->forceDelete();
        
        return redirect('mypage');
    }
}
