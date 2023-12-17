@vite( ['resources/sass/Admin.scss']) 
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
  @if ($user->role==='Admin')
  <a class="non" href="{{route('dashboard')}}">Dashboard</a>
  <a class="non" href="{{route('alusers')}}">Users</a>
  <a class="non" href="{{route('Addbook')}}">AddBooks</a>
  <a class="non" href="#">Orders</a>
  <a class="non" href="#">Customers</a>
  <a class="non" href="#">Reports</a>

  @elseif ($user->role==='Author')
  <a class="non" href="{{route('AuthorDashboard')}}">Dashboard</a>
  <a class="non" href="{{route('Addbook')}}">AddBooks</a>
  <a class="non" href="{{route('Authorbook')}}">Books</a>
  <a class="non" href="#">Customers</a>
  <a class="non" href="#">Reports</a>

  @else
    <a class="non" href="{{route('NormDashboard')}}">Dashboard</a>
    <a class="non" href="{{route('NormDashboard')}}">Become An Author</a>
  @endif
 
  <a class="non" href="{{route('notice')}}">Notification</a>

 
  
 
  <form action="{{route('logout')}}" method="post">@csrf <button type="submit">Logout</button></form>
</div>
 