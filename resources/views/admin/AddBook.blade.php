<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Book Upload Form</title>
  <style>
  form {
    max-width: 600px;
    margin: 50px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }

  
  </style>
</head>
<body>
   

    
  @extends('admin.sideNav')

  @section('con')
 
  @endsection


    <header><h2>AddBook</h2></header>
    
  <form id="bookForm" method="POST" action="{{route("storeBook")}}" enctype="multipart/form-data">
    @csrf
    <label for="bookName">Book Name:</label>
    <input type="text" class="vb" id="bookName"  name="bookName" value="{{old('bookName')}}" >

    @error("bookName")
      <p class="text-danger">{{$message}}</p>
    @enderror


    <label for="author">Author:</label>
    <input type="text" class="vb" id="author" name="author" value="{{old('author')}}" >
    @error("author")
    <p class="text-danger">{{$message}}</p>
  @enderror



      <div class="dropDownHolder">
        <label for="genre">Select Genre:</label>
    <input type="text" class="vb" id="genre" name="genre" value="{{old('genre')}}">

    @error('genre')
  <p class="text-danger">    {{$message}}</p>
    @enderror

    <div class="dropsHolder"></div>
      </div>



    <label for="description">Description:</label>
    <textarea class="vb" id="descripti on" name="description" rows="4" >{{old('description')}}</textarea>
    @error("description")
    <p class="text-danger">{{$message}}</p>
  @enderror

    <label for="price">Price :(free <input type="checkbox" class="cb" value=false name="free"  > ) </label>
    <input type="text" class="vb" id="price" name="price" value="{{old('price')}}">
    @error("price")
    <p class="text-danger">{{$message}}</p>
  @enderror


    <label for="image">Image: <span class="imgErr" style="color: red;display:none;">Only 5 Images Are Allowed</span></label>
    
    <img class="vb" id="iew" alt="Image Preview" style="display: none;">
    <span class="fakebtn aimg">Upload Book Image</span>
    @error("image")
    <p class="text-danger">{{$message}}</p>
  @enderror

  <br>
      
    <input type="radio" id="sc" name="pick" value="soft" @error('book') checked @enderror>Soft copy
    <br>
  
    <br>
    <input type="radio" id="hc" name="pick"  value='hard' @error('location') checked @enderror>Hard copy
    @error('pick')
   <p class="text-danger">Choose One Option</p> 
  @enderror




    <div id="bolk" class=" @error('book') on @else off @enderror">

          <p class="bn">Upload Book Name:</p>
          <span class="fakebtn abook ">Upload Book  </span>
          @error("book")
          <p class="text-danger">Pls Upload A Book</p>
        @enderror

  </div>
  
    <br>

    <div id="locInput" class="@error('location') on @else off @enderror">
            <label for="image">Store Location:</label>
            <input type="text" class="vb" id="location" name="location" value="{{old('location')}}">
            @error("location")
            <p class="text-danger" >{{$message}}</p>
          @enderror
    </div>


    <button type="submit" id="upload" class="bk">Upload Book</button>



    <input type="file" class="ig" id="BookImage" name="image" accept="image/*" >

  <input type="file" class="ig" id="BookFile" name="book" accept="image/*" >
  





  </form>

  <script>

document.querySelector("#upload").addEventListener('click',function(e) {
        if (document.querySelector("#location").value === ' ') {
          e.preventDefault();
          document.querySelector("#mina").style.display="block"
        }
      })


let cb =document.querySelector(".cb");
cb.addEventListener('click',function () {
     if (cb.value==true) {
        let ncb= document.querySelector(".cb")
   
    document.querySelector(".cb").value=false
    console.log(document.querySelector(".cb"))
           // add price input
    document.querySelector("#price").style.display='block';
     }else{
        let ncb= document.querySelector(".cb")
   
   document.querySelector(".cb").value=true
   console.log(document.querySelector(".cb"))
   // remove price input
   document.querySelector("#price").style.display='none';
     }
  
})

// handling radios

let rad=document.querySelector("#sc")
rad.addEventListener('click',()=>{
  document.querySelector("#bolk").className='on'
  document.querySelector("#locInput").className='off'
  document.querySelector(".bn").style.display="block"
})


let ra=document.querySelector("#hc")
ra.addEventListener('click',()=>{
  document.querySelector("#bolk").className='off'
  document.querySelector(".bn").style.display="none"
  document.querySelector("#locInput").className='on';
 
})

// handling fakebtn image first .only one video is allowed

document.querySelector(".aimg").addEventListener("click",()=>{
  document.querySelector("#BookImage").click();
})

let uploadInput= document.querySelector("#BookImage")

uploadInput.addEventListener("change",()=>{

let file=uploadInput.files[0];
let reader=new FileReader();
reader.onload=(e)=>{

let img = document.querySelector("#iew")
img.style.display="block";
  img.className="uploadImg"
  img.src = e.target.result;
                  
} 
reader.readAsDataURL(file)


})




// handling the upload book
document.querySelector(".abook").addEventListener('click',()=>{
document.querySelector("#BookFile").click()

let upBook= document.querySelector("#BookFile")
upBook.addEventListener("change",()=>{
document.querySelector(".bn").innerHTML +=upBook.files[0].name
})
})













  </script>
</body>
</html>