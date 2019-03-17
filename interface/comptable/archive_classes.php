<!DOCTYPE html>
<!--[if IE 8]> <html lang="fr" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="fr" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="fr">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8">
        <title>Comptable | Archives</title>
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
                    <h2 class="page-title font-green">Comptable
                        <small class="font-green">Archives par classe</small>
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
                                <a class="font-green" href="archive_classes.php">Archives par classe</a>
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
                                        <i class="fa fa-archive font-green"></i>
                                        <span class="caption-subject font-green sbold uppercase">Archives par classe</span>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="table-toolbar">
                                        <div class="row margin-bottom-20">
                                            <div class="col-xs-12">
                                                <label for="filter" class="margin-right-10">Année scolaire :
                                                    <select class="form-control input-inline" name="filter" id="filter_anscol">
                                                        <option data-id="" value="">Toutes</option>
                                                        <option data-id="2016/2017" value="2016/2017">2016/2017</option>
                                                        <option data-id="2015/2016" value="2015/2016">2015/2016</option>
                                                    </select>
                                                </label>
                                                <label class="margin_r20" for="filter2">Classe :
                                                    <select class="form-control input-inline" name="filter2" id="filter_classe">
                                                        <option value="" selected="selected">Toutes</option>
                                                        <option data-id="1" value="Classe 1">Classe 1</option>
                                                        <option data-id="2" value="Classe 2">Classe 2</option>
                                                        <option data-id="3" value="Classe 3">Classe 3</option>
                                                        <option data-id="4" value="Classe 4">Classe 4</option>
                                                        <option data-id="5" value="Classe 5">Classe 5</option>
                                                        <option data-id="6" value="Classe 6">Classe 6</option>
                                                        <option data-id="7" value="Classe 7">Classe 7</option>
                                                        <option data-id="8" value="Classe 8">Classe 8</option>
                                                        <option data-id="9" value="Classe 9">Classe 9</option>
                                                    </select>
                                                </label>
                                                <label class="bold">Imprimer <i class="icon-info tooltips font-blue" data-original-title="Sélectionnez au moins le filtre 'Classe' pour activer les boutons"></i> :</label>
                                                <button disabled data-html="true" data-action="bulletin" data-original-title="Sélectionnez au moins le filtre 'Classe' pour activer le bouton" class="tooltips btn grey-mint printer_actions">Bulletin général</button>
                                                <button disabled data-html="true" data-action="recu" data-original-title="Sélectionnez au moins le filtre 'Classe' pour activer le bouton" class="tooltips btn grey-mint printer_actions">Reçu global</button>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div id="cont_multi_actions" class="display-none">
                                                    <div class="btn-group">
                                                        <button class="btn grey-mint multi_submit margin-right-10" data-form-action="print_certificat">Imprimer le/les certificat(s) de scolarité</button>
                                                        <button class="btn grey-mint multi_submit margin-right-10" data-form-action="print_bulletin">Imprimer le/les bulletin(s) général(généraux)</button>
                                                        <button class="btn grey-mint multi_submit" data-form-action="print_recu">Imprimer le/les reçu(s) global(globaux)</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <table class="table table-striped table-hover table-bordered" id="table_archive_classe">
                                        <thead>
                                        <tr>
                                            <th>
                                                <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                    <input id="group_checkable" type="checkbox"><span></span>
                                                </label>
                                            </th>
                                            <th>Année scolaire</th>
                                            <th>Classe</th>
                                            <th>Matricule</th>
                                            <th>Elève</th>
                                            <th>Impression</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $dataTable = [
                                                ['anscol' => '2016/2017', 'matricule' => 'mat_1',  'id' => 1,  'classe' => 'Classe 1', 'eleve' => 'Nom_A Prenom_A'],
                                                ['anscol' => '2016/2017', 'matricule' => 'mat_2',  'id' => 2,  'classe' => 'Classe 1', 'eleve' => 'Nom_B Prenom_B'],
                                                ['anscol' => '2016/2017', 'matricule' => 'mat_3',  'id' => 3,  'classe' => 'Classe 1', 'eleve' => 'Nom_C Prenom_C'],
                                                ['anscol' => '2016/2017', 'matricule' => 'mat_4',  'id' => 4,  'classe' => 'Classe 1', 'eleve' => 'Nom_D Prenom_D'],
                                                ['anscol' => '2016/2017', 'matricule' => 'mat_5',  'id' => 5,  'classe' => 'Classe 1', 'eleve' => 'Nom_E Prenom_E'],
                                                ['anscol' => '2016/2017', 'matricule' => 'mat_6',  'id' => 6,  'classe' => 'Classe 1', 'eleve' => 'Nom_F Prenom_F'],
                                                ['anscol' => '2016/2017', 'matricule' => 'mat_7',  'id' => 7,  'classe' => 'Classe 2', 'eleve' => 'Nom_G Prenom_G'],
                                                ['anscol' => '2016/2017', 'matricule' => 'mat_8',  'id' => 8,  'classe' => 'Classe 2', 'eleve' => 'Nom_H Prenom_H'],
                                                ['anscol' => '2016/2017', 'matricule' => 'mat_9',  'id' => 9,  'classe' => 'Classe 2', 'eleve' => 'Nom_I Prenom_I'],
                                                ['anscol' => '2016/2017', 'matricule' => 'mat_10', 'id' => 10, 'classe' => 'Classe 2', 'eleve' => 'Nom_J Prenom_J'],
                                                ['anscol' => '2016/2017', 'matricule' => 'mat_11', 'id' => 11, 'classe' => 'Classe 2', 'eleve' => 'Nom_K Prenom_K'],
                                                ['anscol' => '2016/2017', 'matricule' => 'mat_12', 'id' => 12, 'classe' => 'Classe 3', 'eleve' => 'Nom_L Prenom_L'],
                                                ['anscol' => '2016/2017', 'matricule' => 'mat_13', 'id' => 13, 'classe' => 'Classe 3', 'eleve' => 'Nom_M Prenom_M'],
                                                ['anscol' => '2016/2017', 'matricule' => 'mat_14', 'id' => 14, 'classe' => 'Classe 3', 'eleve' => 'Nom_N Prenom_N'],
                                                ['anscol' => '2016/2017', 'matricule' => 'mat_15', 'id' => 15, 'classe' => 'Classe 4', 'eleve' => 'Nom_O Prenom_O'],
                                                ['anscol' => '2016/2017', 'matricule' => 'mat_16', 'id' => 16, 'classe' => 'Classe 4', 'eleve' => 'Nom_P Prenom_P'],
                                                ['anscol' => '2016/2017', 'matricule' => 'mat_17', 'id' => 17, 'classe' => 'Classe 4', 'eleve' => 'Nom_Q Prenom_Q'],
                                                ['anscol' => '2016/2017', 'matricule' => 'mat_18', 'id' => 18, 'classe' => 'Classe 5', 'eleve' => 'Nom_R Prenom_R'],
                                                ['anscol' => '2016/2017', 'matricule' => 'mat_19', 'id' => 19, 'classe' => 'Classe 5', 'eleve' => 'Nom_S Prenom_S'],
                                                ['anscol' => '2015/2016', 'matricule' => 'mat_20', 'id' => 20, 'classe' => 'Classe 5', 'eleve' => 'Nom_T Prenom_T'],
                                                ['anscol' => '2015/2016', 'matricule' => 'mat_21', 'id' => 21, 'classe' => 'Classe 5', 'eleve' => 'Nom_U Prenom_U'],
                                                ['anscol' => '2015/2016', 'matricule' => 'mat_22', 'id' => 22, 'classe' => 'Classe 5', 'eleve' => 'Nom_V Prenom_V'],
                                                ['anscol' => '2015/2016', 'matricule' => 'mat_23', 'id' => 23, 'classe' => 'Classe 5', 'eleve' => 'Nom_W Prenom_W'],
                                                ['anscol' => '2015/2016', 'matricule' => 'mat_24', 'id' => 24, 'classe' => 'Classe 6', 'eleve' => 'Nom_X Prenom_X'],
                                                ['anscol' => '2015/2016', 'matricule' => 'mat_25', 'id' => 25, 'classe' => 'Classe 6', 'eleve' => 'Nom_Y Prenom_Y'],
                                                ['anscol' => '2015/2016', 'matricule' => 'mat_26', 'id' => 26, 'classe' => 'Classe 6', 'eleve' => 'Nom_Z Prenom_Z'],
                                                ['anscol' => '2015/2016', 'matricule' => 'mat_27', 'id' => 27, 'classe' => 'Classe 6', 'eleve' => 'Nom_AA Prenom_AA'],
                                                ['anscol' => '2015/2016', 'matricule' => 'mat_28', 'id' => 28, 'classe' => 'Classe 6', 'eleve' => 'Nom_BB Prenom_BB'],
                                                ['anscol' => '2015/2016', 'matricule' => 'mat_29', 'id' => 29, 'classe' => 'Classe 7', 'eleve' => 'Nom_CC Prenom_CC'],
                                                ['anscol' => '2015/2016', 'matricule' => 'mat_30', 'id' => 30, 'classe' => 'Classe 7', 'eleve' => 'Nom_DD Prenom_DD'],
                                                ['anscol' => '2015/2016', 'matricule' => 'mat_31', 'id' => 31, 'classe' => 'Classe 7', 'eleve' => 'Nom_EE Prenom_EE'],
                                                ['anscol' => '2015/2016', 'matricule' => 'mat_32', 'id' => 32, 'classe' => 'Classe 8', 'eleve' => 'Nom_FF Prenom_FF'],
                                                ['anscol' => '2015/2016', 'matricule' => 'mat_33', 'id' => 33, 'classe' => 'Classe 8', 'eleve' => 'Nom_GG Prenom_GG'],
                                                ['anscol' => '2015/2016', 'matricule' => 'mat_34', 'id' => 34, 'classe' => 'Classe 8', 'eleve' => 'Nom_HH Prenom_HH']
                                            ];
                                            foreach($dataTable as $row): ?>
                                                <tr>
                                                    <td>
                                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                            <input name="id" type="checkbox" class="checkboxes" value="<?php echo $row['id']; ?>"><span></span>
                                                        </label>
                                                    </td>
                                                    <td><?php echo $row['anscol']; ?></td>
                                                    <td><?php echo $row['classe']; ?></td>
                                                    <td><?php echo $row['matricule']; ?></td>
                                                    <td><?php echo $row['eleve']; ?></td>
                                                    <td>
                                                        <a href="undefined" class="btn btn-xs grey-mint"> <i class="fa fa-print"></i> Certificat de scolarité</a>
                                                        <a href="undefined" class="btn btn-xs grey-mint"> <i class="fa fa-print"></i> Bulletin général</a>
                                                        <a href="undefined" class="btn btn-xs grey-mint"> <i class="fa fa-print"></i> Reçu global</a>
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
            <!------------------------- FIN DES JS DES PLUGINS A RECUPERER ------------------------>


            <script src="../js/global/app.min.js" type="text/javascript"></script>
            <script src="../js/global/layout.min.js" type="text/javascript"></script>
            <script src="../js/main.js" type="text/javascript"></script>


            <!-- ***************************************************************************** -->
            <!---------------------------- JS SPECIFIQUES A RECUPERER --------------------------->
            <!-- ***************************************************************************** -->
            <script src="../js/comptable/comptable_archive_classes.js" type="text/javascript"></script>
            <!----------------------- FIN DES JS SPECIFIQUES A RECUPERER ----------------------->


        </div>
    </body>
</html>