<!DOCTYPE html>
<!--[if IE 8]> <html lang="fr" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="fr" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="fr">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8">
        <title>Comptable | Informations établissement</title>
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
        <link href="../css/plugins/bootstrap-fileinput.css" rel="stylesheet" type="text/css">
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
                    <h2 class="page-title font-green">Comptable
                        <small class="font-green">Informations de l'établissement</small>
                    </h2>
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <i class="icon-home"></i>
                                <a class="font-green" href="home.php">Accueil</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <a class="font-green" href="etablissement.php">Informations de l'établissement</a>
                            </li>
                        </ul>
                    </div>
                    <!-- END PAGE HEADER-->
                    <div class="col-xs-12 bg-white bg-font-white">
                        <div class="tabbable-line tabbable-full-width">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#tab_1" data-toggle="tab" aria-expanded="true">Fiche général</a>
                                </li>
                                <li class="">
                                    <a href="#tab_2" data-toggle="tab" aria-expanded="false">Modifier informations</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_1">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <ul class="list-unstyled profile-nav">
                                                <li>
                                                    <img src="../img/avatar.jpg" class="img-responsive img-thumbnail" width="600" height="600" alt="Nom de l'établissement">
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <h3 class="font-green sbold uppercase">Ecole A</h3>
                                                    <address><span class="bold">Adresse de l'établissement</span> : SICAP BAOBAB</address>
                                                    <p><span class="bold">Ville de l'établissement</span> : DAKAR</p>
                                                    <p><span class="bold">Siret de l'établissement</span> : 00000</p>
                                                    <legend>Responsable de l'établissement</legend>
                                                    <p class="bold">Mme. LAM Hawa</p>
                                                    <p><span class="bold">Téléphone</span> : 0123456789</p>
                                                    <p><span class="bold">Année scolaire en cours</span> : 2016/2017</p>
                                                </div>
                                            </div>
                                            <!--end row-->
                                        </div>
                                    </div>
                                </div>
                                <!--tab_1_2-->
                                <div class="tab-pane" id="tab_2">
                                    <div class="row profile-account">
                                        <div class="col-md-3">
                                            <ul class="ver-inline-menu tabbable margin-bottom-10">
                                                <li class="active">
                                                    <a data-toggle="tab" href="#tab_2-1" aria-expanded="false"><i class="fa fa-cog"></i>Informations de l'établissement</a>
                                                    <span class="after"></span>
                                                </li>
                                                <li class="">
                                                    <a data-toggle="tab" href="#tab_2-2" aria-expanded="false"><i class="fa fa-user"></i>Responsable de l'établissement</a>
                                                </li>
                                                <li class="">
                                                    <a data-toggle="tab" href="#tab_2-3" aria-expanded="false"><i class="fa fa-picture-o"></i>Changer le logo d'établissement</a>
                                                </li>
                                                <li class="">
                                                    <a data-toggle="tab" href="#tab_2-4" aria-expanded="false"><i class="fa fa-calendar"></i>Année scolaire</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="tab-content">
                                                <div id="tab_2-1" class="tab-pane active">
                                                    <form role="form" action="undefined" method="post">
                                                        <div style="display:none;"><input type="hidden" name="_method" value="POST"></div>
                                                        <div class="form-body">
                                                            <div class="form-group form-md-line-input form-md-floating-label">
                                                                <input type="text" class="form-control edited" name="nom" required="required" id="nom" value="Ecole A">
                                                                <label for="nom">Nom de l'établissement*</label>
                                                            </div>
                                                            <div class="form-group form-md-line-input form-md-floating-label">
                                                                <textarea class="form-control" name="adresseetablissement" id="adresseetablissement" required="required" rows="4">Adresse bidon</textarea>
                                                                <label for="adresseetablissement">Adresse de l'établissement*</label>
                                                            </div>
                                                            <div class="form-group form-md-line-input form-md-floating-label">
                                                                <input type="text" class="form-control edited" name="adresseville" required="required" id="adresseville" value="Ville bidon">
                                                                <label for="adresseville">Ville de l'établissement*</label>
                                                            </div>
                                                            <div class="form-group form-md-line-input form-md-floating-label">
                                                                <input type="text" class="form-control edited" name="siret" required="required" id="siret" value="0000">
                                                                <label for="siret">Siret*</label>
                                                            </div>
                                                        </div>
                                                        <div class="form-actions noborder">
                                                            <button type="submit" class="btn green">Enregistrer</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div id="tab_2-2" class="tab-pane">
                                                    <form role="form" action="undefined" method="post">
                                                        <div style="display:none;"><input type="hidden" name="_method" value="POST"></div>
                                                        <div class="form-body">
                                                            <div class="form-group form-md-line-input form-md-floating-label">
                                                                <select class="form-control" name="civilite" required="required" id="civilite">
                                                                    <option value="M">M</option>
                                                                    <option value="Mme" selected>Mme</option>
                                                                    <option value="Mlle">Mlle</option>
                                                                </select>
                                                                <label for="civilite">Civilité*</label>
                                                            </div>
                                                            <div class="form-group form-md-line-input form-md-floating-label">
                                                                <input type="text" class="form-control edited" name="nom_directeur" required="required" id="nom_directeur" value="LAM">
                                                                <label for="nom_directeur">Nom*</label>
                                                            </div>
                                                            <div class="form-group form-md-line-input form-md-floating-label">
                                                                <input type="text" class="form-control edited" name="pnom_directeur" required="required" id="pnom_directeur" value="Hawa">
                                                                <label for="pnom_directeur">Prénom*</label>
                                                            </div>
                                                            <div class="form-group form-md-line-input form-md-floating-label">
                                                                <input type="tel" class="form-control" name="phoneeta" id="phoneeta">
                                                                <label for="phoneeta">Téléphone</label>
                                                            </div>
                                                            <div class="form-group form-md-line-input form-md-floating-label ">
                                                                <input type="email" class="form-control edited" name="emaileta" required="required" id="emaileta" value="test@gmail.com">
                                                                <label for="emaileta">Email*</label>
                                                            </div>
                                                        </div>
                                                        <div class="form-actions noborder">
                                                            <button type="submit" class="btn green">Enregistrer</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div id="tab_2-3" class="tab-pane">
                                                    <form action="undefined" role="form" enctype="multipart/form-data">
                                                        <div class="form-group">
                                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                                    <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="">
                                                                </div>
                                                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                                                                <div>
                                                                    <span class="btn default btn-file">
                                                                        <span class="fileinput-new">Sélectionnez une image</span>
                                                                        <span class="fileinput-exists">Changer d'image</span>
                                                                        <input type="file" name="photo" required="required" accept="image/*">
                                                                    </span>
                                                                    <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput">Supprimer</a>
                                                                </div>
                                                            </div>
                                                            <div class="clearfix margin-top-10">
                                                                <span class="label label-danger margin-right-10">NOTE!</span>
                                                                <span>La prévisualisation de l'image est prise en charge par les dernières versions de Firefox, Chrome, Opera, Safari et Internet Explorer 10 uniquement</span>
                                                            </div>
                                                        </div>
                                                        <div class="margin-top-10">
                                                            <button type="submit" class="btn green">Enregistrer</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div id="tab_2-4" class="tab-pane">
                                                    <form role="form" action="undefined" method="post">
                                                        <div style="display:none;"><input type="hidden" name="_method" value="POST"></div>
                                                        <div class="form-body">
                                                            <div class="form-group form-md-line-input form-md-floating-label">
                                                                <select class="form-control edited" name="anscol" required="required" id="anscol">
                                                                    <option value="2016/2017" selected>2016/2017</option>
                                                                    <option value="2017/2018">2017/2018</option>
                                                                    <option value="2018/2019">2018/2019</option>
                                                                    <option value="2019/2020">2019/2020</option>
                                                                </select>
                                                                <label for="anscol">Année scolaire en cours*</label>
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
            <script src="../js/plugins/bootstrap-fileinput.js" type="text/javascript"></script>
            <!------------------------- FIN DES JS DES PLUGINS A RECUPERER ------------------------>


            <script src="../js/global/app.min.js" type="text/javascript"></script>
            <script src="../js/global/layout.min.js" type="text/javascript"></script>
            <script src="../js/main.js" type="text/javascript"></script>
        </div>
    </body>
</html>