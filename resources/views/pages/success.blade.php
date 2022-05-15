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
                    <h2>Order Barang Berhasil!</h2>
                    <p>
                        Silahkan melakukan konfirmasi melalui Whatsapp dengan menekan tombol dibawah ini!
                    </p>
                    <div>
                        <a href="https://shorturl.at/wEO18" target="_blank" class="btn btn-success w-50 mt-4"><img
                                src="https://cutt.ly/NUXIwjV" class="mx-2" />Whatsapp</a>
                        <a href="{{ route('categories') }}" class="btn btn-signup w-50 mt-2">Belanja Lagi</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
