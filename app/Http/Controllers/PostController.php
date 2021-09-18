<?php

namespace App\Http\Controllers;

use App\Post;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth;
use App\Animegenre;
use App\Favorate;

class PostController extends Controller
{
    //
    public function store(Post $post, Postrequest $request)
    {
        //dd(Auth::id());
        //dd($request['post.anime_name']);
        $post = Post::firstOrCreate([
            'anime_name' => $request['post.anime_name'],
            ],[
            'user_id' => Auth::id(),
            'summary' => $request['post.summary'],
        ]);
        //$post->anime_name->save();
        //$post->save();
        
        
        $post->animegenres()->sync($request['animegenre']);
             //dd(Post::find(4)->animegenres);
        return redirect('/anime/index');
    }
    
    public function create()
    {
        $animegenres = Animegenre::all();
         return view("animecreate")->with(['animegenres' => $animegenres]);
    }
    
    public function show(Post $post)
    {
        $favorate = Favorate::where('user_id',Auth::id())->where('post_id',$post->id)->exists();
        
        //return view("animeshow")->with(['post' => $post->where('id',$id)->first()]);
        
        //dd($posts->id);
        return view("animeshow")->with(['favorate' => $favorate, 'post' => $post]);
    }
    
    public function index(Post $post)
    {
        return view('animeindex')->with(['posts' => $post->getPaginateByLimit()]);
    }    
}
