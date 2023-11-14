<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=@, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    @include('template.nav')

    <div class="mt-5">
        <center class="h3">
            <h3 class=""> Silahkan Isi Data Customer </h3>
        </center>
        <br>
    </div>
    <div class="container mt-5">
        @if(session('status'))
            <div class="alert alert-danger">
                {{ session('status') }}
            </div>
        @endif
        <form action=" {{ route ('postLogin') }} " method="POST">
            @csrf
            <div class="mb-3">
                <label for="InputEmail" class="form-label"> Email Addrees</label>
                <input type="email" class="form-control" id="InputEmail" required name="email">
            </div>
            <div class="mb-3">
                <label for="InputPassoword1" class="form-label1"> Password </label>
                <input type="password" class="form-control" id="InputPassword" required name="password">
                {{-- @if (Session::has('status'))
                    <div> <span style="color: red">{{ Session::get('status')}}</span> </div>
                @endif --}}
            </div>
            <button type="submit" class="btn btn-primary">  Login </button>
            <br>
            <br>
            <a class="btn btn-success" href="{{ route ('registrasi') }}"> Belum Punya Akun </a>
        </form>
    </div>

    <div class="fixed-bttom">
       
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>