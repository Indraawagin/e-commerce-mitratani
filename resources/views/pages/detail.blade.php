@extends('layouts.app')
@section('title')
Mitra Tani - Detail
@endsection

@section('content')
<div class="page-content page-details">
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
                            <li class="breadcrumb-item active">Detail Produk</li>
                        </ol>
                    </nav>
                </div>
            </div>
            @if ($message = Session::get('warning'))
            <div class="alert alert-warning alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
            @endif
        </div>
    </section>

    <!-- Gallery -->
    <section class="store-gallery mb-3" id="gallery">
        <div class="container">
            <div class="row">
                <div class="col-lg-8" data-aos="zoom-in">
                    <transition name="slide-fade" mode="out-in">
                        <img :src="photos[activePhoto].url" :key="photos[activePhoto].id" class="w-100 main-image"
                            alt="" />
                    </transition>
                </div>
                <div class="col-lg-2">
                    <div class="row">
                        <div class="col-3 col-lg-12 mt-2 mt-lg-0" v-for="(photo, index) in photos" :key="photo.id"
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

    <!-- Store Details -->
    <section class="store-details-container" data-aos="fade-up">
        <div class="store-heading">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <h1>{{ $product->name }}</h1>
                        <div class="owner">{{ $product->category->name }}</div>
                        <div class="price mb-0">@currency($product->price)</div>
                        <div class="products-text">Stok : {{ $product->stock }}</div>
                        <div class="products-text">Berat : {{ $product->weight }} Kg</div>
                    </div>
                    <div data-aos="zoom-in" class="col-lg-2">
                        @auth
                        <small>Jumlah barang</small>
                        <form action="{{ route('detail-add', $product->id) }}" method="POST"
                            enctype="multipart/form-data">
                            <input type="number" min="1" class="form-control mb-2" value="1" name="qty">
                            @csrf
                            <button type="submit" class="btn btn-success px-4 text-white btn-block mb-1">+
                                Keranjang</button>
                        </form>
                        @else
                        <a href="{{ route('login') }}" class="btn btn-success px-4 text-white btn-block mb-1">+
                            Keranjang</a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
        <div class="store-description">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-8 text-justify">
                        {!! $product->description !!}
                    </div>
                </div>
            </div>
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
              @foreach ( $product->galleries as $gallery )
              { id: {{ $gallery->id }},
                 url: "{{ Storage::url($gallery->photos) }}" },
              @endforeach
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
