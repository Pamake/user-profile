@extends('layouts.auth')

@section('content')


    <div class="login-box">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
        @if (session('warning'))
        <div class="alert alert-warning">
            {{ session('warning') }}
        </div>
        @endif
        @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif
      <div class="login-logo">
      <img src="{{ asset('adminlte/img/panekv5360x83.png')}}" alt="Panek Logo" class="img"
                 style="opacity: .8">
      </div>
      <!-- /.login-logo -->
      <div class="card">
        <div class="card-body login-card-body">
          <p class="login-box-msg">Connectez-vous!</p>

          <form  action="{{ route('login') }}" method="post">
          @csrf
            <div class="input-group mb-3">
              <input id="email" name="email"type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Adresse Email">
              <div class="input-group-append">
                <div class="input-group-text ">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
              @error('email')
               <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
               </span>
           @enderror
            </div>
            <div class="input-group mb-3">
              <input id="password"  name="password" type="password" class="form-control  @error('password') is-invalid @enderror" placeholder="Mot de passe">
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
            <div class="row">
              <div class="col-7">
                <div class="icheck-primary">
                  <input type="checkbox" id="remember" {{ old('remember') ? 'checked' : '' }}>
                  <label for="remember">
                    Se rappeler de moi
                  </label>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-5">
                <button type="submit" class="btn btn-primary block full-width m-b">Connexion</button>
              </div>
              <!-- /.col -->
            </div>
          </form>
            <div class="social-auth-links text-center mb-3">
                <p><small>Pas de compte?</small></p>
                <a href="{{ route('register') }}" class="btn btn-block btn-secondary">
                    <i class="fa fa-user-plus" aria-hidden="true"></i> Inscription
                </a>
                <p>- OR -</p>
                <a  href="{{ route('welcome') }}" class="btn btn-block btn-warning">
                    <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Back to Home
                </a>
            </div>
            <!-- /.social-auth-links -->

            <p class="mb-1">
                @if (Route::has('password.request'))
                <a class="text-center" href="{{ route('password.request') }}">
                    <small> Mot de passe oublié ?</small>
                </a>
                @endif
            </p>
        </div>

      </div>
    </div>
    <!-- /.login-box -->
@endsection
