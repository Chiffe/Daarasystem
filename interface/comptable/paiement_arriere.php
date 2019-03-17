<!DOCTYPE html>
<!--[if IE 8]> <html lang="fr" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="fr" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="fr">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8">
        <title>Comptable | Paiement des arriérés</title>
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
        <link href="../css/plugins/select2.min.css" rel="stylesheet" type="text/css">
        <link href="../css/plugins/select2-bootstrap.min.css" rel="stylesheet" type="text/css">
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
                    <h2 class="page-title font-green"> Comptable
                        <small class="font-green">Paiement des arriérés</small>
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
                                <a class="font-green" href="paiement_arriere.php">Paiement des arriérés</a>
                            </li>
                        </ul>
                    </div>
                    <!-- END PAGE HEADER-->
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="portlet light ">
                                <div class="portlet-title">
                                    <div class="caption font-green">
                                        <i class="fa fa-money font-green"></i>
                                        <span class="caption-subject sbold uppercase">Paiement des arriérés</span>
                                    </div>
                                </div>
                                <div class="portlet-body form">
                                    <div class="row">
                                        <div class="col-xs-12 col-md-8 col-md-offset-2">
                                            <form role="form" action="undefined" method="post">
                                                <div style="display:none;"><input type="hidden" name="_method" value="POST"></div>
                                                <div class="form-body">
                                                    <legend>1. Coordonnées</legend>
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <div class="form-group form-md-line-input form-md-floating-label">
                                                                <div class="form-control form-control-static">2016/2017</div>
                                                                <label>Année scolaire</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="form-group form-md-line-input form-md-floating-label">
                                                                <select class="form-control edited" name="mois" required="required" id="mois">
                                                                    <option value="1" selected>Octobre</option>
                                                                    <option value="2">Novembre</option>
                                                                    <option value="3">Décembre</option>
                                                                    <option value="4">Janvier</option>
                                                                    <option value="5">Fevrier</option>
                                                                    <option value="6">Mars</option>
                                                                    <option value="7">Avril</option>
                                                                    <option value="8">Mai</option>
                                                                    <option value="9">Juin</option>
                                                                </select>
                                                                <label for="mois">Mois*</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="form-group form-md-line-input form-md-floating-label ">
                                                                <input type="text" class="form-control date-mask edit" name="date" required="required" id="date" value="<?php echo date('d/m/Y'); ?>">
                                                                <label for="date">Date encaissement*</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <div class="form-group form-md-line-input form-md-floating-label">
                                                                <select class="form-control" name="cycle" required="required" id="cycle">
                                                                    <option value="" selected></option>
                                                                    <option value="1">Cycle 1</option>
                                                                    <option value="2">Cycle 2</option>
                                                                    <option value="3">Cycle 3</option>
                                                                </select>
                                                                <label for="cycle">Cycle*</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="form-group form-md-line-input form-md-floating-label">
                                                                <select class="form-control" name="classe" required="required" id="classe">
                                                                    <option value=""></option>
                                                                </select>
                                                                <label for="classe">Classe précédente*</label>
                                                                <span class="help-block font-green">Sélectionnez un cycle pour afficher les classes</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="form-group form-md-line-input form-md-floating-label">
                                                                <select class="form-control" name="annee" required="required" id="annee">
                                                                    <option value=""></option>
                                                                    <option value="2015/2016">2015/2016</option>
                                                                    <option value="2014/2015">2014/2015</option>
                                                                    <option value="2013/2014">2013/2014</option>
                                                                    <option value="2012/2013">2012/2013</option>
                                                                </select>
                                                                <label for="annee">Année d'arriérée*</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6 found_eleve">
                                                            <select title="Elève" class="form-control" name="ideleve" required="required" id="ideleve">
                                                                <option value=""></option>
                                                                <optgroup label="Classe1">
                                                                    <option value="1">mat_1 Nom_A Prenom_A</option>
                                                                    <option value="2">mat_2 Nom_B Prenom_B</option>
                                                                    <option value="3">mat_3 Nom_C Prenom_C</option>
                                                                    <option value="4">mat_4 Nom_D Prenom_D</option>
                                                                </optgroup>
                                                                <optgroup label="Classe2">
                                                                    <option value="5">mat_5 Nom_E Prenom_E</option>
                                                                    <option value="6">mat_6 Nom_G Prenom_G</option>
                                                                    <option value="7">mat_7 Nom_H Prenom_H</option>
                                                                    <option value="8">mat_8 Nom_I Prenom_I</option>
                                                                </optgroup>
                                                                <optgroup label="Classe3">
                                                                    <option value="9">mat_9 Nom_J Prenom_J</option>
                                                                    <option value="10">mat_10 Nom_K Prenom_K</option>
                                                                    <option value="11">mat_11 Nom_L Prenom_L</option>
                                                                    <option value="12">mat_12 Nom_M Prenom_M</option>
                                                                </optgroup>
                                                                <optgroup label="Classe4">
                                                                    <option value="13">mat_13 Nom_N Prenom_N</option>
                                                                    <option value="14">mat_14 Nom_O Prenom_O</option>
                                                                    <option value="15">mat_15 Nom_P Prenom_P</option>
                                                                    <option value="16">mat_16 Nom_Q Prenom_Q</option>
                                                                </optgroup>
                                                                <optgroup label="Classe5">
                                                                    <option value="17">mat_17 Nom_R Prenom_R</option>
                                                                    <option value="18">mat_18 Nom_S Prenom_S</option>
                                                                    <option value="19">mat_19 Nom_T Prenom_T</option>
                                                                    <option value="20">mat_20 Nom_U Prenom_U</option>
                                                                </optgroup>
                                                            </select>
                                                        </div>
                                                        <div class="notfound_eleve display-none">
                                                            <div class="col-sm-6 col-md-3">
                                                                <div class="form-group form-md-line-input form-md-floating-label">
                                                                    <select class="form-control" name="civilite" id="civilite">
                                                                        <option value=""></option>
                                                                        <option value="M">M</option>
                                                                        <option value="F">F</option>
                                                                    </select>
                                                                    <label for="civilite">Civilité*</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 col-md-3">
                                                                <div class="form-group form-md-line-input form-md-floating-label">
                                                                    <input type="text" class="form-control" name="prenom" id="prenom">
                                                                    <label for="prenom">Prénom*</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 col-md-3">
                                                                <div class="form-group form-md-line-input form-md-floating-label">
                                                                    <input type="text" class="form-control" name="nom" id="nom">
                                                                    <label for="nom">Nom*</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-md-3">
                                                            <div class="form-group form-md-checkboxes">
                                                                <div class="md-checkbox-inline">
                                                                    <div class="md-checkbox">
                                                                        <input type="checkbox" id="notfound" class="md-check">
                                                                        <label for="notfound">
                                                                            <span></span>
                                                                            <span class="check border-green"></span>
                                                                            <span class="box"></span>Je ne trouve pas l'élève
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group form-md-line-input form-md-floating-label">
                                                                <input type="number" class="form-control" name="montant" min="1" required="required" id="montant">
                                                                <label for="montant">Montant*</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-actions noborder">
                                                    <button type="submit" class="btn green">Enregistrer</button>
                                                </div>
                                            </form>
                                        </div>
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
            <script src="../js/plugins/toastr.min.js" type="text/javascript"></script>
            <script src="../js/plugins/jquery.inputmask.bundle.min.js" type="text/javascript"></script>
            <script src="../js/plugins/select2.full.min.js" type="text/javascript"></script>
            <!------------------------- FIN DES JS DES PLUGINS A RECUPERER ------------------------>


            <script src="../js/global/app.min.js" type="text/javascript"></script>
            <script src="../js/global/layout.min.js" type="text/javascript"></script>
            <script src="../js/main.js" type="text/javascript"></script>


            <!-- ***************************************************************************** -->
            <!---------------------------- JS SPECIFIQUES A RECUPERER --------------------------->
            <!-- ***************************************************************************** -->
            <script src="../js/comptable/comptable_paiement_arriere.js" type="text/javascript"></script>
            <!----------------------- FIN DES JS SPECIFIQUES A RECUPERER ----------------------->


        </div>
    </body>
</html>