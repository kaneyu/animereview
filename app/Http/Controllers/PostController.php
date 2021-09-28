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
        $views = Viewpost::where('post_id',$post->id)->get();
        //dd($views);
        //$replies = Reply::with('viewpost')->where('replies.viewpost_id',$view->id)->get();
        return view("animeshow")->with(['post' => $post, 'views' => $views]);
        
        //$favorate = Favorate::where('user_id',Auth::id())->where('post_id',$post->id)->exists();
        //return view("animeshow")->with(['favorate' => $favorate, 'post' => $post]);
    }
    
    public function index(Post $post)
    {
        $articles = Post::orderBy('created_at', 'asc')->where(function ($query) {

            if ($search = request('search')) {
                $query->where('anime_name', 'LIKE', "%{$search}%");
            }

        })->paginate(20);
        
        //$animes = Post::orderBy(Post::raw(
        //"case when anime_name_kana is NULL then '2'" .
        //" when anime_name_kana = '' then '1'" .
        //" else '0' end, " .
        //"anime_name_kana, " .
        //"anime_name"
        //));
        
        //dd($animes);
        
        return view('animeindex')->with(['posts' => $post->getPaginateByLimit(), 'articles' => $articles]);
    }
    
    public function destroy(Post $post)
    {
    //dd($post);
    $post->delete();
    return redirect('/anime/index');
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
