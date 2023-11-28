<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Book Management</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

</head>
<body>

  <header>
    <h1>Admin Book Management</h1>
  </header>



   
  @extends('admin.sideNav')

  


  <section>
    @if (session('success'))
    <div class="alert alert-success">
      {{session('success')}}
    </div>
    @endif

    <div class="alert2 alert-success" style="display:none;">
     
    </div>


    <div class="search-bar">
    <input type="text" placeholder="Search...">
    </div>
  
    

    <div class="book-grid">
 
      @foreach ($adminBook as $book )
      <?php $image="BookImages/".$book['image'] ?>
      <div class="book-entry">
        <img class="book-image" src="{{ URL::asset($image) }}" alt="Book Image 1">
        <div class="book-info">
          <h3>{{$book['title']}}</h3>
          <p>{{$book['author']}} (<span>Uploaded by <a href="" style="color: red;">{{$book->user['name']}}</a></span>)</p>
        </div>
         <div class="book-buttons">
          <button class="edit"><a href="{{route('edit_btn',$book->id)}}">Edit</a></button>
          <button class="delete" ct={{$book->id}} >Delete</button>
        </div>
      </div>

      @endforeach
    
      <form action="">
        @csrf
      </form>

 
    </div>
    <button class="view-more-button" id="v-more">View More Books</button>
    <button class="view-more-button" id="v-less" style="display: none;">View Less Books</button>

{{-- the books uploaded by other users --}}

    <div class="df">
      <h1>USERS BOOKS</h1>

     
    {{--       <p class="tf">All</p>
          <p class="tf"> Poetry</p>
         <p class="tf">Nonfiction</p>
         <p class="tf">Drama</p>
          <p class="tf">Romance</p>
            <p class="tf">Mystery</p>
              <p class="tf">Thriller</p>
                <p class="tf">Science Fiction</p>
                  <p class="tf">Fantacies</p>
                    <p class="tf">Horror</p>
                      <p class="tf">History</p> --}}


<p>sort By</p>
    </div>

  {{-- user books --}}

  
  <div class="book-grid">
 
    @foreach ($norms as $book )
    <?php $image="BookImages/".$book['image'] ?>
    <div class="book-entry-norms">
      <img class="book-image" src="{{ URL::asset($image) }}" alt="Book Image 1">
      <div class="book-info">
        <h3>{{$book['title']}}</h3>
        <p>{{$book['author']}} (<span>Uploaded by <a href="" style="color: red;">{{$book->user['name']}}</a></span>)</p>
      </div>
       <div class="book-buttons">
       
        <button class="delete-norms" ct={{$book->id}} >Delete</button>
      </div>
    </div>

    @endforeach
    
    {{$norms->links()}}
  </div>


  </section>



  <script>
    //for deleting Books
    const deletes=document.querySelectorAll(".delete")
let input=document.querySelectorAll("input")[1]
   deletes.forEach(element => {
    element.addEventListener("click",() =>{
      let gf=confirm("Are You Sure You Want to Delete User");

      if (gf) {
let id=element.getAttribute('ct')
    fetch(`/delete_book/${id}`,{
    method:"DELETE",
    headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN':input.value,
        },
  })
    .then((response)=>{
      if (!response.ok) {throw new Error('Network response was not ok');}
        return response.json();
  }).then(data=>{
    element.parentElement.parentElement.remove()
    document.querySelector(".alert2").style.display="block"
    document.querySelector(".alert2").innerHTML=data.message;
   
    setTimeout(() => {
  document.querySelector(".alert2").style.display='none'
}, 2100);
  }) 
    






      }
    
    });

   });

//remove success message after 2s
if (document.querySelector(".alert")) {

setTimeout(() => {
  document.querySelector(".alert").style.display='none'
}, 2100);
}

//reducing number of books

let books=document.querySelectorAll(".book-entry");

for (let i = 12; i < books.length; i++) {
  const book = books[i];
  book.style.display="none"
}


//veiwing more books
let v_more=document.querySelector("#v-more");
v_more.addEventListener("click",function () {
  let books=document.querySelectorAll(".book-entry");
  for (let i = 0; i < books.length; i++) {
  const book = books[i];
  book.style.display="block"
}
v_more.style.display="none";
document.querySelector("#v-less").style.display='block';
})

//viewing less books
let v_less=document.querySelector("#v-less");
v_less.addEventListener("click",function () {
  let books=document.querySelectorAll(".book-entry");
  for (let i = 12; i < books.length; i++) {
  const book = books[i];
  book.style.display="none"
}
v_less.style.display="none"
document.querySelector("#v-more").style.display="block"
})

  </script>
</body>
</html>
