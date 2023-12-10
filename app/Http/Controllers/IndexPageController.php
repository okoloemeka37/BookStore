<?php

namespace App\Http\Controllers;
use App\Models\Books;
use Illuminate\Http\Request;

class IndexPageController extends Controller
{
    function index ($genre=null){
        if ($genre ===true ) {
        if(($genre != 'All') ){
            $books=Books::where('genre','=',$genre)->orderBy("id",'desc')->with('user')->paginate(20);
        }else{
            $books=Books::orderBy("id",'desc')->with('user')->paginate(20);
        }
        //slecting all books;
    }else{  $books=Books::orderBy("id",'desc')->with('user')->paginate(20);
    
    $genre='All';}


    
    return view('welcome',['books'=>$books,'type'=>$genre]);
    }
    function single($id){
        $book=Books::where('id','=',$id)->limit(1)->with('user')->get();
        return view('all.Book',['book'=>$book]);
    } 
}
