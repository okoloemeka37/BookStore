<?php

namespace App\Http\Controllers;
use App\Models\Books;

use Illuminate\Http\Request;


class BooksController extends Controller
{
    function show(){
        
        return    view('admin.AddBook');
    }

    function store(Request $request){
 $request->validate([
    'bookName'=>'required',
    'author'=> 'required',
    'description'=> 'required',
    'image'=>'required|image',
    'pick'=>'required',
    'genre'=>'required|string',
    
]); 

if($request["free"] == false){
$request->validate(["price"=>"required|numeric"]);
$free='no';
}else{
    $free='yes';
}
  
    if($request["pick"] == 'hard'){
        $request->validate(["location"=>"required"]);
        $bookLink='';
        $location=$request['location'];
        $copy='hard';
    }
    $imageName = time().'.'.$request->image->extension();
    if($request["pick"] == 'soft'){
        
        $request->validate(["book"=>"required"]);
        $bookLink=$request['book'];
        $location='';
        $copy='soft';
       
    }

    Books::create([
        'title'=>$request['bookName'],
        'link'=>$bookLink,
        'user_id'=>auth()->user()->id,
        'genre'=>$request['genre'],
        'location'=>$location,
        'author'=>$request['author'],
        'image'=>$imageName,
        'free'=>$free,
        'hard_copy'=>$copy
    ]);

    //upload BookImage
    $request['image']->move(public_path('BookImages'), $imageName);

    if($request["pick"] == 'soft'){
$request['book']->move(public_path('Books'), $request['book']);
    }

    }


    function Books(){
        
        return view('admin.Books');
    }

}
