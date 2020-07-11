<!DOCTYPE html>
<html>
<head>
    <title>Bienvenue Email</title>
</head>
<body>
<h2>Bienvenue sur le site de {{ $user['name'] }}</h2>
<br/>
Votre identifiant de messagerie enregistré est {{ $user['email'] }}, veuillez cliquer sur le lien ci-dessous pour vérifier votre compte de messagerie
<br/>
<button href="{{url('user/verify', $user->activationUser->token)}}" class="btn btn-primary">Verifier Email</button>
</body>
</html>
