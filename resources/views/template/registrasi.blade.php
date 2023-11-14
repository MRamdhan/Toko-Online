<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    @include('template.nav')

    <div class="container mt-5">
        <form action="{{ route('postregistrasi') }}" method="POST">
            @csrf
            <h3 class="text-center"> Silahkan Isi Data Customer </h3>
            <hr>
            <div class="mb-3">
                <label class="form-label"> Nama Customer </label>
                <input type="text" class="form-control" required name="name">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label"> Email Addres </label>
                <input type="email" class="form-control" id="exampleInputEmail1" required name="email">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label"> Password </label>
                <input type="password" class="form-control" id="exampleInputPassword1" required name="password">
            </div>
            <button type="submit" class="btn btn-primary"> Kirim </button>
            <a href="/login" class="btn btn-secondary"> Back </a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>    

</body>
</html>