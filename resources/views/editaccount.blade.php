<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    @include('adminnav');
    <title>Document</title>
</head>
<body>
    <table class="table table table-bordered">
        <thead class="th">
            <tr>
                <th scope="col">S.NO</th>
                <th scope="col">NAME</th>
                <th scope="col">Center</th>
                <th scope="col">Rank</th>
                <th scope="col">Due Amount</th>
                <th scope="col">ACTION</th>
            </tr>
        </thead>

        @php
            $i = 1;
        @endphp


        {{-- @foreach ($data as $item)
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
        @endforeach --}}
    </table>
</body>
</html>