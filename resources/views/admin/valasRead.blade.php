@extends('template.admin')
@section('title', 'Valas | All')
@section('titleNavigation', 'Valas Page')

@section('inner-content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <a href="{{route('admin.valasInsert')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fa-solid fa-shirt"></i> Insert New Valas</a>
</div>

<div class="container card p-5">
    <table class="table">
        <thead>
            <tr>
            <th scope="col">ID Valas</th>
            <th scope="col">Nama Valas</th>
            <th scope="col">Nilai Jual</th>
            <th scope="col">Nilai Beli</th>
            <th scope="col">Tanggal Rate</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($valas as $v)
                <tr>
                    <td>{{$v->id}}</td>
                    <td>{{$v->nama_valas}}</td>
                    <td>{{$v->nilai_jual}}</td>
                    <td>{{$v->nilai_beli}}</td>
                    <td>{{ \Carbon\Carbon::parse($v->tanggal_rate)->format('d F Y \a\t H:i') }}</td>
                    <td class="row gap-2">
                        <a class="col-auto btn btn-primary" href="{{route('admin.valasUpdate',$v->id)}}">update</a>
                        <a class="col-auto btn btn-danger"  href="{{route('admin.handleValasDelete',$v->id)}}">delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection
