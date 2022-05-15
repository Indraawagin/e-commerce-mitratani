<!-- Navbar -->
<nav class="
        navbar navbar-expand-lg navbar-light navbar-store
        fixed-top
        navbar-fixed-top
      " data-aos="fade-down">
    <div class="container">
        <a href="{{ route('home') }}" class="navbar-brand">
            <img src="{{ asset('/images/logo.svg') }}" alt="Logo" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a href="{{ route('home') }}" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('categories') }}" class="nav-link">Categories</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('profile') }}" class="nav-link">Tentang Kami</a>
                </li>
                @guest
                <li class="nav-item">
                    <a href="{{ route('register') }}" class="nav-link">Daftar</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('login') }}" class="btn btn-success nav-link px-4 text-white">Masuk</a>
                </li>
                @endguest
            </ul>
            @auth
            <!-- Desktop Menu -->
            <ul class="navbar-nav d-none d-lg-flex">
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link" id="navbarDropdown" role="button" data-toggle="dropdown">
                        <img src="{{ asset('/images/user.png') }}" alt="" class="rounded-circle mr-2 profile-picture" />
                        Hi, {{ Auth::user()->name }}
                    </a>
                    @if (Auth::user()->roles == 'MEMBER')
                    <div class="dropdown-menu">
                        <a href="{{ route('transactions') }}" class="dropdown-item">Transaksi</a>
                        <a href="{{ route('account') }}" class="dropdown-item">Pengaturan</a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            class="dropdown-item">Keluar</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="{{ route('cart') }}" class="nav-link d-inline-block mt-2">
                        @php
                        $carts = \App\Models\Cart::where('users_id', Auth::user()->id)->count();
                        @endphp
                        @if ($carts > 0)
                        <img src="{{ asset('images/icon-cart-filled.svg') }}" alt="Cart" />
                        <div class="card-badge">{{ $carts }}</div>
                        @else
                        <img src="{{ asset('images/icon-cart-empty.svg') }}" alt="Cart" />
                        @endif

                    </a>
                </li>
            </ul>

            <!-- Mobile Menu -->
            <ul class="navbar-nav d-block d-lg-none">
                <li class="nav-item">
                    <a href="{{ route('transactions') }}" class="nav-link d-inline-block">Transaksi</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('account') }}" class="nav-link d-inline-block">Pengaturan</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link"> Hei, {{ Auth::user()->name }} </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('cart') }}" class="nav-link d-inline-block">Cart</a>
                </li>
            </ul>
            @else
            <div class="dropdown-menu">
                <a href="{{ route('dashboard') }}" class="dropdown-item">Dasbor</a>
                <div class="dropdown-divider"></div>
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    class="dropdown-item">Keluar</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
            </li>
            </ul>
            <!-- Mobile Menu -->
            <ul class="navbar-nav d-block d-lg-none">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link d-inline-block">Dasbor</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link d-inline-block"> Hei, {{ Auth::user()->name }} </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link d-inline-block"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Keluar</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
            @endif
            @endauth
        </div>
    </div>
</nav>
