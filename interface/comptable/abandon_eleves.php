<!DOCTYPE html>
<!--[if IE 8]> <html lang="fr" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="fr" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="fr">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8">
        <title>Comptable | Liste des abandonnés</title>
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
                        <small class="font-green">Liste des abandonnés</small>
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
                                <a class="font-green" href="abandon_eleves.php">Liste des abandonnés</a>
                            </li>
                        </ul>
                    </div>
                    <!-- END PAGE HEADER-->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light portlet-fit ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-list font-green"></i>
                                        <span class="caption-subject font-green sbold uppercase">Liste des abandonnés</span>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="table-toolbar">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div id="cont_multi_actions" class="display-none">
                                                    <div class="btn-group">
                                                        <button class="btn grey-mint multi_submit" data-form-action="print">Imprimer la/les certificat(s) de scolarité</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <table class="table table-striped table-hover table-bordered" id="table_abandon_eleve">
                                        <thead>
                                        <tr>
                                            <th>
                                                <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                    <input id="group_checkable" type="checkbox"><span></span>
                                                </label>
                                            </th>
                                            <th>Date d'abandon</th>
                                            <th>Matricule</th>
                                            <th>Elève</th>
                                            <th>Code parent</th>
                                            <th>Date inscription</th>
                                            <th>Certificat de scolarité</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $dataTable = [
                                                ['matricule' => 'mat_1',  'id' => 1,  'eleve' => 'Nom_A Prenom_A', 'code' => 'code_1',  'date_abandon' => '12/07/2017', 'date_abandon_sort' => '20170712', 'date_inscription' => '12/07/2017', 'date_inscription_sort' => '20170712'],
                                                ['matricule' => 'mat_2',  'id' => 2,  'eleve' => 'Nom_B Prenom_B', 'code' => 'code_2',  'date_abandon' => '28/07/2017', 'date_abandon_sort' => '20170728', 'date_inscription' => '28/07/2017', 'date_inscription_sort' => '20170728'],
                                                ['matricule' => 'mat_3',  'id' => 3,  'eleve' => 'Nom_C Prenom_C', 'code' => 'code_3',  'date_abandon' => '06/07/2017', 'date_abandon_sort' => '20170706', 'date_inscription' => '06/07/2017', 'date_inscription_sort' => '20170706'],
                                                ['matricule' => 'mat_4',  'id' => 4,  'eleve' => 'Nom_D Prenom_D', 'code' => 'code_4',  'date_abandon' => '30/07/2017', 'date_abandon_sort' => '20170730', 'date_inscription' => '30/07/2017', 'date_inscription_sort' => '20170730'],
                                                ['matricule' => 'mat_5',  'id' => 5,  'eleve' => 'Nom_E Prenom_E', 'code' => 'code_5',  'date_abandon' => '18/07/2017', 'date_abandon_sort' => '20170718', 'date_inscription' => '18/07/2017', 'date_inscription_sort' => '20170718'],
                                                ['matricule' => 'mat_6',  'id' => 6,  'eleve' => 'Nom_F Prenom_F', 'code' => 'code_6',  'date_abandon' => '12/07/2017', 'date_abandon_sort' => '20170712', 'date_inscription' => '12/07/2017', 'date_inscription_sort' => '20170712'],
                                                ['matricule' => 'mat_7',  'id' => 7,  'eleve' => 'Nom_G Prenom_G', 'code' => 'code_7',  'date_abandon' => '17/07/2016', 'date_abandon_sort' => '20160717', 'date_inscription' => '17/07/2016', 'date_inscription_sort' => '20160717'],
                                                ['matricule' => 'mat_8',  'id' => 8,  'eleve' => 'Nom_H Prenom_H', 'code' => 'code_8',  'date_abandon' => '14/07/2016', 'date_abandon_sort' => '20160714', 'date_inscription' => '14/07/2016', 'date_inscription_sort' => '20160714'],
                                                ['matricule' => 'mat_9',  'id' => 9,  'eleve' => 'Nom_I Prenom_I', 'code' => 'code_9',  'date_abandon' => '12/07/2016', 'date_abandon_sort' => '20160712', 'date_inscription' => '12/07/2016', 'date_inscription_sort' => '20160712'],
                                                ['matricule' => 'mat_10', 'id' => 10, 'eleve' => 'Nom_J Prenom_J', 'code' => 'code_10', 'date_abandon' => '20/07/2016', 'date_abandon_sort' => '20160720', 'date_inscription' => '20/07/2016', 'date_inscription_sort' => '20160720'],
                                                ['matricule' => 'mat_11', 'id' => 11, 'eleve' => 'Nom_K Prenom_K', 'code' => 'code_11', 'date_abandon' => '22/07/2017', 'date_abandon_sort' => '20170722', 'date_inscription' => '22/07/2017', 'date_inscription_sort' => '20170722']
                                            ];
                                            foreach($dataTable as $row): ?>
                                                <tr>
                                                    <td>
                                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                            <input name="id" type="checkbox" class="checkboxes" value="<?php echo $row['id']; ?>"><span></span>
                                                        </label>
                                                    </td>
                                                    <td><span class="display-none"><?php echo $row['date_abandon_sort']; ?></span><?php echo $row['date_abandon']; ?></td>
                                                    <td><?php echo $row['matricule']; ?></td>
                                                    <td><?php echo $row['eleve']; ?></td>
                                                    <td><?php echo $row['code']; ?></td>
                                                    <td><span class="display-none"><?php echo $row['date_inscription_sort']; ?></span><?php echo $row['date_inscription']; ?></td>
                                                    <td>
                                                        <a href="undefined" class="btn btn-xs grey-mint"><i class="icon-printer"></i> Imprimer le certificat de scolarité</a>
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
            <script src="../js/comptable/comptable_abandon_eleves.js" type="text/javascript"></script>
            <!----------------------- FIN DES JS SPECIFIQUES A RECUPERER ----------------------->


        </div>
    </body>
</html>