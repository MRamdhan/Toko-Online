<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">    <title>Welcome</title>
    <title>Document</title>
</head>
<body>
    @include('template.nav')
    <div class="container mt-5">
        <form action="{{ route('pelanggan.prosesbayar', $detailtransaksi->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-5">
                    <div class="card">
                        <img src="{{asset($produk->foto)}}" class="card-img-top">
                    </div>
                </div>
    
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">{{$produk->name}}</h3>
                            <hr>
                            <p class="card-text"> Harga: Rp. {{number_format($produk->harga, 0, ',','.')}}</p>
                            <p class="card-text"> Total Harga: Rp. {{number_format($detailtransaksi->totalharga, 0, ',','.')}}</p>
                            <p class="card-text"> Banyak: {{$detailtransaksi->qty}}</p>
                            <hr>
                            <div class="mb-2">
                                <label class="form-control"><b>Bukti Pembayaran</b></label>
                                <input type="file" name="bukti_transaksi" accept="image/*" required>
                            </div>
                            <hr>
                            <h5> Keterangan :</h5>
                            <p>Silahkan lakukan transfer ke bank berikut dan tunggu konfirmasi dari kami</p>
                            <button class="btn btn-success">Upload</button>
                        </div>
                    </div>
                </div>
    
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>    
    
            </div>
        </form>
    </div>
    
</body>
</html>