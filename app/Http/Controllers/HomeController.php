<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Image;
use App\Notice;
use App\Event;

class HomeController extends Controller
{
    public function index(){
    	$notices = Notice::where('ApproveStatus', 'Approved')
    					 ->orderBy('createTime', 'desc')
    					 ->take(05)
    					 ->get();

    	$events = Event::where('ApproveStatus', 'Approved')
    					 ->orderBy('createTime', 'desc')
    					 ->take(04)
    					 ->get();
    	return view('home.index')->with('notices', $notices)
    							 ->with('events', $events);
    }

    public function loggedout(){
    	return view('home.loggedout');
    }
}
