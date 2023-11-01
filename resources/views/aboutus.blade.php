<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
     body{
    
    font-family: 'PT Sans', sans-serif !important;
  }

        i {
            border: 1px solid rgb(109, 109, 119);
            padding: 5px;
            margin-bottom: 9px;
            margin-right: 4px;
            border-radius: 6px;
        }

        #about {

            height: 40vh;
            text-align: justify;
            /* background-repeat: no-repeat; */
            background-image: url("https://loksewa.nienepal.com/assets/images/about.jpg") !important;

        }

        .collapse {
            font-size: 19px;
            text-align: justify;
            font-family: 'PT Sans', sans-serif !important;
        }

        .navbar-nav {
            margin-left: auto;
        }
    </style>
     <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/47b6cf0509.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
@include('header')

<body>
    <div id="about" class="container-fluid text-center">
        <h1 style="color: rgb(180, 127, 255)">Barefoot Martial Arts Academy</h1>
        <p style="color:rgb(205, 57, 57);font-weight:500;font-size:24px; margin-top:25px"> " We're glad you're here at
            Barefoot Martial Arts Academy, a top-notch facility for learning martial arts . "</p>
    </div>


    <div class="container text-center">
        <h1 style="color:rgb(180, 127, 255)">OUR COACH</h1>
        <div class="row">

            <div style="box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;border-radius:5px ;margin-top:10px;margin-bottom:20px;padding-top:10px"
                class="col-md-5">
                <img style="height: 450px" class="img-fluid" src="/images/gup.jpg" alt="" srcset="">
                <h1>MANISH GUPTA</h1>
                <h4>gptmanish28@gmail.com</h4>
            </div>
            <div class="col-2">

            </div>


            <div style="box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px; border-radius:5px ;margin-top:10px;margin-bottom:20px;padding-top:10px"
                class="col-md-5">
                <img style="height: 450px" class="img-fluid" src="/images/gup2.jpg" alt="" srcset="">
                <h1>Krishna Mohan Yadav </h1>
                <h4>krishna.oskss@gmail.com</h4>
            </div>





        </div>

    </div>
    @include('footer')

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
        </script>

</body>


</html>
