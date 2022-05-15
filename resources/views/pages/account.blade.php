@extends('layouts.app')
@section('title', 'Dasboard Account')

@push('addon-style')
<style>
    .page-account .row-account {
        min-height: 70vh;
    }
</style>
@endpush

@section('content')
<!-- Section Content -->
<div class="page-content page-transaction">
    <div class="container">
        <div class="row">
            <div class="col-12" data-aos="fade-up">
                <h5>Akun</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mt-2">
                <div class="tab-content" data-aos="fade-up">
                    <form action="{{ route('account-redirect', 'account') }}" id="locations" method="POST">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="addressOne">Nama Lengkap</label>
                                            <input type="text" name="name" class="form-control"
                                                value="{{ $user->name }}" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="addressTwo">Email</label>
                                            <input type="email" name="email" class="form-control"
                                                value="{{ $user->email }}" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="addressOne">Alamat</label>
                                            <input type="text" name="address" class="form-control"
                                                value="{{ $user->address }}" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="provinces_id">Provinsi</label>
                                            <select name="provinces_id" id="provinces_id" class="form-control"
                                                v-if="provinces" v-model="provinces_id">
                                                <option v-for="province in provinces" :value="province.id" selected>@{{
                                                    province.name }}
                                                </option>
                                            </select>
                                            <select v-else class="form-control">
                                                <option value="">Tidak Ada Data</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="regencies_id">Kabupaten</label>
                                            <select name="regencies_id" id="regencies_id" class="form-control"
                                                v-if="regencies" v-model="regencies_id">
                                                <option v-for="regency in regencies" :value="regency.id" selected>@{{
                                                    regency.name }}
                                                </option>
                                            </select>
                                            <select v-else class="form-control">
                                                <option value="">Pilih Provinsi Dulu</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="districts_id">Kecamatan</label>
                                            <select name="districts_id" id="districts_id" class="form-control"
                                                v-if="districts" v-model="districts_id">
                                                <option v-for="district in districts" :value="district.id">@{{
                                                    district.name }}
                                                </option>
                                            </select>
                                            <select v-else class="form-control">
                                                <option value="">Pilih Provinsi & Kabupaten Dulu</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="postalCode">Kode Pos</label>
                                            <input type="number" class="form-control" name="zip_code"
                                                value="{{ $user->zip_code }}" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="country">Negara</label>
                                            <input type="text" class="form-control" name="country"
                                                value="{{ $user->country }}" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="mobile">No Handphone</label>
                                            <input type="text" class="form-control" name="phone_number"
                                                value="{{ $user->phone_number }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col text-right mt-4">
                                        <button type="submit" class="btn btn-success px-5">
                                            Simpan
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
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
                regencies :null,
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
@endpush
