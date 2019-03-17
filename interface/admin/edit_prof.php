<!DOCTYPE html>
<!--[if IE 8]> <html lang="fr" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="fr" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="fr">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8">
        <title>Admin | Editer un professeur</title>
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
        <link href="../css/plugins/multi-select.css" rel="stylesheet" type="text/css">
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
                    <h1 class="page-title font-green"> Admin
                        <small class="font-green">Editer un professeur</small>
                    </h1>
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
                                <a class="font-green" href="profs.php">Gestion du personnel</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <?php $exampleData = ['id' => 1, 'civilite' => 'M', 'nomprof' => 'Bidon']; ?>
                                <a class="font-green" href="edit_prof.php?id=<?php echo $exampleData['id']; ?>">Editer <?php echo $exampleData['civilite'].'. '.$exampleData['nomprof']; ?></a>
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
                                    <p>Il est possible de cliquer sur le label d'une étape, pour sélectionner toutes les matières de cette dernière.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="portlet light ">
                                <div class="portlet-title">
                                    <div class="caption font-green">
                                        <i class="fa fa-edit font-green"></i>
                                        <span class="caption-subject bold uppercase"> Editer <?php echo $exampleData['civilite'].'. '.$exampleData['nomprof']; ?></span>
                                    </div>
                                </div>
                                <div class="portlet-body form">
                                    <div class="row">
                                        <div class="col-xs-12 col-md-8 col-md-offset-2">
                                            <form role="form" enctype="multipart/form-data" action="undefined" method="post">
                                                <div style="display:none;"><input type="hidden" name="_method" value="POST"></div>
                                                <div class="form-body">
                                                    <legend>1. Coordonnées</legend>
                                                    <div class="row margin-bottom-25">
                                                        <div class="col-xs-12 col-sm-4 col-sm-offset-4 col-lg-2 col-lg-offset-5">
                                                            <img class="img-responsive center-block img-thumbnail" src="../img/avatar.jpg">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <div class="form-group form-md-line-input form-md-floating-label">
                                                                <select class="form-control" required="required" name="civilite" id="civilite">
                                                                    <option value=""></option>
                                                                    <option value="M" selected="selected">M</option>
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
                                                                    <option value="A">A</option>
                                                                    <option value="B" selected="selected">B</option>
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
                                                                    <option value="10 à 20 ans">10 à 20 ans</option>
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
                                                                <input type="text" class="form-control" name="pnom_prof" required="required" id="pnom_prof" value="Prenom_prof">
                                                                <label for="pnom_prof">Prénom*</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-md-3">
                                                            <div class="form-group form-md-line-input form-md-floating-label">
                                                                <input type="text" class="form-control" name="nom_prof" required="required" id="nom_prof" value="Bidon">
                                                                <label for="nom_prof">Nom*</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-md-3">
                                                            <div class="form-group form-md-line-input form-md-floating-label ">
                                                                <input type="text" class="form-control date-mask"  name="date_naissance" required="required" id="date_naissance" value="02/03/1980">
                                                                <label for="date_naissance">Date de naissance*</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-md-3">
                                                            <div class="form-group form-md-line-input form-md-floating-label">
                                                                <input type="text" class="form-control" name="lieu_naissance" required="required" id="lieu_naissance" value="Ville bidon">
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
                                                                <input type="email" class="form-control" name="emailprof" required="required" id="emailprof" value="test@gmail.com">
                                                                <label for="emailprof">Email*</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group form-md-line-input form-md-floating-label">
                                                                <input type="tel" class="form-control" name="phoneprof" id="phoneprof">
                                                                <label for="phoneprof">Téléphone</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6 col-md-3">
                                                            <div class="form-group form-md-line-input form-md-floating-label">
                                                                <select class="form-control" name="sitmat" id="sitmat">
                                                                    <option value=""></option>
                                                                    <option value="marie">Marié(e)</option>
                                                                    <option value="celibataire" selected="selected">Célibataire</option>
                                                                    <option value="divorce">Divorcé(e)</option>
                                                                </select>
                                                                <label for="sitmat">Situation matrimoniale</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-md-3">
                                                            <div class="form-group form-md-line-input form-md-floating-label">
                                                                <input type="number" min="0" max="25" name="nbrenf" class="form-control" id="nbrenf" value="2">
                                                                <label for="nbrenf">Nbr. d'enfant(s)</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-md-3">
                                                            <div class="form-group form-md-line-input form-md-floating-label">
                                                                <input type="text" class="form-control" name="ecorg" id="ecorg">
                                                                <label for="ecorg">Etablissement d'origine</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-md-3">
                                                            <div class="form-group form-md-line-input form-md-floating-label">
                                                                <select class="form-control" name="tuva" id="tuva">
                                                                    <option value=""></option>
                                                                    <option value="titulaire">Titulaire</option>
                                                                    <option value="vacataire" selected="selected">Vacataire</option>
                                                                </select>
                                                                <label for="tuva">Statut</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- ------------ Ancienne version du champ photo -------------------------
                                                    --------------- A supprimer si la nouvelle version vous satisfait.-----------
                                                    <div class="form-group form-md-line-input form-md-floating-label">
                                                        <input type="hidden" name="MAX_FILE_SIZE" value="100000000000">
                                                        <input type="file" class="form-control edited" name="photo" id="photo" accept="image/*">
                                                        <label for="photo">Photo</label>
                                                    </div> -->
                                                    <div class="form-group">
                                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                                <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="">
                                                            </div>
                                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                                                            <div>
                                                                    <span class="btn default btn-file">
                                                                        <span class="fileinput-new">Sélectionnez une photo</span>
                                                                        <span class="fileinput-exists">Changer de photo</span>
                                                                        <input type="file" name="photo" id="photo" accept="image/*">
                                                                    </span>
                                                                <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput">Supprimer</a>
                                                            </div>
                                                        </div>
                                                        <div class="clearfix margin-top-10">
                                                            <span class="label label-danger margin-right-10">NOTE!</span>
                                                            <span>La prévisualisation de l'image est prise en charge par les dernières versions de Firefox, Chrome, Opera, Safari et Internet Explorer 10 uniquement</span>
                                                        </div>
                                                    </div>
                                                    <legend>2. Domaine Exp.</legend>
                                                    <div>
                                                        <p>Sélectionnez les matières et les classes du professeur</p>
                                                        <select title="Matières" class="form-control" multiple="multiple" name="matieres[]" id="matieres">
                                                            <optgroup label="1ére étape">
                                                                <option value="1">Matière 1</option>
                                                                <option value="2">Matière 2</option>
                                                                <option value="3">Matière 3</option>
                                                            </optgroup>
                                                            <optgroup label="2éme étape">
                                                                <option value="4">Matière 4</option>
                                                                <option value="5">Matière 5</option>
                                                                <option value="6">Matière 6</option>
                                                                <option value="7">Matière 7</option>
                                                                <option value="8">Matière 8</option>
                                                            </optgroup>
                                                            <optgroup label="3éme étape">
                                                                <option value="9" selected="selected">Matière 9</option>
                                                                <option value="10" selected="selected">Matière 10</option>
                                                            </optgroup>
                                                        </select>
                                                        <select title="Classes" class="form-control" multiple="multiple" name="classes[]" id="classes">
                                                            <option value="1" selected="selected">SECONDE A</option>
                                                            <option value="2">SECONDE B</option>
                                                            <option value="3">SECONDE C</option>
                                                            <option value="4" selected="selected">TLE A</option>
                                                            <option value="5">TLE B</option>
                                                        </select>
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
            <script src="../js/plugins/jquery.multi-select.js" type="text/javascript"></script>
            <script src="../js/plugins/jquery.inputmask.bundle.min.js" type="text/javascript"></script>
            <script src="../js/plugins/bootstrap-fileinput.js" type="text/javascript"></script>
            <!------------------------- FIN DES JS DES PLUGINS A RECUPERER ------------------------>


            <script src="../js/global/app.min.js" type="text/javascript"></script>
            <script src="../js/global/layout.min.js" type="text/javascript"></script>
            <script src="../js/main.js" type="text/javascript"></script>


            <!-- ***************************************************************************** -->
            <!---------------------------- JS SPECIFIQUES A RECUPERER --------------------------->
            <!-- ***************************************************************************** -->
            <script src="../js/admin/admin_features_form_prof.js" type="text/javascript"></script>
            <!----------------------- FIN DES JS SPECIFIQUES A RECUPERER ----------------------->


        </div>
    </body>
</html>