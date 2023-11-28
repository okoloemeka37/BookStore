<?php

namespace App\Http\Controllers;
use App\Models\Books;
use App\Models\User;
use Illuminate\Support\Facades\Storage;


use Illuminate\Http\Request;


class BooksController extends Controller
{
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
   return redirect()->route('AdminBooks')->with('success', 'Book Added successfully.');
    }


    function AdminBooks(){
        //selecting All Books By Admin
        $adminBooks = Books::where("user_id","=",'1')->orderBy("id",'desc')->get();

        // selecting all books not by norms;

        $normBooks = Books::where("user_id","!=",'1')->orderBy("id",'desc')->with('user')->paginate(4);
        return view('admin.Books',['adminBook'=>$adminBooks,'norms'=>$normBooks]);
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

    return redirect()->route("AdminBooks")->with('success', 'Book updated successfully.');  


    }


    function delete_book($id){
      $book= Books::find($id);
      $book->destroy($id);
//remove image
$imagePath=public_path("BookImages/".$book['image']);
unlink($imagePath);
    
      //removing Book

      if(!empty($book['link'])){
        $bookPath=public_path("Books/".$book['link']);
unlink($bookPath);
      }
        return response()->json(["message"=>$book->link]);
    }



}
