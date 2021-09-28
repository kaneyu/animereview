<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Favorate;
use App\User;
use App\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    
    public function mypage()
    {
        $user = User::where('id', Auth::id())->first();
        $myfavorates = Favorate::where('user_id', Auth::id())->get();
        $deleted_animes = Post::onlyTrashed()->get();
        $deleted_ids = [];
        foreach($deleted_animes as $deleted_anime){
            array_push($deleted_ids, $deleted_anime->id);
        }
        //dd($deletedanimes);
        return view('mypage')->with(['username' => $user, 'myfavorates' => $myfavorates, 'deleted_animes' => $deleted_animes, 'deleted_ids' => $deleted_ids]);
    }
}
