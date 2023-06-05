@extends('template.superAdmin')
@section('title', 'Membership | All')
@section('titleNavigation', 'Membership Page')

@section('inner-content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <a href="{{route('superAdmin.membershipInsert')}}" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"><i class="fa-solid fa-shirt"></i> Insert New Membership</a>
</div>

<div class="container card p-5">
    <table class="table">
        <thead>
            <tr>
            <th scope="col">ID Membership</th>
            <th scope="col">Nama Membership</th>
            <th scope="col">Diskon Membership</th>
            <th scope="col">Minimum Profit Membership</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($membership as $m)
                <tr>
                    <td>{{$m->id}}</td>
                    <td>{{$m->nama_membership}}</td>
                    <td>{{$m->diskon_membership}} %</td>
                    <td>{{$m->minimum_profit_membership}}</td>
                    <td class="row gap-2">
                        <a class="col-auto btn btn-info" href="{{route('superAdmin.membershipUpdate',$m->id)}}b">update</a>
                        <a class="col-auto btn btn-danger" href="{{route('superAdmin.handleMembershipDelete',$m->id)}}">delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection
