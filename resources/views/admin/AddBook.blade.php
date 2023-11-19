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
    @vite( ['resources/css/app.css','resources/sass/app.scss','resources/sass/Admin.scss', 'resources/js/app.js'])
 <?php $image="uploaded/".$user['image']?>
    <header>
<h2>AddBook</h2>
     
      <div class="admin-info">
        <span>Welcome, {{$user["name"]}}</span>
       <a href="{{route('dashboard')}}"><img src="{{ URL::asset($image) }}" alt="Admin Avatar"></a>
        
      </div>
    </header>
    
  <form id="bookForm">
    <label for="bookName">Book Name:</label>
    <input type="text" class="vb" id="bookName"  name="bookName" required>

    <label for="author">Author:</label>
    <input type="text" class="vb" id="author" n ame="author" required>

    <label for="description">Description:</label>
    <textarea class="vb" id="descripti on" name="description" rows="4" required></textarea>

    <label for="price">Price :(free <input type="checkbox" class="cb" value="off" name=""  > ) </label>
    <input type="text" class="vb" id="price" name="price" required>


    <input type="radio" id="sc" name="pick" checked  value="sc">Soft copy
    <br>
    <br>
    <input type="radio" id="hc" name="pick"  value="hc">Hard copy

    <label for="image">Image:</label>
    <span class="fakebtn aimg">Upload Book Image</span>
    <span class="fakebtn abook">Upload Book </span>

    <br>
    <div id="locInput"  style="display: none;" >
    <label for="image">Store Location:</label>
    <input type="text" class="vb" name="location">
   
  </div>

    <img class="vb" id="imagePrev iew" alt="Image Preview" style="display: none;">

    <button type="submit">Upload Book</button>



    <input type="file" class="ig" id="BookImage" name="image" accept="image/*" required>
  <input type="file" class="ig" id="BookFile" name="book~" accept="image/*" required>
  
  

  </form>

  <script>
    let cb =document.querySelector(".cb");
    cb.addEventListener('click',function () {
         if (cb.value=='on') {
            let ncb= document.querySelector(".cb")
       
        document.querySelector(".cb").value='off'
        console.log(document.querySelector(".cb"))
               // add price input
        document.querySelector("#price").style.display='block';
         }else{
            let ncb= document.querySelector(".cb")
       
       document.querySelector(".cb").value='on'
       console.log(document.querySelector(".cb"))
       // remove price input
       document.querySelector("#price").style.display='none';
         }
      
    })


    // handling radios

    let rad=document.querySelector("#sc")
    rad.addEventListener('click',()=>{
      document.querySelector(".abook").style.display="block"
      document.querySelector("#locInput").style.display="none"
    })


    let ra=document.querySelector("#hc")
    ra.addEventListener('click',()=>{
      document.querySelector(".abook").style.display="none"
      document.querySelector("#locInput").style.display="block";
      document.querySelector("#sc").removeAttribute("checked")
    })

    // handling fakebtn image first .only one video is allowed

    document.querySelector(".")


  </script>
</body>
</html>