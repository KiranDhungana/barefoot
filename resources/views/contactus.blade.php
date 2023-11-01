<html lang="en">

<head>
    <meta charset="UTF-8">


    <script src="https://kit.fontawesome.com/47b6cf0509.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/contactuspagecss.css') }}">
    <style>
        .alert {
            margin-left: 20px;
            margin-right: 20px;
            padding: 20px;
            background-color: #D4EDDA;
            color: Black;
            margin-bottom: 15px;
        }

        /* The close button */
        .closebtn {
            margin-left: 15px;
            color: white;
            font-weight: bold;
            float: right;
            font-size: 22px;
            line-height: 20px;
            cursor: pointer;
            transition: 0.3s;
        }

        /* When moving the mouse over the close button */
        .closebtn:hover {
            color: black;
        }

        i {
            border: 1px solid rgb(109, 109, 119);
            padding: 5px;
            margin-bottom: 9px;
            margin-right: 4px;
            border-radius: 6px;
        }

        html {
            height: 100%;
        }

        body {

            min-height: 100%;
            display: flex;
            flex-direction: column;
            font-family: 'PT Sans', sans-serif !important;
        }

        footer {
            margin-top: auto;
        }
    </style>
    @include('header')
    <title>Document</title>
</head>

<body>
    @if (Session::has('sentmsg'))
        <div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            {{ Session::get('sentmsg') }}
        </div>
    @endif

    <div id="card" style="height:750px;margin-bottom:15px; background-color:rgb(167, 229, 188);margin-top:5px" class="container">
        <div  class="row">
            <div style="background-color: white" class="col-md-6">
                <h1 style="color: rgb(0, 136, 255); padding-left: 10px;">GET IN TOUCH</h1>
                <form action={{ route('send_mail') }} method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name <span style="color:red">*</span></label>
                        <input name="name" type="text" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Enter Name">
                            @error('name')
                            <div id="emailHelp" style="color:red" class="form-text">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Email <span style="color:red">*</span> </label>
                        <input name="email" type="email" class="form-control" id="exampleInputPassword1"
                            placeholder="Email">
                            @error('email')
                            <div id="emailHelp" style="color:red" class="form-text">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Phone-Number <span style="color:red">*</span></label>
                        <input name="phone" type="tel" class="form-control" id="exampleInputPassword1"
                            placeholder="Phone Number">
                            @error('phone')
                            <div id="emailHelp" style="color:red" class="form-text">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Subject <span style="color:red">*</span></label>
                        <input name="subject" type="text" class="form-control" id="exampleInputPassword1"
                            placeholder="Subject">
                            @error('subject')
                            <div id="emailHelp" style="color:red" class="form-text">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Message <span style="color:red">*</span></label>
                        <textarea name="message" class="form-control" id="exampleFormControlTextarea5" rows="3"></textarea>
                        @error('message')
                        <div id="emailHelp" style="color:red" class="form-text">{{ $message }}</div>
                    @enderror
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Send </button>
                </form>
            </div>
            <div style="border-left: 1px solid rgb(186, 180, 180) ;background-color:white" class="col-md-6">
                <div class="row">
                    <div style="text-align:center" class="col-8 mx-auto">
                        <h1 style="color: rgb(0, 136, 255);">CONTACT US</h1>
                        <img class="img-fluid" src="/images/mail.png" alt="mail">
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <i class="fa-solid fa-phone"></i>
                            +977-9847445948
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <i style="padding-left:5px;padding-right:5px;" class="fa-sharp fa-solid fa-envelope"></i>
                            barefootmartialarts@gmail.com
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <i style="padding-left:7px;padding-right:7px;"
                                class="fa-sharp fa-solid fa-location-dot"></i>
                            Ramgram-05,Parasi,Nawalparasi
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Get all elements with class="closebtn"
        var close = document.getElementsByClassName("closebtn");
        var i;

        // Loop through all close buttons
        for (i = 0; i < close.length; i++) {
            // When someone clicks on a close button
            close[i].onclick = function() {

                // Get the parent of <span class="closebtn"> (<div class="alert">)
                var div = this.parentElement;

                // Set the opacity of div to 0 (transparent)
                div.style.opacity = "0";

                // Hide the div after 600ms (the same amount of milliseconds it takes to fade out)
                setTimeout(function() {
                    div.style.display = "none";
                }, 600);
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>


</body>
<footer>
    @include('footer')
</footer>

</html>
