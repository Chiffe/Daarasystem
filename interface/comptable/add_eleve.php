<!DOCTYPE html>
<!--[if IE 8]> <html lang="fr" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="fr" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="fr">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8">
        <title>Comptable | Ajouter un élève</title> <!-- TITRE DE LA PAGE A RECUPERER OU METTRE CE QUE VOUS VOULEZ -->
        <link rel="shortcut icon" href="../favicon.ico">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport">
        <meta content="ToDo" name="description">
        <meta content="Bew-Works" name="author">
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css">
        <link href="../css/core/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="../css/core/simple-line-icons.min.css" rel="stylesheet" type="text/css">
        <link href="../css/core/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="../css/core/bootstrap-switch.min.css" rel="stylesheet" type="text/css">


        <!-- ***************************************************************************** -->
        <!--------------------------- CSS DES PLUGINS A RECUPERER --------------------------->
        <!-- ***************************************************************************** -->
        <link href="../css/plugins/toastr.min.css" rel="stylesheet" type="text/css">
        <link href="../css/plugins/multi-select.css" rel="stylesheet" type="text/css">
        <link href="../css/plugins/bootstrap-fileinput.css" rel="stylesheet" type="text/css">
        <!----------------------- FIN DES CSS DES PLUGINS A RECUPERER ----------------------->


        <link href="../css/global/components.min.css" rel="stylesheet" type="text/css">
        <link href="../css/global/plugins.min.css" rel="stylesheet" type="text/css">
        <link href="../css/global/layout.min.css" rel="stylesheet" type="text/css">
        <link href="../css/global/green.min.css" rel="stylesheet" type="text/css">
        <link href="../css/main.css" rel="stylesheet" type="text/css">


        <!-- ***************************************************************************** -->
        <!--------------------------- CSS SPECIFIQUES A RECUPERER --------------------------->
        <!-- ***************************************************************************** -->
        <link href="../css/add_eleve.css" rel="stylesheet" type="text/css">
        <!----------------------- FIN DES CSS SPECIFIQUES A RECUPERER ----------------------->


    </head>
    <!-- END HEAD -->

    <body class="page-sidebar-fixed page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid">
        <!-- BEGIN HEADER -->
        <div class="page-header navbar navbar-fixed-top">
            <!-- BEGIN HEADER INNER -->
            <div class="page-header-inner ">
                <!-- BEGIN LOGO -->
                <div class="page-logo">
                    <a href="home.php">
                        <img src="../img/logo-default.png" alt="logo" class="logo-default"> </a>
                    <div class="menu-toggler sidebar-toggler">
                        <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
                    </div>
                </div>
                <!-- END LOGO -->
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
                <!-- END RESPONSIVE MENU TOGGLER -->
                <?php include "top_actions.html"; ?>
            </div>
            <!-- END HEADER INNER -->
        </div>
        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
            <div class="page-sidebar-wrapper">
                <!-- END SIDEBAR -->
                <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                <div class="page-sidebar navbar-collapse collapse">
                    <!-- BEGIN SIDEBAR MENU -->
                    <?php include "menu.html"; ?>
                    <!-- END SIDEBAR MENU -->
                </div>
                <!-- END SIDEBAR -->
            </div>
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">



                <!-- ******************************************************************************************************************************* -->
                <!------------------------------------------------------ CONTENU DE LA PAGE A RECUPERER ----------------------------------------------->
                <!-- ******************************************************************************************************************************* -->
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                    <h2 class="page-title font-green"> Comptable
                        <small class="font-green">Ajouter un élève</small>
                    </h2>
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <i class="icon-home"></i>
                                <a class="font-green" href="home.php">Accueil</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <a class="font-green" href="eleves.php">Gestion des élèves</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <a class="font-green" href="add_eleve.php">Ajouter un élève</a>
                            </li>
                        </ul>
                    </div>
                    <!-- END PAGE HEADER-->
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="portlet light" id="form_wizard">
                                <div class="portlet-title">
                                    <div class="caption font-green">
                                        <i class="icon-plus font-green"></i>
                                        <span class="caption-subject sbold uppercase"> Ajouter un élève</span>
                                    </div>
                                </div>
                                <div class="portlet-body form">
                                    <div class="table-toolbar">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <form class="form-inline" enctype="multipart/form-data" role="form" action="#">
                                                    <div class="form-group form-md-line-input">
                                                        <div class="input-icon">
                                                            <input type="file" class="form-control" required="required" name="file_import">
                                                            <div class="form-control-focus"> </div>
                                                            <span class="help-block font-green">Fichier sous le format...</span>
                                                            <i class="glyphicon glyphicon-import"></i>
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="btn green">Importer</button>
                                                </form>
                                            </div>
                                            <div class="col-md-6">
                                                <button data-original-title="Imprimer le certificat de l'élève" class="tooltips btn grey-mint">Imprimer le certificat</button>
                                            </div>
                                        </div>
                                    </div>
                                    <form role="form" action="#" method="POST" enctype="multipart/form-data" novalidate="novalidate" id="form_submit">
                                        <div class="form-wizard">
                                            <div class="form-body">
                                                <ul class="nav nav-pills nav-justified steps">
                                                    <li class="active">
                                                        <a href="#tab1" data-toggle="tab" class="step" aria-expanded="false">
                                                            <span class="number">1</span>
                                                            <span class="desc"><i class="fa fa-check"></i>Cycle</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#tab2" data-toggle="tab" class="step" aria-expanded="true">
                                                            <span class="number"> 2 </span>
                                                            <span class="desc"><i class="fa fa-check"></i>Coordonnées</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#tab3" data-toggle="tab" class="step active">
                                                            <span class="number"> 3 </span>
                                                            <span class="desc"><i class="fa fa-check"></i>Infos parents/tuteur</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#tab4" data-toggle="tab" class="step">
                                                            <span class="number"> 4 </span>
                                                            <span class="desc"><i class="fa fa-check"></i>Paiement</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#tab5" data-toggle="tab" class="step">
                                                            <span class="number"> 5 </span>
                                                            <span class="desc"><i class="fa fa-check"></i>Récapitulatif</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <div id="bar" class="progress progress-striped" role="progressbar">
                                                    <div class="progress-bar progress-bar-success"></div>
                                                </div>
                                                <div class="tab-content">


                                                    <!-- ******************************************************************************************************************* -->
                                                    <!------------------------------------------------------ 1er Onglet (Cycle) ----------------------------------------------->
                                                    <!-- ******************************************************************************************************************* -->
                                                    <div class="tab-pane active" id="tab1">
                                                        <h3 class="block">Choix du cycle</h3>
                                                        <div id="cont_cycle">
                                                            <div class="cycle_item" data-cycle="1"><i class="fa fa-cubes"></i><p class="text-uppercase">creche</p></div>
                                                            <div class="cycle_item" data-cycle="2"><i class="fa fa-puzzle-piece"></i><p class="text-uppercase">jardin</p></div>
                                                            <div class="cycle_item" data-cycle="3"><i class="fa fa-child"></i><p class="text-uppercase">primaire</p></div>
                                                            <div class="cycle_item" data-cycle="1"><i class="fa fa-cubes"></i><p class="text-uppercase">cycle bébé</p></div>
                                                            <div class="cycle_item" data-cycle="1"><i class="fa fa-puzzle-piece"></i><p class="text-uppercase">cycle petit</p></div>
                                                            <div class="cycle_item" data-cycle="2"><i class="fa fa-child"></i><p class="text-uppercase">cycle moyen</p></div>
                                                            <div class="cycle_item" data-cycle="3"><i class="fa fa-graduation-cap"></i><p class="text-uppercase">cycle grand</p></div>
                                                        </div>
                                                        <input type="hidden" required="required" name="idcycle" id="idcycle">
                                                    </div>






                                                    <!-- ******************************************************************************************************************* -->
                                                    <!------------------------------------------------------ 2eme Onglet (Coordonnées) ----------------------------------------------->
                                                    <!-- ******************************************************************************************************************* -->
                                                    <div class="tab-pane" id="tab2">
                                                        <h3 class="block">Coordonnées de l'élève</h3>
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <div class="form-group form-md-line-input form-md-floating-label">
                                                                    <select class="form-control" required="required" name="civilite" id="civilite">
                                                                        <option value=""></option>
                                                                        <option value="M">M</option>
                                                                        <option value="Mlle">Mlle</option>
                                                                        <option value="Mme">Mme</option>
                                                                    </select>
                                                                    <label for="civilite">Civilité*</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <div class="form-group form-md-line-input form-md-floating-label">
                                                                    <select class="form-control" required="required" name="classe" id="classe">
                                                                        <option value=""></option>
																		<optgroup label="CRECHE">
																			<option value="1">Classe 1</option>
																			<option value="2">Classe 2</option>
																			<option value="3">Classe 3</option>
																			<option value="4">Classe 4</option>
																		</optgroup>
                                                                    </select>
                                                                    <label for="classe">Classe*</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <div class="form-group form-md-line-input form-md-floating-label">
                                                                    <select class="form-control" required="required" name="cat_id" id="cat_id">
                                                                        <option value=""></option>
                                                                        <option value="1">CS</option>
                                                                        <option value="2">EP</option>
                                                                        <option value="3">EXO</option>
                                                                        <option value="4">EXT</option>
                                                                        <option value="5">NS</option>
                                                                        <option value="6">RF</option>
                                                                        <option value="7">RF</option>
                                                                        <option value="8">SOS</option>
                                                                    </select>
                                                                    <label for="cat_id">Catégorie*</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 col-md-3">
                                                                <div class="form-group form-md-line-input form-md-floating-label">
                                                                    <input type="text" class="form-control" name="prenom" required="required" id="prenom">
                                                                    <label for="prenom">Prénom*</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 col-md-3">
                                                                <div class="form-group form-md-line-input form-md-floating-label">
                                                                    <input type="text" class="form-control" name="nom" required="required" id="nom">
                                                                    <label for="nom">Nom*</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 col-md-3">
                                                                <div class="form-group form-md-line-input form-md-floating-label">
                                                                    <input type="text" class="form-control date-mask" name="date_naissance" required="required" id="date_naissance">
                                                                    <label for="date_naissance">Date de naissance*</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 col-md-3">
                                                                <div class="form-group form-md-line-input form-md-floating-label">
                                                                    <input type="text" class="form-control" name="lieu_naissance" required="required" id="lieu_naissance">
                                                                    <label for="lieu_naissance">Lieu de naissance*</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group form-md-line-input form-md-floating-label">
                                                            <textarea class="form-control" name="adresseeleve" id="adresseeleve" required="required" rows="4"></textarea>
                                                            <label for="adresseeleve">Adresse*</label>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-6 col-md-3">
                                                                <div class="form-group form-md-line-input form-md-floating-label">
                                                                    <input type="email" class="form-control" name="emaileleve" id="emaileleve">
                                                                    <label for="emaileleve">Email</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 col-md-3">
                                                                <div class="form-group form-md-line-input form-md-floating-label">
                                                                    <input type="tel" class="form-control" name="phoneeleve" id="phoneeleve">
                                                                    <label for="phoneeleve">Téléphone</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 col-md-3">
                                                                <div class="form-group form-md-line-input form-md-floating-label">
                                                                    <input type="text" class="form-control" name="numextrait" id="numextrait">
                                                                    <label for="numextrait">Numéro extrait</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 col-md-3">
                                                                <div class="form-group form-md-line-input form-md-floating-label">
                                                                    <select class="form-control" name="religion" id="religion">
                                                                        <option value=""></option>
                                                                        <option value="Musulman">Musulman</option>
                                                                        <option value="Chretien">Chretien</option>
                                                                    </select>
                                                                    <label for="religion">Religion</label>
                                                                </div>
                                                            </div>
                                                            <!-- ------------ Ancienne version du champ photo -------------------------
                                                            --------------- A supprimer si la nouvelle version vous satisfait.-----------
                                                            <div class="col-sm-6">
                                                                <div class="form-group form-md-line-input form-md-floating-label">
                                                                    <input type="hidden" name="MAX_FILE_SIZE" value="100000000000">
                                                                    <input type="file" class="form-control edited" name="photo" id="photo" accept="image/*">
                                                                    <label for="photo">Photo</label>
                                                                </div>
                                                            </div>-->
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                        <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                                            <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="">
                                                                        </div>
                                                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                                                                        <div>
                                                                    <span class="btn default btn-file">
                                                                        <span class="fileinput-new">Sélectionnez une photo</span>
                                                                        <span class="fileinput-exists">Changer de photo</span>
                                                                        <input type="file" name="photo" required="required" id="photo" accept="image/*">
                                                                    </span>
                                                                            <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput">Supprimer</a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="clearfix margin-top-10">
                                                                        <span class="label label-danger margin-right-10">NOTE!</span>
                                                                        <span>La prévisualisation de l'image est prise en charge par les dernières versions de Firefox, Chrome, Opera, Safari et Internet Explorer 10 uniquement</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group form-md-line-input form-md-floating-label">
                                                                    <textarea class="form-control" name="obsmedicale" id="obsmedicale" rows="4"></textarea>
                                                                    <label for="obsmedicale">Observation médicale</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <select title="Classe doublée" class="form-control" multiple="multiple" name="clas_doublee[]" id="clas_doublee">
                                                                    <option value="1">SECONDE A</option>
                                                                    <option value="2">SECONDE B</option>
                                                                    <option value="3">SECONDE C</option>
                                                                    <option value="4">TLE A</option>
                                                                    <option value="5">TLE B</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>






                                                    <!-- ******************************************************************************************************************* -->
                                                    <!------------------------------------------------------ 3em Onglet (Parent/tuteur) --------------------------------------->
                                                    <!-- ******************************************************************************************************************* -->
                                                    <div class="tab-pane" id="tab3">
                                                        <h3 class="block">Informations parents</h3>
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="form-group form-md-line-input form-md-floating-label">
                                                                    <input type="text" class="form-control" name="pere" id="pere">
                                                                    <label for="pere">Prénom père</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group form-md-line-input form-md-floating-label">
                                                                    <input type="text" class="form-control" name="fonctpere" id="fonctpere">
                                                                    <label for="fonctpere">Fonction père</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 col-md-4">
                                                                <div class="form-group form-md-line-input form-md-floating-label">
                                                                    <input type="text" class="form-control" name="pnommere" id="pnommere">
                                                                    <label for="pnommere">Prénom mère</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 col-md-4">
                                                                <div class="form-group form-md-line-input form-md-floating-label">
                                                                    <input type="text" class="form-control" name="nommere" id="nommere">
                                                                    <label for="nommere">Nom mère</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 col-md-4">
                                                                <div class="form-group form-md-line-input form-md-floating-label">
                                                                    <input type="text" class="form-control" name="fonctmere" id="fonctmere">
                                                                    <label for="fonctmere">Fonction mère</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group form-md-line-input form-md-floating-label">
                                                                    <input type="tel" class="form-control" required="required" name="numtele" id="numtele">
                                                                    <label for="numtele">Téléphone contact*</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group form-md-line-input form-md-floating-label">
                                                                    <input type="email" class="form-control" name="emailparent" id="emailparent">
                                                                    <label for="emailparent">Email parent</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <h3 class="block">Informations tuteur</h3>
                                                        <div class="row">
                                                            <div class="col-sm-6 col-md-4">
                                                                <div class="form-group form-md-line-input form-md-floating-label">
                                                                    <input type="text" class="form-control" name="nomtuteur" id="nomtuteur">
                                                                    <label for="nomtuteur">Prénom & Nom</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 col-md-4">
                                                                <div class="form-group form-md-line-input form-md-floating-label">
                                                                    <input type="text" class="form-control" name="foncttuteur" id="foncttuteur">
                                                                    <label for="foncttuteur">Fonction</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 col-md-4">
                                                                <div class="form-group form-md-line-input form-md-floating-label">
                                                                    <input type="email" class="form-control" name="emailtuteur" id="emailtuteur">
                                                                    <label for="emailtuteur">Email</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group form-md-line-input form-md-floating-label">
                                                                    <input type="tel" class="form-control" name="phonetuteur" id="phonetuteur">
                                                                    <label for="phonetuteur">Téléphone</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group form-md-line-input form-md-floating-label">
                                                                    <input type="text" class="form-control" name="lienparent" id="lienparent">
                                                                    <label for="lienparent">Lien de parenté</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>






                                                    <!-- ******************************************************************************************************************* -->
                                                    <!------------------------------------------------------ 4eme Onglet (Paiement) ------------------------------------------->
                                                    <!-- ******************************************************************************************************************* -->
                                                    <div class="tab-pane" id="tab4">
                                                        <h3 class="block">Paiement</h3>
                                                        <div class="row">
                                                            <div class="col-xs-12 col-sm-offset-3 col-sm-6">
                                                                <table class="table table-striped table-hover table-bordered" id="table_paiement">
                                                                    <thead>
                                                                    <tr>
                                                                        <th>Année scolaire 2016/2017</th>
                                                                        <th>
                                                                            Mois :
                                                                            <select title="Mois" class="form-control input-inline" required="required" name="mois" id="mois">
                                                                                <option value="OCTOBRE">OCTOBRE</option>
                                                                                <option value="JANVIER">JANVIER</option>
                                                                                <option value="FEVRIER">FEVRIER</option>
                                                                                <option value="MARS">MARS</option>
                                                                                <option value="AVRIL">AVRIL</option>
                                                                                <option value="MAI">MAI</option>
                                                                                <option value="JUIN">JUIN</option>
                                                                                <option value="JUILLET">JUILLET</option>
                                                                                <option value="AOÛT">AOÛT</option>
                                                                                <option value="SEPTEMBRE">SEPTEMBRE</option>
                                                                                <option value="NOVEMBRE">NOVEMBRE</option>
                                                                                <option value="DECEMBRE">DECEMRE</option>
                                                                            </select>
                                                                        </th>
                                                                        <th>Date : <input title="Date" class="form-control input-inline date-mask" type="text" name="date" required="required" value="<?php echo date('d/m/Y') ; ?>"></th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            <input type="hidden" name="paie[]" value="-1">
                                                                            Droit d'inscription
                                                                        </td>
                                                                        <td>
                                                                            <input title="Paiement droit d'inscription" type="number" class="form-control" name="paiement[]" min="0" value="0" readonly>
                                                                        </td>
                                                                        <td>
                                                                            <label for="tarifcreche">Tarif :
                                                                                <select class="form-control input-inline" name="tarifcreche" id="tarifcreche" disabled>
                                                                                    <option value="1">1</option>
                                                                                    <option value="0.5">1/2</option>
                                                                                </select>
                                                                            </label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <input type="hidden" name="paie[]" value="-1">
                                                                            Scolarité
                                                                        </td>
                                                                        <td colspan="2">
                                                                            <input title="Paiement scolarité" type="number" class="form-control" name="paiement[]" min="0" value="0" readonly>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <input type="hidden" name="paie[]" value="-1">
                                                                            APE
                                                                        </td>
                                                                        <td colspan="2">
                                                                            <input title="Paiement APE" type="number" class="form-control" name="paiement[]" min="0" value="0" readonly>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <input type="hidden" name="paie[]" value="-1">
                                                                            Cotisation de fin d'année
                                                                        </td>
                                                                        <td colspan="2">
                                                                            <input title="Paiement cotisation de fin d'année" type="number" class="form-control" name="paiement[]" min="0" value="0" readonly>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <input type="hidden" name="tenueid" value="-1">
                                                                            Tenue(s)
                                                                        </td>
                                                                        <td>
                                                                            <input title="Paiement tenue(s)s" type="number" class="form-control" name="prixtenu" min="0" value="0" readonly>
                                                                        </td>
                                                                        <td>
                                                                            Nombre :
                                                                            <input title="Nombre de tenue" type="number" class="form-control input-inline" name="nbrtenu" value="0" readonly min="0">
                                                                        </td>
                                                                    </tr>
                                                                    </tbody>
                                                                    <tfoot>
                                                                    <tr>
                                                                        <td>Montant à payer</td>
                                                                        <td colspan="2">
                                                                            <input title="Montant à payer" type="number" class="form-control" name="total" id="total" readonly>
                                                                        </td>
                                                                    </tr>
                                                                    </tfoot>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>




                                                    <!-- ******************************************************************************************************************* -->
                                                    <!------------------------------------------------------ 5eme Onglet (Recapitulatif) -------------------------------------->
                                                    <!----- Accéder à cet onglet affiche les 3 onglets précédents. (Voir le js : comptable_features_form_eleve.js)
                                                    <!-- ******************************************************************************************************************* -->
                                                    <div class="tab-pane" id="tab5">
                                                    </div>





                                                </div>
                                            </div>
                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-9">
                                                        <a href="javascript:;" class="btn default button-previous disabled" style="display:none;"> <i class="fa fa-angle-left"></i> Retour </a>
                                                        <a href="javascript:;" class="btn btn-outline green button-next"> Suivant <i class="fa fa-angle-right"></i></a>
                                                        <button type="submit" class="btn green button-submit" style="display:none;"> Sauvegarder <i class="fa fa-check"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END CONTENT BODY -->
                <!------------------------------------------------------ FIN CONTENU DE LA PAGE A RECUPERER ----------------------------------------------->



            </div>
            <!-- END CONTENT -->
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <div class="page-footer">
            <?php include "../footer.php"; ?>
            <!-- END FOOTER -->
            <!--[if lt IE 9]>
            <script src="../js/core/respond.min.js"></script>
            <script src="../js/core/excanvas.min.js"></script>
            <script src="../js/core/ie8.fix.min.js"></script>
            <![endif]-->
            <!-- BEGIN CORE PLUGINS -->
            <script src="../js/core/jquery.min.js" type="text/javascript"></script>
            <script src="../js/core/bootstrap.min.js" type="text/javascript"></script>
            <script src="../js/core/js.cookie.min.js" type="text/javascript"></script>
            <script src="../js/core/jquery.slimscroll.min.js" type="text/javascript"></script>
            <script src="../js/core/jquery.blockui.min.js" type="text/javascript"></script>
            <script src="../js/core/bootstrap-switch.min.js" type="text/javascript"></script>
            <!-- END CORE PLUGINS -->


            <!-- ***************************************************************************** -->
            <!---------------------------- JS DES PLUGINS A RECUPERER --------------------------->
            <!-- ***************************************************************************** -->
            <script src="../js/plugins/toastr.min.js" type="text/javascript"></script>
            <script src="../js/plugins/jquery.multi-select.js" type="text/javascript"></script>
            <script src="../js/plugins/jquery.inputmask.bundle.min.js" type="text/javascript"></script>
            <script src="../js/plugins/jquery.validate.min.js" type="text/javascript"></script>
            <script src="../js/plugins/jquery_validate_messages_fr.min.js" type="text/javascript"></script>
            <script src="../js/plugins/jquery.bootstrap.wizard.min.js" type="text/javascript"></script>
            <script src="../js/plugins/bootstrap-fileinput.js" type="text/javascript"></script>
            <!------------------------- FIN DES JS DES PLUGINS A RECUPERER ------------------------>


            <!-- BEGIN THEME GLOBAL SCRIPTS -->
            <script src="../js/global/app.min.js" type="text/javascript"></script>
            <!-- END THEME GLOBAL SCRIPTS -->
            <!-- BEGIN THEME LAYOUT SCRIPTS -->
            <script src="../js/global/layout.min.js" type="text/javascript"></script>
            <!-- END THEME LAYOUT SCRIPTS -->
            <script src="../js/main.js" type="text/javascript"></script>


            <!-- ***************************************************************************** -->
            <!---------------------------- JS SPECIFIQUES A RECUPERER --------------------------->
            <!-- ***************************************************************************** -->
            <script src="../js/comptable/comptable_features_form_eleve.js" type="text/javascript"></script>
            <!----------------------- FIN DES JS SPECIFIQUES A RECUPERER ----------------------->


        </div>
    </body>
</html>