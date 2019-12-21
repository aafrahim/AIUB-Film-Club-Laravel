<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Event;
use App\User;
use App\Eventcomment;
use Carbon\Carbon;
use App\Http\Requests\PostRequest;

class EventController extends Controller
{
    public function index(){
        $events = Event::where('approveStatus', 'Approved')
        			   ->orderBy('createTime', 'desc')
        			   ->get();
        return view('event.index')->with('events', $events);
    }

    public function details($id){
        $event = Event::find($id);
        return view('event.details')->with('event', $event);
    }

    public function commentStore(PostRequest $request, $id){
      $comment = new Eventcomment();

      $user = User::where('userId', session('uid'))->first();

      $comment->description = $request->description;
      $comment->eventId = $id;
      $comment->creatorId = session('uid');
      $comment->creatorName = $user->name;
      $comment->createTime = Carbon::now('UTC')->addHours(6);
      $comment->updateTime = NULL;

      if($comment->save()){
        return back();
      }
    }
}
