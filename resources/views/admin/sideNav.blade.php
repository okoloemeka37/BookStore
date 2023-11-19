@vite( ['resources/css/app.css','resources/sass/app.scss','resources/sass/Admin.scss', 'resources/js/app.js'])
<nav>
  <a href="{{route('dashboard')}}">Dashboard</a>
  <a href="{{route('users')}}">Users</a>
  <a href="{{'Addbook'}}">AddBooks</a>
  <a href="#">Orders</a>
  <a href="#">Customers</a>
  <a href="#">Reports</a>
  <form action="{{route('logout')}}" method="post">@csrf <button type="submit">Logout</button></form>
</nav>
  @yield('con')