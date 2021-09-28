<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Good;
use App\Post;
use App\Animegenre;

class GoodController extends Controller
{
    //
    public function store(Request $request, $id)
    {
        //dd($request['post_id']);
        $good = new Good;
        $good->post_id = $request['post_id'];
        $good->user_id = Auth::user()->id;
        $good->save();
        
        return redirect('/anime/show/'.$id);
    }
    
    public function destroy(Request $request, $id)
    {
        //dd($id);
        $good=Good::where('user_id', Auth::user()->id)->where('post_id', $id)->first();
        //dd($post);
        $good->delete();
        
        return redirect('/anime/show/'.$id);
    }
    
    public function show($id)
    {
        $animegenre = Animegenre::find($id);
        $goodcounts = Post::withCount('goods')->orderBy('goods_count', 'desc')->get();
        $posts = [];
        foreach($goodcounts as $post)
        {
            $animegenreid = [];
            for($i = 0; $i < (int)$post->animegenres->count(); $i++)
            {
                array_push($animegenreid,$post->animegenres[$i]->id);
            }
            if(in_array($animegenre->id, $animegenreid))
            {
                array_push($posts, $post);
            }
        }
        //$goodcounts = $posts->sortByDesc('goods_count');
        //dd($posts);
        return view('ranking_show')->with(['posts' => $posts, 'animegenre' => $animegenre]);
    }
}
