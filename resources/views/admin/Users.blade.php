<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Management</title>
  <link rel="stylesheet" href="stle.css">
</head>
<body>

 
  @extends('admin.sideNav')

  @section('con')
 
  @endsection
  <section>
    <div class="search-bar">
      <input type="text" placeholder="Search...">
      </div>
    
    <?php $id=1 ?>
    <div class="user-section">
      <div class="split">
      <h2>User List</h2>

</div>
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Blogs</th>
            <th>Books</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
       @if ($users=='')
         
       @else
       @foreach ($users as $user)
      
       
       <tr>
         <td>{{$id++}}</td>
         <td>{{$user['name']}}</td>
         <td>{{$user['email']}}</td>
        <td><a href="#">{{$user['posts_count']}}</a></td>
       <td><a href=""> {{$user['books_count']}} </a></td>
         <td class="user-actions">
           <button class="ws">Email</button>
           <button class="red" ct={{$user["id"]}}>Delete</button>
           
         </td>
       </tr>
      
       
       @endforeach
        
       @endif
        
        </tbody>
      </table>


      
      <form action="">
        @csrf
      </form>

  
    </div>
  </section>

  <script>
       
   
    document.querySelector(".red").addEventListener("click",function() {

  let gf=confirm("Are You Sure You Want to Delete User");
  let input=document.querySelectorAll("input")[1]
 if (gf) {
  let val=document.querySelector(".red").getAttribute("ct")

  fetch(`/delete_user/${val}`,{
    method:"DELETE",
    headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN':input.value,
        },
  }).then(response=>{
    if (!response.ok) {
      throw new Error('Network response was not ok');
      
    }
    return response.json();
  }).then(data=>{
    console.log(document.querySelector(".red").parentElement.parentElement.remove())
  })
 }
    })
  
  </script>
 
</body>
</html>
