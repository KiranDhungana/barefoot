<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
     <style>
      .card {
  /* Add shadows to create the "card" effect */
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  width: fit-content;
  padding-left: 25px;
  padding-right: 50px;
  padding-top: 30px;
  padding-bottom: 30px;
}

/* On mouse-over, add a deeper shadow */
.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

/* Add some padding inside the card container */
.con {
  padding-left: 5px;
  padding:5px; 

}
     </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    @include('adminnav')
  </head>
  <body>
  <div  style="margin-left: 50px ;margin-top:10px; margin-right:50px;" >
    <div class="card">
  <img src="/images/avatar.jpg" alt="Avatar" style="width:60px">
  <div class="con">
    Name: {{ucfirst(trans($accountdata->name))}} 
    <br>
     Center: {{$accountdata->center}} Branch
     <br>
    Due Amount:  <span style="color: red" >{{$accountdata->fee}}  </span>  
    <br>
    Rank: {{$accountdata->rank}}
    <br>
     Latest paid Amount: <span style="color: green" > {{$accountdata->paid}} </span>
     <br>
      Latest Paid Date: {{$accountdata->paiddate}}
      <br>
       Total Paid Amount: <span style="color: green" > {{$accountdata->totalpaidamount}}   </span>
 
  </div>
</div>
 
 <br> 

 <br>    
 

 <br>    

 <br>    

 <br>    
  
</div> 

      
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>