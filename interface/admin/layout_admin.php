<!DOCTYPE html>
<!--[if IE 8]> <html lang="fr" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="fr" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="fr">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8">
        <title>Admin | <?php echo 'TITRE DE LA PAGE'; ?></title> <!-- A LA PLACE DU PHP, METTRE LE TITRE DE LA PAGE -->
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
        <!---------------------------------- SECTION POUR LES CSS DES PLUGINS DE LA PAGE --------------------------------------------->
        <!-- METTRE LES DECLARATIONS DES CSS PLUGINS -->
        <!--***************************** FIN DE SECTION POUR LES CSS DES PLUGINS DE LA PAGE ****************************************-->
        <link href="../css/global/components.min.css" rel="stylesheet" type="text/css">
        <link href="../css/global/plugins.min.css" rel="stylesheet" type="text/css">
        <link href="../css/global/layout.min.css" rel="stylesheet" type="text/css">
        <link href="../css/global/green.min.css" rel="stylesheet" type="text/css">
        <link href="../css/main.css" rel="stylesheet" type="text/css">
        <!---------------------------------- SECTION POUR LES CSS SPECIFIQUES DE LA PAGE --------------------------------------------->
        <!--METTRE LES DECLARATIONS DES CSS SPECIFIQUES -->
        <!--***************************** FIN DE SECTION POUR LES CSS SPECIFIQUES DE LA PAGE ***************************************-->
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
                <!---------- TOP ACTIONS (MENU UTILISATEUR EN HAUT A DROITE) ----------->
                <!-- BEGIN PAGE TOP -->
                <div class="page-top text-center">
                    <h1 class="interface_title">Plateforme de Gestion D'établissement</h1>
                    <!-- BEGIN TOP NAVIGATION MENU -->
                    <div class="top-menu">
                        <ul class="nav navbar-nav pull-right">
                            <!-- BEGIN USER LOGIN DROPDOWN -->
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                            <li class="dropdown dropdown-user">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <img alt="" class="img-circle" src="../img/avatar3_small.jpg">
                                    <span class="username username-hide-on-mobile"> Nick </span>
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-default">
                                    <li>
                                        <a href="undefined">
                                            <i class="icon-user"></i> Mon compte </a>
                                    </li>
                                    <li>
                                        <a href="undefined">
                                            <i class="icon-list"></i> Actions effectuées </a>
                                    </li>
                                    <li>
                                        <a href="undefined">
                                            <i class="icon-home"></i> Établissement </a>
                                    </li>
                                    <li class="divider"> </li>
                                    <li>
                                        <a href="undefined">
                                            <i class="icon-key"></i> Déconnexion </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- END USER LOGIN DROPDOWN -->
                        </ul>
                    </div>
                    <!-- END TOP NAVIGATION MENU -->
                </div>
                <!-- END PAGE TOP -->
                <!--****** FIN TOP ACTIONS (MENU UTILISATEUR EN HAUT A DROITE) *******-->
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
                    <!-------------------------------- MENU PRINCIPAL ---------------------------------->
                    <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                    <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                    <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                    <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                    <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                    <ul class="page-sidebar-menu  page-header-fixed" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                        <li class="nav-item start active">
                            <a href="home.php" class="nav-link">
                                <i class="icon-home"></i>
                                <span class="title">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="emploi_temps.php" class="nav-link ">
                                <i class="fa fa-calendar"></i>
                                <span class="title">Emploi du temps</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="classes.php" class="nav-link nav-toggle">
                                <i class="icon-users"></i>
                                <span class="title">Gestion Classe</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item">
                                    <a href="add_classe.php" class="nav-link ">
                                        <span class="title">Créer une classe</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="classes.php" class="nav-link ">
                                        <span class="title">Liste des classes</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="assoc_class_matiere.php" class="nav-link ">
                                        <span class="title">Associer des matières</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="salles.php" class="nav-link nav-toggle">
                                <i class="icon-grid"></i>
                                <span class="title">Gestion Salle</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item">
                                    <a href="add_salle.php" class="nav-link ">
                                        <span class="title">Créer une salle</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="salles.php" class="nav-link ">
                                        <span class="title">Liste des salles</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="matieres.php" class="nav-link nav-toggle">
                                <i class="icon-book-open"></i>
                                <span class="title">Gestion Matière</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item">
                                    <a href="add_matiere.php" class="nav-link ">
                                        <span class="title">Créer une matière</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="matieres.php" class="nav-link ">
                                        <span class="title">Liste des matières</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="profs.php" class="nav-link nav-toggle">
                                <i class="icon-briefcase"></i>
                                <span class="title">Gestion Personnel</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item">
                                    <a href="add_prof.php" class="nav-link ">
                                        <span class="title">Ajouter un professeur</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="profs.php" class="nav-link ">
                                        <span class="title">Liste des professeurs</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="eleves.php" class="nav-link nav-toggle">
                                <i class="icon-graduation"></i>
                                <span class="title">Gestion Élèves</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item">
                                    <a href="eleves.php" class="nav-link ">
                                        <span class="title">Afficher les élèves</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="undefined" class="nav-link ">
                                        <span class="title">Dossier scolaire</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="absents.php" class="nav-link ">
                                        <span class="title">Liste des absents</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="carnet_note.php" class="nav-link nav-toggle">
                                <i class="icon-notebook"></i>
                                <span class="title">Gestion Notes</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item">
                                    <a href="add_note.php" class="nav-link ">
                                        <span class="title">Ajouter des notes</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="edit_note.php" class="nav-link ">
                                        <span class="title">Modifier des notes</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="carnet_note.php" class="nav-link ">
                                        <span class="title">Carnet de note</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="eleve_moyennes.php" class="nav-link ">
                                        <span class="title">Liste des moyennes</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="heading">
                            <h3 class="uppercase font-green">Réglage interface</h3>
                        </li>
                        <li class="nav-item">
                            <a href="eleves.php" class="nav-link nav-toggle">
                                <i class="fa fa-puzzle-piece"></i>
                                <span class="title">Catégorie</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item">
                                    <a href="javascript:;" class="nav-link ">
                                        <span class="title">Ajouter une catégorie</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="javascript:;" class="nav-link ">
                                        <span class="title">Afficher les catégories</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="eleves.php" class="nav-link nav-toggle">
                                <i class="icon-layers"></i>
                                <span class="title">Cycle</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item">
                                    <a href="javascript:;" class="nav-link ">
                                        <span class="title">Ajouter un cycle</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="javascript:;" class="nav-link ">
                                        <span class="title">Afficher les cycles</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <!--**************************** FIN MENU PRINCIPAL ******************************-->
                    <!-- END SIDEBAR MENU -->
                </div>
                <!-- END SIDEBAR -->
            </div>
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!---------------------------------- SECTION POUR LE CONTENU DE LA PAGE --------------------------------------------->
                <?php echo 'METTRE LE CONTENU DE LA PAGE ICI'; ?> <!-- A LA PLACE DU PHP, METTRE LE CODE HTML DE LA PAGE -->
                <!--***************************** FIN DE SECTION POUR LE CONTENU DE LA PAGE ***************************************-->
            </div>
            <!-- END CONTENT -->
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <div class="page-footer">
            <!-- METTRE L'ANNEE ACTUELLE SOUS LE FORMAT YYYY (Par exemple: 2017) REMPLAER LE PHP PAR UNE FONCTION DE VOTRE SYSTEM -->
            <div class="page-footer-inner"> <?php echo date('Y'); ?> &copy; <img class="logo_footer" src="../img/logo-footer.png" width="200" height="200" alt="Logo DaaraSystem">Daarasystem - Solution de gestion d'établissement développé par Toubasoft Group SARL - <a href="http://daarasystem.com/">www.daarasystem.com</a> | Tous droits réservés
                <div class="scroll-to-top">
                    <i class="icon-arrow-up"></i>
                </div>
            </div>
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
            <!---------------------------------- SECTION POUR LES JS DES PLUGINS DE LA PAGE --------------------------------------------->
            <!-- METTRE LES DECLARATIONS DES JS PLUGINS -->
            <!--***************************** FIN DE SECTION POUR JS CSS DES PLUGINS DE LA PAGE ****************************************-->
            <!-- BEGIN THEME GLOBAL SCRIPTS -->
            <script src="../js/global/app.min.js" type="text/javascript"></script>
            <script src="../js/global/layout.min.js" type="text/javascript"></script>
            <script src="../js/main.js" type="text/javascript"></script>
            <!-- END THEME GLOBAL SCRIPTS -->
            <!---------------------------------- SECTION POUR LES JS SPECIFIQUES DE LA PAGE --------------------------------------------->
            <!-- METTRE LES DECLARATIONS DES JS SPECIFIQUES -->
            <!--***************************** FIN DE SECTION POUR LES JS SPECIFIQUES DE LA PAGE ***************************************-->
        </div>
    </body>
</html>