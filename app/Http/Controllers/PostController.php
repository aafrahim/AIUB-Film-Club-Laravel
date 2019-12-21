<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

use App\User;
use App\Post;
use App\Postcomment;
use Carbon\Carbon;
use App\Http\Requests\PostRequest;


class PostController extends Controller
{
    function create(){
    return view('post.create');
   }

   function store(PostRequest $request){
   	$post = new Post();
   	$time = Carbon::now('UTC')->addHours(6);

   	$post->description = $request->description;
   	$post->createTime = $time;
   	$post->updateTime = NULL;
   	$post->creatorId = session('uid');
   	$post->creatorName = session()->get('user')->name;
   	$post->approveStatus = 'Pending';

   	if($request->hasFile('image')){
      $path = public_path()."/".session('uid')."/Post";
      if(!File::exists($path)){
        File::makeDirectory($path);
      }
   		$file = $request->file('image');
   		$post->image = $file->getClientOriginalName();
   		$file->move($path, $file->getClientOriginalName());
   	}else{
   		$post->image = NULL;
   	}

   	if($post->save()){
   		return redirect()->route('post.personal', session('uid'));
   	}
   }

   public function main(){
        $posts = Post::where('approveStatus', 'Approved')
        			   ->orderBy('createTime', 'desc')
        			   ->get();
        return view('post.main')->with('posts', $posts);
    }

    public function personal($id){
        $posts = Post::where('creatorId', $id)
        			   ->orderBy('createTime', 'desc')
        			   ->get();

        return view('post.personal')->with('posts', $posts);
    }

     public function edit($id){
        $post = Post::find($id);
        return view('post.edit')->with('post', $post);
    }

    public function update(PostRequest $request,$id){
        $post = Post::find($id);
        $post->description = $request->description;
        $time = Carbon::now('UTC')->addHours(6);
        $post->updateTime = $time;
        
        if($post->save()){
        	return redirect()->route('post.personal', session('uid'));
        }
        else{
        	return back();
        }
    }

    public function delete($id){
    	$post = Post::find($id);
    	if($post->image != NULL){
    		$path = public_path()."/".$post->creatorId."/Post/".$post->image;
    		File::delete($path);
    	}
    	if($post->delete()){
        	return back();
        }
    }

    public function commentStore(PostRequest $request, $id){
      $comment = new Postcomment();

      $user = User::where('userId', session('uid'))->first();

      $comment->description = $request->description;
      $comment->postId = $id;
      $comment->creatorId = session('uid');
      $comment->creatorName = $user->name;
      $comment->createTime = Carbon::now('UTC')->addHours(6);
      $comment->updateTime = NULL;

      if($comment->save()){
        return back();
      }


    }
}
