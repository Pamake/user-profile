@extends('layouts.auth')

@section('content')
<div class="login-box">
    <div class="login-logo">
        <img src="{{ asset('adminlte/img/panekv5360x83.png')}}" alt="Panek Logo" class="img"
             style="opacity: .8">
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Renouvellement du mot de passe</p>

            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="input-group mb-3">
                    <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
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
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-info btn-block">Demander un lien de Renouvellement du mot de passe</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>


            <div class="social-auth-links text-center mb-3">
                <a href="{{ route('login') }}" class="btn btn-block btn-primary">
                    <i class="fa fa-sign-in-alt" aria-hidden="true"></i> Connexion
                </a>
                <p><small>Pas de compte?</small></p>
                <a href="{{ route('register') }}" class="btn btn-block btn-secondary">
                    <i class="fa fa-user-plus" aria-hidden="true"></i> Inscription
                </a>
                <p>- OR -</p>
                <a  href="{{ route('welcome') }}" class="btn btn-block btn-warning">
                    <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Back to Home
                </a>
            </div>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
@endsection
