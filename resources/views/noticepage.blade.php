<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <style>
      
          .collapse{
  font-size: 19px;  
   text-align: justify;
  font-family: 'PT Sans', sans-serif !important;
 }
 .navbar-nav {
  margin-left: auto;
}
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  
  {{-- @include('header') --}}
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="/">
      <div>
        <img style="width:100px;height:45px ;object-fit:contain" src="/images/logo.png" alt="" srcset="">
      </div>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
        data-bs-target="#navbarNav" aria-controls="navbarNav"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="C" href="{{url('notice-home')}}">Latest Notice</a>
          </li>
  
          <li class="nav-item">
            <a class="nav-link" aria-current="C" href="{{url('contact')}}">Contact us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="C" href="{{'about-us'}}">About us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="C" href="{{url('gallary')}}">Gallary</a>
          </li>
          <li class="nav-item">
            @if (Route::has('login'))
            @auth
            <a class="nav-link" aria-current="page" href="{{ url('home') }}">My
              Dashboard</a>
            @else
            <a class="nav-link" aria-current="page" href="{{ route('login') }}">Log-in</a>
            {{-- @if (Route::has('register'))
            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700
              dark:text-gray-500 underline">Register</a>
            @endif --}}
            @endauth
            @endif
  
          </li>
  
        </ul>
      </div>
    </div>
  </nav>
  <body>
 

   @php
    $data =json_decode($notice->path);
    //     foreach ($notice as $key ) {
    //  $data=json_decode( $key->path);
     $len = count($data);
    //  echo $len;
    //     }
    @endphp
  
  <div style="box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px; margin-top:10px" class="container">
    <div class="row">
      <div class="col-md-12">
        <h2 style="display:inline;color:#6052ED">TITLE :</h2>
        <h4 style="display:inline">
          {{
            $notice->title
                    }}
        </h4>
       
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <h2 style="display:inline;color:#6052ED">DESCRIPTION :</h2>
        <h4 style="display:inline">
          {{
            $notice->description
                    }}
        </h4>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        @for ($i = 0; $i < $len; $i++)
        <h2 style="color:#6052ED">
          {{
            "Open Notice bellow :"
           }}
        </h2>
        <a style="font-size: 22px;font-weight:bold" href="{{URL::asset('storage/files/'.$data[$i])}}">Notice.{{$i+1}}</a>
       
        {{-- <img class="img-fluid"  src="{{URL::asset('storage/files/'.$data[$i])}}" alt="notice"> --}}
           
       @endfor
         </div>
       
        </h4>
      </div>
    </div>




    





  
      

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>