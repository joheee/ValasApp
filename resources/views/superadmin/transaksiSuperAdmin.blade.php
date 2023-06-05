@extends('template.superAdmin')
@section('title', 'Transaction | All')
@section('titleNavigation', 'Transaction Page')

@section('inner-content')

<div class="container card p-5">
    <table class="table">
        <thead>
            <tr>
            <th scope="col">ID Transaksi</th>
            <th scope="col">ID Customer</th>
            <th scope="col">ID Valas</th>
            <th scope="col">Rate</th>
            <th scope="col">Quantity</th>
            <th scope="col">Nomor Transaksi</th>
            <th scope="col">Tanggal Transaksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksi as $t)
                @foreach ($t->transaksiDetails as $v)
                    <tr>
                        <td>{{$t->id}}</td>
                        <td>{{$t->id_customer}}</td>
                        <td>{{$v->id_valas}}</td>
                        <td>{{$v->rate}}</td>
                        <td>{{$v->quantity}}</td>
                        <td>{{$t->nomor_transaksi}}</td>
                        <td>{{ \Carbon\Carbon::parse($t->tanggal_transaksi)->format('d F Y \a\t H:i') }}</td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
</div>


@endsection
