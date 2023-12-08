<?php

namespace App\Http\Controllers;
use App\Models\Books;
use App\Models\Notification;
use App\Models\User;

use Illuminate\Support\Facades\Storage;


use Illuminate\Http\Request;


class BooksController extends Controller
{
    function AdminBooks(){
        //selecting All Books By Admin
        $adminBooks = Books::where("user_id","=",'1')->orderBy("id",'desc')->withTrashed()->get();

        // selecting all books not by norms;

        $normBooks = Books::where("user_id","!=",'1')->orderBy("id",'desc')->with('user')->withTrashed()->get();
        return view('admin.Books',['adminBook'=>$adminBooks,'norms'=>$normBooks]);
    }
    function user_show_books(){
        $user=auth()->user()->id;
        $normBooks = Books::where("user_id","=",$user)->orderBy("id",'desc')->with('user')->withTrashed()->get();
        return view('user.books',['books'=>$normBooks]);
    }
    function show(){
        
        return    view('all.AddBook');
    }


 


  public function store(Request $request){
 $request->validate([
    'bookName'=>'required',
    'author'=> 'required',
    'description'=> 'required',
    'image'=>'required|image',
    'pick'=>'required',
    'genre'=>'required|string',
    
]); 

if($request["free"] == "false"){
$request->validate(["price"=>"required|numeric"]);
$price=$request['price'];
$free="false";
}else{
    $free="true";
    $price="";
}
  
    if($request["pick"] == 'hard'){
        $request->validate(["location"=>"required"]);
       
        $location=$request['location'];
        $copy='hard';
    }
    $imageName = time().'.'.$request->image->extension();
    if($request["pick"] == 'soft'){
        
        $request->validate(["book"=>"required"]);
       
        $location='';
        $copy='soft';
       
    }

   

    //upload BookImage
   
    $request['image']->move(public_path('BookImages'), $imageName);

    if($request["pick"] == 'soft'){
        $bookName=$request['book']->getClientOriginalName();
$request['book']->move(public_path('Books'), $bookName);
    }else{
        $bookName='';
    }


    Books::create([
        'title'=>$request['bookName'],
        'description'=>$request['description'],
        'price'=>$price,
        'link'=>$bookName,
        'user_id'=>auth()->user()->id,
        'genre'=>$request['genre'],
        'location'=>$location,
        'author'=>$request['author'],
        'image'=>$imageName,
        'free'=>$free,
        'hard_copy'=>$copy
    ]);



   //selecting All Books By Admin
   if(auth()->user()->id ===0){
    return redirect()->route('AdminBooks')->with('success', 'Book Added successfully.');
   }else{
    return redirect()->route('ubook')->with('success', 'Book Added successfully.');
   }
    }


 


    //show  edit page for Books

    function edit($id){
        $book = Books::find($id);
        return view("all.edit_book",['book'=>$book]);
    }



    function update(Request $request, $id){

        $request->validate([
            'bookName'=>'required',
            'author'=> 'required',
            'description'=> 'required',
            'image'=>'nullable|image',
            'pick'=>'required',
            'genre'=>'required|string',
            
        ]); 
       
        if($request['free']===NULL){
            $request['free']='false';
        }

if($request["free"] === "false"){
    $request->validate(["price"=>"required|numeric"]);
    $price=$request['price'];
    $free="false";
    
    }else{
        $free="true";
        $price="";
    }
      
        if($request["pick"] == 'hard'){
            $request->validate(["location"=>"required"]);
            $bookLink='';
            $location=$request['location'];
            $copy='hard';
        }
       
        if($request["pick"] == 'soft'){
            
            $request->validate(["book"=>"nullable"]);
           
            $location='';
            $copy='soft';
           

            if($request->book=== NULL){
                $book=$request["old-book"];
    
                        }
                        else{
                            if(!$request['old-book']==NULL){
                                $oldbookPath=public_path("Books/".$request["old-book"]);  
                                unlink($oldbookPath);                             
                            }


                            $book=$request->book->getClientOriginalName();
                            $request->book->move(public_path("Books"),$book);

                            
                           
                        }
        }else{
            $book=' ';
        }



        if($request->image=== NULL){
$image=$request["old-image"];

        }
        else{
            $image=time().'.'.$request->image->extension();
            $request->image->move(public_path("BookImages"),$image);

            //removing existing image
            $oldbookimage=public_path("BookImages/".$request["old-image"]);
            unlink($oldbookimage);
  
        }
       
            


$bookFound=Books::find($id);
        
   $bookFound->update([
        'title'=>$request['bookName'],
        'description'=>$request['description'],
        'price'=>$price,
        'link'=>$book,
        'user_id'=>auth()->user()->id,
        'genre'=>$request['genre'],
        'location'=>$location,
        'author'=>$request['author'],
        'image'=>$image,
        'free'=>$free,
        'hard_copy'=>$copy
    ]);

    if(auth()->user()->id ===0){
        return redirect()->route('AdminBooks')->with('success', 'Book Added successfully.');
       }else{
        return redirect()->route('ubook')->with('success', 'Book Added successfully.');
       }
    }


    function delete_book($id){
      $book= Books::withTrashed()->find($id);
      
     if($book->user_id===auth()->user()->id){

     }else{
        Notification::create([
            'from_id'=>auth()->user()->id,
            'user_id'=>$book->user_id,
            'book_id'=>$book->id,
            'description'=>"Your Book".$book->title ."Was Permenently Deleted",
            'status'=>"unchecked",
            'type'=>'Deleted',
            'for_text'=>'Book',
            'book_title'=>$book->title
       ]);
     }
   
//remove image
$imagePath=public_path("BookImages/".$book['image']);
//unlink($imagePath);
    
      //removing Book

      if(!empty($book['link'])){
        $bookPath=public_path("Books/".$book['link']);
//unlink($bookPath);
      }
      $book->forceDelete();
        return response()->json(["message"=>"Book Deleted Successfully"]);
    }



    //remove norms book

    function remove(Request $request){
        $jsonData = json_decode($request->getContent(), true);
        $book_id=$jsonData['book_id'];
        $book=Books::withTrashed()->find($book_id);
       
        $user_id=$book['user_id'];
        $reason=$jsonData['reason'];
        $title=$book['title'];
        //sending notification
       Notification::create([
            'from_id'=>auth()->user()->id,
            'user_id'=>$user_id,
            'book_id'=>$book_id,
            'description'=>$reason,
            'status'=>"unchecked",
            'type'=>'Removed',
            'for_text'=>'Book',
            'book_title'=>$title,
       ]);
       // softdeleting the book
       $book=Books::withTrashed()->find($book_id);
       $book->delete();

    }

    function restore(Request $request){
        $jsonData=json_decode($request->getContent(), true);

        $book_id=$jsonData['book_id'];
        $book=Books::withTrashed()->find($book_id);
        $book->restore();


         //sending notification
       Notification::create([
        'from_id'=>auth()->user()->id,
        'user_id'=>$book['user_id'],
        'subject'=>$book_id,
        'description'=>"Your Book".$book['title']. "Was Restored",
        'status'=>"unchecked",
        'type'=>'Removed',
            'for_text'=>'Book',
            'book_title'=>$book['title'],
   ]);

       

    }


    //lifesearch
    function search(Request $request){
        $data=json_decode($request->getContent(),true);
        $word=$data['value'];
       $books= Books::where('title','like','%'. $word .'%')->get();
        return json_encode($books);
    }

}
