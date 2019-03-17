<!DOCTYPE html>
<!--[if IE 8]> <html lang="fr" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="fr" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="fr">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8">
        <title>Comptable | Complément de paiement</title>
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
        <link href="../css/plugins/datatables.min.css" rel="stylesheet" type="text/css">
        <link href="../css/plugins/datatables.bootstrap.css" rel="stylesheet" type="text/css">
        <link href="../css/plugins/toastr.min.css" rel="stylesheet" type="text/css">
        <!----------------------- FIN DES CSS DES PLUGINS A RECUPERER ----------------------->


        <link href="../css/global/components.min.css" rel="stylesheet" type="text/css">
        <link href="../css/global/plugins.min.css" rel="stylesheet" type="text/css">
        <link href="../css/global/layout.min.css" rel="stylesheet" type="text/css">
        <link href="../css/global/green.min.css" rel="stylesheet" type="text/css">
        <link href="../css/main.css" rel="stylesheet" type="text/css">
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
                        <small class="font-green">Complément de paiement</small>
                    </h2>
                    <div class="alert alert-success fade in">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                        Emplacement message pour visiteur
                    </div>
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <i class="icon-home"></i>
                                <a class="font-green" href="home.php">Accueil</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <a class="font-green" href="factures.php">Gestion des factures</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <a class="font-green" href="facturer_eleves.php">Facturer les élèves</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <a class="font-green" href="complement_paiement.php">Complément de paiement</a>
                            </li>
                        </ul>
                    </div>
                    <!-- END PAGE HEADER-->
                    <!----------------- TEST BEW-WORKS A SUPPRIMER ------------------------------------------------------->
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="mt-element-ribbon bg-grey-steel">
                                <div class="ribbon ribbon-shadow ribbon-color-danger uppercase ">Test Bew-Wokrs (A Supprimer)</div>
                                <div class="ribbon-content">
                                    <p>Résultat des requêtes AJAX (Permet de voir la gestion des erreurs)</p>
                                    <input id="bw_test" type="checkbox" class="make-switch" checked="" data-on-text="Success" data-off-text="Error" data-on-color="success" data-off-color="warning">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet light portlet-fit ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-money font-green"></i>
                                        <span class="caption-subject font-green sbold uppercase">Compément de paiement d'un élève</span>
                                    </div>
                                    <div class="pull-right">
                                        <button class="btn red-flamingo cancel_facture display-none">Annuler</button>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div id="no_facture" class="row cont_facture">
                                        <div class="col-xs-12">
                                            <p class="text-center text-uppercase">sélectionner un élève pour afficher le complément de paiement à faire</p>
                                        </div>
                                    </div>
                                    <div id="yes_facture" class="row cont_facture display-none"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light portlet-fit ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-list font-green"></i>
                                        <span class="caption-subject font-green sbold uppercase">Liste des élèves qui doivent un complément de paiement</span>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="table-toolbar">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <label for="filter" class="margin-right-10">Cycle :
                                                    <select class="form-control input-inline" name="filter" id="filter_cycle">
                                                        <option data-id="" value="">Tous</option>
                                                        <option data-id="1" value="Cycle 1">Cycle 1</option>
                                                        <option data-id="2" value="Cycle 2">Cycle 2</option>
                                                        <option data-id="3" value="Cycle 3">Cycle 3</option>
                                                    </select>
                                                </label>
                                                <label for="filter2" class="margin-right-10">Classe :
                                                    <select class="form-control input-inline" name="filter2" id="filter_classe"></select>
                                                </label>
                                                <label for="filter3">Mois :
                                                    <select class="form-control input-inline" name="filter3" id="filter_mois">
                                                        <option value="" selected="selected">Tous</option>
                                                        <option value="Octobre">Octobre</option>
                                                        <option value="Novembre">Novembre</option>
                                                        <option value="Décembre">Décembre</option>
                                                        <option value="Janvier">Janvier</option>
                                                        <option value="Fevrier">Fevrier</option>
                                                        <option value="Mars">Mars</option>
                                                        <option value="Avril">Avril</option>
                                                        <option value="Mai">Mai</option>
                                                        <option value="Juin">Juin</option>
                                                    </select>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <table class="table table-striped table-hover table-bordered" id="table_complement">
                                        <thead>
                                        <tr>
                                            <th>Cycle</th>
                                            <th>Classe</th>
                                            <th>Matricule</th>
                                            <th>Elève</th>
                                            <th>Mois</th>
                                            <th>Complément de paiement</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            // ID de la facture, dont le complément est associé ou l'ID du complément directement, mais j'ai pas vu d'id de complément donc je pense que c'est l'ID de la facture qu'il faut utiliser
                                            $dataTable = [
                                                ['cycle' => 'Cycle 1', 'classe' => 'Classe 1', 'eleve' => 'Nom_A Prenom_A', 'mois' => 'Janvier',  'matricule' => 'mat_1',  'id' => 1],
                                                ['cycle' => 'Cycle 1', 'classe' => 'Classe 1', 'eleve' => 'Nom_A Prenom_A', 'mois' => 'Novembre', 'matricule' => 'mat_1',  'id' => 1],
                                                ['cycle' => 'Cycle 3', 'classe' => 'Classe 8', 'eleve' => 'Nom_B Prenom_B', 'mois' => 'Mars',     'matricule' => 'mat_2',  'id' => 2],
                                                ['cycle' => 'Cycle 3', 'classe' => 'Classe 8', 'eleve' => 'Nom_B Prenom_B', 'mois' => 'Décembre', 'matricule' => 'mat_2',  'id' => 2],
                                                ['cycle' => 'Cycle 3', 'classe' => 'Classe 8', 'eleve' => 'Nom_B Prenom_B', 'mois' => 'Février',  'matricule' => 'mat_2',  'id' => 2],
                                                ['cycle' => 'Cycle 1', 'classe' => 'Classe 1', 'eleve' => 'Nom_C Prenom_C', 'mois' => 'Janvier',  'matricule' => 'mat_3',  'id' => 3],
                                                ['cycle' => 'Cycle 2', 'classe' => 'Classe 6', 'eleve' => 'Nom_D Prenom_D', 'mois' => 'Mai',      'matricule' => 'mat_4',  'id' => 4],
                                                ['cycle' => 'Cycle 1', 'classe' => 'Classe 2', 'eleve' => 'Nom_E Prenom_E', 'mois' => 'Juin',     'matricule' => 'mat_5',  'id' => 5],
                                                ['cycle' => 'Cycle 1', 'classe' => 'Classe 2', 'eleve' => 'Nom_E Prenom_E', 'mois' => 'Janvier',  'matricule' => 'mat_5',  'id' => 5],
                                                ['cycle' => 'Cycle 1', 'classe' => 'Classe 2', 'eleve' => 'Nom_E Prenom_E', 'mois' => 'Octobre',  'matricule' => 'mat_5',  'id' => 5],
                                                ['cycle' => 'Cycle 1', 'classe' => 'Classe 1', 'eleve' => 'Nom_F Prenom_F', 'mois' => 'Avril',    'matricule' => 'mat_6',  'id' => 6],
                                                ['cycle' => 'Cycle 3', 'classe' => 'Classe 9', 'eleve' => 'Nom_G Prenom_G', 'mois' => 'Janvier',  'matricule' => 'mat_7',  'id' => 7],
                                                ['cycle' => 'Cycle 3', 'classe' => 'Classe 9', 'eleve' => 'Nom_G Prenom_G', 'mois' => 'Mars',     'matricule' => 'mat_7',  'id' => 7],
                                                ['cycle' => 'Cycle 2', 'classe' => 'Classe 4', 'eleve' => 'Nom_H Prenom_H', 'mois' => 'Mai',      'matricule' => 'mat_8',  'id' => 8],
                                                ['cycle' => 'Cycle 2', 'classe' => 'Classe 4', 'eleve' => 'Nom_H Prenom_H', 'mois' => 'Novembre', 'matricule' => 'mat_8',  'id' => 8],
                                                ['cycle' => 'Cycle 1', 'classe' => 'Classe 3', 'eleve' => 'Nom_I Prenom_I', 'mois' => 'Octobre',  'matricule' => 'mat_9',  'id' => 9],
                                                ['cycle' => 'Cycle 1', 'classe' => 'Classe 3', 'eleve' => 'Nom_J Prenom_J', 'mois' => 'Février',  'matricule' => 'mat_10', 'id' => 10],
                                                ['cycle' => 'Cycle 1', 'classe' => 'Classe 2', 'eleve' => 'Nom_K Prenom_K', 'mois' => 'Décembre', 'matricule' => 'mat_11', 'id' => 11],
                                                ['cycle' => 'Cycle 2', 'classe' => 'Classe 6', 'eleve' => 'Nom_L Prenom_L', 'mois' => 'Avril',    'matricule' => 'mat_12', 'id' => 12],
                                                ['cycle' => 'Cycle 2', 'classe' => 'Classe 6', 'eleve' => 'Nom_M Prenom_M', 'mois' => 'Juin',     'matricule' => 'mat_13', 'id' => 13]
                                            ];
                                            foreach($dataTable as $row): ?>
                                                <tr>
                                                    <td><?php echo $row['cycle']; ?></td>
                                                    <td><?php echo $row['classe']; ?></td>
                                                    <td><?php echo $row['matricule']; ?></td>
                                                    <td><?php echo $row['eleve']; ?></td>
                                                    <td><?php echo $row['mois']; ?></td>
                                                    <td>
                                                        <a href="javascript:;" data-id="<?php echo $row['id']; ?>" class="btn btn-xs green complement"><i class="fa fa-calculator"></i> Compélment de paiement</a>
                                                    </td>
                                                </tr>
                                            <?php endforeach;
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
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
            <script src="../js/core/jquery-ui.min.js" type="text/javascript"></script>
            <script src="../js/core/bootstrap.min.js" type="text/javascript"></script>
            <script src="../js/core/js.cookie.min.js" type="text/javascript"></script>
            <script src="../js/core/jquery.slimscroll.min.js" type="text/javascript"></script>
            <script src="../js/core/jquery.blockui.min.js" type="text/javascript"></script>
            <script src="../js/core/bootstrap-switch.min.js" type="text/javascript"></script>
            <!-- END CORE PLUGINS -->


            <!-- ***************************************************************************** -->
            <!---------------------------- JS DES PLUGINS A RECUPERER --------------------------->
            <!-- ***************************************************************************** -->
            <script src="../js/plugins/datatables.min.js" type="text/javascript"></script>
            <script src="../js/plugins/datatables.bootstrap.js" type="text/javascript"></script>
            <script src="../js/plugins/toastr.min.js" type="text/javascript"></script>
            <script src="../js/plugins/jquery.inputmask.bundle.min.js" type="text/javascript"></script>
            <!------------------------- FIN DES JS DES PLUGINS A RECUPERER ------------------------>


            <script src="../js/global/app.min.js" type="text/javascript"></script>
            <script src="../js/global/layout.min.js" type="text/javascript"></script>
            <script src="../js/main.js" type="text/javascript"></script>


            <!-- ***************************************************************************** -->
            <!---------------------------- JS SPECIFIQUES A RECUPERER --------------------------->
            <!-- ***************************************************************************** -->
            <script src="../js/comptable/comptable_complement_paiement.js" type="text/javascript"></script>
            <!----------------------- FIN DES JS SPECIFIQUES A RECUPERER ----------------------->


        </div>
    </body>
</html>