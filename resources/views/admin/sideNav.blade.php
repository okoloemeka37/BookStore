
<div class="nav">
  <?php
    $user=auth()->user();
  $image="uploaded/".$user->image;
  ?>
  <div class="admin-info">
  
      <img src="{{ URL::asset($image) }}" alt="Admin Avatar">
      <span>Welcome, {{$user->name}}</span>
  </div>

  <a class="non" href="{{route('home')}}">HOME</a>
  <a class="non" href="{{route('dashboard')}}">Dashboard</a>
  <a class="non" href="{{route('alusers')}}">Users</a>
  <a class="non" href="{{route('Addbook')}}">AddBooks</a>
  <a class="non" href="{{route('AdminBooks')}}">Books</a>
  <a class="non" href="#">Orders</a>
  <a class="non" href="#">Customers</a>
  <a class="non" href="#">Reports</a>
  <form action="{{route('logout')}}" method="post">@csrf <button type="submit">Logout</button></form>
</div>
 