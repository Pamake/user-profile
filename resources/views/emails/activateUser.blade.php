<!DOCTYPE html>
<html>
  <head>
    <title>Welcome Email</title>
  </head>
  <body>
    <h2>Activation du Membre {{$user['name']}}</h2>
    <br/>
    Vous aviez une nouvelle inscription en attente activation. Bien vouloir activer son compte pour pour lui permettre d accéder l espace des membres.
    Nom:{{$user['name']}} <br/>,
    Email:{{$user['email']}} <br/>,
    veuillez cliquer sur le lien ci-dessous pour activer son compte
    <br/>
    <a href="{{route('activate', $user->activationUser->token)}}">Activation</a>
  </body>
</html>
