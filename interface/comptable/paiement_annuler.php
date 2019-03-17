<!DOCTYPE html>
<!--[if IE 8]> <html lang="fr" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="fr" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="fr">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8">
        <title>Comptable | Paiement annulé</title>
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
                        <small class="font-green">Liste des paiements annulés</small>
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
                                <a class="font-green" href="paiement_annuler.php">Liste des paiements annulés</a>
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
                                        <span class="caption-subject font-green sbold uppercase">Liste des paiements annulés</span>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <table class="table table-striped table-hover table-bordered" id="table_paiement_annuler">
                                        <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Numéro du reçu</th>
                                            <th>Montant</th>
                                            <th>Mois de paiement</th>
                                            <th>Motif d'annulation</th>
                                            <th>Utilisateur</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $dataTable = [
                                                ['date' => '12/05/2017 à 15:30:00', 'date_sort' => '20170512153000', 'montant' => '1530', 'id' => '1',  'user' => 'User 1', 'motif' => 'Motif annulation', 'mois' => 'Octobre'],
                                                ['date' => '28/03/2017 à 15:30:00', 'date_sort' => '20170328153000', 'montant' => '1530', 'id' => '2',  'user' => 'User 1', 'motif' => 'Motif annulation', 'mois' => 'Octobre'],
                                                ['date' => '06/02/2017 à 15:30:00', 'date_sort' => '20170206153000', 'montant' => '1530', 'id' => '3',  'user' => 'User 1', 'motif' => 'Motif annulation', 'mois' => 'Janvier'],
                                                ['date' => '30/01/2017 à 15:30:00', 'date_sort' => '20170130153000', 'montant' => '1530', 'id' => '4',  'user' => 'User 1', 'motif' => 'Motif annulation', 'mois' => 'Avril'],
                                                ['date' => '18/05/2017 à 12:00:00', 'date_sort' => '20170518120000', 'montant' => '1530', 'id' => '5',  'user' => 'User 1', 'motif' => 'Motif annulation', 'mois' => 'Avril'],
                                                ['date' => '12/06/2017 à 08:00:00', 'date_sort' => '20170612080000', 'montant' => '1530', 'id' => '6',  'user' => 'User 1', 'motif' => 'Motif annulation', 'mois' => 'Fevrier'],
                                                ['date' => '17/09/2016 à 08:00:00', 'date_sort' => '20160917080000', 'montant' => '1530', 'id' => '7',  'user' => 'User 1', 'motif' => 'Motif annulation', 'mois' => 'Fevrier'],
                                                ['date' => '14/10/2016 à 08:00:00', 'date_sort' => '20161014080000', 'montant' => '1530', 'id' => '8',  'user' => 'User 1', 'motif' => 'Motif annulation', 'mois' => 'Mars'],
                                                ['date' => '12/11/2016 à 12:00:00', 'date_sort' => '20161112120000', 'montant' => '1530', 'id' => '9',  'user' => 'User 1', 'motif' => 'Motif annulation', 'mois' => 'Mars'],
                                                ['date' => '20/10/2016 à 12:00:00', 'date_sort' => '20161020120000', 'montant' => '1530', 'id' => '10', 'user' => 'User 1', 'motif' => 'Motif annulation', 'mois' => 'Mai'],
                                                ['date' => '22/05/2017 à 12:00:00', 'date_sort' => '20170522120000', 'montant' => '1531', 'id' => '11', 'user' => 'User 1', 'motif' => 'Motif annulation', 'mois' => 'Mai'],
                                                ['date' => '05/05/2017 à 17:00:00', 'date_sort' => '20170505170000', 'montant' => '1532', 'id' => '12', 'user' => 'User 1', 'motif' => 'Motif annulation', 'mois' => 'Juin'],
                                                ['date' => '30/05/2017 à 17:00:00', 'date_sort' => '20170530170000', 'montant' => '1533', 'id' => '13', 'user' => 'User 1', 'motif' => 'Motif annulation', 'mois' => 'Juin'],
                                                ['date' => '20/10/2016 à 17:00:00', 'date_sort' => '20161020170000', 'montant' => '1534', 'id' => '14', 'user' => 'User 1', 'motif' => 'Motif annulation', 'mois' => 'Novembre'],
                                                ['date' => '22/05/2017 à 17:00:00', 'date_sort' => '20170522170000', 'montant' => '1535', 'id' => '15', 'user' => 'User 1', 'motif' => 'Motif annulation', 'mois' => 'Novembre'],
                                                ['date' => '05/05/2017 à 12:00:00', 'date_sort' => '20170505120000', 'montant' => '1536', 'id' => '16', 'user' => 'User 1', 'motif' => 'Motif annulation', 'mois' => 'Décembre'],
                                                ['date' => '30/05/2017 à 12:00:00', 'date_sort' => '20170530120000', 'montant' => '1537', 'id' => '17', 'user' => 'User 1', 'motif' => 'Motif annulation', 'mois' => 'Décembre']
                                            ];
                                            foreach($dataTable as $row): ?>
                                                <tr>
                                                    <td><span class="display-none"><?php echo $row['date_sort']; ?></span><?php echo $row['date']; ?></td>
                                                    <td><?php echo $row['id']; ?></td>
                                                    <td><?php echo $row['montant']; ?></td>
                                                    <td><?php echo $row['mois']; ?></td>
                                                    <td><?php echo $row['motif']; ?></td>
                                                    <td><?php echo $row['user']; ?></td>
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
            <!------------------------- FIN DES JS DES PLUGINS A RECUPERER ------------------------>


            <script src="../js/global/app.min.js" type="text/javascript"></script>
            <script src="../js/global/layout.min.js" type="text/javascript"></script>
            <script src="../js/main.js" type="text/javascript"></script>


            <!-- ***************************************************************************** -->
            <!---------------------------- JS SPECIFIQUES A RECUPERER --------------------------->
            <!-- ***************************************************************************** -->
            <script src="../js/comptable/comptable_paiement_annuler.js" type="text/javascript"></script>
            <!----------------------- FIN DES JS SPECIFIQUES A RECUPERER ----------------------->


        </div>
    </body>
</html>