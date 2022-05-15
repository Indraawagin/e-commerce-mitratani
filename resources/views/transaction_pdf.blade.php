<html>

<head>
    <title>Laporan Transaksi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>
    <div class="text-center">
        <h3>Laporan Transaksi UD Mitra Tani</h3>
    </div>
    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Barang</th>
                <th>Harga</th>
                <th>Status Transaksi</th>
                <th>Status Pengiriman</th>
                <th>Tanggal Transaksi</th>
                <th>Kode Transaksi</th>
            </tr>
        </thead>
        <tbody>
            @php $i=1 @endphp
            @foreach($item as $transaction)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{$transaction->transaction->user->name}}</td>
                <td>{{$transaction->product->name}}</td>
                <td>{{$transaction->price}}</td>
                <td>{{$transaction->transaction->transactions_status}}</td>
                <td>{{$transaction->shipping_status}}</td>
                <td>{{$transaction->transaction->order_date}}</td>
                <td>{{$transaction->code}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
