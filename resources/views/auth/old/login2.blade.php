<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SMS | Login</title>

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>
<body class="gray-bg">
<div class="middle-box text-center loginscreen animated fadeInDown margin-bottom" style="padding-bottom: 40px;">
    <div>
        <div>

            <div class="logo-name">
                <img src="{{ asset('adminlte/img/logoPanek.png')}}" alt="AdminLTE Logo" class="img-circle elevation-2"
                     style="opacity: .8">
            </div>
            <h2> <b>Panek Developpement</b> </h2>
        </div>
        <p>Connectez-vous. Pour le voir en action.</p>
        <form class="m-t" role="form" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
            </div>
            <div class="form-group">
                <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                <span class="fa fa-lock"></span>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fa fa-lock"></span>
                    </div>
                </div>
                @error('password')
                <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
            </div>
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Se rappeler de moi') }}
                    </label>
                </div>
            </div>
            <button type="submit" class="btn btn-success block full-width m-b">
                {{ __('Connexion') }}
            </button>

            @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}">
                <small>{{ __('Mot de passe oublié?') }}</small>
            </a>
            @endif

            <p class="text-muted text-center"><small>Pas de compte?</small></p>
            <a class="btn btn-sm btn-second btn-block" href="{{ route('register') }}">S'inscrire</a>
            OR
        </form>
        <a class="btn btn-sm btn-warning" href="{{ route('welcome') }}">Back to Home</a>
    </div>
</div>
<!-- Mainly scripts -->
<script src="{{ asset('js/jquery-2.1.1.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>

</body>

</html>

