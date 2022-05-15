@extends('layouts.owner')
@section('title', 'Dasboard Owner')
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
                <div class="col-md-3">
                    <div class="card mb-2">
                        <div class="card-body">
                            <div class="dashboard-card-title">Pengguna</div>
                            <div class="dashboard-card-subtitle">{{ $customer }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card mb-2">
                        <div class="card-body">
                            <div class="dashboard-card-title">Pendapatan</div>
                            <div class="dashboard-card-subtitle">@currency($revenue)</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card mb-2">
                        <div class="card-body">
                            <div class="dashboard-card-title">Transaksi</div>
                            <div class="dashboard-card-subtitle"> {{ $transaction }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card mb-2">
                        <div class="card-body">
                            <div class="dashboard-card-title">Barang Terjual</div>
                            <div class="dashboard-card-subtitle"> {{ $qtys }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-xl-12 d-flex flex-column">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title" align="center">Statistik Penjualan Barang Terlaris</h4>
                            <div id="mataChart"></div>
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
<script src="https://code.highcharts.com/highcharts.src.js"></script>
<script>
    Highcharts.chart('mataChart', {
    chart: {
    type: 'column'
    },
    title: {
    text: 'Statistik Penjualan Barang Terlaris'
    },
    xAxis: {
    categories: {!! json_encode($qty) !!},
    crosshair: true
    },
    yAxis: {
    min: 0,
    title: {
    text: 'Jumlah'
    }
    },
    tooltip: {
    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.0f} pcs</b></td></tr>',
        footerFormat: '</table>',
    shared: true,
    useHTML: true
    },
    plotOptions: {
    column: {
    pointPadding: 0.2,
    borderWidth: 0
    }
    },
    series: [{
    name: 'Barang',
    data: {!! json_encode($chartSale) !!}

    }]
    });
</script>
@endpush
