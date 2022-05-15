@extends('layouts.auth')
@section('title','Registrasi')

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
                        Memulai berbelanja <br />
                        dengan cara baru
                    </h2>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group">
                            <label for="">Nama Lengkap</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                                v-model="name" />
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Alamat Email</label>
                            <input @change="checkEmail()" :class="{'is-invalid' : this.email_unavailable}" id="email"
                                type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email" v-model="email" />
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
                            Buat Akun Sekarang
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
<script src="vendor/vue/vue.js"></script>
<script src="https://unpkg.com/vue-toasted"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
    Vue.use(Toasted);
        let register = new Vue({
            el: "#register",
            mounted() {
                AOS.init();
            },
            methods: {
                checkEmail : function () {
                    let self = this;
                    axios.get('{{ route('api-register-check') }}',{
                        params: {
                            email: self.email
                        }
                    })
                        .then(function (response) {
                            if (response.data == "Available") {
                                self.$toasted.show(
                                    "Email anda tersedia! Silahkan lanjut langkah selanjutnya",
                                    {
                                    position: "top-center",
                                    className: "rounded",
                                    duration: 2000,
                                    }
                                );
                                self.email_unavailable = false
                            } else {
                                    self.$toasted.error(
                                    "Maaf, tampaknya email sudah terdaftar pada sistem kami.",
                                    {
                                    position: "top-center",
                                    className: "rounded",
                                    duration: 2000,
                                    }
                                );
                                self.email_unavailable = true
                            }
                        });
                }
            },
        });
</script>
<script src="/script/navbar-scroll.js"></script>
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
