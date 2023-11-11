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
       <div style="margin-top:10px" class="container">
        <form action="{{ url('account-update/'.$accountdata->id) }}" method="POST" enctype="multipart/form-data">
            
          @csrf
          <div class="form-group">
            <label for="exampleInputPassword1">Choose Center</label>
          <select  disabled name="dropdown" class="form-select" aria-label="Default select example">
            <option selected >{{$accountdata->center}}</option>
            <option value="parasi">Parasi Branch </option>
            <option value="swathi">Swathi Branch </option>
            <option value="Dainahawa">Dainahawa Branch</option>
          </select>
        </div>
          <div style="margin-top:10px" class="form-group">
            <label for="exampleInputEmail1">Player Name</label>
            <input value="{{$accountdata->name }}" type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">
            {{-- @error('title')
                      <div id="emailHelp" style="color:red" class="form-text">{{ $message }}</div>
                  @enderror --}}
          </div>
          <div style="margin-top:10px" class="form-group">
            <label for="exampleInputEmail1">Player Rank</label>
            <input value="{{$accountdata->rank }}" type="number" name="rank" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Rank">
            {{-- @error('title')
                      <div id="emailHelp" style="color:red" class="form-text">{{ $message }}</div>
                  @enderror --}}
          </div>
              <div style="margin-top:10px" class="form-group">
            <label  for="exampleInputEmail1">Due Amount</label>
            <input disabled value="{{$accountdata->fee }}" type="number" name="fee" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Amount">
            {{-- @error('title')
                      <div id="emailHelp" style="color:red" class="form-text">{{ $message }}</div>
                  @enderror --}}
          </div>
            <div style="margin-top:10px" class="form-group">
            <label for="exampleInputEmail1">Discount %</label>
            <input disabled  value="{{$accountdata->discount }}" type="number" name="discount" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Amount">
            {{-- @error('title')
                      <div id="emailHelp" style="color:red" class="form-text">{{ $message }}</div>
                  @enderror --}}
          </div>
            <div style="margin-top:10px" class="form-group">
            <label for="exampleInputEmail1">Paid Amount</label>
            <input type="number" name="paidamount" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Amount">
            {{-- @error('title')
                      <div id="emailHelp" style="color:red" class="form-text">{{ $message }}</div>
                  @enderror --}}
          </div>
            <div style="margin-top:10px" class="form-group">
            <label for="exampleInputEmail1">Paid Date</label>
            <input type="date" name="paiddate" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Amount">
            {{-- @error('title')
                      <div id="emailHelp" style="color:red" class="form-text">{{ $message }}</div>
                  @enderror --}}
          </div>
          <button style="margin-top:10px" type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
  
   
       
    
     
    

      
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>