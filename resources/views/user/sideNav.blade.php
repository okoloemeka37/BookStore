@vite( ['resources/sass/Admin.scss','resources/js/Admin.js'])
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
  <a class="non" href="{{route('udashboard')}}">Dashboard</a>
  <a class="non" href="{{route('notice')}}">Notification</a>
  <a class="non" href="{{route('Addbook')}}">AddBooks</a>
  <a class="non" href="{{route('ubook')}}">Books</a>
  <a class="non" href="#">Orders</a>

  <a href="#">Reports</a>
  <form action="{{route('logout')}}" method="post">@csrf <button type="submit">Logout</button></form>
</div>
 