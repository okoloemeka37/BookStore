<?php

namespace App\Http\Controllers;
use App\Models\Books;
use App\Models\User;
use Illuminate\Http\Request;

class IndexPageController extends Controller
{
    function index ($genre='null'){
       if($genre == 'null'){
        $books=Books::orderBy("id",'desc')->with('user')->paginate(20);
        $genre='All';
       }else{
            $books=Books::where('genre','=',$genre)->orderBy("id",'desc')->with('user')->paginate(20);
       }


    
    return view('welcome',['books'=>$books,'type'=>$genre]);
    }
  

    function live(Request $request){
        $value=htmlspecialchars(trim(strip_tags(stripslashes($request->value))));
        $books=Books::where('title','LIKE' ,'%'.$value.'%')
        ->orWhere('author','LIKE' ,'%'.$value.'%')
        ->orWhere('genre','LIKE' ,'%'.$value.'%')->get();
        return response()->json(['books'=>$books]);
    }
    function genre($gen){
        $books=Books::where('genre','=',$gen)->orderBy("id",'desc')->paginate(20);
        return  view('ind_genre',['books'=>$books]);
    }

    function sortAuth($id){
        $user=User::where('id','=',$id)->get();
        $books=Books::where('user_id','=',$id)->orderBy("id",'desc')->paginate(20);

        return view('ByName',['books'=>$books,'user'=>$user]);
    }
}
