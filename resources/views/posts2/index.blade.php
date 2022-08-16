<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>POST</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body >



    <div class="container my-5">

        <h1>
            ALL POSTS :

        </h1>
        <table class="table table-striped table-hover table-bordered text-center my-4">
            <tr class="table-dark">
                <th>ID</th>
                <th>CREATED AT</th>
                <th>UPDATED AT</th>
                <th>NAME</th>
                {{-- <th>CONTENT</th> --}}
                <th>IMAGE</th>
                <th>ACTION</th>
            </tr>

            @foreach ($posts as $post )
            <tr>
                <td>{{ $post->id }}</td>
                <td> {{ $post->created_at }}</td>
                <td>{{ $post->updated_at }}</td>
                <td>{{ $post->name }}</td>
                {{-- <td>{{ $post->content }}</td> --}}
                <td><img  width="80" class="width:200" src="{{ $post->image }}" alt=""></td>
                <td>
                    <a class="btn btn-success btn-small " href=""><i class="fa-solid fa-pen-to-square"></i></a>
                    <a class="btn btn-danger btn-small " href="">
                        <i class="fa-solid fa-delete-left"></i>
                    </a>
                </td>
            </tr>

            @endforeach
        </table>
    </div>

</body>
</html>
