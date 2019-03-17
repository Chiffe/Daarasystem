<!DOCTYPE html>
<!--[if IE 8]> <html lang="fr" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="fr" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="fr">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8">
        <title>Comptable | Gestion des factures/reçus</title>
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
                        <small class="font-green">Gestion facture/reçu</small>
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
                                <a class="font-green" href="factures.php">Gestion des factures/reçus</a>
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
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light portlet-fit ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-list font-green"></i>
                                        <span class="caption-subject font-green sbold uppercase">Liste des factures/reçus</span>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="table-toolbar">
                                        <div class="row margin-bottom-20">
                                            <div class="col-xs-12">
                                                <label for="filter" class="margin-right-10">Cycles :
                                                    <select class="form-control input-inline" name="filter" id="filter_cycle">
                                                        <option data-id="" value="">Tous</option>
                                                        <option data-id="1" value="Cycle 1">Cycle 1</option>
                                                        <option data-id="2" value="Cycle 2">Cycle 2</option>
                                                        <option data-id="3" value="Cycle 3">Cycle 3</option>
                                                    </select>
                                                </label>
                                                <label class="margin-right-10" for="filter2">Classe :
                                                    <select class="form-control input-inline" name="filter2" id="filter_classe"></select>
                                                </label>
                                                <label class="margin_r20" for="filter3">Mois :
                                                    <select class="form-control input-inline" name="filter3" id="filter_mois">
                                                        <option data-id=""  value="" selected="selected">Tous</option>
                                                        <option data-id="1" value="Octobre">Octobre</option>
                                                        <option data-id="2" value="Novembre">Novembre</option>
                                                        <option data-id="3" value="Décembre">Décembre</option>
                                                        <option data-id="4" value="Janvier">Janvier</option>
                                                        <option data-id="5" value="Fevrier">Fevrier</option>
                                                        <option data-id="6" value="Mars">Mars</option>
                                                        <option data-id="7" value="Avril">Avril</option>
                                                        <option data-id="8" value="Mai">Mai</option>
                                                        <option data-id="9" value="Juin">Juin</option>
                                                    </select>
                                                </label>
                                                <label class="bold">Imprimer <i class="icon-info tooltips font-blue" data-original-title="Sélectionnez au moins un filtre pour activer les boutons"></i> :</label>
                                                <button disabled data-html="true" data-action="facture" data-original-title="Sélectionnez au moins un filtre pour activer le bouton" class="tooltips btn grey-mint printer_actions">Les factures</button>
                                                <button disabled data-html="true" data-action="recu" data-original-title="Sélectionnez au moins un filtre pour activer le bouton" class="tooltips btn grey-mint printer_actions">Les reçus</button>
                                                <button disabled data-html="true" data-action="impaye" data-original-title="Sélectionnez au moins un filtre pour activer le bouton" class="tooltips btn grey-mint printer_actions">La liste des impayés</button>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div id="cont_multi_actions" class="display-none">
                                                    <div class="btn-group">
                                                        <button class="btn grey-mint multi_submit" data-form-action="print">Imprimer la/les facture(s)/recu(s) cochée(s)</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <table class="table table-striped table-hover table-bordered" id="table_facture">
                                        <thead>
                                        <tr>
                                            <th>
                                                <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                    <input id="group_checkable" type="checkbox"><span></span>
                                                </label>
                                            </th>
                                            <th>Cycle</th>
                                            <th>Classe</th>
                                            <th>Matricule</th>
                                            <th>Elève</th>
                                            <th>Mois de la facture</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $dataTable = [
                                                ['cycle' => 'Cycle 1', 'matricule' => 'mat_1',  'id_recu' => 1,  'classe' => 'Classe 1', 'eleve' => 'Nom_A Prenom_A', 'mois' => 'Octobre'],
                                                ['cycle' => 'Cycle 1', 'matricule' => 'mat_2',  'id_recu' => 2,  'classe' => 'Classe 1', 'eleve' => 'Nom_B Prenom_B', 'mois' => 'Octobre'],
                                                ['cycle' => 'Cycle 1', 'matricule' => 'mat_3',  'id_recu' => 3,  'classe' => 'Classe 1', 'eleve' => 'Nom_C Prenom_C', 'mois' => 'Janvier'],
                                                ['cycle' => 'Cycle 1', 'matricule' => 'mat_4',  'id_recu' => 4,  'classe' => 'Classe 1', 'eleve' => 'Nom_D Prenom_D', 'mois' => 'Avril'],
                                                ['cycle' => 'Cycle 1', 'matricule' => 'mat_5',  'id_recu' => 5,  'classe' => 'Classe 1', 'eleve' => 'Nom_E Prenom_E', 'mois' => 'Avril'],
                                                ['cycle' => 'Cycle 1', 'matricule' => 'mat_6',  'id_recu' => 6,  'classe' => 'Classe 1', 'eleve' => 'Nom_F Prenom_F', 'mois' => 'Fevrier'],
                                                ['cycle' => 'Cycle 2', 'matricule' => 'mat_7',  'id_recu' => 7,  'classe' => 'Classe 2', 'eleve' => 'Nom_G Prenom_G', 'mois' => 'Fevrier'],
                                                ['cycle' => 'Cycle 2', 'matricule' => 'mat_8',  'id_recu' => 8,  'classe' => 'Classe 2', 'eleve' => 'Nom_H Prenom_H', 'mois' => 'Mars'],
                                                ['cycle' => 'Cycle 2', 'matricule' => 'mat_9',  'id_recu' => 9,  'classe' => 'Classe 2', 'eleve' => 'Nom_I Prenom_I', 'mois' => 'Mars'],
                                                ['cycle' => 'Cycle 2', 'matricule' => 'mat_10', 'id_recu' => 10, 'classe' => 'Classe 2', 'eleve' => 'Nom_J Prenom_J', 'mois' => 'Mai'],
                                                ['cycle' => 'Cycle 2', 'matricule' => 'mat_11', 'id_recu' => 11, 'classe' => 'Classe 2', 'eleve' => 'Nom_K Prenom_K', 'mois' => 'Mai'],
                                                ['cycle' => 'Cycle 2', 'matricule' => 'mat_12', 'id_recu' => 12, 'classe' => 'Classe 3', 'eleve' => 'Nom_L Prenom_L', 'mois' => 'Juin'],
                                                ['cycle' => 'Cycle 3', 'matricule' => 'mat_13', 'id_recu' => 13, 'classe' => 'Classe 3', 'eleve' => 'Nom_M Prenom_M', 'mois' => 'Juin'],
                                                ['cycle' => 'Cycle 3', 'matricule' => 'mat_14', 'id_recu' => 14, 'classe' => 'Classe 3', 'eleve' => 'Nom_N Prenom_N', 'mois' => 'Novembre'],
                                                ['cycle' => 'Cycle 3', 'matricule' => 'mat_15', 'id_recu' => 15, 'classe' => 'Classe 4', 'eleve' => 'Nom_O Prenom_O', 'mois' => 'Novembre'],
                                                ['cycle' => 'Cycle 3', 'matricule' => 'mat_16', 'id_recu' => 16, 'classe' => 'Classe 4', 'eleve' => 'Nom_P Prenom_P', 'mois' => 'Décembre'],
                                                ['cycle' => 'Cycle 3', 'matricule' => 'mat_17', 'id_recu' => 17, 'classe' => 'Classe 4', 'eleve' => 'Nom_Q Prenom_Q', 'mois' => 'Décembre']
                                            ];
                                            foreach($dataTable as $row): ?>
                                                <tr>
                                                    <td>
                                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                            <input name="id" type="checkbox" class="checkboxes" value="<?php echo $row['id_recu']; ?>"><span></span>
                                                        </label>
                                                    </td>
                                                    <td><?php echo $row['cycle']; ?></td>
                                                    <td><?php echo $row['classe']; ?></td>
                                                    <td><?php echo $row['matricule']; ?></td>
                                                    <td><?php echo $row['eleve']; ?></td>
                                                    <td><?php echo $row['mois']; ?></td>
                                                    <td>
                                                        <a href="javascript:;" data-id="<?php echo $row['id_recu']; ?>" class="btn btn-xs green view"><i class="icon-magnifier"></i> <?php echo in_array($row['id_recu'], [2,3,7,10,11,16,13,5]) ?'Voir la facture':'Voir le reçu'; ?></a>
                                                        <a href="undefined" class="btn btn-xs grey-mint"><i class="icon-printer"></i> <?php echo in_array($row['id_recu'], [2,3,7,10,11,16,13,5]) ?'Imprimer la facture':'Imprimer le reçu'; ?></a>
                                                        <a href="javascript:;" data-id="<?php echo $row['id_recu']; ?>" class="btn btn-xs red cancel"><i class="icon-close"></i> <?php echo in_array($row['id_recu'], [2,3,7,10,11,16,13,5]) ?'Annuler la facture':'Annuler le paiement'; ?></a>
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
            <script src="../js/plugins/bootstrap-confirmation.min.js" type="text/javascript"></script>
            <script src="../js/plugins/toastr.min.js" type="text/javascript"></script>
            <!------------------------- FIN DES JS DES PLUGINS A RECUPERER ------------------------>


            <script src="../js/global/app.min.js" type="text/javascript"></script>
            <script src="../js/global/layout.min.js" type="text/javascript"></script>
            <script src="../js/main.js" type="text/javascript"></script>


            <!-- ***************************************************************************** -->
            <!---------------------------- JS SPECIFIQUES A RECUPERER --------------------------->
            <!-- ***************************************************************************** -->
            <script src="../js/comptable/comptable_factures.js" type="text/javascript"></script>
            <!----------------------- FIN DES JS SPECIFIQUES A RECUPERER ----------------------->


        </div>
    </body>
</html>