@extends('layouts.success')
@section('title')
Mitra Tani - Success
@endsection

@section('content')
<div class="page-content page-success">
    <div class="section-success" data-aos="zoom-in">
        <div class="container">
            <div class="row align-items-center row-login justify-content-center">
                <div class="col-lg-6 text-center">
                    <img src="/images/success.svg" alt="" class="mb-4" />
                    <h2>Selamat Datang di Mitra Tani Store!</h2>
                    <p>
                        Anda sudah berhasil terdaftar <br>
                        selamat berbelanja!
                    </p>
                    <div>
                        <a href="dashboard.html" class="btn btn-success w-50 mt-4">Dasbor Saya</a>
                        <a href="index.html" class="btn btn-signup w-50 mt-2">Pergi Belanja</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
