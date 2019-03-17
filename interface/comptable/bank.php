<!DOCTYPE html>
<!--[if IE 8]> <html lang="fr" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="fr" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="fr">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8">
        <title>Comptable | Banque</title>
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
        <link href="../css/plugins/ladda-themeless.min.css" rel="stylesheet" type="text/css">
        <link href="../css/plugins/daterangepicker.min.css" rel="stylesheet" type="text/css">
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
                        <small class="font-green">Banque</small>
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
                                <a class="font-green" href="bank.php">Banque</a>
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
                            <div class="portlet light portlet-fit grey-steel">
                                <div class="portlet-title border-white">
                                    <div class="caption">
                                        <i class="icon-graph font-green"></i>
                                        <span class="caption-subject font-green sbold uppercase">Situation au <?php echo date('d/m/Y'); ?></span>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="row">
                                        <div class="col-sm-4 col-xs-12">
                                            <div class="widget-thumb widget-bg-color-white text-uppercase">
                                                <h4 class="widget-thumb-heading">scolarité encaissé</h4>
                                                <div class="widget-thumb-wrap">
                                                    <i class="widget-thumb-icon bg-green fa fa-line-chart"></i>
                                                    <div class="widget-thumb-body">
                                                        <span class="widget-thumb-subtitle">€</span>
                                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="63080600"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-xs-12">
                                            <div class="widget-thumb widget-bg-color-white text-uppercase">
                                                <h4 class="widget-thumb-heading">versement en banque</h4>
                                                <div class="widget-thumb-wrap">
                                                    <i class="widget-thumb-icon bg-yellow-gold fa fa-line-chart"></i>
                                                    <div class="widget-thumb-body">
                                                        <span class="widget-thumb-subtitle">€</span>
                                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="64282000"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-xs-12">
                                            <div class="widget-thumb widget-bg-color-white text-uppercase">
                                                <h4 class="widget-thumb-heading">ecart</h4>
                                                <div class="widget-thumb-wrap">
                                                    <i class="widget-thumb-icon bg-grey-mint fa fa-exchange"></i>
                                                    <div class="widget-thumb-body">
                                                        <span class="widget-thumb-subtitle">€</span>
                                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="-1201400"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light portlet-fit ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-list font-green"></i>
                                        <span class="caption-subject font-green sbold uppercase">Historique des versements</span>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="table-toolbar">
                                        <div class="row">
                                            <div class="col-xs-12 margin-bottom-20">
                                                <div class="btn-group">
                                                    <button id="add_depot" class="btn green"> Saisir un versement <i class="fa fa-plus"></i></button>
                                                </div>
                                            </div>
                                            <div class="col-xs-12">
                                                <label for="filter" class="margin-right-10">Cycles :
                                                    <select class="form-control input-inline" name="filter" id="filter_cycle">
                                                        <option data-id="" value="">Tous</option>
                                                        <option data-id="1" value="Cycle 1">Cycle 1</option>
                                                        <option data-id="2" value="Cycle 2">Cycle 2</option>
                                                        <option data-id="3" value="Cycle 3">Cycle 3</option>
                                                    </select>
                                                </label>
                                                <label for="filter_date">Période : </label>
                                                <div id="filter_date" data-start-date="0" data-end-date="0" class="btn green margin_r20">
                                                    <i class="fa fa-calendar"></i>&nbsp;<span>Pas de restriction</span>
                                                </div>
                                                <label class="bold">Imprimer <i class="icon-info tooltips font-blue" data-original-title="Sélectionnez au moins un filtre pour activer le bouton"></i> :</label>
                                                <button disabled data-html="true" data-original-title="Sélectionnez au moins un filtre pour activer le bouton" class="tooltips btn grey-mint printer_actions">Historique</button>
                                            </div>
                                        </div>
                                    </div>
                                    <table class="table table-striped table-hover table-bordered" id="table_bank">
                                        <thead>
                                        <tr>
                                            <th>Cycle</th>
                                            <th>Banque</th>
                                            <th class="display-none">date en format numérique</th>
                                            <th>Date de versement</th>
                                            <th>Numéro de reçu</th>
                                            <th>Montant</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $dataTable = [
                                                ['cycle' => 'Cycle 1', 'bank' => 'BICIS', 'id_recu' => 1,  'montant' => '1155689', 'date' => '12/07/2017', 'date_sort' => '20170712'],
                                                ['cycle' => 'Cycle 1', 'bank' => 'BICIS', 'id_recu' => 2,  'montant' => '1155689', 'date' => '28/07/2017', 'date_sort' => '20170728'],
                                                ['cycle' => 'Cycle 1', 'bank' => 'BICIS', 'id_recu' => 3,  'montant' => '1155689', 'date' => '06/07/2017', 'date_sort' => '20170706'],
                                                ['cycle' => 'Cycle 1', 'bank' => 'BICIS', 'id_recu' => 4,  'montant' => '1155689', 'date' => '30/07/2017', 'date_sort' => '20170730'],
                                                ['cycle' => 'Cycle 1', 'bank' => 'BICIS', 'id_recu' => 5,  'montant' => '1155689', 'date' => '18/07/2017', 'date_sort' => '20170718'],
                                                ['cycle' => 'Cycle 1', 'bank' => 'BICIS', 'id_recu' => 6,  'montant' => '1155689', 'date' => '12/07/2017', 'date_sort' => '20170712'],
                                                ['cycle' => 'Cycle 2', 'bank' => 'BICIS', 'id_recu' => 7,  'montant' => '1155689', 'date' => '17/07/2016', 'date_sort' => '20160717'],
                                                ['cycle' => 'Cycle 2', 'bank' => 'BICIS', 'id_recu' => 8,  'montant' => '1155689', 'date' => '14/07/2016', 'date_sort' => '20160714'],
                                                ['cycle' => 'Cycle 2', 'bank' => 'BICIS', 'id_recu' => 9,  'montant' => '1155689', 'date' => '12/07/2016', 'date_sort' => '20160712'],
                                                ['cycle' => 'Cycle 2', 'bank' => 'BICIS', 'id_recu' => 10, 'montant' => '1155689', 'date' => '20/07/2016', 'date_sort' => '20160720'],
                                                ['cycle' => 'Cycle 2', 'bank' => 'BICIS', 'id_recu' => 11, 'montant' => '1155689', 'date' => '22/07/2017', 'date_sort' => '20170722'],
                                                ['cycle' => 'Cycle 2', 'bank' => 'BICIS', 'id_recu' => 12, 'montant' => '1155689', 'date' => '05/07/2017', 'date_sort' => '20170705'],
                                                ['cycle' => 'Cycle 3', 'bank' => 'BICIS', 'id_recu' => 13, 'montant' => '1155689', 'date' => '30/07/2017', 'date_sort' => '20170730'],
                                                ['cycle' => 'Cycle 3', 'bank' => 'BICIS', 'id_recu' => 14, 'montant' => '1155689', 'date' => '20/07/2016', 'date_sort' => '20160720'],
                                                ['cycle' => 'Cycle 3', 'bank' => 'BICIS', 'id_recu' => 15, 'montant' => '1155689', 'date' => '22/07/2017', 'date_sort' => '20170722'],
                                                ['cycle' => 'Cycle 3', 'bank' => 'BICIS', 'id_recu' => 16, 'montant' => '1155689', 'date' => '05/07/2017', 'date_sort' => '20170705'],
                                                ['cycle' => 'Cycle 3', 'bank' => 'BICIS', 'id_recu' => 17, 'montant' => '1155689', 'date' => '30/07/2017', 'date_sort' => '20170730'],
                                                ['cycle' => 'Cycle 1', 'bank' => 'BICIS', 'id_recu' => 18, 'montant' => '1155689', 'date' => '12/07/2017', 'date_sort' => '20170712'],
                                                ['cycle' => 'Cycle 1', 'bank' => 'BICIS', 'id_recu' => 19, 'montant' => '1155689', 'date' => '28/03/2017', 'date_sort' => '20170328'],
                                                ['cycle' => 'Cycle 1', 'bank' => 'BICIS', 'id_recu' => 20, 'montant' => '1155689', 'date' => '06/02/2017', 'date_sort' => '20170206'],
                                                ['cycle' => 'Cycle 1', 'bank' => 'BICIS', 'id_recu' => 21, 'montant' => '1155689', 'date' => '30/01/2017', 'date_sort' => '20170130'],
                                                ['cycle' => 'Cycle 1', 'bank' => 'BICIS', 'id_recu' => 22, 'montant' => '1155689', 'date' => '18/05/2017', 'date_sort' => '20170518'],
                                                ['cycle' => 'Cycle 1', 'bank' => 'BICIS', 'id_recu' => 23, 'montant' => '1155689', 'date' => '12/06/2017', 'date_sort' => '20170612'],
                                                ['cycle' => 'Cycle 2', 'bank' => 'BICIS', 'id_recu' => 24, 'montant' => '1155689', 'date' => '17/09/2016', 'date_sort' => '20160917'],
                                                ['cycle' => 'Cycle 2', 'bank' => 'BICIS', 'id_recu' => 25, 'montant' => '1155689', 'date' => '14/10/2016', 'date_sort' => '20161014'],
                                                ['cycle' => 'Cycle 2', 'bank' => 'BICIS', 'id_recu' => 26, 'montant' => '1155689', 'date' => '12/11/2016', 'date_sort' => '20161112'],
                                                ['cycle' => 'Cycle 2', 'bank' => 'BICIS', 'id_recu' => 27, 'montant' => '1155689', 'date' => '20/10/2016', 'date_sort' => '20161020'],
                                                ['cycle' => 'Cycle 2', 'bank' => 'BICIS', 'id_recu' => 28, 'montant' => '1155689', 'date' => '22/05/2017', 'date_sort' => '20170522'],
                                                ['cycle' => 'Cycle 2', 'bank' => 'BICIS', 'id_recu' => 29, 'montant' => '1155689', 'date' => '05/05/2017', 'date_sort' => '20170505'],
                                                ['cycle' => 'Cycle 3', 'bank' => 'BICIS', 'id_recu' => 30, 'montant' => '1155689', 'date' => '30/05/2017', 'date_sort' => '20170530'],
                                                ['cycle' => 'Cycle 3', 'bank' => 'BICIS', 'id_recu' => 31, 'montant' => '1155689', 'date' => '20/10/2016', 'date_sort' => '20161020'],
                                                ['cycle' => 'Cycle 3', 'bank' => 'BICIS', 'id_recu' => 32, 'montant' => '1155689', 'date' => '22/05/2017', 'date_sort' => '20170522'],
                                                ['cycle' => 'Cycle 3', 'bank' => 'BICIS', 'id_recu' => 33, 'montant' => '1155689', 'date' => '05/05/2017', 'date_sort' => '20170505'],
                                                ['cycle' => 'Cycle 3', 'bank' => 'BICIS', 'id_recu' => 34, 'montant' => '1155689', 'date' => '30/05/2017', 'date_sort' => '20170530'],
                                                ['cycle' => 'Cycle 3', 'bank' => 'BICIS', 'id_recu' => 35, 'montant' => '1155689', 'date' => '22/05/2017', 'date_sort' => '20170522'],
                                                ['cycle' => 'Cycle 3', 'bank' => 'BICIS', 'id_recu' => 36, 'montant' => '1155689', 'date' => '05/05/2017', 'date_sort' => '20170505'],
                                                ['cycle' => 'Cycle 3', 'bank' => 'BICIS', 'id_recu' => 37, 'montant' => '1155689', 'date' => '30/05/2017', 'date_sort' => '20170530'],
                                                ['cycle' => 'Cycle 1', 'bank' => 'BICIS', 'id_recu' => 38, 'montant' => '1155689', 'date' => '12/05/2017', 'date_sort' => '20170512'],
                                                ['cycle' => 'Cycle 1', 'bank' => 'BICIS', 'id_recu' => 39, 'montant' => '1155689', 'date' => '28/03/2017', 'date_sort' => '20170328'],
                                                ['cycle' => 'Cycle 1', 'bank' => 'BICIS', 'id_recu' => 40, 'montant' => '1155689', 'date' => '06/02/2017', 'date_sort' => '20170206'],
                                                ['cycle' => 'Cycle 1', 'bank' => 'BICIS', 'id_recu' => 41, 'montant' => '1155689', 'date' => '30/01/2017', 'date_sort' => '20170130'],
                                                ['cycle' => 'Cycle 1', 'bank' => 'BICIS', 'id_recu' => 42, 'montant' => '1155689', 'date' => '18/05/2017', 'date_sort' => '20170518'],
                                                ['cycle' => 'Cycle 1', 'bank' => 'BICIS', 'id_recu' => 43, 'montant' => '1155689', 'date' => '12/06/2017', 'date_sort' => '20170612'],
                                                ['cycle' => 'Cycle 2', 'bank' => 'BICIS', 'id_recu' => 44, 'montant' => '1155689', 'date' => '17/09/2016', 'date_sort' => '20160917'],
                                                ['cycle' => 'Cycle 2', 'bank' => 'BICIS', 'id_recu' => 45, 'montant' => '1155689', 'date' => '14/10/2016', 'date_sort' => '20161014'],
                                                ['cycle' => 'Cycle 2', 'bank' => 'BICIS', 'id_recu' => 46, 'montant' => '1155689', 'date' => '12/11/2016', 'date_sort' => '20161112'],
                                                ['cycle' => 'Cycle 2', 'bank' => 'BICIS', 'id_recu' => 47, 'montant' => '1155689', 'date' => '20/10/2016', 'date_sort' => '20161020'],
                                                ['cycle' => 'Cycle 2', 'bank' => 'BICIS', 'id_recu' => 48, 'montant' => '1155689', 'date' => '22/05/2017', 'date_sort' => '20170522'],
                                                ['cycle' => 'Cycle 2', 'bank' => 'BICIS', 'id_recu' => 49, 'montant' => '1155689', 'date' => '05/05/2017', 'date_sort' => '20170505'],
                                                ['cycle' => 'Cycle 3', 'bank' => 'BICIS', 'id_recu' => 50, 'montant' => '1155689', 'date' => '30/05/2017', 'date_sort' => '20170530'],
                                                ['cycle' => 'Cycle 3', 'bank' => 'BICIS', 'id_recu' => 51, 'montant' => '1155689', 'date' => '20/10/2016', 'date_sort' => '20161020'],
                                                ['cycle' => 'Cycle 3', 'bank' => 'BICIS', 'id_recu' => 52, 'montant' => '1155689', 'date' => '22/05/2017', 'date_sort' => '20170522'],
                                                ['cycle' => 'Cycle 3', 'bank' => 'BICIS', 'id_recu' => 53, 'montant' => '1155689', 'date' => '05/05/2017', 'date_sort' => '20170505'],
                                                ['cycle' => 'Cycle 3', 'bank' => 'BICIS', 'id_recu' => 54, 'montant' => '1155689', 'date' => '30/05/2017', 'date_sort' => '20170530']
                                            ];
                                            $a = 1;
                                            foreach($dataTable as $row): ?>
                                                <tr>
                                                    <td><?php echo $row['cycle']; ?></td>
                                                    <td><?php echo $row['bank']; ?></td>
                                                    <td class="display-none"><?php echo $row['date_sort']; ?></td>
                                                    <td><span class="display-none"><?php echo $row['date_sort']; ?></span><?php echo $row['date']; ?></td>
                                                    <td><?php echo $a; ?></td>
                                                    <td data-montant="<?php echo $row['montant']; ?>"><?php echo $row['montant']; ?></td>
                                                    <td>
                                                        <a href="javascript:;" data-id="<?php echo $row['id_recu']; ?>" class="btn btn-xs yellow-gold edit"><i class="fa fa-edit"></i> Editer le versement</a>
                                                    </td>
                                                </tr>
                                            <?php $a++; endforeach;
                                        ?>
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <td colspan="4" class="text-right">Montant total</td>
                                            <td id="sum_total">0</td>
                                            <td></td>
                                        </tr>
                                        </tfoot>
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
            <script src="../js/plugins/spin.min.js" type="text/javascript"></script>
            <script src="../js/plugins/ladda.min.js" type="text/javascript"></script>
            <script src="../js/plugins/datatables.min.js" type="text/javascript"></script>
            <script src="../js/plugins/datatables.bootstrap.js" type="text/javascript"></script>
            <script src="../js/plugins/toastr.min.js" type="text/javascript"></script>
            <script src="../js/plugins/jquery.waypoints.min.js" type="text/javascript"></script>
            <script src="../js/plugins/jquery.counterup.min.js" type="text/javascript"></script>
            <script src="../js/plugins/jquery.inputmask.bundle.min.js" type="text/javascript"></script>
            <script src="../js/plugins/moment.min.js" type="text/javascript"></script>
            <script src="../js/plugins/daterangepicker.min.js" type="text/javascript"></script>
            <!------------------------- FIN DES JS DES PLUGINS A RECUPERER ------------------------>


            <script src="../js/global/app.min.js" type="text/javascript"></script>
            <script src="../js/global/layout.min.js" type="text/javascript"></script>
            <script src="../js/main.js" type="text/javascript"></script>


            <!-- ***************************************************************************** -->
            <!---------------------------- JS SPECIFIQUES A RECUPERER --------------------------->
            <!-- ***************************************************************************** -->
            <script src="../js/comptable/comptable_bank.js" type="text/javascript"></script>
            <!----------------------- FIN DES JS SPECIFIQUES A RECUPERER ----------------------->


        </div>
    </body>
</html>