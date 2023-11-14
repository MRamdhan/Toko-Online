<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @include('template.nav')

    <div class="container mt-5">
        <form action="" method="POST" enctype="multipart/form-data">
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
                <input type="file" name="foto" accept="image/*" required class="btn btn-outline-secondary">
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
</body>
</html>