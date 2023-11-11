{{-- @extends('layouts.app')

@section('content') --}}

<!doctype html>
<html lang="en">

<head>

    <style>
        .action {
            display: flex;

        }

        .btnn {
            float: inline-end;
            background-color: DodgerBlue;
            /* Blue background */
            border: none;
            /* Remove borders */
            color: white;
            /* White text */
            padding: 12px 16px;
            /* Some padding */
            margin-left: 13px;
            border-radius: 12px;
            margin-top: 15px;

            margin-bottom: 15px;
            font-size: 16px;
            /* Set a font size */
            cursor: pointer;
            /* Mouse pointer on hover */
        }

        .btn {
            margin-right: 22px
        }

        .navbar-nav {
            margin-left: auto;
        }

        .table {
            border: 2px solid rgb(153, 151, 151) !important;
        }
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <script src="https://kit.fontawesome.com/47b6cf0509.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
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
    </style>


    {{-- <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/admin/home">Home</a>
                    </li>

                    {{-- <li class="nav-item">
                <a class="nav-link" href={{route("register_user")}}>Register players</a>
              </li> --}}

                    {{-- <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>

            </div>
        </div>
    {{-- </nav> --}} 
    @include('adminnav')

</head>

<body>
@if (Session::has('msg'))
<div class="alert">
    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
    {{ Session::get('msg') }}
</div>
@else @if (Session::has('updatedmsg'))
<div class="alert">
    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
    {{ Session::get('updatedmsg') }}
</div>  
@else @if (Session::has('deletedmsg'))
<div class="alert">
    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
    {{ Session::get('deletedmsg') }}
</div> 
@else @if (Session::has('notice_message'))
<div class="alert">
    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
    {{ Session::get('notice_message') }}
</div>  
@else @if (Session::has('accountmessage'))
<div class="alert">
    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
    {{ Session::get('accountmessage') }}
</div>  
@else @if (Session::has('accountdeletedmsg'))
<div class="alert">
    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
    {{ Session::get('accountdeletedmsg') }}
</div>  
@endif
@endif
@endif
@endif
@endif


    
@endif

    <a href={{ route('manageaccounts') }}>
        <button class="btnn"><i class="fa-solid fa-users"></i>ADD ACCOUNT</button>
    </a>
    <a href={{ route('editaccounts') }}>
        <button class="btnn"><i class="fa-solid fa-users"></i>EDIT ACCOUNT</button>
    </a>

    <a href={{ route('register_user') }}>
        <button class="btnn"><i class="fa-solid fa-user"></i> ADD PLAYERS</button>
    </a>
    <a href={{ route('store') }}>
        <button class="btnn"><i class="fa-solid fa-plus"></i> ADD NOTICE</button>
    </a>
    <a href={{ route('del_notice') }}>
        <button class="btnn"><i class="fa-solid fa-trash"></i> DELETE NOTICE</button>
    </a>
 

    <table class="table table table-bordered">
        <thead class="th">
            <tr>
                <th scope="col">S.NO</th>
                <th scope="col">NAME</th>
                <th scope="col">EMAIL</th>
                <th scope="col">Address</th>
                <th scope="col">PHONE-NO</th>
                <th scope="col">ACTION</th>
            </tr>
        </thead>

        @php
            $i = 1;
        @endphp


        @foreach ($data as $item)
            @if ($item->name == 'admin')
                @continue
            @else
                <tbody>
                    <tr>
                        <th scope="row">{{ $i }}</th>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->address }}</td>
                        <td>{{ $item->phone }}</td>
                        <td class="action">
                            <form action="/admin-del/{{ $item->id }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>

                            <form action="/admin-update/{{ $item->id }}" method="get">

                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            @endif
            @php
                $i = $i + 1;
            @endphp
        @endforeach
    </table>

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

</html>


{{-- 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <a href={{route("register_user")}}>Register</a>
                <div class="card-header">{{ __(' the admin Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in! as admin') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
