<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Notice;
use App\Noticecomment;
use Carbon\Carbon;

class NoticecommentController extends Controller
{
    public function index($id){
    	$comments = Noticecomment::where('noticeId', $id)
    						   ->orderBy('createTime', 'desc')
    	                       ->get();

    	return view('Noticecomment.index')->with('comments', $comments);
    }

    public function delete($id){
    	$comment = Noticecomment::find($id);
    	if($comment->delete()){
        	return back();
        }
    }
}
