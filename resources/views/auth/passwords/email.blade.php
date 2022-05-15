@extends('layouts.auth')
@section('title','Reset Password')

@section('content')
<div class="page-content page-auth" id="register">
    <div class="section-store-auth" data-aos="fade-up">
        <div class="container">
            <div class="row  justify-content-center row-login">
                <div class="col-lg-4">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <h2>
                        Reset Password
                    </h2>
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="form-group">
                            <label for="">Alamat Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus />
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success btn-block mt-4">
                            Reset Password
                        </button>
                        <a href="{{ route('login') }}" class="btn btn-signup btn-block mt-2">
                            Kembali
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
