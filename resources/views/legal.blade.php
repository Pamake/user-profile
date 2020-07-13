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
                <div class="text-center"> @lang('Mentions Légales Anciens de l’INE-ENEAM 1998-2002')</div>

            @endslot

        <div class="legal card-text">
            <h4>Préambule</h4>
            <p>
                Cette page décrit les mentions légales qui s’appliquent à tout internaute visitant ce site. En le consultant vous vous engagez sans réserve à les respecter.<br>Les mentions légales pouvant être modifiées à tout moment et sans préavis, nous vous engageons à les consulter régulièrement.
            </p>
            <p>Liste de liens d’accès direct aux différentes rubriques :</p>
            <ol>
                <li>Objet</li>
                <li>Consultation du site internet</li>
                <li>Vie privée</li>
                <li>Données personnelles des diplômés de l’INE-ENEAM</li>
                <li>Finalité de la collecte des données</li>
                <li>Données personnelles des utilisateurs du site</li>
                <li>Origine des données</li>
                <li>Affichage des données dans l’annuaire</li>
                <li>Mise à jour des données</li>
                <li>E-mails et abonnements</li>
                <li>Exercice de mes droits</li>
                <li>Sécurisation des données</li>
                <li>Propriété intellectuelle</li>
            </ol>
            <h4>Objet</h4>
            <p>
                Les Anciens de l’INE-INEAM 1998-2002 (ci-après « Anciens de l’INE-INEAM ») a pour objet :
            </p>
            <ul>
                <li>de favoriser les relations personnelles et professionnelles entre diplômés de l’INE-ENEAM dans le monde en entier</li>
                <li>de promouvoir le caractère éducatif d’excellence de l’INE-ENEAM</li>
                <li>de développer le caractère social et professionnel d’Anciens de l’INE-INEAM 1998-2002 </li>
                <li>de participer à des projets d’intérêt général.</li>
                <li>de développer en général les activités carrières-emploi, au service des entreprises privées et publiques, et plus particulièrement des opportunités d’affaires entre diplômés et plus tard des nouveaux étudiants.</li>
                <li>d’œuvrer pour la qualité, la valorisation et la notoriété des diplômes de l’INE ou de l’ENAM dans le monde.</li>
            </ul>
            <br>
            <p>Tout diplômé de l’INE-ENEAM peut être membre d’Anciens de l’INE-ENEAM: il s’agit de Technicien Supérieur, master et BTS.</p>
            <h4>Consultation du site internet</h4>
            <p>L’accès au Site et l’utilisation de son contenu s’effectuent dans le cadre des présentes.<br>
                En accédant et en naviguant sur le site des Anciens de l’INE-ENEAM, l’Utilisateur les accepte sans réserve. Toute personne n’acceptant pas les CGU doit s’abstenir de consulter et/ou d’utiliser le Site de quelque manière que ce soit.
                Le Site est mis à la disposition des utilisateurs aux fins de présenter le réseau des diplômés INE-ENEAM. Le Site constitue également une passerelle vers la plateforme générique https://p5546.phpnet.org/trombi/, permettant à un diplômé de l’INE-ENEAM adhérent de consulter l’annuaire en ligne des diplômés de l’INE-ENEAM
            </p>
            <p>
                Le Site est mis à la disposition des utilisateurs aux fins de présenter le réseau des diplômés INE-ENEAM.
                <br>
                Le Site constitue également une passerelle vers la plateforme générique https://p5546.phpnet.org/trombi/, permettant à un diplômé de l’INE-ENEAM adhérent de consulter l’annuaire en ligne des diplômés de l’INE-ENEAM
            </p>
            <h4>Vie privée</h4>
            <p>
                Les utilisateurs du site web https://p5546.phpnet.org/trombi/ sont tenus de respecter les dispositions de la loi 2017-20 portant code du numérique en République du Bénin relatif aux fichiers et aux données personnelles dont la violation est passible de sanctions pénales
            </p>
            <p>
                Ils doivent notamment s'abstenir, s'agissant des données à caractère personnel auxquelles ils accèdent, de toute collecte, de toute utilisation détournée et, d'une manière générale, de tout acte susceptible de porter atteinte à la vie privée ou à la réputation de ces personnes.
            </p>
            <h4>Données personnelles des diplômés de l’INE-ENEAM</h4>
            <p>
                Dans le cadre de sa mission, les Anciens de l’INE-ENEAM est amenée à traiter des données personnelles (par exemple : adresse personnelle, adresse professionnelle, emails etc…). Ces données peuvent être destinées aux membres de l’association (annuaire en ligne accessible aux personnes à jour de leur adhésion.
            </p>
            <h4>Finalité de la collecte des données</h4>
            <p>
                Les informations recueillies sont nécessaires pour votre adhésion et la bonne gestion des activités menées par les Anciens de l’INE-ENEAM, dans le cadre de son activité selon les finalités suivantes :
            </p>
            <ul>
                <li>Enregistrement et mise à jour des informations individuelles nécessaires à la gestion administrative des membres </li>
                <li>Établir, pour répondre à des besoins de gestion, des états statistiques ou des listes de membres ou de contacts, notamment en vue d'adresser bulletins, convocations, invitations, journaux conformément à l’objet de ce groupe</li>
                <li>Établir un annuaire d'anciens étudiants de l’INE-ENEAM et des étudiants en cours de scolarité (plus tard) ;</li>
                <li>Traitement des données de connexion au site https://p5546.phpnet.org/trombi/ à des fins purement statistiques.</li>
            </ul>
            <h4>Données personnelles des utilisateurs du site</h4>
            <p>
                ANCIENS de l’INE-ENEAM ne collecte que les données strictement nécessaires pour les besoins de son objet associatif. Les données à caractère personnel collectées peuvent être les suivantes :
            </p>
            <ul>
                <li>Diplôme, filière, admission</li>
                <li>État civil nom, prénom, date et lieu de naissance,</li>
                <li>Situation familiale</li>
                <li>Nationalité</li>
                <li>Coordonnées personnelles (adresse, mail, téléphone),</li>
                <li>Coordonnées professionnelles (fonction, entreprise, mail, téléphone),</li>
                <li>Photographie</li>
                <li>Curriculum vitae (formations, fonctions professionnelles, loisirs, genre musical etc.),</li>
            </ul>
            <p>
                Le caractère obligatoire ou facultatif des données vous est signalé lors de la collecte par un astérisque. Certaines données sont collectées automatiquement du fait de vos actions sur le site.
            </p>
            <h4>Origine des données</h4>
            <p>
                Les données à caractère personnel agrégées dans la base d’ANCIENS de l’INE-ENEAM proviennent des Informations fournies par vos soins via l’interface personnelle de chaque membre du site des Anciens de l’INE-ENEAM
            </p>
            <h4>Affichage des données dans l’annuaire</h4>
            <p>
                Vous pouvez contrôler quelles sont les données affichées dans l’annuaire en ligne et l’annuaire papier, depuis votre espace privé dans la partie Trombinoscope, Profil ou Tableau de bord
            </p>
            <p>
                La confiance que vous nous accordez est primordiale. C’est pourquoi les ANCIENS de l’INE-ENEAM respecte le caractère privé et confidentiel des informations transmises et s’engage à respecter vos paramètres personnels.
            </p>
            <h4>Mise à jour des données</h4>
            <p>
                Les ANCIENS de l’INE-ENEAM s’engage à mettre à jour régulièrement les informations accessibles avec votre consentement.
            </p>
            <h4>E-mails et abonnements</h4>
            <p>
                Vous pouvez recevoir différentes communications e-mail que nous envoyons aux diplômés de l’INE-ENEAM. Si vous ne souhaitez plus y être inscrit, vous pouvez vous désinscrire à tout moment grâce à la rubrique « Paramètres e-mails et abonnements » de votre compte en ligne.
            </p>
            <h4>Exercice de mes droits</h4>
            <p>
                En application de loi 2017-20 portant code du numérique en République du Bénin (Livre 5ième relatif à la protection des données personnelles et de la vie privée), les internautes disposent d’un droit d’accès, de rectification, de modification et de suppression concernant les données qui les concernent personnellement par voie électronique aux adresses emails suivantes :
            </p>
            <ul>
                <li><strong>Raphiatou AKADIRI ZANOUVI</strong> : rozakath@yahoo.fr</li>
                <li><strong>Bansaari KOUSSEY</strong>: bkoussey@gmail.com</li>
                <li><strong>Gildas LOGOZO</strong> : gildaslogozo@gmail.com</li>
            </ul>
            <p>
                Les informations personnelles collectées ne sont en aucun cas confiées à des tiers.
            </p>
            <p>
                Toute modification des données personnelles est possible à tout moment en accédant à votre espace personnel sur le site https://p5546.phpnet.org/trombi/.
            </p>
            <p>
                La suppression totale et immédiate de vos données est aussi de votre droit et possible. Si vous souhaitez exercer l’un ou l’autre de ces droits et obtenir communication des informations vous concernant, veuillez-vous adresser aux administrateurs
            </p>
            <p>
                Une réponse vous sera apportée au plus tard sous 15 jours.
            </p>
            <h4>Sécurisation des données</h4>
            <p>
                Les données nominatives collectées sur le présent Site sont protégées par les mesures de sécurité adéquates afin d’éviter, notamment, que ces données soient déformées, endommagées, ou que des tiers non autorisés y aient accès.
            </p>
            <h4>Propriété intellectuelle</h4>
            <p>
                Tout le contenu du présent site, incluant, de façon non limitative, les graphismes, images, textes, vidéos, animations, sons, logos, gifs et icônes ainsi que leur mise en forme sont la propriété exclusive des ANCIENS de l’INE-ENEAM à l'exception des marques, logos ou contenus appartenant à d'autres sociétés partenaires ou auteurs.
            </p>
            <p>
                Toute reproduction, distribution, modification, adaptation, retransmission ou publication, même partielle, de ces différents éléments est strictement interdite sans l'accord exprès par écrit des ANCIENS de l’INE-ENEAM.
            </p>
            <p>
                Toute reproduction, distribution, modification, adaptation, retransmission ou publication, même partielle, de ces différents éléments est strictement interdite sans l'accord exprès par écrit des ANCIENS de l’INE-ENEAM.
            </p>

            </div>

        @endcomponent
    </main>
   </div>
@endsection

