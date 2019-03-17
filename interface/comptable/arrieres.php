<!DOCTYPE html>
<!--[if IE 8]> <html lang="fr" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="fr" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="fr">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8">
        <title>Comptable | Liste des arriérés payés</title>
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
                        <small class="font-green">Liste des arriérés payés</small>
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
                                <a class="font-green" href="arrieres.php">Liste des arriérés payés</a>
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
                                        <span class="caption-subject font-green sbold uppercase">Liste des arriérés payés</span>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="table-toolbar">
                                        <div class="row">
                                            <div class="col-md-6 margin-bottom-20">
                                                <div class="btn-group">
                                                    <a href="paiement_arriere.php" class="btn green">Encaisser un paiement arriéré <i class="fa fa-money"></i></a>
                                                </div>
                                            </div>
                                            <div class="col-xs-12">
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
                                    <table class="table table-striped table-hover table-bordered" id="table_arriere">
                                        <thead>
                                        <tr>
                                            <th>Date d'encaissement</th>
                                            <th>Montant</th>
                                            <th>Mois</th>
                                            <th>Nom</th>
                                            <th>Prénom</th>
                                            <th>Année d'arriéré</th>
                                            <th>Classe précédente</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $dataTable = [
                                                ['date' => '12/05/2017', 'date_sort' => '20170512', 'montant' => '1530', 'annee' => '2012/2013', 'classe' => 'Classe 1', 'nom' => 'Nom_A', 'prenom' => 'Prenom_A', 'mois' => 'Octobre'],
                                                ['date' => '28/03/2017', 'date_sort' => '20170328', 'montant' => '1530', 'annee' => '2012/2013', 'classe' => 'Classe 1', 'nom' => 'Nom_B', 'prenom' => 'Prenom_B', 'mois' => 'Octobre'],
                                                ['date' => '06/02/2017', 'date_sort' => '20170206', 'montant' => '1530', 'annee' => '2012/2013', 'classe' => 'Classe 1', 'nom' => 'Nom_C', 'prenom' => 'Prenom_C', 'mois' => 'Janvier'],
                                                ['date' => '30/01/2017', 'date_sort' => '20170130', 'montant' => '1530', 'annee' => '2012/2013', 'classe' => 'Classe 1', 'nom' => 'Nom_D', 'prenom' => 'Prenom_D', 'mois' => 'Avril'],
                                                ['date' => '18/05/2017', 'date_sort' => '20170518', 'montant' => '1530', 'annee' => '2012/2013', 'classe' => 'Classe 1', 'nom' => 'Nom_E', 'prenom' => 'Prenom_E', 'mois' => 'Avril'],
                                                ['date' => '12/06/2017', 'date_sort' => '20170612', 'montant' => '1530', 'annee' => '2012/2013', 'classe' => 'Classe 1', 'nom' => 'Nom_F', 'prenom' => 'Prenom_F', 'mois' => 'Fevrier'],
                                                ['date' => '17/09/2016', 'date_sort' => '20160917', 'montant' => '1530', 'annee' => '2015/2016', 'classe' => 'Classe 2', 'nom' => 'Nom_G', 'prenom' => 'Prenom_G', 'mois' => 'Fevrier'],
                                                ['date' => '14/10/2016', 'date_sort' => '20161014', 'montant' => '1530', 'annee' => '2015/2016', 'classe' => 'Classe 2', 'nom' => 'Nom_H', 'prenom' => 'Prenom_H', 'mois' => 'Mars'],
                                                ['date' => '12/11/2016', 'date_sort' => '20161112', 'montant' => '1530', 'annee' => '2015/2016', 'classe' => 'Classe 2', 'nom' => 'Nom_I', 'prenom' => 'Prenom_I', 'mois' => 'Mars'],
                                                ['date' => '20/10/2016', 'date_sort' => '20161020', 'montant' => '1530', 'annee' => '2015/2016', 'classe' => 'Classe 2', 'nom' => 'Nom_J', 'prenom' => 'Prenom_J', 'mois' => 'Mai'],
                                                ['date' => '22/05/2017', 'date_sort' => '20170522', 'montant' => '1531', 'annee' => '2013/2014', 'classe' => 'Classe 2', 'nom' => 'Nom_K', 'prenom' => 'Prenom_K', 'mois' => 'Mai'],
                                                ['date' => '05/05/2017', 'date_sort' => '20170505', 'montant' => '1532', 'annee' => '2013/2014', 'classe' => 'Classe 3', 'nom' => 'Nom_L', 'prenom' => 'Prenom_L', 'mois' => 'Juin'],
                                                ['date' => '30/05/2017', 'date_sort' => '20170530', 'montant' => '1533', 'annee' => '2013/2014', 'classe' => 'Classe 3', 'nom' => 'Nom_M', 'prenom' => 'Prenom_M', 'mois' => 'Juin'],
                                                ['date' => '20/10/2016', 'date_sort' => '20161020', 'montant' => '1534', 'annee' => '2014/2015', 'classe' => 'Classe 3', 'nom' => 'Nom_N', 'prenom' => 'Prenom_N', 'mois' => 'Novembre'],
                                                ['date' => '22/05/2017', 'date_sort' => '20170522', 'montant' => '1535', 'annee' => '2014/2015', 'classe' => 'Classe 4', 'nom' => 'Nom_O', 'prenom' => 'Prenom_O', 'mois' => 'Novembre'],
                                                ['date' => '05/05/2017', 'date_sort' => '20170505', 'montant' => '1536', 'annee' => '2014/2015', 'classe' => 'Classe 4', 'nom' => 'Nom_P', 'prenom' => 'Prenom_P', 'mois' => 'Décembre'],
                                                ['date' => '30/05/2017', 'date_sort' => '20170530', 'montant' => '1537', 'annee' => '2014/2015', 'classe' => 'Classe 4', 'nom' => 'Nom_Q', 'prenom' => 'Prenom_Q', 'mois' => 'Décembre']
                                            ];
                                            foreach($dataTable as $row): ?>
                                                <tr>
                                                    <td><span class="display-none"><?php echo $row['date_sort']; ?></span><?php echo $row['date']; ?></td>
                                                    <td><?php echo $row['montant']; ?></td>
                                                    <td><?php echo $row['mois']; ?></td>
                                                    <td><?php echo $row['nom']; ?></td>
                                                    <td><?php echo $row['prenom']; ?></td>
                                                    <td><?php echo $row['annee']; ?></td>
                                                    <td><?php echo $row['classe']; ?></td>
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
            <script src="../js/comptable/comptable_arrieres.js" type="text/javascript"></script>
            <!----------------------- FIN DES JS SPECIFIQUES A RECUPERER ----------------------->


        </div>
    </body>
</html>