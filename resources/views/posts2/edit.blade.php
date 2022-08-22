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

<body>



    <div class="container my-5 ">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1>
                Edit post
            </h1>
            <a class="btn btn-info" href="{{ route('index.post') }}">
                All posts
            </a>
        </div>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('post.update', $post->id) }} " method="post" enctype="multipart/form-data">

            @csrf
            @method('put')
            <div class="mb-3">
                <label>Name</label>
                <input class="form-control" type="name" name="name" placeholder="name"
                value="{{ $post->name }}">
            </div>

            <div class="mb-3">
                <label>Image</label>
                <input class="form-control" type="file" name="image">
                <img width="80" class="width:200" src="{{ asset('uploads/' . $post->image) }}" alt="">
            </div>


            <div class="mb-3">
                <label>Content</label>
                <textarea id="mytextarea" name="content">{{ $post->content }} </textarea>
            </div>

            <button class="btn btn-info px-5 ">edit</button>
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.1.2/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#mytextarea'
        });
    </script>

</body>

</html>
