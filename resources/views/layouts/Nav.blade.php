@vite( ['resources/css/app.css','resources/sass/app.scss', 'resources/js/app.js'])
<body>
    <div class="topNavBar">
    <li class="one"><a href="">Logo <span class="fName">Book</span> <span class="sName">Lib</span> </a></li>
    <li class="nS"><input type="text" name="search"  class="navSearch" placeholder="Search Our Library"></li>
    <li class="to"><a href="">Track Order</a></li>
    <li class="to"><a href="">Cart</a></li>
    <li class="sb bg-lb"><a href="{{route('login')}}">Sign In</a></li>
    </div>
    
    <div class="secondNav">
        <li><a href="">Home</a></li>
        <li><a href="">Categories</a></li>
        <li><a href="">About</a></li>
        <li><a href="">Blog</a></li>
        <li><a href="">Contact</a></li>
    </div>
    