<?php
use Illuminate\Support\Carbon;?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Notifications</title>
  <style>

    section {
    
 
      padding: 20px;
      background-color: #fff;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
      color: #3498db;
      margin-bottom: 20px
    }

  </style>
</head>
<body>
  @vite( ['resources/sass/Admin.scss','resources/js/Admin.js'])



  @extends('all.sideNav')

  <header>
    <h1>User Notifications</h1>
  </header>
 

  <p class="cu" name="Notification"></p>



  <section>
    <h2>Your Notifications</h2>

@foreach ($notice as $note)
<?php $date=Carbon::parse($note->updated_at)?>
@if ($note->for_text==="Book")
<div class="notification @if ($note->status==='unchecked') blue @endif" >
  <h3>Your Book, "{{$note->book_title}}"" was {{$note->type}} by <a href=""> The Admin</a></h3>

  @if ($note->type==="Removed")
  <p>The Book Will Be Permanently Deleted After 30 Days</p>
  <a href="">click to see details</a>
  @endif
 
  <p class="date">Received on:{{$date->toFormattedDateString()}}</p>
</div>
  
@endif


@endforeach
    

    <div class="empty-message">
      <p>No new notifications.</p>
    </div>
  </section>

</body>
</html>
