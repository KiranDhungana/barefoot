
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    @include('adminnav')
  </head>
  <body>
  
    <form action="{{ url('admin-update/'.$updateinfo->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Name</label>
            <input value={{$updateinfo->name}} name="name" type="test" class="form-control" id="exampleInputPassword1">
          </div>
        {{-- <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email address</label>
          <input value={{$updateinfo->email}}  name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div> --}}
        {{-- <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input value={{$updateinfo->password}}  name="password" type="password" class="form-control" id="exampleInputPassword1">
        </div> --}}
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Address</label>
          <input   value={{$updateinfo->address}} name="address" type="text" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Age</label>
          <input name="age" value={{$updateinfo->age}} type="number" class="form-control" id="exampleInputPassword1">
          @error('age')
              <div id="emailHelp" style="color:red" class="form-text">{{ $message }}</div>
          @enderror
      </div>
      <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Phone-Number</label>
          <input name="number" value={{$updateinfo->phone}}  type="tel" class="form-control" id="exampleInputPassword1">
          @error('number')
              <div id="emailHelp" style="color:red" class="form-text">{{ $message }}</div>
          @enderror
      </div>
      <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Rank</label>
          <input name="rank" value={{$updateinfo->rank}} type="number" class="form-control" id="exampleInputPassword1">
          @error('rank')
              <div id="emailHelp" style="color:red" class="form-text">{{ $message }}</div>
          @enderror
      </div>
      <div class="form-group">
          <label for="exampleInputPassword1">Description</label>
          <textarea rows="5" name="description" type="text" class="form-control" id="exampleInputPassword1"
              placeholder="Password">{{$updateinfo->description}}
            </textarea>
          @error('description')
              <div id="emailHelp" style="color:red" class="form-text">{{ $message }}</div>
          @enderror
      </div>
      <div class="mb-3">
        <label for="formFile" class="form-label">Upload Documents</label>
        <input multiple class="form-control" name="file[]"  type="file" id="formFile" @error('image') is-invalid @enderror>
        {{-- @error('file[]')
        <div id="emailHelp" style="color:red" class="form-text">{{ $message }}</div>
    @enderror --}}
      </div>
    
     
    

      
        <button style="margin-bottom:25px;padding-left:25px;padding-right:25px" type="submit" class="btn btn-primary">Submit</button>
      </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>