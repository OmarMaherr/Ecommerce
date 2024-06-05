<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Send Email Form</title>
    {{-- add bootstrap link here --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    {{-- create a form here --}}
    <div class="container p-3">
        <h3 class="card-title">Send An Email From Laravel 10</h3>
        {{-- create a flash message here --}}
        @if (Session::has('success'))
            <div class="alert alert-success p-2">{{Session::get('success')}}</div>
        @endif
        @if (Session::has('error'))
        <div class="alert alert-danger p-2">{{Session::get('error')}}</div>
    @endif
        <form action="{{ route('send') }}" method="post">
            @csrf
            <div class="form-group my-2">
                <label for="">Title</label>
                <input type="text" placeholder="Enter Email Title" name="title" class="form-control">
                <span class="text-danger">@error('title'){{$message}}@enderror</span>
            </div>
            <div class="form-group my-2">
                <label for="">Reciever Email</label>
                <input type="email" placeholder="Enter Reciever Email" name="email" class="form-control">
                <span class="text-danger">@error('email'){{$message}}@enderror</span>
            </div>
            <div class="form-group my-2">
                <label for="">Mail Body</label>
                <input type="text" placeholder="Mail Body" name="body" class="form-control">
                <span class="text-danger">@error('body'){{$message}}@enderror</span>
            </div>
            <div class="form-group my-2">
                <label for="">Footer</label>
                <input type="text" placeholder="Mail Footer" name="footer" class="form-control">
                <span class="text-danger">@error('footer'){{$message}}@enderror</span>
            </div>
            <button type="submit" class="btn btn-primary btn-sm mt-3">Send</button>
        </form>
    </div>
    
</body>
</html>