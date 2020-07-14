@component('mail::message')
#Cher Membre,
Félicitations, vous êtes admis avec succès dans notre plateforme.

Voici vos informations de connexion:<br>
Email: {{$studentData->email}}<br>
Password: celui que vous aviez saisie lor de votre inscription

Merci ,<br>
{{ config('app.name') }}
@endcomponent
