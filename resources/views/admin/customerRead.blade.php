@extends('template.admin')
@section('title', 'Customer | All')
@section('titleNavigation', 'Customer Page')

@section('inner-content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <a href="{{route('admin.customerInsert')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fa-solid fa-shirt"></i> Insert New Customer</a>
</div>

<div class="container card p-5">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID Customer</th>
                <th scope="col">Nama Customer</th>
                <th scope="col">Alamat Customer</th>
                <th scope="col">Nama Membership</th>
                <th scope="col">Diskon Membership</th>
                <th scope="col">Tanggal Rate</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customer as $v)
                <tr>
                    <td>{{$v->id}}</td>
                    <td>{{$v->nama_customer}}</td>
                    <td>{{$v->alamat_customer}}</td>
                    <td>{{$v->customerMemberships->nama_membership}}</td>
                    <td>{{$v->customerMemberships->diskon_membership}} %</td>
                    <td>{{ \Carbon\Carbon::parse($v->tanggal_rate)->format('d F Y \a\t H:i') }}</td>
                    <td class="row gap-2">
                        <a class="col-auto btn btn-primary" href="{{route('admin.customerUpdate',$v->id)}}">update</a>
                        <a class="col-auto btn btn-danger"  href="{{route('admin.handleCustomerDelete',$v->id)}}">delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection
