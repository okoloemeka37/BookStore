<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Book Store Admin Dashboard</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f9f9f9;
    }


    nav {
      background-color: #2c3e50;
      color: #ecf0f1;
      padding: 10px;
      text-align: center;
      margin-top: 30px
    }

    nav a {
      color: #ecf0f1;
      text-decoration: none;
      padding: 10px;
      margin: 0 10px;
    }

    section {
      padding: 20px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    th, td {
      border: 1px solid #bdc3c7;
      padding: 12px;
      text-align: left;
    }

    th {
      background-color: #3498db;
      color: #fff;
    }
  </style>
</head>
<body>
    @extends('admin.needed')
 
    
    @section('con')
        

 

  <section>
    <h2>Book List</h2>
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Title</th>
          <th>Author</th>
          <th>Price</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>Book 1</td>
          <td>Author 1</td>
          <td>$19.99</td>
        </tr>
        <tr>
          <td>2</td>
          <td>Book 2</td>
          <td>Author 2</td>
          <td>$24.99</td>
        </tr>
        <!-- Add more rows as needed -->
      </tbody>
    </table>
  </section>

  @endsection
</body>
</html>

