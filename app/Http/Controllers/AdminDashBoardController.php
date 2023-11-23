<?php

namespace App\Http\Controllers;
use App\Models\Posts;
use App\Models\Books;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminDashBoardController extends Controller
{
    function show(){
        $user=Auth::user();
        $post=Posts::count();
        $book=Books::count();
        $norm=User::where("role" ,"!=" ,"Admin")->count();
        return    view('admin.dashboard',['user'=>$user,'post'=>$post,'book'=>$book,'norm'=>$norm]);
    }
    function users(){
        $user=Auth::user();
       $users=User::where("role" ,"!=" ,"Admin")->withCount('posts')->withCount('books')->get();
      
       
       if($users->count()=== 0){$user=[];}
        return    view('admin.users',['users'=>$users,'user'=>$user]);
    }
    function delete_user($id){
        User::destroy($id);
        return response()->json(["message"=>"User Deleted"]);
    }
}
