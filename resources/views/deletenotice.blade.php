<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <style>
        .alert {
            margin-left: 20px;
            margin-right: 20px;
            padding: 20px;
            background-color: #D4EDDA !important;
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  @include('adminnav')
    </head>

<body>
    @if (Session::has('delete_message'))
        <div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            {{ Session::get('delete_message') }}
        </div>
    @endif
    <table class="table table table-bordered">
        <thead class="th">
            <tr>
                <th scope="col">S.NO</th>
                <th scope="col">UPLOADED-DATE</th>
                <th scope="col">TITLE</th>
                <th scope="col">DESCRIPTION</th>

            </tr>
        </thead>

        @php
            $i = 1;
        @endphp


        @foreach ($notice as $id)
            <tbody>
                <tr>
                    <th scope="row">{{ $i }}</th>
                    <td>{{ $id->created_at }}</td>
                    <td>{{ $id->title }}</td>
                    <td>{{ $id->description }}</td>

                    <td class="action">
                        <form action="/delete-notice/{{ $id->id }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>


                    </td>
                </tr>
            </tbody>

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
