@extends('layouts.owner')
@section('title', 'Edit Store')
@section('menuStore','active')

@section('content')
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Toko</h2>
            <p class="dashboard-subtitle">Edit Toko</p>
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
                            <form action="{{ route('store.update', $item->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Nama</label>
                                            <input type="text" name="name" class="form-control" required
                                                value="{{ $item->name }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="email" name="email" class="form-control" required
                                                value="{{ $item->email }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Nomer Telepon</label>
                                            <input type="number" name="phone_number" class="form-control" required
                                                value="{{ $item->phone_number }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Alamat</label>
                                            <textarea name="address" class="form-control"
                                                id="exampleFormControlTextarea1"
                                                rows="3">{{ $item->address }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Deskripsi</label>
                                            <textarea name="description" class="form-control"
                                                id="exampleFormControlTextarea1"
                                                rows="3">{{ $item->description }}</textarea>
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
