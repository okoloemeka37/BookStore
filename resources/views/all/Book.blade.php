<?php
use Illuminate\Support\Carbon;?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Details</title>
    <style>
      
        section {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }

    </style>
</head>
<body>
    @vite( ['resources/sass/app.scss'])

    <section>
        @foreach ($book as $rt)
            
     
        <div class="book-details">
            <img class="book-cover" id="book-cover-image" src="{{ URL::asset('images/penny.jpg') }}" alt="Book Cover">
        <?php $date=Carbon::parse($rt['date']) ?>
            <h1>Book Title:{{$rt['title']}}</h1>
            <p>Author: {{$rt['author']}}</p>
            <p>Genre: {{$rt['genre']}}</p>
            <p>Description: {{$rt['description']}}</p>
            <p>Published Date: {{$date->toFormattedDateString()}}</p>
            <p>ISBN: 123456789</p>

            <div class="book-info">
                <h2>Additional Information</h2>
                <p>Pages: 300</p>
                <p>Language: English</p>
                <p>Format: {{$rt['hard_copy']}}cover</p>
            </div>
@if ($rt['hard_copy']==='soft')
@if ($rt['free']==='false')
<a href="#" class="download-button">Buy Book</a>
    @else
    <a href="#" class="download-button">Download</a>
@endif
    @else
    <p  class="download-button">Order</p>
@endif
            
        </div>
        @endforeach
    </section>

    <footer>
        &copy; 2023 Bookstore App
    </footer>
</body>
</html>
