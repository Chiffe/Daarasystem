<!DOCTYPE html>
<!--[if IE 8]> <html lang="fr" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="fr" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="fr">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8">
        <title>Enseignant | Carnet de note</title>
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
        <link href="../css/plugins/toastr.min.css" rel="stylesheet" type="text/css">
        <link href="../css/plugins/ladda-themeless.min.css" rel="stylesheet" type="text/css">
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
                    <h2 class="page-title font-green">Enseignant
                        <small class="font-green">Carnet de note</small>
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
                                <a class="font-green" href="carnet_note.php">Carnet de note</a>
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
                                        <i class="icon-notebook font-green"></i>
                                        <span class="caption-subject font-green sbold uppercase">Carnet de note</span>
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
                                                <label for="filter3" class="margin_r20">Trimestre :
                                                    <select class="form-control input-inline" name="filter3" id="filter_trimestre">
                                                        <option data-id="" value="">Tous</option>
                                                        <option data-id="1" value="1er Trimestre">1er Trimestre</option>
                                                        <option data-id="2" value="2ème Trimestre">2ème Trimestre</option>
                                                        <option data-id="3" value="3ème Trimestre">3ème Trimestre</option>
                                                    </select>
                                                </label>
                                                <label class="bold">Imprimer <i class="icon-info tooltips font-blue" data-original-title="Sélectionnez les filtres 'Classe' et 'Trimestre' pour activer le bouton"></i> :</label>
                                                <button disabled data-html="true" data-original-title="Sélectionnez les filtres 'Classe' et 'Trimestre' pour activer le bouton" class="tooltips btn grey-mint printer_actions">Carnet de note général</button>
                                            </div>
                                        </div>
                                    </div>
                                    <table class="table table-striped table-hover table-bordered" id="table_carnet_note">
                                        <thead>
                                        <tr>
                                            <th>Cycle</th>
                                            <th>Classe</th>
                                            <th>Matricule</th>
                                            <th>Elève</th>
                                            <th>Code parent</th>
                                            <th>1er Trimestre</th>
                                            <th>2eme Trimestre</th>
                                            <th>3eme Trimestre</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $dataTable = [
                                                ['cycle' => 'Cycle 1', 'matricule' => 'mat_1',  'id' => 1,  'classe' => 'Classe 1', 'eleve' => 'Nom_A Prenom_A', 'code' => 'code_1'],
                                                ['cycle' => 'Cycle 1', 'matricule' => 'mat_2',  'id' => 2,  'classe' => 'Classe 1', 'eleve' => 'Nom_B Prenom_B', 'code' => 'code_2'],
                                                ['cycle' => 'Cycle 1', 'matricule' => 'mat_3',  'id' => 3,  'classe' => 'Classe 1', 'eleve' => 'Nom_C Prenom_C', 'code' => 'code_3'],
                                                ['cycle' => 'Cycle 1', 'matricule' => 'mat_4',  'id' => 4,  'classe' => 'Classe 1', 'eleve' => 'Nom_D Prenom_D', 'code' => 'code_4'],
                                                ['cycle' => 'Cycle 1', 'matricule' => 'mat_5',  'id' => 5,  'classe' => 'Classe 1', 'eleve' => 'Nom_E Prenom_E', 'code' => 'code_5'],
                                                ['cycle' => 'Cycle 1', 'matricule' => 'mat_6',  'id' => 6,  'classe' => 'Classe 1', 'eleve' => 'Nom_F Prenom_F', 'code' => 'code_6'],
                                                ['cycle' => 'Cycle 2', 'matricule' => 'mat_7',  'id' => 7,  'classe' => 'Classe 2', 'eleve' => 'Nom_G Prenom_G', 'code' => 'code_7'],
                                                ['cycle' => 'Cycle 2', 'matricule' => 'mat_8',  'id' => 8,  'classe' => 'Classe 2', 'eleve' => 'Nom_H Prenom_H', 'code' => 'code_8'],
                                                ['cycle' => 'Cycle 2', 'matricule' => 'mat_9',  'id' => 9,  'classe' => 'Classe 2', 'eleve' => 'Nom_I Prenom_I', 'code' => 'code_9'],
                                                ['cycle' => 'Cycle 2', 'matricule' => 'mat_10', 'id' => 10, 'classe' => 'Classe 2', 'eleve' => 'Nom_J Prenom_J', 'code' => 'code_10'],
                                                ['cycle' => 'Cycle 2', 'matricule' => 'mat_11', 'id' => 11, 'classe' => 'Classe 2', 'eleve' => 'Nom_K Prenom_K', 'code' => 'code_11'],
                                                ['cycle' => 'Cycle 2', 'matricule' => 'mat_12', 'id' => 12, 'classe' => 'Classe 3', 'eleve' => 'Nom_L Prenom_L', 'code' => 'code_12'],
                                                ['cycle' => 'Cycle 3', 'matricule' => 'mat_13', 'id' => 13, 'classe' => 'Classe 3', 'eleve' => 'Nom_M Prenom_M', 'code' => 'code_13'],
                                                ['cycle' => 'Cycle 3', 'matricule' => 'mat_14', 'id' => 14, 'classe' => 'Classe 3', 'eleve' => 'Nom_N Prenom_N', 'code' => 'code_14'],
                                                ['cycle' => 'Cycle 3', 'matricule' => 'mat_15', 'id' => 15, 'classe' => 'Classe 4', 'eleve' => 'Nom_O Prenom_O', 'code' => 'code_15'],
                                                ['cycle' => 'Cycle 3', 'matricule' => 'mat_16', 'id' => 16, 'classe' => 'Classe 4', 'eleve' => 'Nom_P Prenom_P', 'code' => 'code_16'],
                                                ['cycle' => 'Cycle 3', 'matricule' => 'mat_17', 'id' => 17, 'classe' => 'Classe 4', 'eleve' => 'Nom_Q Prenom_Q', 'code' => 'code_17']
                                            ];
                                            foreach($dataTable as $row): ?>
                                                <tr>
                                                    <td><?php echo $row['cycle']; ?></td>
                                                    <td><?php echo $row['classe']; ?></td>
                                                    <td><?php echo $row['matricule']; ?></td>
                                                    <td><?php echo $row['eleve']; ?></td>
                                                    <td><?php echo $row['code']; ?></td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                                                <i class="icon-settings"></i> Actions <i class="fa fa-angle-down"></i>
                                                            </button>
                                                            <ul class="dropdown-menu pull-right" role="menu">
                                                                <li>
                                                                    <a href="javascript:;" data-id_eleve="<?php echo $row['id']; ?>" data-id_trimes="1" class="view"><i class="icon-magnifier"></i> Voir le carnet de note</a>
                                                                </li>
                                                                <li>
                                                                    <a href="undefined"><i class="icon-printer"></i> Imprimer le carnet de note</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                                                <i class="icon-settings"></i> Actions <i class="fa fa-angle-down"></i>
                                                            </button>
                                                            <ul class="dropdown-menu pull-right" role="menu">
                                                                <li>
                                                                    <a href="javascript:;" data-id_eleve="<?php echo $row['id']; ?>" data-id_trimes="2" class="view"><i class="icon-magnifier"></i> Voir le carnet de note</a>
                                                                </li>
                                                                <li>
                                                                    <a href="undefined"><i class="icon-printer"></i> Imprimer le carnet de note</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                                                <i class="icon-settings"></i> Actions <i class="fa fa-angle-down"></i>
                                                            </button>
                                                            <ul class="dropdown-menu pull-right" role="menu">
                                                                <li>
                                                                    <a href="javascript:;" data-id_eleve="<?php echo $row['id']; ?>" data-id_trimes="3" class="view"><i class="icon-magnifier"></i> Voir le carnet de note</a>
                                                                </li>
                                                                <li>
                                                                    <a href="undefined"><i class="icon-printer"></i> Imprimer le carnet de note</a>
                                                                </li>
                                                            </ul>
                                                        </div>
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
            <script src="../js/plugins/toastr.min.js" type="text/javascript"></script>
            <script src="../js/plugins/spin.min.js" type="text/javascript"></script>
            <script src="../js/plugins/ladda.min.js" type="text/javascript"></script>
            <script src="../js/plugins/datatables.min.js" type="text/javascript"></script>
            <script src="../js/plugins/datatables.bootstrap.js" type="text/javascript"></script>
            <!------------------------- FIN DES JS DES PLUGINS A RECUPERER ------------------------>


            <script src="../js/global/app.min.js" type="text/javascript"></script>
            <script src="../js/global/layout.min.js" type="text/javascript"></script>
            <script src="../js/main.js" type="text/javascript"></script>


            <!-- ***************************************************************************** -->
            <!---------------------------- JS SPECIFIQUES A RECUPERER --------------------------->
            <!-- ***************************************************************************** -->
            <script src="../js/prof/prof_carnet_note.js" type="text/javascript"></script>
            <!----------------------- FIN DES JS SPECIFIQUES A RECUPERER ----------------------->


        </div>
    </body>
</html>