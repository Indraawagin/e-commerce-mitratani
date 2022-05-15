@extends('layouts.app')
@section('title', 'Transaction Product')

@push('addon-style')
<style>
    .page-transaction-details .product-title {
        font-weight: normal;
        font-size: 16px;
        line-height: 25px;
        color: #c5c5c5;
    }

    .page-transaction-details .product-subtitle {
        font-weight: normal;
        font-size: 18px;
        line-height: 30px;
        color: #0c0d36;
        margin-bottom: 20px;
    }
</style>
@endpush

@section('content')
{{-- Page Content --}}
<div class="page-content page-transaction-details">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-12 col-md-4">
                        <img src="{{ Storage::url($item->product->galleries->first()->photos ?? '') }}" alt=""
                            class="w-100 mb-3" />
                    </div>
                    <div class="col-12 col-md-8">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="product-title">
                                    Nama Pelanggan
                                </div>
                                <div class="product-subtitle">
                                    {{ $item->transaction->user->name }}
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="product-title">Nama Produk</div>
                                <div class="product-subtitle">
                                    {{ $item->product->name }}
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="product-title">
                                    Tanggal Transaksi
                                </div>
                                <div class="product-subtitle">
                                    {{ $item->transaction->order_date }}
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="product-title">
                                    Status Pembayaran
                                </div>
                                <div class="product-subtitle text-danger">
                                    {{ $item->transaction->transactions_status }}
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="product-title">
                                    Harga Barang
                                </div>
                                <div class="product-subtitle">
                                    @currency($item->price)
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="product-title">No Handphone</div>
                                <div class="product-subtitle">
                                    {{ $item->transaction->user->phone_number }}
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="product-title">Jumlah Barang</div>
                                <div class="product-subtitle">
                                    {{ $item->qty }}
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="product-title">Berat Barang</div>
                                <div class="product-subtitle">
                                    {{ $item->product->weight }} Kg
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-4 mt-3">
                        <h5>Informasi Pengiriman</h5>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="product-title">Alamat</div>
                                <div class="product-subtitle">
                                    {{ $item->transaction->user->address }}
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="product-title">Provinsi</div>
                                <div class="product-subtitle">{{
                                    App\Models\Province::find($item->transaction->user->provinces_id)->name
                                    }}</div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="product-title">Kabupaten</div>
                                <div class="product-subtitle">{{
                                    App\Models\Regency::find($item->transaction->user->regencies_id)->name
                                    }}</div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="product-title">Kecamatan</div>
                                <div class="product-subtitle">{{
                                    App\Models\District::find($item->transaction->user->districts_id)->name
                                    }}</div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="product-title">Kode Pos</div>
                                <div class="product-subtitle">{{ $item->transaction->user->zip_code }}</div>
                            </div>
                            @if ($item->transaction->transactions_status == "GAGAL")

                            @else
                            <div class="col-12 col-md-6">
                                <div class="product-title">Pengiriman</div>
                                <div class="product-subtitle">{{ $item->transaction->delivery }}</div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="product-title">Status Barang</div>
                                <div class="product-subtitle">{{ $item->shipping_status }}</div>
                            </div>
                            @switch($item->transaction->delivery)
                            @case("Ambil Ke Toko")

                            @break
                            @case("Mitra Tani (Banjar/Seririt)")
                            <div class="col-12 col-md-3">
                                <div class="product-title">Tanggal Dikirim</div>
                                <div class="product-subtitle">{{ $item->date_sent }} </div>
                            </div>
                            @break
                            @default
                            <div class="col-12 col-md-3">
                                <div class="product-title">Resi</div>
                                <div class="product-subtitle">{{ $item->resi }} </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="product-title">Tanggal Dikirim</div>
                                <div class="product-subtitle">{{ $item->date_sent }} </div>
                            </div>
                            @endswitch
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
