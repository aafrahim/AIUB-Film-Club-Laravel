<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

use App\Gallery;
use App\Album;
use Carbon\Carbon;
use App\Http\Requests\PostRequest;

class GalleryController extends Controller
{
    function create(){
    return view('gallery.create');
   }

   function store(PostRequest $request){

   	if($request->hasFile('image')){

   		$title = $request->title;
   		$pic ='';

   		$path1 = public_path()."/".session('uid')."/Gallery";
   		$path2 = public_path()."/".session('uid')."/Gallery/".$title;

   		if(!File::exists($path1)) {
    		File::makeDirectory($path1);
    		File::makeDirectory($path2);
		}else{
			if(!File::exists($path2)){
				File::makeDirectory($path2);
			}
		}

   		foreach ($request->file('image') as $file) {
   			$gallery = new Gallery();
   			$time = Carbon::now('UTC')->addHours(6);

   			$gallery->title = $title;
   			$gallery->createTime = $time;
   			$gallery->creatorId = session('uid');
   			$gallery->image = $file->getClientOriginalName();
   			if($file->move($path2, $file->getClientOriginalName())){
   				$pic = $file->getClientOriginalName();
   				$gallery->save();
   			}
   		}
   			$album = new Album();
   			$time = Carbon::now('UTC')->addHours(6);

   			$album->title = $title;
   			$album->createTime = $time;
   			$album->creatorId = session('uid');
   			$album->updateTime = NULL;
   			$album->thumbnail = $pic;

   			if($album->save())
   			{
   				return redirect()->route('gallery.albumlist');
   			}
   	}else{
   		echo "no image uploaded";
   	}
   }

   function albumlist(Request $request){
    return view('gallery.albumlist');
   }

   function albumaction(Request $request)
    {
    	$uid = session('uid');
     if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
       $data = Album::where('creatorId', $uid)
                   ->where('title', 'like', '%'.$query.'%')
                   ->orderBy('title', 'desc')
                   ->get();    
      }
      else
      {
       $data = Album::where('creatorId', $uid)
                     ->orderBy('title', 'desc')
                     ->get();
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '
        <div class="col-4" style="height: 280px; text-align: center;">
          <a href="/gallery/album/'.$row->title.'">
          <img src="/'.$row->creatorId.'/Gallery/'.$row->title.'/'.$row->thumbnail.'" width="95%" height="220px">
          </a>
          <a href="/gallery/album/'.$row->title.'" style="text-decoration-line: none;">'.$row->title.'</a>
          <br><br>
			<a class="btn btn-danger" role="button" href="/gallery/albumDelete/'.$row->id.'">Delete</a>
          </div>
        ';
       }
      }
      else
      {
       $output = '
       No Data Found
       ';
      }
      $data = array(
       'div_data'  => $output,
       'total_data'  => $total_row
      );

      echo json_encode($data);
     }
    }

    public function show($title){
    	$galleries = Gallery::where('creatorId', session('uid'))
    	                    ->where('title', $title)
    	                    ->orderBy('id', 'desc')
    	                    ->get();

    	return view('gallery.show')->with('images', $galleries);
    }

    function update(Request $request, $title){

   	if($request->hasFile('image')){
   		$title = $request->title;
   		$pic ='';

   		$path = public_path()."/".session('uid')."/Gallery/".$title;

   		foreach ($request->file('image') as $file) {
   			$gallery = new Gallery();
   			$time = Carbon::now('UTC')->addHours(6);

   			$gallery->title = $title;
   			$gallery->createTime = $time;
   			$gallery->creatorId = session('uid');
   			$gallery->image = $file->getClientOriginalName();
   			if($file->move($path, $file->getClientOriginalName())){
   				$pic = $file->getClientOriginalName();
   				$gallery->save();
   			}
   		}
   			$album = Album::where('creatorId', session('uid'))
    	                    ->where('title', $title)
    	                    ->first();
   			$time = Carbon::now('UTC')->addHours(6);

   			$album->updateTime = $time;
   			$album->thumbnail = $pic;

   			if($album->save())
   			{
   				return back();
   			}
   	}else{
   		echo "no image uploaded";
   	}
   }

   public function albumDelete($id){
    	$album = Album::find($id);

    	$creator = $album->creatorId;
    	$title = $album->title;

    	$gallery = Gallery::where('creatorId', $creator)
    			  		  ->where('title', $title)
    			  		  ->delete();

    	$path = public_path()."/".$creator."/Gallery/".$title;

    	echo $gallery;

    	if($gallery){
    		$album->delete();
    		File::deleteDirectory($path);
    		return back();
    	}

    	$creator = $image->creatorId;
    	$title = $image->title;

    	$path = public_path()."/".$creator."/Gallery/".$title."/".$image->image;

    	if($image->delete()){
    		File::delete($path);
    		$gallery = Gallery::where('title', $title)
    		                  ->where('creatorId', $creator)
    		                  ->get();
    		$count = count($gallery);
    		echo $count;

    		if($count<=0){
    			$path = public_path()."/".$creator."/Gallery/".$title;
    			File::deleteDirectory($path);

    			$album = Album::where('creatorId', $creator)
    					      ->where('title', $title)
    		                  ->first();

    		    if($album->delete()){
    		    	return redirect()->route('gallery.albumlist');
    		    }
    		}
    		else{
    			return back();
    		}
    	}
    }

    public function imageDelete($id){
    	$image = Gallery::find($id);

    	$creator = $image->creatorId;
    	$title = $image->title;

    	$path = public_path()."/".$creator."/Gallery/".$title."/".$image->image;

    	if($image->delete()){
    		File::delete($path);
    		$gallery = Gallery::where('title', $title)
    		                  ->where('creatorId', $creator)
    		                  ->get();
    		$count = count($gallery);
    		echo $count;

    		if($count<=0){
    			$path = public_path()."/".$creator."/Gallery/".$title;
    			File::deleteDirectory($path);

    			$album = Album::where('creatorId', $creator)
    					      ->where('title', $title)
    		                  ->first();

    		    if($album->delete()){
    		    	return redirect()->route('gallery.albumlist');
    		    }
    		}
    		else{
    			return back();
    		}
    	}
    }
}
