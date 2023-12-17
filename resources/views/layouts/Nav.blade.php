@vite( ['resources/css/app.css','resources/sass/app.scss', 'resources/js/app.js'])
<body>
    <div class="topNavBar">
    <li class="one"><a href="">Logo <span class="fName">Book</span> <span class="sName">Lib</span> </a></li>
    <li class="nS"><input type="text" name="search"  class="navSearch" placeholder="Search Our Library"></li>
    <li class="to"><a href="">Track Order</a></li>
    <li class="to"><a href="">Cart</a></li>
    @auth
    
    <li class="sb bg-lb"><a href="@if (auth()->user()->role =='Admin')
        {{route('dashboard')}}
    @elseif (auth()->user()->role =='Author')
    {{route('AuthorDashboard')}}
    @else  {{route('NormDashboard')}}
    @endif">Add Book</a></li>
    @endauth
    @guest
    <li class="sb bg-lb"><a href="{{route('login')}}">Sign In</a></li>  
    @endguest
    </div>
    
    <div class="secondNav">
        <li><a href="">Home</a></li>
        <li><a href="">Categories</a></li>
        <li><a href="">About</a></li>
        <li><a href="">Blog</a></li>
        <li><a href="">Contact</a></li>
    </div>
    