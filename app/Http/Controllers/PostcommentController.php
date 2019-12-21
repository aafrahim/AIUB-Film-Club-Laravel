<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Postcomment;
use App\User;

class PostcommentController extends Controller
{
    public function index($id){
    	$comments = Postcomment::where('postId', $id)
    						   ->orderBy('createTime', 'desc')
    	                       ->get();

    	return view('postcomment.index')->with('comments', $comments);
    }

    public function delete($id){
    	$comment = Postcomment::find($id);
    	if($comment->delete()){
        	return back();
        }
    }
}
