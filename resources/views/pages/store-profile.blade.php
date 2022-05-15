@extends('layouts.app')
@section('title')
Mitra Tani - Profile
@endsection

@push('addon-style')
<style>
    .page-profile .product-title {
        font-weight: normal;
        font-size: 16px;
        line-height: 25px;
        color: #c5c5c5;
    }

    .page-profile .product-subtitle {
        font-weight: normal;
        font-size: 18px;
        line-height: 30px;
        color: #0c0d36;
        margin-bottom: 20px;
    }
</style>
@endpush

@section('content')
<div class="page-content page-details">
    <!-- Component Breadcumbs -->
    <section class="store-breadcrumbs" data-aos="fade-down" data-aos-delay="100">
        <div class="container">
            <div class="row">
                <div class="col-12" data-aos="fade-up">
                    <h5>Tentang Kami</h5>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery -->
    <section class="store-gallery mb-3" id="gallery">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center mb-2" data-aos="zoom-in">
                    <transition name="slide-fade" mode="out-in">
                        <img :src="photos[activePhoto].url" :key="photos[activePhoto].id" class="w-50 main-image"
                            alt="" />
                    </transition>
                </div>
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-3 col-lg-3 mt-2" v-for="(photo, index) in photos" :key="photo.id"
                            data-aos="zoom-in" data-aos-delay="100">
                            <a href="#" @click="changeActive(index)">
                                <img :src="photo.url" class="w-100 thumbnail-image"
                                    :class="{active: index == activePhoto}" alt="" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="page-profile" data-aos="fade-up">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4 mt-3">
                    <h5>Informasi Toko</h5>
                </div>
                @foreach ($item as $profile)
                <div class="col-12">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="product-title">Nama</div>
                            <div class="product-subtitle">
                                {{ $profile->name }}
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="product-title">Telepon</div>
                            <div class="product-subtitle">
                                {{ $profile->phone_number }}
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="product-title">Alamat</div>
                            <div class="product-subtitle">
                                {{ $profile->address }}
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="product-title">Email</div>
                            <div class="product-subtitle">
                                {{ $profile->email }}
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="product-title">Deskripsi</div>
                            <div class="product-subtitle">
                                {{ $profile->description }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
</div>

@endsection

@push('addon-script')
<script src="/vendor/vue/vue.js"></script>
<script>
    let gallery = new Vue({
        el: "#gallery",
        mounted() {
          AOS.init();
        },
        data: {
          activePhoto: 0,
          photos: [
                { id: 1, url: "/images/toko-1.jpeg" },
                { id: 2, url: "/images/toko-2.jpeg" },
                { id: 3, url: "/images/toko-3.jpeg" },
                { id: 4, url: "/images/toko-4.jpeg" },
          ],
        },
        methods: {
          changeActive(id) {
            this.activePhoto = id;
          },
        },
      });
</script>
@endpush
