@extends('layouts.auth')
@section('title','Reset Password')

@section('content')
@push('addon-style')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
<style>
    .icon-eye {
        position: relative;
    }

    i {
        position: absolute;
        right: 10px;
        top: 36px;
        cursor: pointer;
    }
</style>
@endpush

<div class="page-content page-auth" id="register">
    <div class="section-store-auth" data-aos="fade-up">
        <div class="container">
            <div class="row align-items-center justify-content-center row-login">
                <div class="col-lg-4">
                    <h2>
                        Reset Password
                    </h2>
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="form-group">
                            <label for="">Alamat Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" v-model="email" />
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group icon-eye">
                            <label for="">Password</label>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="new-password" />
                            <i class="bi bi-eye-slash" id="togglePassword"></i>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group icon-eye">
                            <label for="">Ulangi Password</label>
                            <input id="password-confirm" type="password"
                                class="form-control pass @error('password_confirmation') is-invalid @enderror"
                                name="password_confirmation" required autocomplete="new-password" />
                            <i class="bi bi-eye-slash" id="togglePassword1"></i>
                            @error('password-confirm')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success btn-block mt-4" :disabled="this.email_unavailable">
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

@push('addon-script')
<script>
    let togglePassword = document.querySelector('#togglePassword');
    let togglePassword1 = document.querySelector('#togglePassword1');
    let password = document.querySelector('#password');
    let password1 = document.querySelector('.pass');
    togglePassword.addEventListener('click', function (e) {
    let type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    this.classList.toggle('bi-eye');
    });
    togglePassword1.addEventListener('click', function (e) {
    let type = password1.getAttribute('type') === 'password' ? 'text' : 'password';
    password1.setAttribute('type', type);
    this.classList.toggle('bi-eye');
    });
</script>

@endpush
