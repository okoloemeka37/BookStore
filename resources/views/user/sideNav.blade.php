@vite( ['resources/sass/Admin.scss','resources/js/Admin.js'])

<nav>

  <?php
  $user=auth()->user();
$image="uploaded/".$user->image;
?>
<div class="admin-info">

    <img src="{{ URL::asset($image) }}" alt="Admin Avatar">
    <span>Welcome, {{$user->name}}</span>
</div>


    <a href="{{route('home')}}">HOME</a>

  <a href="{{route('dashboard')}}">Dashboard</a>

  <a href="{{'Addbook'}}">AddBooks</a>

  <a href="#">Books</a>

  <a href="#">Orders</a>

  <a href="#">AddPost</a>

  <a href="#">Posts</a>
  
  <a href="#">Reports</a>
  <form action="{{route('logout')}}" method="post">@csrf <button type="submit">Logout</button></form>
</nav>
  @yield('con')