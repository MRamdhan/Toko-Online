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
        <form action="{{ route('admin.updateproduk', $produk->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <h3 class="text-center"> Silahkan Isi Edit Data Produk</h3>
            <hr>
            <div class="mb-3">
                <label class="form-label"> Nama Produk</label>
                <input type="text" class="form-control" required name="name" value="{{ $produk->name }}">
            </div>
            <div class="mb-3">
                <label class="form-label"> Harga </label>
                <input type="number" class="form-control" required name="harga" value="{{ $produk->harga }}">
            </div>
            <div class="mb-3">
                <label class="form-label"> Foto </label>
                <br>
                <input type="file" name="foto" accept="image/*"  class="btn btn-outline-secondary">
            </div>
            <div class="mb-3">
                <label class="form-label"> Kategori </label>
                <select name="kategori_id" class="form-control">
                    @foreach ($kategori as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
               </select>
            </div>
            <button type="submit" class="btn btn-primary"> Kirim </button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>    

</body>
</html>