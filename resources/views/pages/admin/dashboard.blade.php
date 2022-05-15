@extends('layouts.dashboard')
@section('title', 'Dasboard Mitra Tani')
@section('menuDashboard','active')

@section('content')
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Dasbor</h2>
            <p class="dashboard-subtitle">Pencapaian Toko</p>
        </div>
        <div class="dashboard-content">
            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-2">
                        <div class="card-body">
                            <div class="dashboard-card-title">Pengguna</div>
                            <div class="dashboard-card-subtitle">{{ $customer }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-2">
                        <div class="card-body">
                            <div class="dashboard-card-title">Pendapatan</div>
                            <div class="dashboard-card-subtitle">@currency($revenue)</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-2">
                        <div class="card-body">
                            <div class="dashboard-card-title">Transaksi</div>
                            <div class="dashboard-card-subtitle"> {{ $transaction_count }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12 mt-2">
                    <h5 class="mb-3">Transaksi Terkini</h5>
                    @forelse ($transaction_data as $transactionDetail )
                    <a href="{{ route('transaction.edit', $transactionDetail->id) }}" class="card card-list d-block">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-1">
                                    <img src="{{ Storage::url($transactionDetail->product->galleries->first()->photos ?? '') }}"
                                        class="w-75" />
                                </div>
                                <div class="col-md-2">{{ $transactionDetail->product->name ?? '' }}</div>
                                <div class="col-md-2">{{ $transactionDetail->product->category->name ?? '' }}</div>
                                <div class="col-md-2">{{ $transactionDetail->transaction->user->name ?? '' }}</div>
                                <div class="col-md-1">{{ $transactionDetail->qty ?? '' }}</div>
                                <div class="col-md-3">{{ $transactionDetail->transaction->order_date ?? '' }}</div>
                                <div class="col-md-1 d-none d-md-block">
                                    <img src="images/dashboard-arrow-right.svg" alt="" />
                                </div>
                            </div>
                        </div>
                    </a>
                    @empty
                    <a href="#" class="card card-list d-block text-center">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">Tidak Ada Produk</div>
                            </div>
                        </div>
                    </a>
                    @endforelse

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
