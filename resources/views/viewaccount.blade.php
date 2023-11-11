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
  <div  style="margin-left: 50px" >
 Name: {{$accountdata->name}}   
 <br> 
 Center: {{$accountdata->center}} Branch
 <br>    
 Due Amount: {{$accountdata->fee}}  
 <br>  
 Rank: {{$accountdata->rank}}
 <br>    
 Latest paid Amount: {{$accountdata->paid}}
 <br>    
 Latest Paid Date: {{$accountdata->paiddate}}
 <br>    
 Total Paid Amount: {{$accountdata->totalpaidamount}}    
</div> 

      
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>