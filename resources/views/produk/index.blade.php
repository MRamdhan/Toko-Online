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
        @if (Session::has('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
        <a href="{{ route('admin.tampiltambahproduk') }}" class="btn btn-primary"> Tambah </a>
        <table class="table table-responsive-sm mt3">
            <thead>
                <tr>
                    <th> Gambar </th>
                    <th> Nama </th>
                    <th> Harga </th>
                    <th> Aksi </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produk as $item)
                    <tr>
                        <td>
                            <img src="{{ asset($item->foto) }}" width="90" height="100">
                        </td>
                        <td> {{ $item->name }} </td>
                        <td> {{ number_format($item->harga, 0,',','.') }} </td>
                        <td>
                            <a href="{{ route('admin.editproduk', $item->id) }}" class="btn btn-primary"> Edit </a>
                            <a href="{{ route('admin.deleteproduk', $item->id) }}" class="btn btn-danger" onclick="retrun confirm('yakin ingin dihapus')"> Hapus </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $produk->render() }}
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>    

</body>
</html>