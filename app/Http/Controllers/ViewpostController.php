<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Viewpost;

class ViewpostController extends Controller
{
    //
    public function store(Request $request, $id){
        //dd($request);
        $view = new Viewpost;
        $view->comment = $request['comment'];
        $view->user_id = Auth::user()->id;
        $view->post_id = $request['post_id'];
        $view->save();
        
        return redirect('/anime/show/'.$id);
    }
    
    public function destroy(Request $request, $id)
    {
        //dd($request);
    $view = Viewpost::find($request->id)->delete();
    return redirect('/anime/show/'.$id);
    }
}
