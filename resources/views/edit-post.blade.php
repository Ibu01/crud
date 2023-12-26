<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    
    
    <div class="container d-flex justify-content-center pt-5">
        <div class="card p-3" style="width: 70%">
         <form action="/edit-post/{{$post->id}}" method="POST">
             @csrf
             @method('PUT')
             <h2 class="text-center">Edit Post</h2>
             <div class="form-group">
               <label >Title</label>
               <input type="text" class="form-control" name="title" value="{{$post->title}}">
               @error('name')
               <div class="text-danger">{{ $message }}</div>
               @enderror
             </div>
             
             <div class="form-group">
                <label >Body</label>
                <textarea class="form-control" name="body" >{{$post->body}}</textarea>
                @error('body')
                <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              
             <div class="text-center pt-3">
                 <button type="submit" class="btn btn-warning">Save Changes</button>
             </div>
           </form>
        </div>
     </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>