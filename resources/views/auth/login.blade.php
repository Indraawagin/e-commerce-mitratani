@extends('layouts.auth')

@section('content')
<div class="page-content page-auth">
    <div class="section-store-auth" data-aos="fade-up">
        <div class="container">
            <div class="row align-items-center row-login">
                <div class="col-lg-6 text-center">
                    <img src="images/login-placeholder.png" class="w-100 mb-4 mb-lg-none" alt="" />
                </div>
                <div class="col-lg-5">
                    <h2>
                        Belanja kebutuhan utama, <br />
                        menjadi lebih mudah
                    </h2>
                    <form method="POST" action="{{ route('login') }}" class="mt-3">
                        @csrf
                        <div class="form-group">
                            <label>Alamat Email</label>
                            <input id="email" type="email"
                                class="form-control w-75 @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input id="password" type="password"
                                class="form-control w-75 @error('password') is-invalid @enderror" name="password"
                                required autocomplete="current-password">

                            @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Lupa Password?') }}
                            </a>
                            @endif

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success btn-block w-75 mt-4">
                            Masuk ke Akun Saya
                        </button>
                        <a href="{{ route('register') }}" class="btn btn-signup btn-block w-75 mt-2">
                            Buat Akun Baru
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
