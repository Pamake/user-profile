@extends('layouts.auth')
@section('css')
 <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
  <!-- Styles -->
        <style>

  </style>
@stop
@section('content')
<div class="register-box">
  <div class="register-logo">
  <img src="{{ asset('adminlte/img/logoPanek.png')}}" alt="AdminLTE Logo" class="img-circle elevation-2"
           style="opacity: .8">
    <a href="#">
             <b>PANEK</b>SOLUTION</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Enregistrer une nouvelle adhésion</p>
      <form action="{{ route('register') }}" method="post">
       @csrf
        <div class="input-group mb-3 ">
          <input type="text" id="last_name" name="last_name" class="form-control @error('last_name') is-invalid @enderror" placeholder="Nom">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
          @error('last_name')
             <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
             </span>
         @enderror
        </div>
        <div class="input-group mb-3 @error('first_name') is-invalid @enderror">
          <input type="text" id="first_name" name="first_name" class="form-control @error('first_name') is-invalid @enderror" placeholder="Prénom">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
          @error('first_name')
             <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
             </span>
         @enderror
        </div>
        <div class="input-group mb-3">
          <input type="text" width="280" id="date_of_birth" name="date_of_birth" class="form-control @error('date_of_birth') is-invalid @enderror" placeholder="Date de naissance">
          <div class="input-group-append">
              <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
          </div>
          @error('date_of_birth')
             <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
             </span>
         @enderror
        </div>
        <div class="input-group mb-3 ">
          <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
          @error('email')
             <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
             </span>
         @enderror
        </div>
        <div class="input-group mb-3 ">
          <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required autocomplete="new-password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          @error('password')
             <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
             </span>
         @enderror
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required autocomplete="new-password" placeholder="Retype password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Enregistrer</button>
          </div>
          <!-- /.col -->
        </div>
      </form>


      <a href="{{ route('login') }}" class="text-center">Se connecter</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

@endsection
@section('js')
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(function () {
        $('#date_of_birth').datepicker({
                 format: 'yyyy-mm-dd',
                   uiLibrary: 'bootstrap'

        });
    });


</script>
@stop
