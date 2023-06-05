@extends('template.bootstrap')
@section('title', 'Valas | Insert')

@section('content')

<section class="vh-100" style="background-color: #508bfc;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card shadow-2-strong" style="border-radius: 1rem;">
            <form method="post" action="{{route('admin.handleValasInsert')}}" class="card-body p-5 text-center">
                @csrf
                <h3 class="mb-5">Insert New Valas</h3>

                <div class="form-outline mb-4">
                    <input name="nama_valas" type="text" id="form2Example17" class="form-control form-control-lg" placeholder="nama_valas" >
                </div>

                <div class="form-outline mb-4">
                    <input name="nilai_jual" type="number" id="form2Example17" class="form-control form-control-lg" placeholder="nilai_jual" >
                </div>

                <div class="form-outline mb-4">
                    <input name="nilai_beli" type="number" id="form2Example17" class="form-control form-control-lg" placeholder="nilai_beli" >
                </div>

                <div class="form-outline mb-4">
                    <input name="tanggal_rate" type="datetime-local" id="form2Example17" class="form-control form-control-lg" placeholder="tanggal_rate" >
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
