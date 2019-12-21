<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;
use App\Http\Requests\GMemberRequest;

class UserController extends Controller
{
   function profileDetails($id){
    $user = User::where('userId', $id)->first();
    return view('user.profileDetails')->with('user', $user);
   }
   function profileEdit($id){
    $user = User::where('userId', $id)->first();
    return view('user.profileEdit')->with('user', $user);
   }
   function profileUpdate(GMemberRequest $request, $id){
    $user = User::where('userId', $id)->first();
    $user->password = $request->password;
    $user->address = $request->address;
    $user->email = $request->email;
    $user->phone = $request->phone;
    if($user->save()){
      return redirect()->route('user.profileDetails', $id);
    }else{
      return redirect()->route('user.profileEdit', $id);
      }
   }

   function committeelist(Request $request){
    $users = User::all();
    return view('user.committeelist')->with('users', $users);
   }

   function userinfo($id){
    $user = User::find($id);
    return view('user.userinfo')->with('user', $user);
   }

   function generalMemberlist(Request $request){
    return view('user.generalMemberlist');
   }

   function gmaction(Request $request)
    {
     if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
       $data = User::where('role', 'General Member')
                   ->where('name', 'like', '%'.$query.'%')
                   ->orderBy('name', 'desc')
                   ->get();
         
      }
      else
      {
       $data = User::where('role', 'General Member')
                     ->orderBy('name', 'desc')
                     ->get();
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '
        <div class="col-4" style="height: 250px; text-align: center;">
          <a href="/userinfo/'.$row->id.'">
          <img src="/picture/'.$row->image.'" width="95%" height="240px">
          </a>
          <a href="/userinfo/'.$row->id.'" style="text-decoration-line: none;">'.$row->name.'</a>
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
}
