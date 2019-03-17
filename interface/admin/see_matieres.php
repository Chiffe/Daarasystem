<!DOCTYPE html>
<!--[if IE 8]> <html lang="fr" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="fr" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="fr">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8">
        <title>Admin | Voir les matières d'une classe</title>
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
                    <h1 class="page-title font-green"> Admin
                        <small class="font-green">Voir les matières d'une classe</small>
                    </h1>
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <i class="icon-home"></i>
                                <a class="font-green" href="home.php">Accueil</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <a class="font-green" href="classes.php">Gestion des classes</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <a class="font-green" href="undefined">Voir les matières de la classe</a>
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
                                    <p>La classe "SECONDE B" n'a aucune matière associée</p>
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
                                        <span class="caption-subject font-green sbold uppercase">Liste des matières de la classe <span id="name_classe" class="bold">SECONDE A</span></span>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="table-toolbar">
                                        <div class="row">
                                            <div class="col-xs-12 display-none info_ribbon">
                                                <div class="mt-element-ribbon bg-grey-steel">
                                                    <div class="ribbon ribbon-shadow ribbon-color-info uppercase ">Informations</div>
                                                    <div class="ribbon-content">
                                                        <p class="bold">Aucune matière n'est associée à cette classe. Rendez-vous <a href="assoc_class_matiere.php">ICI</a> pour en associer à la classe.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12">
                                                <label for="filter" class="margin-right-10">Classes :
                                                    <select class="form-control input-inline" name="filter" id="filter_classe">
                                                        <option value=1 selected="selected">SECONDE A</option>
                                                        <option value=2>SECONDE B</option>
                                                        <option value=3>SECONDE C</option>
                                                    </select>
                                                </label>
                                                <label for="filter2">Etapes :
                                                    <select class="form-control input-inline" name="filter2" id="filter_etape">
                                                        <option value="" selected="selected">Toutes</option>
                                                        <option value="1ére étape">1ére étape</option>
                                                        <option value="2éme étape">2éme étape</option>
                                                        <option value="3éme étape">3éme étape</option>
                                                    </select>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <table class="table table-striped table-hover table-bordered" id="table_matiere">
                                        <thead>
                                        <tr>
                                            <th> Etape </th>
                                            <th> Matière </th>
                                            <th> Ressources </th>
                                            <th> Compétences </th>
                                            <th> Actions </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $dataTable = [
                                                ['id' => 1, 'etape' => '1ére étape', 'matiere' => 'LECTURE', 'notesur1' => 'N/D', 'notesur2' => 'N/D'],
                                                ['id' => 2, 'etape' => '1ére étape', 'matiere' => 'ECRITURE', 'notesur1' => 'N/D', 'notesur2' => 'N/D'],
                                                ['id' => 3, 'etape' => '1ére étape', 'matiere' => 'ORTHOGRAPHE', 'notesur1' => 'N/D', 'notesur2' => 'N/D'],
                                                ['id' => 4, 'etape' => '2éme étape', 'matiere' => 'ACTIVITES NUMERIQUES', 'notesur1' => 'N/D', 'notesur2' => 'N/D'],
                                                ['id' => 5, 'etape' => '2éme étape', 'matiere' => 'GEOGRAPHIE', 'notesur1' => 'N/D', 'notesur2' => 'N/D'],
                                                ['id' => 6, 'etape' => '2éme étape', 'matiere' => 'HISTOIRE', 'notesur1' => 24, 'notesur2' => 16],
                                                ['id' => 7, 'etape' => '3éme étape', 'matiere' => 'ARABE', 'notesur1' => 40, 'notesur2' => 60],
                                                ['id' => 8, 'etape' => '3éme étape', 'matiere' => 'EDUCATION ARTISTIQUE', 'notesur1' => 24, 'notesur2' => 16],
                                                ['id' => 9, 'etape' => '2éme étape', 'matiere' => 'SVT', 'notesur1' => 24, 'notesur2' => 16],
                                                ['id' => 10, 'etape' => '3éme étape', 'matiere' => 'MATHS', 'notesur1' => 40, 'notesur2' => 60],
                                                ['id' => 11, 'etape' => '3éme étape', 'matiere' => 'EPS', 'notesur1' => 'N/D', 'notesur2' => 'N/D'],
                                                ['id' => 12, 'etape' => '3éme étape', 'matiere' => 'EDD', 'notesur1' => 24, 'notesur2' => 16],
                                                ['id' => 13, 'etape' => '3éme étape', 'matiere' => 'LANGAGE', 'notesur1' => 40, 'notesur2' => 60]
                                            ];
                                            foreach($dataTable as $row): ?>
                                                <tr>
                                                    <td><?php echo $row['etape']; ?></td>
                                                    <td><?php echo $row['matiere']; ?></td>
                                                    <td><?php echo $row['notesur1']; ?></td>
                                                    <td><?php echo $row['notesur2']; ?></td>
                                                    <td>
                                                        <a data-id="<?php echo $row['id']; ?>" href="javascript:;" class="btn btn-xs green view_prof"><i class="icon-magnifier"></i> Voir les professeurs</a>
                                                        <a data-id="<?php echo $row['id']; ?>" href="javascript:;" class="btn btn-xs red delete" data-toggle="confirmation" data-placement="left" data-original-title="Êtes-vous sûr ?" data-singleton="true"><i class="icon-shuffle"></i> Dissocier</a>
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
            <script src="../js/admin/admin_see_matieres.js" type="text/javascript"></script>
            <!----------------------- FIN DES JS SPECIFIQUES A RECUPERER ----------------------->


        </div>
    </body>
</html>