<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

Use App\User;


class TestController extends Controller
{
    public function index(Request $request){
    	// $path1 = public_path()."/".session('uid');
    	// $path2 = public_path()."/".session('uid')."/Gallery";
    	// $path3 = public_path()."/".session('uid')."/Post";
    	// File::makeDirectory($path1);
    	// File::makeDirectory($path2);

  //   	if(!File::exists($path1)) {
  //   		File::makeDirectory($path)1;
		// }
		// else
		// {
		// 	//File::deleteDirectory($path);
		// 	echo "exits";
		// }
    	return view('test.index');
    }
}
