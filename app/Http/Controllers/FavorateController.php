<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Favorate;
use App\Post;

class FavorateController extends Controller
{
    //
    public function store(Request $request, $id)
    {
        //dd($request['post_id']);
        $favorate = new Favorate;
        $favorate->post_id = $request['post_id'];
        $favorate->user_id = Auth::user()->id;
        $favorate->save();
        
        return redirect('/anime/show/'.$id);
    }
    
    public function destroy(Request $request, $id)
    {
        $favorate=Favorate::where('user_id', Auth::user()->id)->where('post_id', $id)->first();
        $favorate->delete();
        
        return redirect('/anime/show/'.$id);
    }
}
