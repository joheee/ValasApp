@extends('template.bootstrap')
@section('title', 'Valas | Sign In')

@section('content')

<section class="vh-100" style="background-color: #508bfc;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card shadow-2-strong" style="border-radius: 1rem;">
            <form method="post" action="{{route('guest.handleLogin')}}" class="card-body p-5 text-center">
                @csrf
                <h3 class="mb-5">Sign In</h3>

                <div class="form-outline mb-4">
                    <input name="email" type="email" id="form2Example17" class="form-control form-control-lg" placeholder="email" name="email">
                </div>

                <div class="form-outline mb-4">
                    <input name="password" type="password" id="form2Example27" class="form-control form-control-lg" placeholder="password" name="password"/>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger" role="alert" >
                        {{$errors->first()}}
                    </div>
                @endif

                <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>

            </form>
          </div>
        </div>
      </div>
    </div>
</section>


@endsection
