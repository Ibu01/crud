<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

  @auth
  
  <div class="container">
    <p>Hello</p>
    <form action="/logout" method="POST">
      @csrf
      <button type="submit" class="btn btn-info">Log out</button>
    </form>
  </div>

  <div class="container d-flex justify-content-center pt-5">
  <div class="card p-3" style="width: 40%">
    <h2 class="text-center">Add Post</h2>
    <form action="create-post" method="POST">
      @csrf
      <div class="form-group">
        <label for="exampleInputTitle">Title</label>
        <input type="text" class="form-control" name="title"  placeholder="Enter title">
        @error('title')
        <div class="text-danger">{{ $message }}</div>
        @enderror
        <label for="exampleInputbody">Body</label>
        <textarea type="text" class="form-control" name="body"  placeholder="Body content... "></textarea>
        @error('body')
        <div class="text-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="text-center pt-2">
        <button type="submit" class="btn btn-primary">Save Post</button>
      </div>
    </form>
  </div>
  </div>


<hr>

<div class="container">
  <h2 class="text-center">All Posts</h2>
  @foreach ($posts as $post )
    <div class="m-3 p-3" style="background-color: rgb(247, 243, 243)">
      <h2>Posted by:{{$post->user->name}}</h2>
      <h3>{{$post->title}}</h3>
      <p>{{$post['body']}}</p>
      <p><a href="/edit-post/{{$post->id}}">Edit</a></p>
      <form action="/delete-post/{{$post->id}}" method="POST">
          @csrf 
          @method('DELETE')
          <button class="btn btn-danger">Delete</button>
      </form>
    </div>
  @endforeach
</div>

  @else
    <div class="container d-flex justify-content-center pt-5">
      <div class="card p-3" style="width: 40%">
       <form action="/register" method="POST">
           @csrf
           <h2 class="text-center">Register</h2>
           <div class="form-group">
             <label for="exampleInputName">Name</label>
             <input type="text" class="form-control" name="name" placeholder="Enter name" value="{{old('name')}}">
             @error('name')
             <div class="text-danger">{{ $message }}</div>
             @enderror
           </div>
           <div class="form-group pt-3">
               <label for="exampleInputEmail1">Email address</label>
               <input type="email" class="form-control" name="email" placeholder="Enter email" value="{{old('email')}}">
               @error('email')
               <div class="text-danger">{{ $message }}</div>
               @enderror
           </div>
           <div class="form-group pt-3">
             <label for="exampleInputPassword1">Password</label>
             <input type="password" class="form-control" name="password" placeholder="Password" value="{{old('password')}}">
             @error('password')
             <div class="text-danger">{{ $message }}</div>
             @enderror
           </div>
           <div class="text-center pt-3">
               <button type="submit" class="btn btn-success">Register</button>
           </div>
         </form>
      </div>
   </div>


   <div class="container d-flex justify-content-center pt-5">
    <div class="card p-3" style="width: 40%">
     <form action="/login" method="POST">
         @csrf
         <h2 class="text-center">Login</h2>
         <div class="form-group pt-3">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" class="form-control" name="loginemail" placeholder="Enter email" value="{{old('email')}}">
          @error('loginemail')
          <div class="text-danger">{{ $message }}</div>
          @enderror
      </div>

         <div class="form-group pt-3">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" name="loginpassword" placeholder="Password" value="{{old('password')}}">
          @error('loginpassword')
          <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
        
         <div class="text-center pt-3">
             <button type="submit" class="btn btn-success">login</button>
         </div>
        
       </form>
    </div>
 </div>
 <br><br>

  @endauth
    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>