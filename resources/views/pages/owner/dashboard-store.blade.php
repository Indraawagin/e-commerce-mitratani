@extends('layouts.owner')
@section('title', 'Toko')
@section('menuStore','active')

@section('content')
<!-- Section Content -->
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Pengaturan Toko</h2>
            <p class="dashboard-subtitle">Informasi toko</p>
        </div>
        <div class="dashboard-content">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @foreach ($stores as $store)
                            <form action="{{ route('stores-redirect','dashboard-store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Nama Toko</label>
                                            <input type="text" class="form-control" value="{{ $store->name }}" />
                                            <p></p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Nomer Telepon</label>
                                            <input type="number" class="form-control"
                                                value="{{ $store->phone_number }}" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="email" class="form-control" value="{{ $store->email }}" />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Alamat Toko</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1"
                                                rows="3">{{ $store->address }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Deskripsi Toko</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1"
                                                rows="3">{{ $store->description }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col text-right">
                                        <button type="submit" class="btn btn-success px-5">
                                            Simpan
                                        </button>
                                    </div>
                                </div>
                            </form>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
