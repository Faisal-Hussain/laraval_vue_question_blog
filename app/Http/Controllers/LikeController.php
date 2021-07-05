<?php

namespace App\Http\Controllers;

use App\Events\LikeEvent;
use App\Model\Like;
use App\Model\Reply;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function __construct()
    {

//        $this->middleware('JWT');
    }
    public function LikeIt(Reply $reply){

        $reply->like()->create(['user_id'=>auth()->id()]);
        broadcast(new LikeEvent($reply->id,1))->toOthers();

        return response('liked');
    }
   public function unLikeIt(Reply $reply){
       $reply->like()->where('user_id',auth()->id())->first()->delete();
       broadcast(new LikeEvent($reply->id,0))->toOthers();
       return response('not liked');
   }
}
