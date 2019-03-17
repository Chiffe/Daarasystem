<!DOCTYPE html>
<!--[if IE 8]> <html lang="fr" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="fr" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="fr">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8">
        <title>Enseignant | Mon compte</title>
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
                    <h2 class="page-title font-green">Enseignant
                        <small class="font-green">Mon compte</small>
                    </h2>
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <i class="icon-home"></i>
                                <a class="font-green" href="home.php">Accueil</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <a class="font-green" href="account.php">Mon compte</a>
                            </li>
                        </ul>
                    </div>
                    <!-- END PAGE HEADER-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet light">
                                <div class="portlet-title tabbable-line">
                                    <div class="caption caption-md">
                                        <i class="icon-user font-green"></i>
                                        <span class="caption-subject font-green bold uppercase">Mon compte</span>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="tab-content">
                                        <form role="form" enctype="multipart/form-data" action="undefined" method="post">
                                            <div style="display:none;"><input type="hidden" name="_method" value="POST"></div>
                                            <div class="form-body">
                                                <legend>1. Coordonnées</legend>
                                                <input type="hidden" name="id_prof" value="1">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <div class="form-group form-md-line-input form-md-floating-label">
                                                            <select class="form-control" required="required" name="civilite" id="civilite">
                                                                <option value=""></option>
                                                                <option value="M" selected>M</option>
                                                                <option value="Mlle">Mlle</option>
                                                                <option value="Mme">Mme</option>
                                                            </select>
                                                            <label for="civilite">Civilité*</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group form-md-line-input form-md-floating-label">
                                                            <select class="form-control" name="grade" id="grade">
                                                                <option value=""></option>
                                                                <option value="A" selected>A</option>
                                                                <option value="B">B</option>
                                                                <option value="C">C</option>
                                                            </select>
                                                            <label for="grade">Grade</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group form-md-line-input form-md-floating-label">
                                                            <select class="form-control" name="anneeexp" id="anneeexp">
                                                                <option value=""></option>
                                                                <option value="0 à 10 ans">0 à 10 ans</option>
                                                                <option value="10 à 20 ans" selected>10 à 20 ans</option>
                                                                <option value="30 à 40 ans">30 à 40 ans</option>
                                                                <option value="40ans et plus">40ans et plus</option>
                                                            </select>
                                                            <label for="anneeexp">Année d'expérience</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6 col-md-3">
                                                        <div class="form-group form-md-line-input form-md-floating-label">
                                                            <input type="text" class="form-control" name="pnom_prof" required="required" value="Prenom bidon" id="pnom_prof">
                                                            <label for="pnom_prof">Prénom*</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-3">
                                                        <div class="form-group form-md-line-input form-md-floating-label">
                                                            <input type="text" class="form-control" name="nom_prof" required="required" value="Nom bidon" id="nom_prof">
                                                            <label for="nom_prof">Nom*</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-3">
                                                        <div class="form-group form-md-line-input form-md-floating-label ">
                                                            <input type="text" class="form-control date-mask" name="date_naissance" required="required" value="01/10/1980" id="date_naissance">
                                                            <label for="date_naissance">Date de naissance*</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-3">
                                                        <div class="form-group form-md-line-input form-md-floating-label">
                                                            <input type="text" class="form-control" name="lieu_naissance" required="required" value="Lieu bidon" id="lieu_naissance">
                                                            <label for="lieu_naissance">Lieu de naissance*</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group form-md-line-input form-md-floating-label">
                                                    <textarea class="form-control" name="adresseprof" id="adresseprof" required="required" rows="4">Adresse bidon</textarea>
                                                    <label for="adresseprof">Adresse*</label>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group form-md-line-input form-md-floating-label">
                                                            <input type="email" class="form-control" name="emailprof" required="required" value="email@bidon.com" id="emailprof">
                                                            <label for="emailprof">Email*</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group form-md-line-input form-md-floating-label">
                                                            <input type="tel" class="form-control" name="phoneprof" value="0123456789" id="phoneprof">
                                                            <label for="phoneprof">Téléphone</label>
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
            <script src="../js/plugins/jquery.inputmask.bundle.min.js" type="text/javascript"></script>
            <!------------------------- FIN DES JS DES PLUGINS A RECUPERER ------------------------>


            <script src="../js/global/app.min.js" type="text/javascript"></script>
            <script src="../js/global/layout.min.js" type="text/javascript"></script>
            <script src="../js/main.js" type="text/javascript"></script>
        </div>
    </body>
</html>