@vite( ['resources/css/app.css','resources/sass/app.scss', 'resources/js/app.js'])
<div class="topNavBar">
  <li class="one"><a href="">Logo <span class="fName">Book</span> <span class="sName">Lib</span> </a></li>
  <li class="nS"><input type="text" name="search"  class="navSearch" placeholder="Search Our Library"></li>
  <li class="to"><a href="">Track Order</a></li>
  <li class="to"><a href="">Cart</a></li>
  <li class="sb bg-lb"><a href="{{route('login')}}">Sign In</a></li>
  </div>

<nav>
    <a href="#">Dashboard</a>
    <a href="#">Books</a>
    <a href="#">Orders</a>
    <a href="#">Customers</a>
    <a href="#">Reports</a>
  </nav>
  @yield('con')