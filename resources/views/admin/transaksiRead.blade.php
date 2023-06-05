@extends('template.admin')
@section('title', 'Transaction | All')
@section('titleNavigation', 'Transaction Page')

@section('inner-content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <a href="{{route('admin.transaksiInsert')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fa-solid fa-shirt"></i> Insert New Transaction</a>
</div>

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
            <th scope="col">Action</th>
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
                        <td class="row gap-2">
                            <a class="col-auto btn btn-primary" href="{{route('admin.transaksiUpdate',$v->id)}}">update</a>
                            <a class="col-auto btn btn-danger"  href="{{route('admin.handleTransaksiDelete',$v->id)}}">delete</a>
                        </td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
</div>


@endsection
