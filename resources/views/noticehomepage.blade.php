<!doctype html>
<html lang="en">

<head>

    <style>
        html {
            height: 100%;
        }

        footer {
            margin-top: auto;
        }

        body {
           
            min-height: 100%;
            display: flex;
            flex-direction: column;
            font-family: 'PT Sans', sans-serif !important;
        }

        i {
            border: 1px solid rgb(109, 109, 119);
            padding: 5px;
            margin-bottom: 9px;
            margin-right: 4px;
            border-radius: 6px;
        }

        .collapse {
            font-size: 19px;
            text-align: justify;
            font-family: 'PT Sans', sans-serif !important;
        }

        .navbar-nav {
            margin-left: auto;
        }

        a {
            text-decoration: none !important;

        }

        #img {
            height: 200px;
            width: 200px
        }
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/47b6cf0509.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
@include('header')

<body>
    @php
        foreach ($notice as $key) {
            $data = json_decode($key->path);
            $len = count($data);
        }
    @endphp
    @foreach ($notice as $item)
        <a href="{{ url('notice-home/' . $item->id) }}">
            <div style="margin: 15px" class="card mb-3"">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img id="img" src="{{ URL::asset('storage/files/NOTICE.jpg') }}"
                            class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h2 style="color:#03ABD0" class="card-title">{{ $item->title }}</h2>
                            <p class="card-text">{{ substr($item->description, 0, 250) . ' ..............' }}</p>
                            <p class="card-text"><small class="text-body-secondary">Uploaded at
                                    {{ $item->updated_at->toDateString() }}</small></p>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </a>
    @endforeach

   



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>

</body>
<footer>
    @include('footer')
</footer>



</html>
