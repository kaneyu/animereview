<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nowanime;
use App\Post;

class NowanimeController extends Controller
{
    //
    public function store(Request $request, $id)
    {
        //dd($request);
        $nowanime = new Nowanime;
        $nowanime->post_id = $request['post_id'];
        $nowanime->save();
        
        return redirect('anime/show/'.$id);
    }
    
    public function destroy(Request $request, $id)
    {
        //dd($request);
        $nowanimedelete = Nowanime::where('post_id',$id)->first();
        $nowanimedelete->delete();
        
        return redirect('anime/show/'.$id);
    }
    
    public function index()
    {
        $nowanimes = Nowanime::all();
        
        return view('nowanimeindex')->with(['nowanimes' => $nowanimes]);
    }
    
    public function show()
    {
        
    }
}
