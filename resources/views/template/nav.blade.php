<nav class="nav" style="background-color: black">
    <a class="nav-link active text-white" aria-current="page"> Zeknologiyy </a>
    @guest
        <a class ="nav-link text-white "href="{{ route('home') }}"> Home </a>
        <a class ="nav-link text-white "href="{{ route('login') }}"> Login </a>
    @endguest
    @auth
        @if(auth()->user()->role =='admin')
        <a class ="nav-link text-white "href="{{ route('admin.produk') }}"> Produk </a>
        {{-- <a class ="nav-link text-white "href="{{ route('biodata') }}"> me </a> --}}
        @else
        <a class ="nav-link text-white "href="{{ route('home') }}"> Home </a>
        <a class="nav-link text-white "href="{{ route('pelanggan.keranjang') }}">Keranjang</a>
        <a class="nav-link text-white "href="{{ route('pelanggan.summary') }}">summary</a>
        @endif
    <a class ="nav-link text-white "href="{{ route('logout') }}"> logout</a>

    @endauth
</nav>