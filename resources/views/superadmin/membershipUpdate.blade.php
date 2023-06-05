@extends('template.bootstrap')
@section('title', 'Membership | Update '.$membership->nama_membership)

@section('content')

<section class="vh-100" style="background-color: #508bfc;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card shadow-2-strong" style="border-radius: 1rem;">
            <form method="post" action="{{route('superAdmin.handleMembershipUpdate',$membership->id)}}" class="card-body p-5 text-center">
                @csrf
                <h3 class="mb-5">Update {{$membership->nama_membership}}</h3>

                <div class="form-outline mb-4">
                    <input value="{{$membership->nama_membership}}" name="nama_membership" type="text" id="form2Example17" class="form-control form-control-lg" placeholder="Nama Membership" >
                </div>

                <div class="form-outline mb-4">
                    <input value="{{$membership->diskon_membership}}" name="diskon_membership" type="number" id="form2Example17" class="form-control form-control-lg" placeholder="Diskon Membership" >
                </div>

                <div class="form-outline mb-4">
                    <input value="{{$membership->minimum_profit_membership}}" name="minimum_profit_membership" type="number" id="form2Example17" class="form-control form-control-lg" placeholder="Minimum Profit Membership" >
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger" role="alert" >
                        {{$errors->first()}}
                    </div>
                @endif

                <button class="btn btn-primary btn-lg btn-block" type="submit">Update</button>

            </form>
          </div>
        </div>
      </div>
    </div>
</section>


@endsection
