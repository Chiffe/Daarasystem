<!DOCTYPE html>
<!--[if IE 8]> <html lang="fr" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="fr" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="fr">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8">
        <title>Parent | Notes</title>
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
                    <h2 class="page-title font-green"> Parent
                        <small class="font-green">Notes</small>
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
                                <a class="font-green" href="notes.php">Notes</a>
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
                                        <span class="caption-subject font-green sbold uppercase">Liste des devoirs</span>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="table-toolbar">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <label for="filter3">Trimestre :
                                                    <select class="form-control input-inline" name="filter3" id="filter_trimestre">
                                                        <option data-id="" value="">Tous</option>
                                                        <option data-id="1" value="1er Trimestre">1er Trimestre</option>
                                                        <option data-id="2" value="2ème Trimestre">2ème Trimestre</option>
                                                        <option data-id="3" value="3ème Trimestre">3ème Trimestre</option>
                                                    </select>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <h3>Carnet de note</h3>
                                                <div class="btn-group">
                                                    <a href="undefined" class="btn green margin-bottom-5"><i class="icon-magnifier"></i> Voir le 1er trimestre</a>
                                                    <a href="undefined" class="btn grey-mint margin-bottom-5 margin-right-10"><i class="icon-printer"></i> Imprimer le 1er trimestre</a>
                                                    <a href="undefined" class="btn green margin-bottom-5"><i class="icon-magnifier"></i> Voir le 2ème trimestre</a>
                                                    <a href="undefined" class="btn grey-mint margin-bottom-5 margin-right-10"><i class="icon-printer"></i> Imprimer le 2ème trimestre</a>
                                                    <a href="undefined" class="btn green margin-bottom-5"><i class="icon-magnifier"></i> Voir le 3ème trimestre</a>
                                                    <a href="undefined" class="btn grey-mint margin-bottom-5 margin-right-10"><i class="icon-printer"></i> Imprimer le 3ème trimestre</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <table class="table table-striped table-hover table-bordered" id="table_note">
                                        <thead>
                                        <tr>
                                            <th>Elève</th>
                                            <th>Matière</th>
                                            <th>Trimestre</th>
                                            <th>Date du devoir</th>
                                            <th>Note</th>
                                            <th>Rang</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Nom_A Prenom_A</td>
                                                <td>Matiere_A</td>
                                                <td>1er Trimestre</td>
                                                <td><span class="display-none">20170612</span>12/06/2017</td>
                                                <td>8/10</td>
                                                <td>6</td>
                                            </tr>
                                            <tr>
                                                <td>Nom_A Prenom_A</td>
                                                <td>Matiere_A</td>
                                                <td>1er Trimestre</td>
                                                <td><span class="display-none">20170612</span>12/06/2017</td>
                                                <td>8/10</td>
                                                <td>6</td>
                                            </tr>
                                            <tr>
                                                <td>Nom_A Prenom_A</td>
                                                <td>Matiere_A</td>
                                                <td>2ème Trimestre</td>
                                                <td><span class="display-none">20170612</span>12/06/2017</td>
                                                <td>8/10</td>
                                                <td>6</td>
                                            </tr>
                                            <tr>
                                                <td>Nom_A Prenom_A</td>
                                                <td>Matiere_A</td>
                                                <td>2ème Trimestre</td>
                                                <td><span class="display-none">20170917</span>17/09/2017</td>
                                                <td>8/10</td>
                                                <td>6</td>
                                            </tr>
                                            <tr>
                                                <td>Nom_A Prenom_A</td>
                                                <td>Matiere_A</td>
                                                <td>3ème Trimestre</td>
                                                <td><span class="display-none">20170912</span>12/09/2017</td>
                                                <td>8/10</td>
                                                <td>6</td>
                                            </tr>
                                            <tr>
                                                <td>Nom_A Prenom_A</td>
                                                <td>Matiere_A</td>
                                                <td>3ème Trimestre</td>
                                                <td><span class="display-none">20170618</span>18/06/2017</td>
                                                <td>8/10</td>
                                                <td>6</td>
                                            </tr>
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


            <!-- BEGIN THEME GLOBAL SCRIPTS -->
            <script src="../js/global/app.min.js" type="text/javascript"></script>
            <!-- END THEME GLOBAL SCRIPTS -->
            <!-- BEGIN THEME LAYOUT SCRIPTS -->
            <script src="../js/global/layout.min.js" type="text/javascript"></script>
            <script src="../js/main.js" type="text/javascript"></script>
            <!-- END THEME LAYOUT SCRIPTS -->


            <!-- ***************************************************************************** -->
            <!---------------------------- JS SPECIFIQUES A RECUPERER --------------------------->
            <!-- ***************************************************************************** -->
            <script src="../js/parent/parent_notes.js" type="text/javascript"></script>
            <!----------------------- FIN DES JS SPECIFIQUES A RECUPERER ----------------------->


        </div>
    </body>
</html>