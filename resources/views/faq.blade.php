@extends('layouts.app')

@section('css')


<style>


    .legal {

        background-color: #f0f0f0;

        color: black;

    }


</style>


@endsection

@section('content')

<main class=" container-fluid">

    @component('components.card')


    @slot('title')

    <div class="text-center"> @lang('FAQ de l’INE-ENEAM 1998-2003')</div>


    @endslot


    <div class="legal card-text">

        <h4>Tutoriel </h4>
        <h5>1. Inscription</h5>
        <p>Vous vous êtes inscrit, il faudra attendre un second mail te disant de vérifier votre adresse email en
            cliquant sur vérifier.
            Sans cette action votre profil ne sera pas totalement actif avec tous les privilèges</p>
        <p>Inscription à la plateforme ENEAM ALUMNI : <a href="https://youtu.be/eTbQITe34fU" target="_blank">https://youtu.be/eTbQITe34fU</a>
        </p>
        <h5>2. Remplir Profil</h5>


        <p>Pour remplir le profil, cela signifie au préalable que :</p>
        <ul>
            <li> vous avez fait l’action de vérification de votre adresse email via le bouton <strong>Vérification
                    d'adresse email</strong> <img src="{!! asset('images/faq/verification.png') !!}" alt="verification"></li>
            <li> vous avez reçu le courriel vous confirmant que <strong>Votre compte est maintenant activé. Vous pouvez
                    accéder à vos services.</strong></li>
        </ul>
        <p><strong>Vérification et activation de votre compte:</strong> <a href="https://youtu.be/Ue1YpOF0YkU"
                                                                           target="_blank">https://youtu.be/Ue1YpOF0YkU</a>
        </p>
        <p>Si ces deux conditions réunies cliquez sur Profil <img src="{!! asset('images/faq/Profil.png') !!}" alt="Profil"></p>
        <p>Vous trouverez tous les champs à remplir.</p>
        <p>Après avoir finir de renseigner tous les champs, vous cliquez sur le bouton envoyer <img
                src="{!! asset('images/faq/Envoyer.png') !!}" alt="Envoyer"></p>
        S’il y a des erreurs, vous aurez les messages qui vous indiqueront là où se l’erreur.</p>
        <p><strong>Remplir son profil sur la plateforme ENEAM Alumni :</strong> <a href=" https://youtu.be/IDyrkrXHuYs"
                                                                                   target="_blank">
                https://youtu.be/IDyrkrXHuYs</a></p>
        <h5>3. Gestion d’avatar</h5>
        <h6>3.1. Sur ordinateur</h6>
        <p>Pour ajouter votre photo, cliquez sur gestion Avatar puis Ajouter une image de profile/ajouter une image.
            Allez trouver votre image puis cliquez sur en envoyer </p>

        <p><img src="{!! asset('images/faq/avatar téléphone.png') !!}"  alt="ordinateur"></p>
        <h6>3.2. Sur téléphone</h6>

        <p>Pour ajouter votre photo, cliquez sur gestion Avatar puis Ajouter une image de profile/ajouter une image.
            /Sélectionner une action / ou Allez trouver votre image dans Fichiers/ puis cliquez sur en envoyer</p>
        <p><img  src="{!! asset('images/faq/avatar téléphones.png') !!}" alt="téléphone"></p>
        <p><strong>Gestion avatar:</strong><a href="https://youtu.be/cxdJe2NzrEk" target="_blank">https://youtu.be/cxdJe2NzrEk</a>
        </p>

        <h5>4. Mot de passe oublié</h5>
        <p>Si vous ne vous souvenez pas de votre mot de passe , cliquez sur la fonction mot de passe oublié? <img
                src="{!! asset('images/faq/motdepasse.png') !!}"  alt="mot de passe oublié"></p>
        <p> Vous tomberez sur cette page/tapez votre adresse email/envoi de la demande et vous aurez un autre lien dans
            votre boite mail.</p>
        <p><img  src="{!! asset('images/faq/renouvellement mot de passe.png') !!}"  alt="renouvellement"></p>

        <h5>5. Chaîne Youtube</h5>
        <p><strong>Nous vous invitons à suivre nos tutoriel sur notre chaîne youtube</strong></p>
        <p>
            <iframe width="560" height="315"
                    src="https://www.youtube.com/embed/videoseries?list=PLAcEny0fuVoAE2doPaD794JqwaBMYPfs5"
                    frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
        </p>
    </div>


    @endcomponent

</main>

@endsection
