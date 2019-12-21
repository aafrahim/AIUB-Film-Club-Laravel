<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Event;
use App\Eventcomment;
use Carbon\Carbon;

class EventcommentController extends Controller
{

   public function index($id){
    	$comments = Eventcomment::where('eventId', $id)
    						   ->orderBy('createTime', 'desc')
    	                       ->get();

    	return view('Eventcomment.index')->with('comments', $comments);
    }

    public function delete($id){
    	$comment = Eventcomment::find($id);
    	if($comment->delete()){
        	return back();
        }
    }
}
