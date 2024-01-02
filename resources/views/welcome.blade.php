@extends('../layouts.head')
@extends('../layouts.Nav')

@section('title') BookLib @endsection

@vite( ['resources/js/app.js'])

@section('content')


{{--search bar result--}}
<p class="cs">  @csrf</p>

<div id="search-results">

</div>





<div class="hold">
<div class="flat fade" style="background-image:url({{ URL::asset('images/front.jpg') }})">
    
    <div class="writes td">
        <p class="tg ">Science Fiction</p>
        <h1 class="ht">The History <br> Of Niguaragua</h1>
        <li class="sb bg-red f"><a href="">Browse More</a></li>
    </div>

</div>

<div class="flat fade " style="background-image:url({{ URL::asset('images/f.jpg') }})">
    
    <div class="writes td">
        <p class="tg ">Science Fiction</p>
        <h1 class="ht">The History <br> Of Niguaragua</h1>
        <li class="sb bg-red f"><a href="">Browse More</a></li>
    </div>

</div>
<div class="flat fade" style="background-image:url({{ URL::asset('images/f2.jpg') }})">
    
    <div class="writes td">
        <p class="tg ">Science Fiction</p>
        <h1 class="ht">The History <br> Of Niguaragua</h1>
        <li class="sb bg-red f"><a href="">Browse More</a></li>
    </div>

</div>
</div>


<div class="mor">
    <h2 class="hd">Best Selling Books Ever</h2>
    <i class="fa-solid fa-angle-left"  id="minus"></i>
     
    <i class="fa-solid fa-angle-right"id="plus"></i>
      
    <div class="gr ">
</div>
        <div class="tm">
            <a href="">
                    <img src="{{ URL::asset('images/im.jpg') }}" alt="">
                <div class="net">
                        <h1 class="title">The Barrons Betrayal</h1>
                        <p class="author">E.O Zyler</p>
                        <div class="sl">
                            <p class="reviews">(<span>120</span> reviews)</p>
                        <p class="price">$150</p>
                        </div>
                        
    </div>
      
</a>
        </div>

            <div class="tm">
                <a href="">
                <img src="{{ URL::asset('images/im.jpg') }}" alt="">
                <div class="net">
                    <h1 class="title">The Barrons Betrayal</h1>
                    <p class="author">E.O Zyler</p>
                    <div class="sl">
                        <p class="reviews">(<span>120</span> reviews)</p>
                    <p class="price">$250</p>
                    </div>
                    
                </div>

            </a>
            </div>
<div class="tm">
    <a href="">
    <img src="{{ URL::asset('images/im.jpg') }}" alt="">
    <div class="net">
        <h1 class="title">The Barrons Betrayal</h1>
        <p class="author">E.O Zyler</p>
        <div class="sl">
            <p class="reviews">(<span>120</span> reviews)</p>
        <p class="price">$350</p>
        </div>
        
    </div>

</a>
</div>
<div class="tm">
    <a href="">
    <img src="{{ URL::asset('images/im.jpg') }}" alt="">
    <div class="net">
        <h1 class="title">The Barrons Betrayal</h1>
        <p class="author">E.O Zyler</p>
        <div class="sl">
            <p class="reviews">(<span>120</span> reviews)</p>
        <p class="price">$450</p>
        </div>
        
    </div>

</a>
</div>
<div class="tm">
    <a href="">
    <img src="{{ URL::asset('images/im.jpg') }}" alt="">
    <div class="net">
        <h1 class="title">The Barrons Betrayal</h1>
        <p class="author">E.O Zyler</p>
        <div class="sl">
            <p class="reviews">(<span>120</span> reviews)</p>
        <p class="price">$550</p>
        </div>
        
    </div>

</a>
</div>
<div class="tm">
    <a href="">
    <img src="{{ URL::asset('images/im.jpg') }}" alt="">
    <div class="net">
        <h1 class="title">The Barrons Betrayal</h1>
        <p class="author">E.O Zyler</p>
        <div class="sl">
            <p class="reviews">(<span>120</span> reviews)</p>
        <p class="price">$650</p>
        </div>
        
    </div>

</a>
</div>
<div class="tm">
    <a href="">
    <img src="{{ URL::asset('images/im.jpg') }}" alt="">
    <div class="net">
        <h1 class="title">The Barrons Betrayal</h1>
        <p class="author">E.O Zyler</p>
        <div class="sl">
            <p class="reviews">(<span>120</span> reviews)</p>
        <p class="price">$750</p>
        </div>
        
    </div>

</a>
</div>
<div class="tm">
    <a href="">
    <img src="{{ URL::asset('images/im.jpg') }}" alt="">
    <div class="net">
        <h1 class="title">The Barrons Betrayal</h1>
        <p class="author">E.O Zyler</p>
        <div class="sl">
            <p class="reviews">(<span>120</span> reviews)</p>
        <p class="price">$850</p>
        </div>
        
    </div>

</a>
</div>
<div class="tm">
    <a href="">
    <img src="{{ URL::asset('images/im.jpg') }}" alt="">
    <div class="net">
        <h1 class="title">The Barrons Betrayal</h1>
        <p class="author">E.O Zyler</p>
        <div class="sl">
            <p class="reviews">(<span>120</span> reviews)</p>
        <p class="price">$950</p>
        </div>
        
    </div>

</a>
</div>
<div class="tm">
    <a href="">
    <img src="{{ URL::asset('images/penny.jpg') }}" alt="">
    <div class="net">
        <h1 class="title">The Barrons Betrayal</h1>
        <p class="author">E.O Zyler</p>
        <div class="sl">
            <p class="reviews">(<span>120</span> reviews)</p>
        <p class="price">$050</p>
        </div>
        
    </div>

</a>
</div>
<div class="tm">
    <a href="">
    <img src="{{ URL::asset('images/f.jpg') }}" alt="">
    <div class="net">
        <h1 class="title">The Barrons Betrayal</h1>
        <p class="author">E.O Zyler</p>
        <div class="sl">
            <p class="reviews">(<span>120</span> reviews)</p>
        <p class="price">$7850</p>
        </div>
        
    </div>

</a>
</div>

</div>

<div class="tw">
    <div class="fv">
        <h1 class="ft">Featured This Week </h1>

        <div class="ftw">
           
            <div class="sf">
                <img src="{{ URL::asset('images/im.jpg') }}" alt="">
                <div class="nt">
                    <h1 class="title">The Barrons Betrayal</h1>
                    <p class="author"> by E.O Zyler</p>
                    <p class="pt">$g50</p>
                    <p class="revies">(<span>120</span> reviews)</p>  
                  <p ><a href=""class="sd">View Details</a>  </p>    
                </div>

            </div>

            <div class="sf">
                <img src="{{ URL::asset('images/im.jpg') }}" alt="">
                <div class="nt">
                    <h1 class="title">The Betrayal</h1>
                    <p class="author"> by E.O Zyler</p>
                    <p class="pt">$g50</p>
                    <p class="revies">(<span>120</span> reviews)</p>  
                  <p ><a href=""class="sd">View Details</a>  </p>    
                </div>

            </div>

            <div class="sf">
                <img src="{{ URL::asset('images/im.jpg') }}" alt="">
                <div class="nt">
                    <h1 class="title">The Barrons Wars</h1>
                    <p class="author"> by E.O Zyler</p>
                    <p class="pt">$g50</p>
                    <p class="revies">(<span>120</span> reviews)</p>  
                  <p ><a href=""class="sd">View Details</a>  </p>    
                </div>

            </div>
       
        </div>

    
    </div>

    <div class="di">
        <div >
    <img class="fl" src="{{ URL::asset('images/penny.jpg') }}" alt="">
            <div class="up">
                <p class="ts ">Science Fiction</p>
                <small class="h">The History <br> Of Penny Wise</small>
               
            </div>
        
        </div>
    </div>
</div>


<div class="lpi">
    <div class="df">

        <p class="tf now"><a class="ta" href="{{route('gen','null')}}">All</a></p>
        <p class="tf"><a class="ta" href="{{route('gen','Poetry')}}">Poetry</a></p>
       <p class="tf"><a class="ta" href="{{route('gen','Nonfiction')}}">Nonfiction</a></p>
       <p class="tf"><a class="ta" href="{{route('gen','Drama')}}">Drama</a></p>
        <p class="tf"><a class="ta" href="{{route('gen','Romance')}}">Romance</a></p>
        <p class="tf"><a class="ta" href="{{route('gen','Mystery')}}">Mystery</a></p>
        <p class="tf"><a class="ta" href="{{route('gen','Thriller')}}">Thriller</a></p>
        <p class="tf"><a class="ta" href="{{route('gen','Fiction')}}">Fiction</a></p>
        <p class="tf"><a class="ta" href="{{route('gen','Fantacies')}}">Fantacies</a></p>
        <p class="tf"><a class="ta" href="{{route('gen','Horror')}}">Horror</a></p>
        <p class="tf"><a class="ta" href="{{route('gen','History')}}">History</a></p> 
 
    </div>

    <div class="book-flex">
 
        @foreach ($books as $book )
        <?php $image="BookImages/".$book['image'] ?>
       
        <div class="book-entry bookies">
<a href="{{route('sin',$book['id'])}}">
          <img class="book-image" src="{{ URL::asset($image) }}" alt="Book Image 1">
          <div class="book-info">
            <h3 class="title">{{$book['title']}}</h3>
             <p>{{$book['genre']}}</p>
            <p class="author">{{$book['author']}} (<span>Uploaded by <a href="{{route('sortAuth',$book->user_id)}}" style="color: red;"> {{$book->user['name']}}</a></span>)</p>
          
        </div>

            <p class="price">Price:@if($book['price']=='') <span style=" color:skyblue"> Free Download </span>@else {{$book['price']}} @endif</p>
    </a>
        </div>
   
        @endforeach
       
  
   
      </div>
      <div class="pagination">
        <span class="page-links">
            {!! $books->links('vendor\pagination\default') !!}
        </span>
    </div>
</div>


<div class="jn" style="background-image:url({{ URL::asset('images/grid.jpg') }})">

        <h2 class="mv">Join Our NewsLetter</h2>
        <p>Lorem started its journey with cast iron (CI) products in 1980. <br> The initial main objective was to   ensure pure water and  <br> affordable irrigation.

            <form action="">
                <input type="email" placeholder="Enter Your Email">
                <button>Subscribe</button>
            </form>
        </p>


</div>

<script defer>
    let current="{{$type}}"
   let ta=document.querySelectorAll(".ta")
   
   ta.forEach(el => {
    el.parentElement.classList.remove('now')
    if (el.innerHTML===current) {
        el.parentElement.classList.add('now')
    }
   });
   
</script>
@endsection


</body>
</html>