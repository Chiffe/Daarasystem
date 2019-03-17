<!DOCTYPE html>
<!--[if IE 8]> <html lang="fr" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="fr" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="fr">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8">
        <title>Comptable | Effectif des élèves</title>
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
                        <small class="font-green">Effectif des élèves</small>
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
                                <a class="font-green" href="eleves.php">Gestion des élèves</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <a class="font-green" href="effectif_eleves.php">Effectif des élèves</a>
                            </li>
                        </ul>
                    </div>
                    <!-- END PAGE HEADER-->
                    <div class="row">
                        <div class="col-sm-4 col-xs-12">
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
                        <div class="col-sm-4 col-xs-12">
                            <div class="dashboard-stat2 ">
                                <div class="display">
                                    <div class="number">
                                        <h3 class="font-green">
                                            <span data-counter="counterup" data-value="105"></span>
                                        </h3>
                                        <small>Dans le jardin</small>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-line-chart"></i>
                                    </div>
                                </div>
                                <div class="progress-info">
                                    <div class="status">
                                        <div class="status-title">Filles : <span data-counter="counterup" data-value="51"></span> | Garçons : <span data-counter="counterup" data-value="54"></span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-xs-12">
                            <div class="dashboard-stat2 ">
                                <div class="display">
                                    <div class="number">
                                        <h3 class="font-green">
                                            <span data-counter="counterup" data-value="510"></span>
                                        </h3>
                                        <small>Dans l'école</small>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-line-chart"></i>
                                    </div>
                                </div>
                                <div class="progress-info">
                                    <div class="status">
                                        <div class="status-title">Filles : <span data-counter="counterup" data-value="265"></span> | Garçons : <span data-counter="counterup" data-value="245"></span></div>
                                    </div>
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
                                        <span class="caption-subject font-green sbold uppercase">Effectif par catégorie</span>
                                    </div>
                                    <a href="undefined" data-original-title="Imprimer tous les tableaux" class="tooltips pull-right btn grey-mint"><i class="fa fa-print"></i></a>
                                </div>
                                <div class="portlet-body">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-6 margin-bottom-20">
                                            <legend>Tous les cycles <a href="undefined" data-original-title="Imprimer le tableau" class="tooltips pull-right btn btn-sm grey-mint"><i class="fa fa-print"></i></a></legend>
                                            <table class="table table-striped table-hover table-condensed">
                                                <thead>
                                                <tr>
                                                    <th>Catégorie</th>
                                                    <th>Garçons</th>
                                                    <th>Filles</th>
                                                    <th>TOTAL</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>CS</td>
                                                    <td>5</td>
                                                    <td>5</td>
                                                    <td class="bold">10</td>
                                                </tr>
                                                <tr>
                                                    <td>EP</td>
                                                    <td>5</td>
                                                    <td>5</td>
                                                    <td class="bold">10</td>
                                                </tr>
                                                <tr>
                                                    <td>EXO</td>
                                                    <td>5</td>
                                                    <td>5</td>
                                                    <td class="bold">10</td>
                                                </tr>
                                                <tr>
                                                    <td>EXT</td>
                                                    <td>5</td>
                                                    <td>5</td>
                                                    <td class="bold">10</td>
                                                </tr>
                                                <tr>
                                                    <td>NS</td>
                                                    <td>5</td>
                                                    <td>5</td>
                                                    <td class="bold">10</td>
                                                </tr>
                                                <tr>
                                                    <td>RF</td>
                                                    <td>5</td>
                                                    <td>5</td>
                                                    <td class="bold">10</td>
                                                </tr>
                                                <tr>
                                                    <td>SOS</td>
                                                    <td>5</td>
                                                    <td>5</td>
                                                    <td class="bold">10</td>
                                                </tr>
                                                <tr>
                                                    <td>TD</td>
                                                    <td>5</td>
                                                    <td>5</td>
                                                    <td class="bold">10</td>
                                                </tr>
                                                <tr>
                                                    <td>TS</td>
                                                    <td>5</td>
                                                    <td>5</td>
                                                    <td class="bold">10</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 margin-bottom-20">
                                            <legend>Cycle : CRECHE<a href="undefined" data-original-title="Imprimer le tableau" class="tooltips pull-right btn btn-sm grey-mint"><i class="fa fa-print"></i></a></legend>
                                            <table class="table table-striped table-hover table-condensed">
                                                <thead>
                                                <tr>
                                                    <th>Catégorie</th>
                                                    <th>Garçons</th>
                                                    <th>Filles</th>
                                                    <th>TOTAL</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>CS</td>
                                                    <td>5</td>
                                                    <td>5</td>
                                                    <td class="bold">10</td>
                                                </tr>
                                                <tr>
                                                    <td>EP</td>
                                                    <td>5</td>
                                                    <td>5</td>
                                                    <td class="bold">10</td>
                                                </tr>
                                                <tr>
                                                    <td>EXO</td>
                                                    <td>5</td>
                                                    <td>5</td>
                                                    <td class="bold">10</td>
                                                </tr>
                                                <tr>
                                                    <td>EXT</td>
                                                    <td>5</td>
                                                    <td>5</td>
                                                    <td class="bold">10</td>
                                                </tr>
                                                <tr>
                                                    <td>NS</td>
                                                    <td>5</td>
                                                    <td>5</td>
                                                    <td class="bold">10</td>
                                                </tr>
                                                <tr>
                                                    <td>RF</td>
                                                    <td>5</td>
                                                    <td>5</td>
                                                    <td class="bold">10</td>
                                                </tr>
                                                <tr>
                                                    <td>SOS</td>
                                                    <td>5</td>
                                                    <td>5</td>
                                                    <td class="bold">10</td>
                                                </tr>
                                                <tr>
                                                    <td>TD</td>
                                                    <td>5</td>
                                                    <td>5</td>
                                                    <td class="bold">10</td>
                                                </tr>
                                                <tr>
                                                    <td>TS</td>
                                                    <td>5</td>
                                                    <td>5</td>
                                                    <td class="bold">10</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 margin-bottom-20">
                                            <legend>Cycle : JARDIN<a href="undefined" data-original-title="Imprimer le tableau" class="tooltips pull-right btn btn-sm grey-mint"><i class="fa fa-print"></i></a></legend>
                                            <table class="table table-striped table-hover table-condensed">
                                                <thead>
                                                <tr>
                                                    <th>Catégorie</th>
                                                    <th>Garçons</th>
                                                    <th>Filles</th>
                                                    <th>TOTAL</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>CS</td>
                                                    <td>5</td>
                                                    <td>5</td>
                                                    <td class="bold">10</td>
                                                </tr>
                                                <tr>
                                                    <td>EP</td>
                                                    <td>5</td>
                                                    <td>5</td>
                                                    <td class="bold">10</td>
                                                </tr>
                                                <tr>
                                                    <td>EXO</td>
                                                    <td>5</td>
                                                    <td>5</td>
                                                    <td class="bold">10</td>
                                                </tr>
                                                <tr>
                                                    <td>EXT</td>
                                                    <td>5</td>
                                                    <td>5</td>
                                                    <td class="bold">10</td>
                                                </tr>
                                                <tr>
                                                    <td>NS</td>
                                                    <td>5</td>
                                                    <td>5</td>
                                                    <td class="bold">10</td>
                                                </tr>
                                                <tr>
                                                    <td>RF</td>
                                                    <td>5</td>
                                                    <td>5</td>
                                                    <td class="bold">10</td>
                                                </tr>
                                                <tr>
                                                    <td>SOS</td>
                                                    <td>5</td>
                                                    <td>5</td>
                                                    <td class="bold">10</td>
                                                </tr>
                                                <tr>
                                                    <td>TD</td>
                                                    <td>5</td>
                                                    <td>5</td>
                                                    <td class="bold">10</td>
                                                </tr>
                                                <tr>
                                                    <td>TS</td>
                                                    <td>5</td>
                                                    <td>5</td>
                                                    <td class="bold">10</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 margin-bottom-20">
                                            <legend>Cycle : PRIMAIRE<a href="undefined" data-original-title="Imprimer le tableau" class="tooltips pull-right btn btn-sm grey-mint"><i class="fa fa-print"></i></a></legend>
                                            <table class="table table-striped table-hover table-condensed">
                                                <thead>
                                                <tr>
                                                    <th>Catégorie</th>
                                                    <th>Garçons</th>
                                                    <th>Filles</th>
                                                    <th>TOTAL</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>CS</td>
                                                    <td>5</td>
                                                    <td>5</td>
                                                    <td class="bold">10</td>
                                                </tr>
                                                <tr>
                                                    <td>EP</td>
                                                    <td>5</td>
                                                    <td>5</td>
                                                    <td class="bold">10</td>
                                                </tr>
                                                <tr>
                                                    <td>EXO</td>
                                                    <td>5</td>
                                                    <td>5</td>
                                                    <td class="bold">10</td>
                                                </tr>
                                                <tr>
                                                    <td>EXT</td>
                                                    <td>5</td>
                                                    <td>5</td>
                                                    <td class="bold">10</td>
                                                </tr>
                                                <tr>
                                                    <td>NS</td>
                                                    <td>5</td>
                                                    <td>5</td>
                                                    <td class="bold">10</td>
                                                </tr>
                                                <tr>
                                                    <td>RF</td>
                                                    <td>5</td>
                                                    <td>5</td>
                                                    <td class="bold">10</td>
                                                </tr>
                                                <tr>
                                                    <td>SOS</td>
                                                    <td>5</td>
                                                    <td>5</td>
                                                    <td class="bold">10</td>
                                                </tr>
                                                <tr>
                                                    <td>TD</td>
                                                    <td>5</td>
                                                    <td>5</td>
                                                    <td class="bold">10</td>
                                                </tr>
                                                <tr>
                                                    <td>TS</td>
                                                    <td>5</td>
                                                    <td>5</td>
                                                    <td class="bold">10</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
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
            <script src="../js/plugins/jquery.waypoints.min.js" type="text/javascript"></script>
            <script src="../js/plugins/jquery.counterup.min.js" type="text/javascript"></script>
            <!------------------------- FIN DES JS DES PLUGINS A RECUPERER ------------------------>


            <script src="../js/global/app.min.js" type="text/javascript"></script>
            <script src="../js/global/layout.min.js" type="text/javascript"></script>
            <script src="../js/main.js" type="text/javascript"></script>


            <!-- ***************************************************************************** -->
            <!---------------------------- JS SPECIFIQUES A RECUPERER --------------------------->
            <!-- ***************************************************************************** -->
            <script src="../js/comptable/comptable_effectif_eleves.js" type="text/javascript"></script>
            <!----------------------- FIN DES JS SPECIFIQUES A RECUPERER ----------------------->


        </div>
    </body>
</html>