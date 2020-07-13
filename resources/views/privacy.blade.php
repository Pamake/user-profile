@extends('back.layout')
@section('css')

<style>

    .legal {
        background-color: #f0f0f0;
        color: black;
    }

</style>

@endsection
@section('main')
<!-- Content Wrapper. Contains page content -->
  <div class="content">
<main class=" container-fluid">
    @component('components.card')

    @slot('title')
    <div class="text-center"> @lang('Politique de confidentialité Anciens de l’INE-ENEAM 1998-2002')</div>

    @endslot

    <div class="legal card-text">
        <h4 class="">Introduction</h4>
        <p>
            Devant le développement des nouveaux outils de communication, il est nécessaire de porter une attention particulière à la protection de la vie privée. C'est pourquoi, nous nous engageons à respecter la confidentialité des renseignements personnels que nous collectons.
        </p>
        <h4>Éditeur et responsable du site</h4>
        <p>
            Anciens de l’INE-ENEAM 1998-2002
        </p>
        <p>
            Directeurs de publication :
        </p>
        <ul>
            <li>Raphiathou O AKADIRI ZANOUVI, administrateur</li>
            <li>Bansaari KOUSSEY KOUMBA, administrateur</li>
            <li>Gildas LOGOZO, administrateur</li>
        </ul>
        <h4>Conception, Développement technique et Hébergement</h4>
        <h5>Conception</h5>
        <p>BKPK, sous le label 3id Web & TIC, Solutions Web à moindre coûts.</p>
        <h5>Développement technique</h5>
        <p>Bansaari Koussey et Patrick Kenfack</p>
        <h5>Hébergement:</h5>
        <h6>PHPNET</h6>
        <ul>
            <li>97-97 bis rue du général Mangin </li>
            <li>38100 GRENOBLE (France)</li>
        </ul>
        <h4>Collecte des renseignements personnels</h4>
        <p>
            Nous collectons les renseignements suivants :
        </p>
        <ul>
            <li>Nom</li>
            <li>Prénom</li>
            <li>Adresse électronique</li>
            <li>Âge / Date de naissance</li>
            <li>Situation matrimoniale</li>
            <li>Formation</li>
            <li>Profession</li>
            <li>Préférences (musicales, littéraires, cinématographiques, etc.)</li>
            <li>Situation familiale</li>
            <li>Ville et Pays de résidence</li>
        </ul>
        <p>
            Les renseignements personnels que nous collectons sont recueillis au travers de formulaires et grâce à l'interactivité établie entre vous et notre site Web. Nous utilisons également, comme indiqué dans la section suivante, des fichiers témoins et/ou journaux pour réunir des informations vous concernant.
        </p>
        <h4>Formulaires et interactivité</h4>
        <p>Vos renseignements personnels sont collectés par le biais de formulaire, à savoir :</p>
        <ul><li>Formulaire d'inscription au site Web</li></ul>
        <p>Nous utilisons les renseignements ainsi collectés pour les finalités suivantes :</p>
        <ul><li>Contact et réseautage entre membres de façon libre</li></ul>
        <p>Vos renseignements sont également collectés par le biais de l'interactivité pouvant s'établir entre vous et notre site Web et ce, de la façon suivante:</p>
        <ul>
            <li>Contact</li>
            <li>Gestion du site Web (présentation, organisation)</li>
            <li>Pour faire des statistiques des membres actifs</li>
        </ul>
        <p>Nous utilisons les renseignements ainsi collectés pour les finalités suivantes :</p>
        <ul>
            <li>Forum ou aire de discussion</li>
            <li>Correspondance</li>
        </ul>
        <h4>Sécurité</h4>
        <p>Les renseignements personnels que nous collectons sont conservés dans un environnement sécurisé. Les personnes travaillant pour nous sont tenues de respecter la confidentialité de vos informations.</p>
        <p>Pour assurer la sécurité de vos renseignements personnels, nous avons recours aux mesures suivantes :</p>
        <ul>
            <li>Protocole SSL (Secure Sockets Layer)</li>
            <li>Gestion des accès - personne autorisée</li>
            <li>Sauvegarde informatique</li>
            <li>Identifiant / mot de passe</li>
        </ul>
        <p>Nous nous engageons à maintenir un haut degré de confidentialité en intégrant les dernières innovations technologiques permettant d'assurer la confidentialité de vos transactions. Toutefois, comme aucun mécanisme n'offre une sécurité maximale, une part de risque est toujours présente lorsque l'on utilise Internet pour transmettre des renseignements personnels.</p>

    </div>

    @endcomponent
</main>
 </div>
@endsection


