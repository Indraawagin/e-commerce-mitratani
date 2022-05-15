@extends('layouts.app')
@section('title', 'Transaction Product')

@push('addon-style')
<style>
    .page-transaction .row-transaction {
        min-height: 100vh;
    }
</style>
@endpush

@section('content')
<!-- Page Content -->
<div class="page-content page-transaction">
    <div class="container">
        <div class="row">
            <div class="col-12" data-aos="fade-up">
                <h5>Transaksi</h5>
            </div>
        </div>
        <div class="row row-transaction">
            <div class="col-12 mt-2">
                <div class="tab-content" data-aos="fade-up">
                    @foreach ($transactions as $transaction )
                    <a href="{{ route('transactions-details', $transaction->id ) }}" class="card card-list d-block">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-1">
                                    <img src="{{ Storage::url($transaction->product->galleries->first()->photos ?? '') }}"
                                        class="w-75" />
                                </div>
                                <div class="col-md-3">{{ $transaction->product->name ?? '' }}</div>
                                <div class="col-md-2">{{ $transaction->product->category->name ?? '' }}</div>
                                <div class="col-md-2">{{ $transaction->qty ?? '' }}</div>
                                <div class="col-md-3">{{ $transaction->transaction->order_date ?? '' ?? ''
                                    }}</div>
                                <div class="col-md-1 d-none d-md-block">
                                    <img src="images/dashboard-arrow-right.svg" alt="" />
                                </div>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
