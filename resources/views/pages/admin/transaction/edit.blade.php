@extends('layouts.dashboard')
@section('title', 'Edit Transaction')
@section('menuTransaction','active')

@section('content')
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">{{ $item->code }}</h2>
            <p class="dashboard-subtitle">Detail Transaksi</p>
        </div>
        <div class="dashboard-content" id="transactionDetails">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form action="{{ route('transaction.update', $item->id) }}" method="POST">
                            @method("PUT")
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-md-4">
                                        <img src="{{ Storage::url($item->product->galleries->first()->photos ?? '') }}"
                                            alt="" class="w-100 mb-3" />
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
                                            <div class="col-12 col-md-4">
                                                <div class="product-title">
                                                    Status Pembayaran
                                                </div>
                                                <select name="transactions_status" class="form-control" id="transaction"
                                                    v-model="transaction">
                                                    <option value="{{ $item->transaction->transactions_status }}"
                                                        hidden>{{ $item->transaction->transactions_status }}</option>
                                                    <option value="BELUM BAYAR">BELUM BAYAR</option>
                                                    <option value="SUKSES">SUKSES</option>
                                                    <option value="GAGAL">GAGAL</option>
                                                </select>
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
                                                <div class="product-subtitle">{{ $item->transaction->user->zip_code }}
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="product-title">Pengiriman</div>
                                                <div class="product-subtitle">{{ $item->transaction->delivery }}</div>
                                            </div>
                                            <template v-if="transaction == 'BELUM BAYAR'">
                                                <div class="col-12 col-md-3">
                                                    <div class="product-title">Status Barang</div>
                                                    <div class="product-subtitle m-0">{{ $item->shipping_status }}</div>
                                                </div>
                                            </template>
                                            <template v-if="transaction == 'SUKSES'">
                                                <div class="col-12 col-md-3">
                                                    <div class="product-title">Status Barang</div>
                                                    <select name="shipping_status" id="status" class="form-control"
                                                        v-model="status">
                                                        <option value="TERTUNDA">Tertunda</option>
                                                        <option value="DIPROSES">Diproses</option>
                                                        @switch($item->transaction->delivery)
                                                        @case("Ambil Ke Toko")
                                                        <option value="DIAMBIL">Diambil</option>
                                                        @break
                                                        @default
                                                        <option value="DIKIRIM">Dikirim</option>
                                                        @endswitch
                                                        <option value="BATAL">Batal</option>
                                                    </select>
                                                </div>
                                                @switch($item->transaction->delivery)
                                                @case("Mitra Tani (Banjar/Seririt)")
                                                <template v-if="status == 'DIKIRIM'">
                                                    <div class="col-md-3">
                                                        <div class="product-title">Tanggal Dikirim</div>
                                                        <input type="date" class="form-control" name="date_sent"
                                                            v-model="tanggal" />
                                                    </div>
                                                </template>
                                                @break
                                                @default
                                                <template v-if="status == 'DIKIRIM'">
                                                    <div class="col-md-3">
                                                        <div class="product-title">Resi</div>
                                                        <input type="text" class="form-control" name="resi"
                                                            v-model="resi" />
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="product-title">Tanggal Dikirim</div>
                                                        <input type="date" class="form-control" name="date_sent"
                                                            v-model="tanggal" />
                                                    </div>
                                                </template>
                                                @endswitch
                                            </template>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 text-right">
                                        <button class="btn btn-success mt-4 px-5" type="submit">
                                            Simpan
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('addon-script')
<script src="/vendor/vue/vue.js"></script>
<script>
    let transactionDetails = new Vue({
            el: "#transactionDetails",
            data: {
                status: "{{ $item->shipping_status }}",
                tanggal: "{{ $item->date_sent }}",
                resi: "{{ $item->resi}}",
                transaction: "{{ $item->transaction->transactions_status }}",
            },
        });
</script>
@endpush
