<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Barefootmartialarts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    @include('adminnav');
  </head>
  
  <body>
    <div style="margin-top:10px" class="container">
      <form  method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">Title</label>
          <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Title">
          @error('title')
                    <div id="emailHelp" style="color:red" class="form-text">{{ $message }}</div>
                @enderror
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Description</label>
          <textarea rows="5" name="des" type="text" class="form-control" placeholder="Enter title"> </textarea>
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Upload attachments</label>
            <input multiple class="form-control" name="file[]"  type="file" id="formFile" @error('image') is-invalid @enderror>
            @error('file')
                    <div id="emailHelp" style="color:red" class="form-text">{{ $message }}</div>
                @enderror
          </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>