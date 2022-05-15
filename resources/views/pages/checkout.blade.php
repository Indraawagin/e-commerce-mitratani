@extends('layouts.success')
@section('title')
Mitra Tani - Success
@endsection

@section('content')
<div class="page-content page-success">
    <div class="section-success" data-aos="zoom-in">
        <div class="container">
            <div class="row align-items-center row-login justify-content-center">
                <div class="col-lg-7 text-center">
                    <img src="/images/success.svg" alt="" class="mb-4" />
                    <h2>Order Barang Berhasil!</h2>
                    <p>
                        Silahkan melakukan transfer ke rekening yang disediakan dan konfirmasi melalui Whatsapp dengan
                        menekan tombol dibawah ini!
                    </p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="col-md-12">
                                        <img src="{{ asset('images/logo-bca.svg') }}" class="mb-2" alt="">
                                    </div>
                                    <div class="col-md-12">
                                        <p class="my-0 font-weight-bold">I.A Putu Sumartiningsih</p>
                                    </div>
                                    <div class="col-md-12">
                                        <p class="my-0 font-weight-bold">8270993533</p>
                                    </div>
                                    <div class="col-md-12 ">
                                        <p class="my-0 font-weight-bold">PT Bank Central Asia</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="col-md-12">
                                        <img src="{{ asset('images/logo-gopay.svg') }}" class="mb-2" alt="">
                                    </div>
                                    <div class="col-md-12">
                                        <p class="my-0 font-weight-bold">I.A Putu Sumartiningsih</p>
                                    </div>
                                    <div class="col-md-12">
                                        <p class="my-0 font-weight-bold">082144022981</p>
                                    </div>
                                    <div class="col-md-12 ">
                                        <p class="my-0 font-weight-bold">GoPay</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <a href="https://shorturl.at/kvzS2" target="_blank" class="btn btn-success w-50 mt-4"><img
                                src="https://cutt.ly/NUXIwjV" class="mx-2" />Whatsapp</a>
                        <a href="{{ route('categories') }}" class="btn btn-signup w-50 mt-2">Belanja Lagi</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
