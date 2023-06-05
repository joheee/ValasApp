@extends('template.bootstrap')
@section('title', 'Transaksi | Update '.$transaksi->id)

@section('content')

<section class="vh-full" style="background-color: #508bfc;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card shadow-2-strong" style="border-radius: 1rem;">
            <form method="post" action="{{route('admin.handleTransaksiUpdate',$transaksi->id)}}" class="card-body p-5 text-center">
                @csrf
                <h3 class="mb-5">Update {{$transaksi->id}}</h3>

                <div class="form-outline mb-4">
                    <input value="{{$transaksi->transaksiDetails->id_customer}}" name="id_customer" type="number" id="form2Example17" class="form-control form-control-lg" placeholder="ID Customer" >
                </div>

                <div class="form-outline mb-4">
                    <input value="{{$transaksi->id_valas}}" name="id_valas" type="number" id="form2Example17" class="form-control form-control-lg" placeholder="ID Valas" >
                </div>

                <div class="form-outline mb-4">
                    <input value="{{$transaksi->transaksiDetails->nomor_transaksi}}" name="nomor_transaksi" type="number" id="form2Example17" class="form-control form-control-lg" placeholder="Nomor Transaksi" >
                </div>

                <div class="form-outline mb-4">
                    <input value="{{ date('Y-m-d\TH:i', strtotime($transaksi->transaksiDetails->tanggal_transaksi)) }}" name="tanggal_transaksi" type="datetime-local" id="form2Example17" class="form-control form-control-lg" placeholder="Tanggal Transaksi" >
                </div>

                <div class="form-outline mb-4">
                    <input value="{{$transaksi->transaksiDetails->diskon}}" name="diskon" type="number" id="form2Example17" class="form-control form-control-lg" placeholder="Diskon" >
                </div>

                <div class="form-outline mb-4">
                    <input value="{{$transaksi->rate}}" name="rate" type="number" id="form2Example17" class="form-control form-control-lg" placeholder="Rate" >
                </div>

                <div class="form-outline mb-4">
                    <input value="{{$transaksi->quantity}}" name="quantity" type="number" id="form2Example17" class="form-control form-control-lg" placeholder="Quantity" >
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger" role="alert" >
                        {{$errors->first()}}
                    </div>
                @endif

                <button class="btn btn-primary btn-lg btn-block" type="submit">Insert</button>

            </form>
          </div>
        </div>
      </div>
    </div>
</section>

@endsection
