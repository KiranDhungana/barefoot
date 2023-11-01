@extends('layouts.app')

@section('content')
    <!doctype html>
    <html lang="en">

    <head>
        <style>
            .list-group-item {
                font-size: 18px
            }

            h4 {
                display: inline;
                color: #150BF0;
            }

            .card-img-top {
                width: 200px;
                height: 200px;
                border-radius: 50%;
                object-fit: cover;
                transition: box-shadow 500ms ease-in;
            }

            .card-img-top:hover {
                box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;

            }

            <script></script>
        </style>
        <div class="container">
            <div class="card" style="width: auto">
                <img style="margin-top:10px; margin-bottom: 10px; margin-left: 20px" class="card-img-top"
                    onmouseover="myScript" src="{{ URL::asset('storage/images/' . Auth::user()->image) }}"
                    alt="Card image cap">

                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><span>
                            <h4>Name:</h4> {{ Auth::user()->name }}
                        </span></li>
                    <li class="list-group-item"><span>
                            <h4>Description:</h4> {{ Auth::user()->description }}
                        </span></li>
                    <li class="list-group-item"><span>
                            <h4>Age:</h4> {{ Auth::user()->age }}
                        </span></li>
                    <li class="list-group-item"><span>
                            <h4>Address:</h4> {{ Auth::user()->address }}
                        </span></li>
                    <li class="list-group-item"><span>
                            <h4>Phone Number:</h4> {{ Auth::user()->phone }}
                        </span></li>
                    <li class="list-group-item"><span>
                            <h4>Rank:</h4> {{ Auth::user()->rank }}
                        </span></li>
                </ul>

                <div class="card-body">

                    <a>
                        <h4>Certificates: </h4>
                    </a>
                    @php
                    $i=0;
                        
                        $data = json_decode(Auth::user()->path);
                        
                    @endphp
                    @foreach ($data as $item)
                        <a target="_blank" style="font-size: 22px;font-weight:bold"
                            href="{{ URL::asset('storage/images/' . $item) }}"> <span style="padding-left:5px">Certificate{{$i=$i+1}}</span></a>
              
                   
                
                            @endforeach
                </div>



            </div>
        </div>








        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
        </script>
    @endsection
