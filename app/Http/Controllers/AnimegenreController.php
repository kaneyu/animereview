<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Animegenre;

class AnimegenreController extends Controller
{
    //
    public function index(Animegenre $animegenre){
        return view('animeranking')->with(['animegenres' => $animegenre->get()]);
    }
}
