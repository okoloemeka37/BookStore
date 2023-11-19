<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body style=" background-color: #dee9ff;">
	@vite(['resources/css/app.css','resources/sass/app.scss', 'resources/js/app.js'])
    <div class="registration-form" >
        <!-- resources/views/form.blade.php -->



<!-- Your form code here -->

        <form action="{{route('form')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-icon">
                
                <span><i class="icon icon-user"></i></span>
            </div>
            <div class="form-group">
                
                <input type="text" class="form-control item" name="name" id="username" value="{{old('name')}}" placeholder="Username">
                @error('name')<p class="text-danger">
                    {{$message}}  
                </p>
                @enderror
            </div>
            <div class="form-group">
                <input type="email" class="form-control item" id="email" name="email" value="{{old('email')}}" placeholder="Email">
                @error('email')<p  class="text-danger">
                    {{$message}}  
                </p>
                @enderror
            </div>
            <div class="form-group">
                <input type="password" class="form-control item" name="password" id="password" placeholder="Password">
           
                @error('password')<p class="text-danger">
                    {{$message}}  
                </p>
                @enderror </div>
      
            <div class="form-group">
                <input type="file" class="form-control item" id="email" name="image" placeholder="Email">
                @error('image')<p class="text-danger">
                    {{$message}}  
                </p>
                @enderror
            </div>
    
            <div class="form-group">
                <button type="submit" class="btn btn-block create-account">Create Account</button>
                <p class="lg">Don't Have An Account? <a href="{{route('login')}}">SignUp</a></p>
            </div>
        </form>
        <div class="social-media">
            <h5>Sign up with social media</h5>
            <div class="social-icons">
                <a href="#"><i class="icon-social-facebook" title="Facebook"></i></a>
                <a href="#"><i class="icon-social-google" title="Google"></i></a>
                <a href="#"><i class="icon-social-twitter" title="Twitter"></i></a>
            </div>
        </div>
    </div>
    
</body>
</html>
