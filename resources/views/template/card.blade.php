<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome</title>
</head>
<body>
            <div class="container mt-5">
                <div class="row">
                    @foreach ($data as $item)
                        <div class="col-3">
                            <div class="card">
                                <img src="{{ asset($item->foto) }}"class="card-img-top">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $item->name }}</h5>
                                    <p class="card-text">Rp. {{ $item->harga }}</p>
                                </div>
                                <a href="{{ route('pelanggan.detail', $item->id ) }}" class="btn btn-primary"> Detail </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>  
</body>
</html>
