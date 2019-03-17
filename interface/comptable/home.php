<!DOCTYPE html>
<!--[if IE 8]> <html lang="fr" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="fr" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="fr">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8">
        <title>Comptable | Tableau de bord</title>
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
                        <small class="font-green">Tableau de bord</small>
                    </h2>
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <i class="icon-home"></i>
                                <a class="font-green" href="home.php">Accueil</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <span class="font-green">Tableau de bord</span>
                            </li>
                        </ul>
                    </div>
                    <!-- END PAGE HEADER-->
                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="dashboard-stat2 ">
                                <div class="display">
                                    <div class="number">
                                        <h3 class="font-green">
                                            <span data-counter="counterup" data-value="621"></span>
                                        </h3>
                                        <small>effectif total</small>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-line-chart"></i>
                                    </div>
                                </div>
                                <div class="progress-info">
                                    <div class="status">
                                        <div class="status-title">Filles : <span data-counter="counterup" data-value="319">319</span> | Garçons : <span data-counter="counterup" data-value="302">302</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="dashboard-stat2 ">
                                <div class="display">
                                    <div class="number">
                                        <h3 class="font-red">
                                            <span data-counter="counterup" data-value="6"></span>
                                        </h3>
                                        <small>paiement en retard</small>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-credit-card"></i>
                                    </div>
                                </div>
                                <div class="progress-info">
                                    <div class="status">
                                        <div class="status-title">REPRESENTE : <span data-counter="counterup" data-value="6500"></span> €</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="dashboard-stat2 ">
                                <div class="display">
                                    <div class="number">
                                        <h3 class="font-yellow-gold">
                                            <span data-counter="counterup" data-value="567"></span>
                                        </h3>
                                        <small>autre statistique</small>
                                    </div>
                                    <div class="icon">
                                        <i class="icon-basket"></i>
                                    </div>
                                </div>
                                <div class="progress-info">
                                    <div class="status">
                                        <div class="status-title">blabla</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="dashboard-stat2 ">
                                <div class="display">
                                    <div class="number">
                                        <h3 class="font-grey-mint">
                                            <span data-counter="counterup" data-value="276"></span>
                                        </h3>
                                        <small>AUTRE STATISTIQUE 2</small>
                                    </div>
                                    <div class="icon">
                                        <i class="icon-user"></i>
                                    </div>
                                </div>
                                <div class="progress-info">
                                    <div class="status">
                                        <div class="status-title">blabla 2</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="portlet light ">
                                <div class="portlet-title">
                                    <div class="caption caption-md">
                                        <span class="caption-subject font-dark sbold uppercase">Abonnement transport</span>
                                        <span class="caption-helper">Situation globale</span>
                                    </div>
                                    <div class="actions">
                                        <div class="btn-group btn-group-devided">
                                            <a href="undefined" class="btn grey-mint"><i class="fa fa-print"></i></a>
                                            <a href="eleve_abonnes.php" class="btn green"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="table-scrollable table-scrollable-borderless">
                                        <table class="table table-hover">
                                            <thead>
                                            <tr class="uppercase">
                                                <th>cycle</th>
                                                <th>Bus SOS (Zone 1)</th>
                                                <th>Bus SOS (Zone 2)</th>
                                                <th>Bus SOS (Zone 3)</th>
                                                <th>Bus SOS (Zone 4)</th>
                                                <th>Bus SOS (Zone 5)</th>
                                                <th>Bus SOS (Total)</th>
                                                <th>Bus Prive</th>
                                                <th>Nombre d'élèves</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>Cycle 1</td>
                                                <td>10</td>
                                                <td>20</td>
                                                <td>5</td>
                                                <td>15</td>
                                                <td>8</td>
                                                <td><span class="bold">58</span></td>
                                                <td><span class="bold">35</span></td>
                                                <td>55</td>
                                            </tr>
                                            <tr>
                                                <td>Cycle 2</td>
                                                <td>10</td>
                                                <td>20</td>
                                                <td>5</td>
                                                <td>15</td>
                                                <td>8</td>
                                                <td><span class="bold">58</span></td>
                                                <td><span class="bold">40</span></td>
                                                <td>150</td>
                                            </tr>
                                            <tr>
                                                <td>Cycle 3</td>
                                                <td>10</td>
                                                <td>20</td>
                                                <td>5</td>
                                                <td>15</td>
                                                <td>8</td>
                                                <td><span class="bold">58</span></td>
                                                <td><span class="bold">25</span></td>
                                                <td>205</td>
                                            </tr>
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <td>TOTAL</td>
                                                <td>30</td>
                                                <td>60</td>
                                                <td>15</td>
                                                <td>45</td>
                                                <td>24</td>
                                                <td><span class="bold">174</span></td>
                                                <td><span class="bold">100</span></td>
                                                <td>310</td>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="portlet light ">
                                <div class="portlet-title">
                                    <div class="caption caption-md">
                                        <span class="caption-subject font-dark sbold uppercase">Cantine/Blouse</span>
                                        <span class="caption-helper">Situation globale</span>
                                    </div>
                                    <div class="actions">
                                        <div class="btn-group btn-group-devided">
                                            <a href="undefined" class="btn grey-mint"><i class="fa fa-print"></i></a>
                                            <a href="eleve_abonnes.php" class="btn green"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="table-scrollable table-scrollable-borderless">
                                        <table class="table table-hover">
                                            <thead>
                                            <tr class="uppercase">
                                                <th>cycle</th>
                                                <th>Cantine (Demi-pension)</th>
                                                <th>Cantine (Pension)</th>
                                                <th>Cantine (Total)</th>
                                                <th>Blouses achetées</th>
                                                <th>Nombre d'élèves</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>Cycle 1</td>
                                                <td>35</td>
                                                <td>20</td>
                                                <td><span class="bold">55</span></td>
                                                <td><span class="bold">55</span></td>
                                                <td>55</td>
                                            </tr>
                                            <tr>
                                                <td>Cycle 2</td>
                                                <td>35</td>
                                                <td>20</td>
                                                <td><span class="bold">55</span></td>
                                                <td><span class="bold">55</span></td>
                                                <td>150</td>
                                            </tr>
                                            <tr>
                                                <td>Cycle 3</td>
                                                <td>35</td>
                                                <td>20</td>
                                                <td><span class="bold">55</span></td>
                                                <td><span class="bold">55</span></td>
                                                <td>205</td>
                                            </tr>
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <td>TOTAL</td>
                                                <td>105</td>
                                                <td>60</td>
                                                <td><span class="bold">165</span></td>
                                                <td><span class="bold">165</span></td>
                                                <td>310</td>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="portlet light ">
                                <div class="portlet-title">
                                    <div class="caption caption-md">
                                        <span class="caption-subject font-dark sbold uppercase">Effectif des élèves</span>
                                        <span class="caption-helper">Les élèves de l'établissement</span>
                                    </div>
                                    <div class="actions">
                                        <div class="btn-group btn-group-devided">
                                            <a href="undefined" class="btn grey-mint"><i class="fa fa-print"></i></a>
                                            <a href="effectif_eleves.php" class="btn green"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <label for="filter">Cycles :
                                        <select class="form-control input-inline" name="filter" id="filter_cycle">
                                            <option value="">Tous</option>
                                            <option value="1">Cycle 1</option>
                                            <option value="2">Cycle 2</option>
                                            <option value="3">Cycle 3</option>
                                        </select>
                                    </label>
                                    <div class="table-scrollable table-scrollable-borderless">
                                        <table class="table table-hover">
                                            <thead>
                                            <tr class="uppercase">
                                                <th>Catégorie</th>
                                                <th>Garçon</th>
                                                <th>Fille</th>
                                                <th>Total</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>CS</td>
                                                <td>5</td>
                                                <td>7</td>
                                                <td><span class="bold">12</span></td>
                                            </tr>
                                            <tr>
                                                <td>EP</td>
                                                <td>5</td>
                                                <td>7</td>
                                                <td><span class="bold">12</span></td>
                                            </tr>
                                            <tr>
                                                <td>EXO</td>
                                                <td>5</td>
                                                <td>7</td>
                                                <td><span class="bold">12</span></td>
                                            </tr>
                                            <tr>
                                                <td>EXT</td>
                                                <td>5</td>
                                                <td>7</td>
                                                <td><span class="bold">12</span></td>
                                            </tr>
                                            <tr>
                                                <td>RF</td>
                                                <td>5</td>
                                                <td>7</td>
                                                <td><span class="bold">12</span></td>
                                            </tr>
                                            <tr>
                                                <td>CD</td>
                                                <td>5</td>
                                                <td>7</td>
                                                <td><span class="bold">12</span></td>
                                            </tr>
                                            <tr>
                                                <td>SOS</td>
                                                <td>5</td>
                                                <td>7</td>
                                                <td><span class="bold">12</span></td>
                                            </tr>
                                            <tr>
                                                <td>TD</td>
                                                <td>5</td>
                                                <td>7</td>
                                                <td><span class="bold">12</span></td>
                                            </tr>
                                            <tr>
                                                <td>TS</td>
                                                <td>5</td>
                                                <td>7</td>
                                                <td><span class="bold">12</span></td>
                                            </tr>
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <td>TOTAL</td>
                                                <td>45</td>
                                                <td>63</td>
                                                <td>108</td>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="portlet light ">
                                <div class="portlet-title">
                                    <div class="caption caption-md">
                                        <span class="caption-subject font-dark sbold uppercase">Etat de la caisse</span>
                                    </div>
                                    <div class="actions">
                                        <div class="btn-group btn-group-devided">
                                            <a href="undefined" class="btn grey-mint"><i class="fa fa-print"></i></a>
                                            <a href="financier_jours.php" class="btn green"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div id="echarts_checkout" style="min-height:500px;"></div>
                                    <div class="well well-sm">
                                        <span class="text-uppercase bold font-green margin_r50">Total encaissé : <span class="counterup_checkout" id="counterup_encaisse" data-value=""></span></span>
                                        <span class="text-uppercase bold font-yellow-gold margin_r50">Total versé : <span class="counterup_checkout" id="counterup_verse" data-value=""></span></span>
                                        <span class="text-uppercase bold font-grey-mint">Total ecart : <span class="counterup_checkout" id="counterup_ecart" data-value=""></span></span>
                                    </div>
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
            <script src="../js/plugins/jquery.waypoints.min.js" type="text/javascript"></script>
            <script src="../js/plugins/jquery.counterup.min.js" type="text/javascript"></script>
            <script src="../js/plugins/echarts.min.js" type="text/javascript"></script>
            <!------------------------- FIN DES JS DES PLUGINS A RECUPERER ------------------------>


            <script src="../js/global/app.min.js" type="text/javascript"></script>
            <script src="../js/global/layout.min.js" type="text/javascript"></script>
            <script src="../js/main.js" type="text/javascript"></script>


            <!-- ***************************************************************************** -->
            <!---------------------------- JS SPECIFIQUES A RECUPERER --------------------------->
            <!-- ***************************************************************************** -->
            <script src="../js/comptable/comptable_home.js" type="text/javascript"></script>
            <!----------------------- FIN DES JS SPECIFIQUES A RECUPERER ----------------------->


        </div>
    </body>
</html>