<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ReplyRequest;
use Illuminate\Support\Facades\Auth;
use App\Reply;

class ReplyController extends Controller
{
    //
    public function store(Replyrequest $request, $id){
        //dd($request);
        $reply = new Reply;
        $reply->comment = $request['reply'];
        $reply->user_id = Auth::user()->id;
        $reply->viewpost_id = $request['viewpost_id'];
        $reply->save();
        
        return redirect('/anime/show/'.$id);
    }
    
    public function destroy(Request $request, $id)
    {
        //dd($request);
    $reply = Reply::find($request->id)->delete();
    return redirect('/anime/show/'.$id);
    }
}
