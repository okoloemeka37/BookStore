<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Book Management</title>
</head>
<body>

  <header>
    <h1>Admin Book Management</h1>
  </header>


   
  @extends('admin.sideNav')

  @section('con')
 
  @endsection


  <section>
    <div class="book-grid">
      <!-- Example book entry, replace with dynamic content from your backend -->
      <div class="book-entry">
        <img class="book-image" src="{{ URL::asset('images/front.jpg') }}" alt="Book Image 1">
        <div class="book-info">
          <h3>Book Title 1</h3>
          <p>Author 1</p>
          <small>Uploaded By <a href="" style="color: #f05241;"> Zyler </a></small>
        </div>
      </div>

      <div class="book-entry">
        <img class="book-image" src="{{ URL::asset('images/front.jpg') }}" alt="Book Image 2">
        <div class="book-info">
          <h3>Book Title 2</h3>
          <p>Author 2</p>
          <small>Uploaded By <a href="" style="color: #f05241;"> Zyler </a></small>
        </div>
      </div>



      <div class="book-entry">
        <img class="book-image" src="{{ URL::asset('images/front.jpg') }}" alt="Book Image 1">
        <div class="book-info">
          <h3>Book Title 1</h3>
          <p>Author 1</p>
          <small>Uploaded By <a href="" style="color: #f05241;"> Zyler </a></small>
        </div>
      </div>

      <div class="book-entry">
        <img class="book-image" src="{{ URL::asset('images/front.jpg') }}" alt="Book Image 2">
        <div class="book-info">
          <h3>Book Title 2</h3>
          <p>Author 2</p>
          <small>Uploaded By <a href="" style="color: #f05241;"> Zyler </a></small>
        </div>
      </div>



      <div class="book-entry">
        <img class="book-image" src="{{ URL::asset('images/front.jpg') }}" alt="Book Image 1">
        <div class="book-info">
          <h3>Book Title 1</h3>
          <p>Author 1</p>
          <small>Uploaded By <a href="" style="color: #f05241;"> Zyler </a></small>
        </div>
      </div>

      <div class="book-entry">
        <img class="book-image" src="{{ URL::asset('images/front.jpg') }}" alt="Book Image 2">
        <div class="book-info">
          <h3>Book Title 2</h3>
          <p>Author 2</p>
          <small>Uploaded By <a href="" style="color: #f05241;"> Zyler </a></small>
        </div>
      </div>




      <div class="book-entry">
        <img class="book-image" src="{{ URL::asset('images/front.jpg') }}" alt="Book Image 1">
        <div class="book-info">
          <h3>Book Title 1</h3>
          <p>Author 1</p>
          <small>Uploaded By <a href="" style="color: #f05241;"> Zyler </a></small>
        </div>
      </div>

      <div class="book-entry">
        <img class="book-image" src="{{ URL::asset('images/front.jpg') }}" alt="Book Image 2">
        <div class="book-info">
          <h3>Book Title 2</h3>
          <p>Author 2</p>
          <small>Uploaded By <a href="" style="color: #f05241;"> Zyler </a></small>
        </div>
      </div>
      <!-- Add more book entries as needed -->
    </div>
  </section>

</body>
</html>
