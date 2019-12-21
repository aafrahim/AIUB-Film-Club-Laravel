<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Notice;
use App\User;
use App\Noticecomment;
use Carbon\Carbon;
use App\Http\Requests\PostRequest;

class NoticeController extends Controller
{
    public function index(){
        $notices = Notice::where('approveStatus', 'Approved')
        			   ->orderBy('createTime', 'desc')
        			   ->get();
        return view('notice.index')->with('notices', $notices);
    }

    public function details($id){
        $notice = Notice::find($id);
        return view('notice.details')->with('notice', $notice);
    }

    public function commentStore(PostRequest $request, $id){
      $comment = new Noticecomment();

      $user = User::where('userId', session('uid'))->first();

      $comment->description = $request->description;
      $comment->noticeId = $id;
      $comment->creatorId = session('uid');
      $comment->creatorName = $user->name;
      $comment->createTime = Carbon::now('UTC')->addHours(6);
      $comment->updateTime = NULL;

      if($comment->save()){
        return back();
      }
    }
}
