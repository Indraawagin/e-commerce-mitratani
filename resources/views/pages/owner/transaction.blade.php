@extends('layouts.owner')
@section('title', 'Dasboard Owner')
@section('menuTransaction','active')

@section('content')
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Transaksi</h2>
            <p class="dashboard-subtitle">Daftar Transaksi</p>
        </div>
        <div class="dashboard-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <a href="{{ route('print-pdf') }}" class="btn btn-primary mb-3" target="_blank">Cetak
                                    PDF</a>
                                <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nama</th>
                                            <th>Barang</th>
                                            <th>Harga</th>
                                            <th>Status Transaksi</th>
                                            <th>Status Barang</th>
                                            <th>Tanggal Transaksi</th>
                                            <th>Kode Transaksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('addon-script')
<script>
    var no = 1;
    var datatable = $('#crudTable').DataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            ajax: {
                url: '{!! url()->current() !!}',
            },
            columns: [
                {data: 'id', name: 'id' },
                {data: 'transaction.user.name', name: 'transaction.user.name' },
                {data: 'product.name', name: 'product.name' },
                {data: 'price', name: 'price' },
                {data: 'transaction.transactions_status', name: 'transaction.transactions_status' },
                {data: 'shipping_status', name: 'shipping_status' },
                {data: 'transaction.order_date', name: 'transaction.order_date' },
                {data: 'code', name: 'code' },
            ],
        })
</script>
@endpush
