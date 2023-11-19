<?php

namespace App\Http\Controllers;
use App\Models\Posts;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashBoardController extends Controller
{
    function show(){
        $user=Auth::user();
        return    view('admin.dashboard',['user'=>$user]);
    }
    function users(){
       $user=User::where("role" ,"!=" ,"Admin")->withCount('posts')->get();
       if($user->count()=== 0){$user=[];}
        return    view('admin.users',['users'=>$user]);
    }
    function delete_user($id){
        User::destroy($id);
        return response()->json(["message"=>"User Deleted"]);
    }
}
