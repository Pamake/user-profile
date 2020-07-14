<!DOCTYPE html>
<html>
  <head>
    <title>Welcome Email</title>
  </head>
  <body>
    <h2>Bienvenue sur la plateforme des Anciens de l’INE-ENEAM Monsieur ou Madame {{$user['name']}}</h2>
    <br/>
    Votre identifiant de messagerie enregistré est {{$user['email']}} , veuillez cliquer sur le lien ci-dessous pour vérifier votre compte de messagerie
    <br/>
    <a href="{{url('user/verify', $user->activationUser->token)}}">Verification Email</a>
  </body>
</html>
