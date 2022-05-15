@extends('layouts.dashboard')
@section('title', 'Create Product')
@section('menuProduct','active')

@section('content')
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Produk</h2>
            <p class="dashboard-subtitle">Buat Produk Baru</p>
        </div>
        <div class="dashboard-content">
            <div class="row">
                <div class="col-md-12">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error )
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Nama Produk</label>
                                            <input type="text" name="name" class="form-control"
                                                value="{{ old('name') }}" required>
                                        </div>
                                    </div>
                                    <div class=" col-md-12">
                                        <div class="form-group">
                                            <label for="">Stok Produk</label>
                                            <input type="number" name="stock" class="form-control"
                                                value="{{ old('stock') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Berat Produk</label>
                                            <input type="text" name="weight" value="{{ old('weight') }}"
                                                class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Harga Produk</label>
                                            <input type="number" name="price" value="{{ old('price') }}"
                                                class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Kategori Produk</label>
                                            <select name="categories_id" class="form-control">
                                                <option value="" disabled>Pilih Kategori</option>
                                                @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Deskripsi Produk</label>
                                            <textarea name="description"
                                                id="editor">{!! old('description') !!}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col text-right">
                                        <button class="btn btn-success px-5" type="submit">
                                            Simpan
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('addon-script')
<script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace("editor");
</script>
@endpush
