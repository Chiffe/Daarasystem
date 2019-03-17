<?php session_start(); ?>
<!DOCTYPE html>
<html xml:lang="fr-FR" lang="fr-FR">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>DaaraSystem</title>
    <link href="favicon.ico" type="image/x-icon" rel="icon">
	<link href="favicon.ico" type="image/x-icon" rel="shortcut icon">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Bew-Works">
	<meta name="robots" content="index, follow">
	<meta name="description" content="DaaraSystem est un logiciel de gestion d'école sur internet & intranet.">
	<link rel="stylesheet" href="css/base.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="css/main.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div id="container">
    <header>
        <div class="outter-wrapper">
            <div class="wrapper">
                <div class="pull-left">
                    <p><span class="hidden-xs">Pour nous joindre : </span><a href="tel:00221766144709" rel="nofollow" class="color">00221766144709</a></p>
                    <p class="rs_cont"><a href="javascript:;" title="Facebook" target="_blank" rel="nofollow" class="flash-icon"><span class="sprite_main icon_fb"></span></a><a href="javascript:;" title="Twitter" target="_blank" rel="nofollow" class="flash-icon"><span class="sprite_main icon_twitter"></span></a><a href="javascript:;" title="Linkedin" target="_blank" rel="nofollow"><span class="sprite_main icon_linkedin"></span></a></p>
                </div>
                <div class="pull-right login_cont">
                    <div class="login_icon"><i class="fa fa-arrow-right"></i></div>
                    <p>Se connecter</p>
                    <div class="overlays">
                        <h3>connectez - vous</h3>
                        <form method="post" accept-charset="utf-8" action="/interface/login.html">
                            <div style="display:none;"><input type="hidden" name="_method" value="POST"></div>
                            <div class="form-group"><select name="school" required="required" class="form-control" id="school">
                                <option selected value>-- Choississez votre école --</option><option value="school_a">Ecole A</option><option value="school_b">Ecole B</option></select>
                            </div>
                            <button class="post_button" type="submit">envoyer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <?php
    $htmlResponse = [
        1 => ['class' => 'warning', 'msg' => 'Veuillez remplir tous les champs.'],
        2 => ['class' => 'warning', 'msg' => 'Votre email est invalide.'],
        3 => ['class' => 'success', 'msg' => 'Votre message a été envoyé.'],
        4 => ['class' => 'warning', 'msg' => 'Une erreur est survenue lors de l\'envoie de l\'email.']
    ];
    if(isset($_SESSION['response_code']) && in_array($_SESSION['response_code'], array_keys($htmlResponse))): ?>
        <div class="alert alert-<?php echo $htmlResponse[$_SESSION['response_code']]['class']; ?>">
	        <?php echo $htmlResponse[$_SESSION['response_code']]['msg']; ?>
        </div>
    <?php unset($_SESSION['response_code']); endif; ?>
    <div id="content">
        <section id="slider_home">
            <div id="sequence-home">
                <div class="main_block">
                    <img src="img/logo_daara_blanc.png" class="img-responsive center-block" height="250" width="250" alt="Logo DaaraSystem"><h1><span>DaaraSystem</span> est un logiciel de gestion d'école sur<br>internet &amp; intranet</h1>
                    <ul class="seq-pagination">
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul>
                </div>
                <div class="seq-canvas">
                    <div class="item seq-in" style="background-image: url(&quot;img/slider_home/slider1.jpg&quot;);">
                    </div>
                    <div class="item" style="background-image: url(&quot;img/slider_home/slider2.jpg&quot;);">
                    </div>
                    <div class="item" style="background-image: url(&quot;img/slider_home/slider3.jpg&quot;);">
                    </div>
                </div>
            </div>
        </section>
        <section id="welcome">
            <div class="outter-wrapper">
                <div class="wrapper">
                    <h2>à propos de <span><span class="color">daara</span>system</span></h2>
                    <div class="row margin_t50">
                        <div class="col-xs-12 col-md-6">
                            <div class="media">
                                <div class="media-left media-middle">
                                    <figure><img src="img/logo_daara.png" class="img-responsive" width="215" height="200" alt="Logo DaaraSystem"></figure>
                                </div>
                                <div class="media-body">
                                    <p><span class="os_sb"><span class="color">Daara</span>System</span> est développé par la société Toubasoft Corporation. Toubasoft Corporation est une entreprise spécialisée dans les services de l'ingénierie informatique. Notre effectif est principalement composé de développeurs et chefs de projets. En quelques années d'existence, Toubasoft est devenu un véritable acteur du développement d'applications permettant une gestion optimale et efficiente des données pour tous types d'entreprises. </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <div class="box_online">
                                <h3><span class="color">Daara</span>System ONLINE</h3>
                                <p class="txt">Demandez vos identifiants de démonstration en nous contactons<br>au <a href="tel:000221766144709" rel="nofollow" class="color">00221766144709</a> ou en remplissant le formulaire <a href="javascript:;" data-target="contact" class="scroll_link color">contact</a></p>
                                <p class="cont_btn row">
                                    <a href="http://www.toubasoft-sos-dakar.com/" target="_blank" class="btn_demo">Démo DaaraSystem</a><a href="http://www.daarasystem.com/files/Plaquette_Toubasoft.pdf" target="_blank" class="btn_dld">Télécharger la plaquette</a>                        </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="interface">
            <div class="outter-wrapper">
                <div class="wrapper">
                    <h2>une interface responsive <span><span class="color">daara</span>system</span></h2>
                    <div class="row">
                        <div class="col-xs-12 col-md-4 col-md-push-4">
                            <figure><img src="img/responsive.png" class="img-responsive center-block margin_b35" width="410" height="350" alt="Interface Responsive de DaaraSystem"></figure>
                        </div>
                        <div class="col-xs-12 col-sm-6  col-md-4 col-md-pull-4">
                            <ul class="list_interface">
                                <li>Accès comptabilité</li>
                                <li>Accès parents</li>
                                <li>Emploi du temps</li>
                            </ul>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <ul class="list_interface">
                                <li>Absences</li>
                                <li>Notes</li>
                                <li style="line-height:1.7;">Notifications Absences<br>Notes / Activités</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="apports">
            <div class="outter-wrapper">
                <div class="wrapper">
                    <h2>les apports de <span><span class="color">daara</span>system</span></h2>
                    <div class="row">
                        <div class="col-xs-12 col-sm-4">
                            <div class="body_apport more_parent">
                                <span class="sprite_main icon_apport_1"></span>
                                <h3 class="color">Une application<br>complètement en ligne</h3>
                                <p class="about"><span class="os_sb"><span class="color">Daara</span>System</span> est une application web se composant d'un site web disponible à tous les internautes, véritable vitrine pour votre école et un site à accès restreint pour les parents, les enseignants et le personnel de l'école, disponible 24h/24 et 7j/7. Un véritable environnement de partage et d'échanges autour de la vie scolaire.</p>
                                <button class="more_btn" type="button">Lire la suite</button>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4">
                            <div class="body_apport more_parent">
                                <span class="sprite_main icon_apport_2"></span>
                                <h3 class="color">Un autre regard<br>sur l'établissement</h3>
                                <p class="about">Avec <span class="os_sb"><span class="color">Daara</span>System</span> chacun est conquit à porter un autre regard sur l'établissement. En premier lieu le personnel, administratif ou enseignant, ... qui grâce à de nombreux tableaux de bord, graphes, états analytiques et suivi pluriannuel disposent en un clic d'informations jusque-là péniblement accessibles : résultats des examens, profils de classes, absentéisme, suivi des paiements. Les parents peuvent prendre chaque jour, la mesure de tout le travail accompli par l'ensemble du personnel enseignant ou personnel de surveillance. A travers le carnet de liaison électronique, ils restent au plus près du suivi de leur enfant.</p>
                                <button class="more_btn" type="button">Lire la suite</button>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4">
                            <div class="body_apport more_parent">
                                <span class="sprite_main icon_apport_3"></span>
                                <h3 class="color">Une solution<br>économique et rentable</h3>
                                <p class="about">En permettant l'acquisition d'un site web vitrine et d'une application en ligne de suivie de la scolarité, en offrant des interfaces qui ne nécessitent pratiquement aucune formation, en rendant possible l'interaction avec les parents par le biais de <span class="os_sb"><span class="color">Daara</span>System</span>, en produisant une même solution pour tout type d'établissement, <span class="os_sb"><span class="color">Daara</span>System</span> réduit considérablement le coût par an et par élève de la gestion de leur suivi. <span class="os_sb"><span class="color">Daara</span>System</span> est livré clé en main hébergé sur des serveurs performant avec un espace de stockage de 100 Go, <span class="os_sb"><span class="color">Daara</span>System</span> reste le meilleur investissement pour l'école de demain.</p>
                                <button class="more_btn" type="button">Lire la suite</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="fonc">
            <div class="outter-wrapper">
                <div class="wrapper">
                    <h2>fonctionnalités <span><span class="color">daara</span>system</span></h2>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <div class="body_fonc more_parent">
                                <span class="sprite_main icon_admin"></span>
                                <h3 class="color">Espace<br>Administration</h3>
                                <ul class="about">
                                    <li>Gestion du dossier de l'élève</li>
                                    <li>Gestion professeur</li>
                                    <li>Gestion du personnel</li>
                                    <li class="view_more">Gestion des salles et des équipements</li>
                                    <li class="view_more">Gestion des séances</li>
                                    <li class="view_more">Gestion des classes</li>
                                    <li class="view_more">Gestion des certificats scolaires</li>
                                </ul>
                                <button class="more_btn" type="button">Lire la suite</button>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <div class="body_fonc more_parent">
                                <span class="sprite_main icon_parents"></span>
                                <h3 class="color">Espace<br>Parents</h3>
                                <ul class="about">
                                    <li>Consultation de l'emploi du temps</li>
                                    <li>Consultation des absences</li>
                                    <li class="view_more">Consultation des notes dans toutes les matières</li>
                                    <li class="view_more">Contact permanent avec l'école grâce à la fonction d'Emailing</li>
                                    <li class="view_more">Espace d'information sur l'école (tél, fax..) et sur l'enfant</li>
                                </ul>
                                <button class="more_btn" type="button">Lire la suite</button>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <div class="body_fonc more_parent">
                                <span class="sprite_main icon_enseignants"></span>
                                <h3 class="color">Espace<br>Enseignants</h3>
                                <ul class="about">
                                    <li>Notification de l'absence de l'élève lors de son absence lors d'une séance</li>
                                    <li>Mise en ligne des notes des élèves</li>
                                    <li class="view_more">Avec un simple clic , la génération automatique d'un bulletin imprimable en se basant sur le modèle commun donné par l’école</li>
                                    <li class="view_more">Consignation des remarques concernant l'élève qui seront partagées aux parents et à l'administration</li>
                                </ul>
                                <button class="more_btn" type="button">Lire la suite</button>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <div class="body_fonc more_parent">
                                <span class="sprite_main icon_finance"></span>
                                <h3 class="color">Espace<br>Finance</h3>
                                <ul class="about">
                                    <li>Paiment des inscriptions</li>
                                    <li>Paiement des mensualités</li>
                                    <li>Impression des factures</li>
                                    <li class="view_more">Impression des reçus</li>
                                    <li class="view_more">Statistiques des Etats des finances</li>
                                    <li class="view_more">Suivi des encaissements  des dépôts en banques</li>
                                </ul>
                                <button class="more_btn" type="button">Lire la suite</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="abo">
            <div class="outter-wrapper">
                <div class="wrapper">
                    <h2>abonnement <span><span class="color">daara</span>system</span></h2>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <figure><img src="img/box_abon.png" class="img-responsive center-block" width="430" height="430" alt="Abonnement DaaraSystem"></figure>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="block_abon">
                                <h3>votre abonnement</h3>
                                <p class="price color">50 000 <sup class="money">fr cfa</sup> / Mois * <br><span class="only">seulement</span><br /><span style="font-size : 11px;">(*ce montant est hors taxe et varie selon l'effectif de l'école)</span> </p>
                                <p class="info">facturé mensuellement</p>
                            </div>
                            <button type="button" class="scroll_link" data-target="contact">j'en profite !</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="contact">
            <div class="outter-wrapper">
                <div class="wrapper">
                    <h2>nous contacter <span> c'est facile</span></h2>
                    <p class="accroche">Demandez votre <span class="os_sb">devis</span> ou laissez nous un <span class="os_sb">message</span> !</p>
                    <div class="row">
                        <div class="col-xs-12 col-md-8 col-md-offset-2">
                            <form method="post" accept-charset="utf-8" class="row" action="mail.php">
                                <div style="display:none;"><input type="hidden" name="_method" value="POST"></div>
                                <div class="fd_form"></div>
                                <div class="form-group col-xs-12 col-sm-8">
                                <input type="text" name="lastname" required="required" placeholder="Nom*" id="lastname" class="form-control"></div>
                                <div class="form-group col-xs-12 col-sm-4"><input type="tel" name="phone" required="required" placeholder="Téléphone*" id="phone" class="form-control"></div>
                                <div class="form-group col-xs-12 col-sm-8"><input type="text" name="schoolname" placeholder="Nom école" id="schoolname" class="form-control"></div>
                                <div class="form-group col-xs-12 col-sm-4"><input type="text" name="city" placeholder="Ville" id="city" class="form-control"></div>
                                <div class="form-group col-xs-12 col-sm-6"><input type="email" name="email" required="required" placeholder="Email*" id="email" class="form-control"></div>
                                <div class="form-group col-xs-12 col-sm-6">
                                    <select title="Objet du message*" name="objet" required="required" class="form-control" id="objet">
                                        <option value="devis">Demande de devis</option>
                                        <option value="other">Autre</option>
                                    </select>
                                </div>
                                <div class="form-group col-xs-12 margin_t30">
                                    <textarea name="comment" required="required" class="form-control" placeholder="Votre message...*" id="comment" rows="5"></textarea>
                                </div>
                                <div class="col-xs-12"><button class="post_button" type="submit">envoyer</button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <footer>
        <div class="outter-wrapper">
            <div class="wrapper">
                <ul>
                    <li><a href="javascript:;" data-target="home" class="scroll_link color">Accueil</a></li>
                    <li><a href="javascript:;" data-target="welcome" class="scroll_link color">A propos</a></li>
                    <li><a href="javascript:;" data-target="interface" class="scroll_link color">DaaraSystem</a></li>
                    <li><a href="javascript:;" data-target="apports" class="scroll_link color">Les apports</a></li>
                    <li><a href="javascript:;" data-target="fonc" class="scroll_link color">Fonctionnalités</a></li>
                    <li><a href="javascript:;" data-target="abo" class="scroll_link color">Nos tarifs</a></li>
                    <li><a href="javascript:;" data-target="contact" class="scroll_link color">Contact</a></li>
                </ul>
                <p><span class="sprite_main icon_logo_footer icon_margin"></span>© Copyright <?php echo date('Y'); ?> Toubasoft Group | Tous droits réservés</p>
            </div>
        </div>
    </footer>
</div>

	<script src="js/jquery-1.12.1.min.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/hammer.min.js"></script>
	<script src="js/sequence.min.js"></script>
	<script src="js/main.js"></script>
</body></html>