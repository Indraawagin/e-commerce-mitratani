@extends('layouts.app')
@section('title')
Mitra Tani - Cart
@endsection

@section('content')
<div class="page-content page-cart">
    <!-- Component Breadcumbs -->
    <section class="store-breadcrumbs" data-aos="fade-down" data-aos-delay="100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('home') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Keranjang</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <!-- Store Cart -->
    <div class="store-cart">
        <div class="container">
            <div class="cart-details" id="transactionDetails">
                {{-- Cart --}}
                <div class="row" data-aos="fade-down" data-aos-delay="100">
                    <div class="col-12 table-responsive">
                        <table class="table table-borderless table-cart">
                            <thead>
                                <tr>
                                    <td>Foto</td>
                                    <td>Nama Barang</td>
                                    <td>Berat Barang</td>
                                    <td>Jumlah Barang</td>
                                    <td>Harga Satuan</td>
                                    <td>Total Harga</td>
                                    <td>Menu</td>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $totalPrice = 0;
                                $grandTotal = 0;
                                $totalQty = 0;
                                $totalWeight = 0;
                                @endphp
                                @foreach ($carts as $cart)
                                <tr>
                                    <td style="width: 15%">
                                        @if ($cart->product->galleries)
                                        <img src="{{ Storage::url($cart->product->galleries->first()->photos) }}" alt=""
                                            class="cart-image" />
                                        @endif
                                    </td>
                                    <td style="width: 20%">
                                        <div class="product-title">{{ $cart->product->name }}</div>
                                        <div class="product-subtitle">{{ $cart->product->category->name }}</div>
                                    </td>
                                    <td style="width: 15%">
                                        <div class="product-title">{{ $cart->product->weight }}</div>
                                        <div class="product-subtitle">Kilogram</div>
                                    </td>
                                    <td style="width: 15%">
                                        <div class="product-title">{{ $cart->qty }}</div>
                                        <div class="product-subtitle">Jumlah</div>
                                    </td>
                                    <td style="width: 15%">
                                        <div class="price product-title">
                                            @currency($cart->product->price)
                                        </div>
                                        <div class="product-subtitle">IDR</div>
                                    </td>
                                    <td style="width: 15%">
                                        @php
                                        $prices = $cart->product->price;
                                        $qtys = $cart->qty;
                                        @endphp
                                        <div class="product-title">@currency($totalPrice = $prices * $qtys)</div>
                                        <div class="product-subtitle" id="total">IDR</div>
                                    </td>
                                    <td style="width: 15%">

                                        <form action="{{ route('cart-delete', $cart->id) }}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-remove-cart">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @php
                                $grandTotal += $totalPrice;
                                $totalQty += $cart->qty;
                                $totalWeight += $cart->product->weight;
                                @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{-- hr --}}
                <div class="row" data-aos="fade-down" data-aos-delay="150">
                    <div class="col-12">
                        <hr />
                    </div>
                    <div class="col-12">
                        <h2 class="mb-3">Detail Pengiriman</h2>
                    </div>
                </div>

                <form action="{{ route('checkout') }}" method="post" id="locations">
                    @csrf
                    {{-- Delvery --}}
                    <input type="hidden" name="total_price" value="{{ $grandTotal }}">
                    <input type="hidden" name="qty" value="{{ $totalQty }}">
                    <div class="row mb-2" data-aos="fade-down" data-aos-delay="150">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address">Alamat</label>
                                <input type="text" class="form-control" id="address" name="address"
                                    value="{{ Auth::user()->address }}" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="provinces_id">Provinsi</label>
                                <select name="provinces_id" id="provinces_id" class="form-control" v-if="provinces"
                                    v-model="provinces_id">
                                    <option v-for="province in provinces" :value="province.id">@{{ province.name }}
                                    </option>
                                </select>
                                <select v-else class="form-control">
                                    <option value="">Tidak Ada Data</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="regencies_id">Kabupaten</label>
                                <select name="regencies_id" id="regencies_id" class="form-control" v-if="regencies"
                                    v-model="regencies_id" required>
                                    <option v-for="regency in regencies" :value="regency.id">@{{ regency.name }}
                                    </option>
                                </select>
                                <select v-else class="form-control">
                                    <option value="">Pilih Provinsi Dulu</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="districts_id">Kecamatan</label>
                                <select name="districts_id" id="districts_id" class="form-control" v-if="districts"
                                    v-model="districts_id" required>
                                    <option v-for="district in districts" :value="district.id">@{{ district.name }}
                                    </option>
                                </select>
                                <select v-else class="form-control" required>
                                    <option value="">Pilih Provinsi & Kabupaten Dulu</option>
                                </select>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="phone_number">No Telephone</label>
                                <input type="text" class="form-control" value="{{ Auth::user()->phone_number }}"
                                    name="phone_number" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="zip_code">Kode Pos</label>
                                <input type="number" class="form-control" value="{{ Auth::user()->zip_code }}"
                                    name="zip_code" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label>Pilih Pengiriman</label>
                            <select name="delivery" id="delivery" class="form-control">
                                <option value="Pos Indonesia">Pos Indonesia</option>
                                <option value="J&T">J&T</option>
                                <option value="JNE">JNE</option>
                                <option value="Mitra Tani (Banjar/Seririt)">Mitra Tani (Banjar/Seririt)
                                </option>
                                <option value="Ambil Ke Toko">Ambil Ke Toko</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <small class="text-muted text-justify">
                                INFORMASI: Bagi pembeli yang memilih pengiriman JNE, J&T, dan Pos Indonesia,
                                <span class="font-weight-bold">ongkos kirim ditanggung pembeli</span> dan <span
                                    class="font-weight-bold">ongkos kirim dibayar setelah barang sampai</span> , untuk
                                pengecekan ongkos kirim silahkan cek <a target="_blank"
                                    href="https://cek-ongkir.com/">disini</a>.
                            </small>
                        </div>
                    </div>

                    {{-- Payment --}}
                    <div class="row" data-aos="fade-up" data-aos-delay="150">
                        <div class="col-12">
                            <hr />
                        </div>
                        <div class="col-12">
                            <h2 class="mb-3">Detail Pembayaran</h2>
                        </div>
                    </div>
                    <div class="row" data-aos="fade-up" data-aos-delay="200">
                        <div class="col-4 col-md-3">
                            <div class="product-title">{{ $totalQty }}</div>
                            <div class="product-subtitle">Jumlah Barang</div>
                        </div>
                        <div class="col-4 col-md-3">
                            <div class="product-title">{{ $totalWeight }} Kg</div>
                            <div class="product-subtitle">Total Berat Barang</div>
                        </div>
                        <div class="col-4 col-md-3">
                            <div class="product-title">@currency($grandTotal ?? 0)</div>
                            <div class="product-subtitle">Total Tagihan</div>
                        </div>
                        <div class="col-12 col-md-3">
                            <button type="submit" class="btn btn-success mt-4 px-4 btn-block">Checkout
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('addon-script')
<script src="/vendor/vue/vue.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
    let locations = new Vue({
            el: "#locations",
            mounted() {
                AOS.init();
                this.getProvincesData();
            },
            data: {
                provinces : null,
                regencies : null,
                districts : null,
                provinces_id : null,
                regencies_id : null,
                districts_id : null,
                is_midtrans: true

            },
            methods: {
                getProvincesData(){
                    let self = this;
                    axios.get('{{ route('api-provinces') }}')
                    .then(function(response) {
                        self.provinces = response.data;
                    })
                },
                getRegenciesData(){
                    let self = this;
                    axios.get('{{ url('api/regencies') }}/' + self.provinces_id)
                    .then(function(response) {
                        self.regencies = response.data;
                    })
                },
                getDistrictsData(){
                    let self = this;
                    axios.get('{{ url('api/districts') }}/' + self.regencies_id)
                    .then(function(response) {
                        self.districts = response.data;
                    })
                },
            },
            watch: {
                provinces_id: function(val, oldVal){
                    this.regencies_id = null
                    this.getRegenciesData();
                },
                regencies_id: function(val, oldVal){
                    this.districts_id = null
                    this.getDistrictsData();
                },
            }
            });
</script>
<script>
    $('#delivery').on('change', function(){
    const selectedDelivery = $('#delivery option:selected').val();
    switch (selectedDelivery) {
        case "Pos Indonesia":
            $('#locations').attr('action', '{{ route('checkout') }}');
            break;
        case "J&T":
            $('#locations').attr('action', '{{ route('checkout') }}');
            break;
        case "JNE":
            $('#locations').attr('action', '{{ route('checkout') }}');
            break;
        case "Mitra Tani (Banjar/Seririt)":
            $('#locations').attr('action', '{{ route('success') }}');
            break;
        case "Ambil Ke Toko":
            $('#locations').attr('action', '{{ route('success') }}');
            break;
        default:
            break;
    }
    });
</script>
@endpush
