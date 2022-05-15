@extends('layouts.app')
@section('title')
Mitra Tani - Category
@endsection

@section('content')
@push('addon-style')
<style>
    .store-products .owner {
        font-weight: normal;
        font-size: 14px;
        line-height: 21px;
        color: #979797;
        margin-bottom: 5px;
    }
</style>
@endpush
<div class="page-content page-home">
    <!-- Component Categories -->
    <section class="store-categories">
        <div class="container">
            <div class="row">
                <div class="col-12" data-aos="fade-up">
                    <h5>Semua Kategori</h5>
                </div>
            </div>
            <div class="row">
                @php
                $incrementCategory = 0;
                @endphp
                @forelse ($categories as $category)
                <div class="col-6 col-md-4 col-lg-2" data-aos="fade-up" data-aos-delay="{{ $incrementCategory+= 100 }}">
                    <a href="{{ route('categories-details', $category->slug) }}" class="component-categories d-block">
                        <div class="categories-image">
                            <img src="{{ Storage::url($category->photo) }}" alt="Pestisida" class="w-100" />
                        </div>
                        <p class="categories-text">{{ $category->name }}</p>
                    </a>
                </div>
                @empty
                <div class="col-12 text-center py-5" data-aos="fade-up" data-aos-delay="{{ $incrementProduct+= 100 }}">
                    Tidak Ada Kategori
                </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Component Product -->
    <section class="store-products">
        <div class="container">
            <div class="row">
                <div class="col-12" data-aos="fade-up">
                    <h5>Semua Produk</h5>
                </div>
            </div>
            <div class="row">
                @php
                $incrementProduct = 0;
                @endphp
                @forelse ($products as $product)
                <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="{{ $incrementProduct+= 100 }}">
                    <a href="{{ route('detail', $product->slug) }}" class="component-products d-block">
                        <div class="products-thumbnail">
                            <div class="products-image" style="
                                        @if ($product->galleries->count())
                                            background-image: url('{{ Storage::url($product->galleries->first()->photos) }}')
                                        @else
                                            background-color: #eee
                                        @endif

                                        ">
                            </div>
                        </div>
                        <div class="products-text">{{ $product->name }}</div>
                        <div class="owner">Stok: {{ $product->stock }}</div>
                        <div class="products-price">@currency($product->price)</div>
                    </a>
                </div>
                @empty
                <div class="col-12 text-center py-5" data-aos="fade-up" data-aos-delay="{{ $incrementProduct+= 100 }}">
                    <p class="mb-2">Tidak Ada Produk</p>
                    <a href="{{ route('categories') }}" class="btn btn-secondary">Tampilkan</a>
                </div>
                @endforelse
            </div>
            <div class="row">
                <div class="col-12 mt-4">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
