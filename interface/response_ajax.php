<?php

function jsonRender($array=array()){
    header('Content-type: text/json');
    header('Content-type: application/json');
    echo json_encode($array);
    die();
}

$dataPost = $_POST;
//Si les paramètres requis sont absents
if(!isset($dataPost['compte']) || empty($dataPost['compte']) || !isset($dataPost['action']) || empty($dataPost['action']))
    jsonRender(['success' => false]);

//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! COMPTE ADMIN !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if($dataPost['compte'] == 'admin'){
    //Selon l'action demandé
    switch($dataPost['action']){
        default:
            jsonRender(['success' => false]);
            break;
        //Le HTML du form pour ajouter/editer une matière
        case 'form_matiere':
            //Ajout
            if(!isset($dataPost['id']) || empty($dataPost['id']))
                $outHtml = '<div id="myModal" class="modal fade" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-green">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                <h4 class="modal-title font-white">Ajouter une matière</h4>
                            </div>
                            <form class="form_matiere" role="form" action="undefined" method="post">
                                <div class="modal-body">
                                    <div class="form-body">
                                        <div class="form-group form-md-line-input form-md-floating-label">
                                            <select class="form-control" required="required" name="etape" id="etape">
                                                <option value=""></option>
                                                <option value="1">1ére étape</option>
                                                <option value="2">2éme étape</option>
                                                <option value="3">3éme étape</option>
                                            </select>
                                            <label for="etape">Etape*</label>
                                        </div>
                                        <div class="form-group form-md-line-input form-md-floating-label">
                                            <input type="text" class="form-control" name="matiere" required="required" id="matiere">
                                            <label for="matiere">Matière*</label>
                                            <span class="help-block font-green">Exemple de message d\'information</span>
                                        </div>
                                        <div class="form-group form-md-line-input form-md-floating-label">
                                            <select class="form-control edited" name="notesur1" id="notesur1">
                                                <option value="" selected="selected">Aucune</option>
                                                <option value="10">10</option>
                                                <option value="16">16</option>
                                                <option value="24">24</option>
                                                <option value="40">40</option>
                                                <option value="60">60</option>
                                            </select>
                                            <label for="notesur1">Ressources</label>
                                        </div>
                                        <div class="form-group form-md-line-input form-md-floating-label">
                                            <select class="form-control edited" name="notesur2" id="notesur2">
                                                <option value="" selected="selected">Aucune</option>
                                                <option value="10">10</option>
                                                <option value="16">16</option>
                                                <option value="24">24</option>
                                                <option value="40">40</option>
                                                <option value="60">60</option>
                                            </select>
                                            <label for="notesur2">Compétences</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Annuler</button>
                                    <button type="submit" class="btn green mt-ladda-btn ladda-button" data-style="slide-left"><span class="ladda-label">Sauvegarder</span></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>';
            else    //Edition
                $outHtml = '<div id="myModal" class="modal fade" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-green">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                <h4 class="modal-title font-white">Modifier la matière</h4>
                            </div>
                            <form class="form_matiere" role="form" action="undefined" method="post">
                                <div class="modal-body">
                                    <div class="form-body">
                                        <input type="hidden" name="id" required="required" value="'.$dataPost['id'].'">
                                        <div class="form-group form-md-line-input form-md-floating-label">
                                            <select class="form-control edited" required="required" name="etape" id="etape">
                                                <option value=""></option>
                                                <option value="1">1ére étape</option>
                                                <option value="2" selected>2éme étape</option>
                                                <option value="3">3éme étape</option>
                                            </select>
                                            <label for="etape">Etape*</label>
                                        </div>
                                        <div class="form-group form-md-line-input form-md-floating-label">
                                            <input type="text" class="form-control edited" name="matiere" value="VALEUR TEST" required="required" id="matiere">
                                            <label for="matiere">Matière*</label>
                                            <span class="help-block font-green">Exemple de message d\'information</span>
                                        </div>
                                        <div class="form-group form-md-line-input form-md-floating-label">
                                            <select class="form-control edited" name="notesur1" id="notesur1">
                                                <option value="">Aucune</option>
                                                <option value="10">10</option>
                                                <option value="16">16</option>
                                                <option value="24" selected>24</option>
                                                <option value="40">40</option>
                                                <option value="60">60</option>
                                            </select>
                                            <label for="notesur1">Ressources</label>
                                        </div>
                                        <div class="form-group form-md-line-input form-md-floating-label">
                                            <select class="form-control edited" name="notesur2" id="notesur2">
                                                <option value="">Aucune</option>
                                                <option value="10" selected>10</option>
                                                <option value="16">16</option>
                                                <option value="24">24</option>
                                                <option value="40">40</option>
                                                <option value="60">60</option>
                                            </select>
                                            <label for="notesur2">Compétences</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Annuler</button>
                                    <button type="submit" class="btn green mt-ladda-btn ladda-button" data-style="slide-left"><span class="ladda-label">Sauvegarder</span></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>';

            jsonRender(['success' => true, 'html' => $outHtml]);
            break;
        //Le HTML du form pour ajouter/editer une classe
        case 'form_classe':
            //Ajout
            if(!isset($dataPost['id']) || empty($dataPost['id']))
                $outHtml = '<div id="myModal" class="modal fade" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-green">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                <h4 class="modal-title font-white">Ajouter une classe</h4>
                            </div>
                            <form class="form_classe" role="form" action="undefined" method="post">
                                <div class="modal-body">
                                    <div style="display:none;"><input type="hidden" name="_method" value="POST"></div>
                                    <input type="hidden" name="idlog" required="required" value="4">
                                    <input type="hidden" name="idinfo" required="required" value="1">
                                    <div class="form-body">
                                        <div class="form-group form-md-line-input form-md-floating-label">
                                            <input type="text" class="form-control" name="intituleclasse" required="required" id="intituleclasse">
                                            <label for="intituleclasse">Intitulé de la Classe*</label>
                                        </div>
                                        <div class="form-group form-md-line-input form-md-floating-label">
                                            <input type="number" min="1" max="100" required="required" name="effectif" class="form-control edited" id="effectif" value="1">
                                            <label for="effectif">Effectif*</label>
                                            <span class="help-block font-green">Au minimum 1</span>
                                        </div>
                                        <div class="form-group form-md-line-input form-md-floating-label">
                                            <select class="form-control" required="required" name="cycle" id="cycle">
                                                <option value=""></option>
                                                <option value="1">CRECHE</option>
                                                <option value="2">JARDIN</option>
                                                <option value="3">PRIMAIRE</option>
                                            </select>
                                            <label for="cycle">Cycle*</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Annuler</button>
                                    <button type="submit" class="btn green mt-ladda-btn ladda-button" data-style="slide-left"><span class="ladda-label">Sauvegarder</span></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>';
            else    //Edition
                $outHtml = '<div id="myModal" class="modal fade" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-green">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                <h4 class="modal-title font-white">Modifier la classe</h4>
                            </div>
                            <form class="form_classe" role="form" action="undefined" method="post">
                                <div class="modal-body">
                                    <div style="display:none;"><input type="hidden" name="_method" value="POST"></div>
                                    <input type="hidden" name="id" required="required" value="'.$dataPost['id'].'">
                                    <input type="hidden" name="idlog" required="required" value="4">
                                    <input type="hidden" name="idinfo" required="required" value="1">
                                    <div class="form-body">
                                        <div class="form-group form-md-line-input form-md-floating-label">
                                            <input type="text" class="form-control edited" value="valeur test" name="intituleclasse" required="required" id="intituleclasse">
                                            <label for="intituleclasse">Intitulé de la Classe*</label>
                                        </div>
                                        <div class="form-group form-md-line-input form-md-floating-label">
                                            <input type="number" min="1" max="100" required="required" name="effectif" class="form-control edited" id="effectif" value="1">
                                            <label for="effectif">Effectif*</label>
                                            <span class="help-block font-green">Au minimum 1</span>
                                        </div>
                                        <div class="form-group form-md-line-input form-md-floating-label">
                                            <select class="form-control edited" required="required" name="cycle" id="cycle">
                                                <option value=""></option>
                                                <option value="1" selected>CRECHE</option>
                                                <option value="2">JARDIN</option>
                                                <option value="3">PRIMAIRE</option>
                                            </select>
                                            <label for="cycle">Cycle*</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Annuler</button>
                                    <button type="submit" class="btn green mt-ladda-btn ladda-button" data-style="slide-left"><span class="ladda-label">Sauvegarder</span></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>';

            jsonRender(['success' => true, 'html' => $outHtml]);
            break;
        //Voir la fiche d'un élève
        case 'view_eleve':
            $outHtml = '<div id="myModal" class="modal fade" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-green">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title font-white">Fiche de l\'élève</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="portlet light portlet-fit ">
                                        <div class="portlet-body">
                                            <div class="row">
                                                <div class="col-sm-5 col-xs-12">
                                                    <div class="mt-element-card">
                                                        <div class="mt-card-item">
                                                            <div class="mt-card-avatar">
                                                                <img class="img-responsive" src="../img/avatar.jpg">
                                                            </div>
                                                            <div class="mt-card-content">
                                                                <h3 class="mt-card-name">M.Anthony Mark</h3>
                                                                <p class="mt-card-desc font-grey-mint">Classe 1</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-7">
                                                    <dl>
                                                        <dt class="margin-bottom-5">Matricule :</dt><dd>mat_1</dd>
                                                        <dt class="margin-bottom-5 margin-top-10">Date de naissance :</dt><dd>4 avril 1983</dd>
                                                        <dt class="margin-bottom-5 margin-top-10">Lieu de naissance :</dt><dd>Ville bidon</dd>
                                                        <dt class="margin-bottom-5 margin-top-10">Numéro extrait :</dt><dd>0</dd>
                                                        <dt class="margin-bottom-5 margin-top-10">Adresse</dt>
                                                        <dd>
                                                            <div class="well well-sm">
                                                                <address>Appt D105, 1 rue du bidon<br>33000 Bordeaux</address>
                                                            </div>
                                                        </dd>
                                                        <dt class="margin-bottom-5 margin-top-10">Téléphone :</dt><dd>0123456789</dd>
                                                        <dt class="margin-bottom-5 margin-top-10">Classe(s) doublée(s) :</dt>
                                                        <dd>Classe 2</dd>
                                                        <dd>Classe 3</dd>
                                                        <dt class="margin-bottom-5 margin-top-10">Prénom père :</dt><dd>Prenom_pere</dd>
                                                        <dt class="margin-bottom-5 margin-top-10">Fonction père :</dt><dd>Fonction_pere</dd>
                                                        <dt class="margin-bottom-5 margin-top-10">Prénom mère :</dt><dd>Prenom_mere</dd>
                                                        <dt class="margin-bottom-5 margin-top-10">Nom mère :</dt><dd>Nom_mere</dd>
                                                        <dt class="margin-bottom-5 margin-top-10">Téléphone contact :</dt><dd>0123456789</dd>
                                                    </dl>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn dark btn-outline" data-dismiss="modal">Fermer</button>
                        </div>
                    </div>
                </div>
            </div>';

            jsonRender(['success' => true, 'html' => $outHtml]);
            break;
        //Le rendu HTML du form pour bannir un élève
        case 'ban_eleve':
            $outHtml = '<div id="myModal" class="modal fade" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-green">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title font-white">Bannir un élève</h4>
                        </div>
                        <form class="form_eleve" role="form" action="undefined" method="post">
                            <div class="modal-body">
                                <div class="form-body">
                                    <input type="hidden" name="id" required="required" value="'.$dataPost['id'].'">
                                    <div class="form-group form-md-line-input form-md-floating-label">
                                        <div class="form-control form-control-static">Nom_A Prenom_A</div>
                                        <label>Nom</label>
                                    </div>
                                    <div class="form-group form-md-line-input form-md-floating-label">
                                        <textarea class="form-control" name="motif" id="motif" required="required" rows="4"></textarea>
                                        <label for="motif">Motif*</label>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Annuler</button>
                                <button type="submit" class="btn green mt-ladda-btn ladda-button" data-style="slide-left"><span class="ladda-label">Sauvegarder</span></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>';
            jsonRender(['success' => true, 'html' => $outHtml]);
            break;
        //Voir la fiche d'un prof
        case 'view_prof':
            $outHtml = '<div id="myModal" class="modal fade" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-green">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title font-white">Fiche du professeur</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="portlet light portlet-fit">
                                        <div class="portlet-body">
                                            <div class="row">
                                                <div class="col-sm-5 col-xs-12">
                                                    <div class="mt-element-card">
                                                        <div class="mt-card-item">
                                                            <div class="mt-card-avatar">
                                                                <img class="img-responsive" src="../img/avatar.jpg">
                                                            </div>
                                                            <div class="mt-card-content">
                                                                <h3 class="mt-card-name">M.Anthony Mark</h3>
                                                                <p class="mt-card-desc font-grey-mint">Titulaire</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-7">
                                                    <dl>
                                                        <dt class="margin-bottom-5">Email :</dt><dd>test@gmail.com</dd>
                                                        <dt class="margin-bottom-5 margin-top-10">Téléphone :</dt><dd>0123456789</dd>
                                                        <dt class="margin-bottom-5 margin-top-10">Adresse</dt>
                                                        <dd>
                                                            <div class="well well-sm">
                                                                <address>Appt D105, 1 rue du bidon<br>33000 Bordeaux
                                                                </address>
                                                            </div>
                                                        </dd>
                                                        <dt class="margin-bottom-5 margin-top-10">Date de naissance :</dt><dd>4 avril 1983</dd>
                                                        <dt class="margin-bottom-5 margin-top-10">Lieu de naissance :</dt><dd>Ville bidon</dd>
                                                        <dt class="margin-bottom-5 margin-top-10">Situation matrimoniale :</dt><dd>Célibataire</dd>
                                                        <dt class="margin-bottom-5 margin-top-10">Nombre d\'enfant(s) :</dt><dd>1</dd>
                                                        <dt class="margin-bottom-5 margin-top-10">Ecole d\'origine :</dt><dd>SOS DAKAR</dd>
                                                    </dl>
                                                    <div class="inline-block margin_r50">
                                                        <dl>
                                                            <dt class="margin-bottom-5">Classe(s) :</dt>
                                                            <dd>SECONDE A</dd>
                                                            <dd>SECONDE B</dd>
                                                            <dd>SECONDE C</dd>
                                                        </dl>
                                                    </div>
                                                    <div class="inline-block">
                                                        <dl>
                                                            <dt class="margin-bottom-5">Matière(s) :</dt>
                                                            <dd>Matière 1</dd>
                                                            <dd>Matière 2</dd>
                                                            <dd>Matière 3</dd>
                                                        </dl>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn dark btn-outline" data-dismiss="modal">Fermer</button>
                        </div>
                    </div>
                </div>
            </div>';
            jsonRender(['success' => true, 'html' => $outHtml]);
            break;
        //Voir les matières d'une classe
        case 'see_matieres':
            //Format des données attendu en retour
            $nameClasse = [1 => 'SECONDE A', 2 => 'SECONDE B', 3 => 'SECONDE C'];
            $dataMatiere = [
                1 => [
                    ['id' => 1, 'etape' => '1ére étape', 'matiere' => 'LECTURE', 'notesur1' => 'N/D', 'notesur2' => 'N/D'],
                    ['id' => 2, 'etape' => '1ére étape', 'matiere' => 'ECRITURE', 'notesur1' => 'N/D', 'notesur2' => 'N/D'],
                    ['id' => 3, 'etape' => '1ére étape', 'matiere' => 'ORTHOGRAPHE', 'notesur1' => 'N/D', 'notesur2' => 'N/D'],
                    ['id' => 4, 'etape' => '2éme étape', 'matiere' => 'ACTIVITES NUMERIQUES', 'notesur1' => 'N/D', 'notesur2' => 'N/D'],
                    ['id' => 5, 'etape' => '2éme étape', 'matiere' => 'GEOGRAPHIE', 'notesur1' => 'N/D', 'notesur2' => 'N/D'],
                    ['id' => 6, 'etape' => '2éme étape', 'matiere' => 'HISTOIRE', 'notesur1' => 24, 'notesur2' => 16],
                    ['id' => 7, 'etape' => '3éme étape', 'matiere' => 'ARABE', 'notesur1' => 40, 'notesur2' => 60],
                    ['id' => 8, 'etape' => '3éme étape', 'matiere' => 'EDUCATION ARTISTIQUE', 'notesur1' => 24, 'notesur2' => 16]
                ],
                2 => [],
                3 => [
                    ['id' => 9, 'etape' => '1ére étape', 'matiere' => 'SVT', 'notesur1' => 24, 'notesur2' => 16],
                    ['id' => 10, 'etape' => '2éme étape', 'matiere' => 'MATHS', 'notesur1' => 40, 'notesur2' => 60],
                    ['id' => 11, 'etape' => '2éme étape', 'matiere' => 'EPS', 'notesur1' => 'N/D', 'notesur2' => 'N/D'],
                    ['id' => 12, 'etape' => '3éme étape', 'matiere' => 'EDD', 'notesur1' => 24, 'notesur2' => 16],
                    ['id' => 13, 'etape' => '3éme étape', 'matiere' => 'LANGAGE', 'notesur1' => 40, 'notesur2' => 60]
                ]
            ];
            jsonRender(['success' => true, 'nameClasse' => $nameClasse[$dataPost['id']], 'dataMatiere' => $dataMatiere[$dataPost['id']]]);
            break;
        //Voir les profs d'une matière
        case 'profs_matiere':
            $outHtml = '<div id="myModal" class="modal fade" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-green">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title font-white">Voir les professeurs de la matière</h4>
                        </div>
                        <div class="modal-body">
                            <table class="table table-striped table-hover table-bordered">
                                <thead>
                                <tr>
                                    <th> Prenom</th>
                                    <th> Nom</th>
                                    <th> Grade</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Prenom 2</td>
                                    <td>Nom 2</td>
                                    <td>A</td>
                                </tr>
                                <tr>
                                    <td>Prenom 3</td>
                                    <td>Nom 3</td>
                                    <td>B</td>
                                </tr>
                                <tr>
                                    <td>Prenom 4</td>
                                    <td>Nom 4</td>
                                    <td>N/D</td>
                                </tr>
                                <tr>
                                    <td>Prenom 5</td>
                                    <td>Nom 5</td>
                                    <td>N/D</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn dark btn-outline" data-dismiss="modal">Fermer</button>
                        </div>
                    </div>
                </div>
            </div>';
            jsonRender(['success' => true, 'html' => $outHtml]);
            break;
        //Test pour le submit du form classe (Ajout/Edition d'une classe)
        case 'submit_form_classe':
            //HTML de la colonne Actions
            $htmlActions ='<div class="btn-group">
                <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                    <i class="icon-settings"></i> Actions <i class="fa fa-angle-down"></i>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li>
                        <a href="eleves.php?classe=2"> <i class="icon-magnifier"></i> Voir la classe</a>
                    </li>
                    <li>
                        <a href="see_matieres.php?id=51"> <i class="icon-magnifier"></i> Les matières de la classe</a>
                    </li>
                    <li>
                        <a href="javascript:;" class="editing"> <i class="fa fa-edit"></i> Modifier la classe</a>
                    </li>
                </ul>
                <a href="javascript:;" class="btn btn-xs red delete" data-toggle="confirmation" data-placement="left" data-original-title="Êtes-vous sûr ?" data-singleton="true"><i class="icon-trash"></i> Supprimer</a>
            </div>';
            //on decode et on met en array
            $dataPost['data'] = json_decode($dataPost['data'], true);
            //C'est un ajout
            if(!isset($dataPost['data']['id']) || empty($dataPost['data']['id'])){

                $idItem = $dataPost['idTestAdd'];
                $addId = $dataPost['idTestAdd'] + 1;
            }else{  //C'est une édition

                $idItem = $dataPost['data']['id'];
                $addId = $dataPost['idTestAdd'];
            }
            //La var qui va contenir les valeurs de chaque colonne du tableau
            $row = [
                '',
                '<a href="eleves.php?classe=2" class="text-uppercase">'.$dataPost['data']['intituleclasse'].'</a>',     //Pensez à mettre l'id de la classe dans href
                'Cycle '.$dataPost['data']['cycle'],    //Bien sûr renvoyer le label, pas l'id
                $dataPost['data']['effectif'],
                $htmlActions
            ];

            jsonRender(['success' => true, 'id' => $idItem, 'row' => $row, 'idClassTest' => $addId]);
            break;
        //Test pour le submit du form matiere (Ajout/Edition d'une matière)
        case 'submit_form_matiere':
            //HTML de la colonne Actions
            $htmlActions ='<a href="javascript:;" class="btn btn-xs yellow-gold edit"><i class="fa fa-edit"></i> Modifier</a>
            <a href="javascript:;" class="btn btn-xs red delete" data-toggle="confirmation" data-placement="left" data-original-title="Êtes-vous sûr ?" data-singleton="true"><i class="icon-trash"></i> Supprimer</a>';
            //on decode et on met en array
            $dataPost['data'] = json_decode($dataPost['data'], true);
            //La var qui va contenir les valeurs de chaque colonne du tableau
            $row = [
                $dataPost['data']['etape'].($dataPost['data']['etape'] == 1 ?'ére':'éme').' étape', //Bien sûr, renvoyer le label directement, pas l'id
                $dataPost['data']['matiere'],
                $dataPost['data']['notesur1'],
                $dataPost['data']['notesur2'],
                $htmlActions
            ];
            //C'est un ajout
            if(!isset($dataPost['data']['id']) || empty($dataPost['data']['id'])){
                $idItem = $dataPost['idTestAdd'];
                $addId = $dataPost['idTestAdd'] + 1;
            }else{  //C'est une édition
                $idItem = $dataPost['data']['id'];
                $addId = $dataPost['idTestAdd'];
            }

            jsonRender(['success' => true, 'id' => $idItem, 'row' => $row, 'idMatiereTest' => $addId]);
            break;
        //Test pour le submit du form salle (Ajout/Edition d'une salle)
        case 'submit_form_salle':
            //HTML de la colonne Actions
            $htmlActions ='<div class="btn_actions">
                <a href="javascript:;" class="btn btn-xs yellow-gold edit"><i class="fa fa-edit"></i> Modifier</a>
                <a href="javascript:;" class="btn btn-xs red delete" data-toggle="confirmation" data-placement="left" data-original-title="Êtes-vous sûr ?" data-singleton="true"><i class="icon-trash"></i> Supprimer</a>
            </div>
            <div class="btn_confirmation">
                <a href="javascript:;" class="btn btn-icon-only green save mt-ladda-btn ladda-button" data-style="slide-left"><span class="ladda-label"><i class="icon-check"></i></span></a>
                <a href="javascript:;" class="btn btn-icon-only red cancel"><i class="icon-close"></i></a>
            </div>';
            //on decode et on met en array
            $dataPost['data'] = json_decode($dataPost['data'], true);
            //La var qui va contenir les valeurs de chaque colonne du tableau
            $row = [
                $dataPost['data']['nomsalle'],
                $dataPost['data']['effsalle'],
                $htmlActions
            ];
            //C'est un ajout
            if(!isset($dataPost['data']['id']) || empty($dataPost['data']['id'])){
                $idItem = $dataPost['idTestAdd'];
                $addId = $dataPost['idTestAdd'] + 1;
            }else{  //C'est une édition
                $idItem = $dataPost['data']['id'];
                $addId = $dataPost['idTestAdd'];
            }

            jsonRender(['success' => true, 'id' => $idItem, 'row' => $row, 'idSalleTest' => $addId]);
            break;
        //Le HTML du form pour ajouter/editer un event sur le calendrier
        case 'form_calendar':
            $outHtml = '<div id="myModal" class="modal fade" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-green">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title font-white">Détails de la plage horaire</h4>
                        </div>
                        <form class="form_calendar" role="form" action="javascript:;" method="post">
                            <div class="modal-body">
                                <div class="form-body">
                                    <input type="hidden" name="id" id="id" required="required" value="-1">
                                    <input type="hidden" name="id_classe" id="id_classe" required="required" value="-1">
                                    <input type="hidden" name="start" id="start" required="required" value="-1">
                                    <input type="hidden" name="end" id="end" required="required" value="-1">
                                    <div class="form-group form-md-line-input form-md-floating-label">
                                        <select title="Matière" class="form-control edited" name="matiere" id="matiere">
                                            <option value="">Sélectionnez une matière</option>
                                            <option value="1">Matière 1</option>
                                            <option value="2">Matière 2</option>
                                            <option value="3">Matière 3</option>
                                            <option value="4">Pause déjeuner</option>
                                            <option value="5">Vacances</option>
                                        </select>
                                    </div>
                                    <div class="form-group form-md-line-input form-md-floating-label">
                                        <select title="Professeur" class="form-control edited" name="professeur" id="professeur">
                                            <option value="">Sélectionnez un professeur</option>
                                            <option value="1">Professeur 1</option>
                                            <option value="2">Professeur 2</option>
                                            <option value="3">Professeur 3</option>
                                        </select>
                                    </div>
                                    <div class="form-group form-md-line-input form-md-floating-label">
                                        <select title="Salle" class="form-control edited" name="salle" id="salle">
                                            <option value="">Sélectionnez une salle</option>
                                            <option value="1">Salle 1</option>
                                            <option value="2">Salle 2</option>
                                            <option value="3">Salle 3</option>
                                        </select>
                                    </div>
                                    <div class="form-group form-md-line-input form-md-floating-label">
                                        <textarea class="form-control edited" name="info" id="info" rows="4"></textarea>
                                        <label for="info">Informations supplémentaires</label>
                                        <span class="help-block font-green">Par exemple : "Groupe A"</span>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Annuler</button>
                                <button type="submit" class="btn green mt-ladda-btn ladda-button" data-style="slide-left"><span class="ladda-label">Sauvegarder</span></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>';

            jsonRender(['success' => true, 'html' => $outHtml]);
            break;
        //Test pour le submit du form calendar (Ajout/Edition d'un event)
        case 'submit_form_calendar':
            //------Pour la version test--------------------
            $label = [
                'matiere' => [1 => 'Matière 1', 2 => 'Matière 2', 3 => 'Matière 3', 4 => 'Pause déjeuner', 5 => 'Vacances'],
                'professeur' => [1 => 'Professeur 1', 2 => 'Professeur 2', 3 => 'Professeur 3'],
                'salle' => [1 => 'Salle 1', 2 => 'Salle 2', 3 => 'Salle 3']
            ];
            //----------------------------------------------
            //on decode et on met en array
            $dataPost['data'] = json_decode($dataPost['data'], true);

            //C'est un ajout
            if($dataPost['data']['id'] == -1){
                $idItem = $dataPost['idTestAdd'];
                $addId = $dataPost['idTestAdd'] + 1;
            }else{  //C'est une édition
                $idItem = $dataPost['data']['id'];
                $addId = $dataPost['idTestAdd'];
            }

            //On génère la partie info de l'event
            $desc = '';
            //Les champs qui peuvent remplir la description
            $useIndex = ['professeur', 'salle', 'info'];
            //Pour chaque champs
            foreach($useIndex as $v){
                //Pas de valeur, on passe
                if(!empty($v)){
                    //Est-ce qu'il faut récupérer un label ?
                    if(isset($label[$v]))
                        $desc.= (empty($desc)?'':'<br/>').$label[$v][$dataPost['data'][$v]];
                    else //Sinon la valeur directe
                        $desc.= (empty($desc)?'':'<br/>').$dataPost['data'][$v];
                }
            }

            //Les données de l'event
            $event = [
                //----Données nécessaires pour l'event (necessaire au plugin)--
                'id'            => $idItem,
                'title'         => (empty($dataPost['data']['matiere'])?'':$label['matiere'][$dataPost['data']['matiere']]), //Renvoyer le label de la matière
                'start'         => $dataPost['data']['start'],  //Date de début, garder le format de date du plugin est hautement recommandé par l'auteur du plugin
                'end'           => $dataPost['data']['end'],  //Date de début, garder le format de date du plugin est hautement recommandé par l'auteur du plugin
                'color'         => (in_array($dataPost['data']['matiere'], [4,5])?'#3b3b3b':''), //Possibilité de modifier la couleur de l'event. Dans cet exemple, pour "Pause déjeuner" et "Vacances", la couleur est gris. Voir la doc, pour voir les possibilités de changement de couleur
                'description'   => $desc,  //Description de l'event (Prof, salle, info)
                //--------------------------------------
                //-----Données en cas de modification (non neccesaires au plugin)----
                'id_classe'     => $dataPost['data']['id_classe'],
                'matiere'       => $dataPost['data']['matiere'], //C'est ici, qu'on stocke l'id de la matière
                'professeur'    => $dataPost['data']['professeur'],
                'salle'         => $dataPost['data']['salle'],
                'info'          => $dataPost['data']['info']
                //---------------------------------------
            ];

            jsonRender(['success' => true, 'event' => $event, 'idEventTest' => $addId]);
            break;
        //Voir un event
        case 'view_calendar':
            $outHtml = '<div id="myModal" class="modal fade" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-green">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title font-white">Détails de la plage horaire</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="portlet light portlet-fit">
                                        <div class="portlet-body">
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <dl class="text-center">
                                                        <dt class="margin-bottom-5 margin-right-10 inline-block">Date :</dt><dd id="date_event" class="inline-block">N/D</dd>
                                                        <dt class="margin-bottom-5 margin-top-10"></dt><dd id="title_event" class="bold">N/D</dd>
                                                        <dt class="margin-bottom-5 margin-top-30">Informations supplémentaires</dt><dd id="desc_event">N/D</dd>
                                                    </dl>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn dark btn-outline" data-dismiss="modal">Fermer</button>
                        </div>
                    </div>
                </div>
            </div>';
            jsonRender(['success' => true, 'html' => $outHtml]);
            break;
        //Les évènements du calendrier pour le test
        case 'event_calendar':
            //Pour le test, events sur le mois en cours
            $currentMonth = date('m');
            $allEvents = [
                ['id' => 1, 'title' => 'Matière 1', 'start' => '2017-'.$currentMonth.'-01T10:00:00', 'end' => '2017-'.$currentMonth.'-01T12:00:00', 'description' => 'Professeur 1<br/>Salle 1', 'id_classe' => 1, 'matiere' => 1, 'professeur' => 1, 'salle' => 1, 'info' => ''],
                ['id' => 2, 'title' => 'Pause déjeuner', 'start' => '2017-'.$currentMonth.'-01T12:00:00', 'end' => '2017-'.$currentMonth.'-01T13:30:00', 'description' => '', 'color' => '#3b3b3b', 'id_classe' => 1, 'matiere' => 4, 'professeur' => '', 'salle' => '', 'info' => ''],
                ['id' => 3, 'title' => 'Matière 1', 'start' => '2017-'.$currentMonth.'-02T10:00:00', 'end' => '2017-'.$currentMonth.'-02T12:00:00', 'description' => 'Professeur 1<br/>Salle 1', 'id_classe' => 1, 'matiere' => 1, 'professeur' => 1, 'salle' => 1, 'info' => ''],
                ['id' => 4, 'title' => 'Matière 1', 'start' => '2017-'.$currentMonth.'-03T10:00:00', 'end' => '2017-'.$currentMonth.'-03T12:00:00', 'description' => 'Professeur 1<br/>Salle 1', 'id_classe' => 1, 'matiere' => 1, 'professeur' => 1, 'salle' => 1, 'info' => ''],
                ['id' => 5, 'title' => 'Matière 1', 'start' => '2017-'.$currentMonth.'-05T10:00:00', 'end' => '2017-'.$currentMonth.'-05T12:00:00', 'description' => 'Professeur 1<br/>Salle 1', 'id_classe' => 1, 'matiere' => 1, 'professeur' => 1, 'salle' => 1, 'info' => ''],
                ['id' => 6, 'title' => 'Matière 2', 'start' => '2017-'.$currentMonth.'-05T14:00:00', 'end' => '2017-'.$currentMonth.'-05T16:30:00', 'description' => 'Professeur 2<br/>Salle 2<br/>Groupe A', 'id_classe' => 1, 'matiere' => 2, 'professeur' => 2, 'salle' => 2, 'info' => 'Groupe A'],
                ['id' => 7, 'title' => 'Matière 3', 'start' => '2017-'.$currentMonth.'-05T14:00:00', 'end' => '2017-'.$currentMonth.'-05T16:30:00', 'description' => 'Professeur 3<br/>Salle 1<br/>Groupe B', 'id_classe' => 1, 'matiere' => 3, 'professeur' => 3, 'salle' => 1, 'info' => 'Groupe B'],
                ['id' => 8, 'title' => 'Matière 1', 'start' => '2017-'.$currentMonth.'-07T10:00:00', 'end' => '2017-'.$currentMonth.'-07T12:00:00', 'description' => 'Professeur 1<br/>Salle 1', 'id_classe' => 1, 'matiere' => 1, 'professeur' => 1, 'salle' => 1, 'info' => ''],
                ['id' => 9, 'title' => 'Matière 1', 'start' => '2017-'.$currentMonth.'-09T10:00:00', 'end' => '2017-'.$currentMonth.'-09T12:00:00', 'description' => 'Professeur 1<br/>Salle 1', 'id_classe' => 1, 'matiere' => 1, 'professeur' => 1, 'salle' => 1, 'info' => ''],
                ['id' => 20, 'title' => 'Pause déjeuner', 'start' => '2017-'.$currentMonth.'-09T12:00:00', 'end' => '2017-'.$currentMonth.'-09T13:30:00', 'description' => '', 'color' => '#3b3b3b', 'id_classe' => 1, 'matiere' => 4, 'professeur' => '', 'salle' => '', 'info' => ''],
                ['id' => 10, 'title' => 'Matière 1', 'start' => '2017-'.$currentMonth.'-11T10:00:00', 'end' => '2017-'.$currentMonth.'-11T12:00:00', 'description' => 'Professeur 1<br/>Salle 1', 'id_classe' => 1, 'matiere' => 1, 'professeur' => 1, 'salle' => 1, 'info' => ''],
                ['id' => 11, 'title' => 'Matière 1', 'start' => '2017-'.$currentMonth.'-15T10:00:00', 'end' => '2017-'.$currentMonth.'-15T12:00:00', 'description' => 'Professeur 1<br/>Salle 1', 'id_classe' => 1, 'matiere' => 1, 'professeur' => 1, 'salle' => 1, 'info' => ''],
                ['id' => 12, 'title' => 'Matière 1', 'start' => '2017-'.$currentMonth.'-17T10:00:00', 'end' => '2017-'.$currentMonth.'-17T12:00:00', 'description' => 'Professeur 1<br/>Salle 1', 'id_classe' => 1, 'matiere' => 1, 'professeur' => 1, 'salle' => 1, 'info' => ''],
                ['id' => 13, 'title' => 'Matière 1', 'start' => '2017-'.$currentMonth.'-19T08:00:00', 'end' => '2017-'.$currentMonth.'-19T12:00:00', 'description' => 'Professeur 1<br/>Salle 1', 'id_classe' => 1, 'matiere' => 1, 'professeur' => 1, 'salle' => 1, 'info' => ''],
                ['id' => 14, 'title' => 'Matière 1', 'start' => '2017-'.$currentMonth.'-21T08:00:00', 'end' => '2017-'.$currentMonth.'-21T12:00:00', 'description' => 'Professeur 1<br/>Salle 1', 'id_classe' => 1, 'matiere' => 1, 'professeur' => 1, 'salle' => 1, 'info' => ''],
                ['id' => 15, 'title' => 'Matière 1', 'start' => '2017-'.$currentMonth.'-23T08:00:00', 'end' => '2017-'.$currentMonth.'-23T12:00:00', 'description' => 'Professeur 1<br/>Salle 1', 'id_classe' => 1, 'matiere' => 1, 'professeur' => 1, 'salle' => 1, 'info' => ''],
                ['id' => 16, 'title' => 'Matière 1', 'start' => '2017-'.$currentMonth.'-24T08:00:00', 'end' => '2017-'.$currentMonth.'-24T12:00:00', 'description' => 'Professeur 1<br/>Salle 1<br/>Groupe A', 'id_classe' => 1, 'matiere' => 1, 'professeur' => 1, 'salle' => 1, 'info' => 'Groupe A'],
                ['id' => 17, 'title' => 'Matière 2', 'start' => '2017-'.$currentMonth.'-24T08:00:00', 'end' => '2017-'.$currentMonth.'-24T12:00:00', 'description' => 'Professeur 2<br/>Salle 2<br/>Groupe B', 'id_classe' => 1, 'matiere' => 2, 'professeur' => 2, 'salle' => 2, 'info' => 'Groupe B'],
                ['id' => 21, 'title' => 'Pause déjeuner', 'start' => '2017-'.$currentMonth.'-24T12:00:00', 'end' => '2017-'.$currentMonth.'-24T13:00:00', 'description' => '', 'color' => '#3b3b3b', 'id_classe' => 1, 'matiere' => 4, 'professeur' => '', 'salle' => '', 'info' => ''],
                ['id' => 16, 'title' => 'Matière 1', 'start' => '2017-'.$currentMonth.'-24T13:00:00', 'end' => '2017-'.$currentMonth.'-24T17:00:00', 'description' => 'Professeur 1<br/>Salle 1<br/>Groupe B', 'id_classe' => 1, 'matiere' => 1, 'professeur' => 1, 'salle' => 1, 'info' => 'Groupe B'],
                ['id' => 17, 'title' => 'Matière 2', 'start' => '2017-'.$currentMonth.'-24T13:00:00', 'end' => '2017-'.$currentMonth.'-24T17:00:00', 'description' => 'Professeur 2<br/>Salle 2<br/>Groupe A', 'id_classe' => 1, 'matiere' => 2, 'professeur' => 2, 'salle' => 2, 'info' => 'Groupe A'],
                ['id' => 18, 'title' => 'Matière 1', 'start' => '2017-'.$currentMonth.'-28T08:00:00', 'end' => '2017-'.$currentMonth.'-28T12:00:00', 'description' => 'Professeur 1<br/>Salle 1', 'id_classe' => 1, 'matiere' => 1, 'professeur' => 1, 'salle' => 1, 'info' => ''],
                ['id' => 19, 'title' => 'Matière 1', 'start' => '2017-'.$currentMonth.'-29T08:00:00', 'end' => '2017-'.$currentMonth.'-29T12:00:00', 'description' => 'Professeur 1<br/>Salle 1', 'id_classe' => 1, 'matiere' => 1, 'professeur' => 1, 'salle' => 1, 'info' => ''],
                ['id' => 22, 'title' => 'Matière 1', 'start' => '2017-'.$currentMonth.'-30T08:00:00', 'end' => '2017-'.$currentMonth.'-30T12:00:00', 'description' => 'Professeur 1<br/>Salle 1', 'id_classe' => 1, 'matiere' => 1, 'professeur' => 1, 'salle' => 1, 'info' => '']
            ];

            //Juste pour montrer la gestion de l'attente, côté client
            usleep(500);

            //Tableau à remplir par les events demandé par le plugin
            //Envoyer le tableau vide, pour éviter des erreurs sur le plugin
            $responseEvent = [];
            //Si un id est fourni
            if(!empty($dataPost['idClass'])){
                //Pour chaque event
                //Chaque event de la classe sélectionné, le if  n'est pas fait pour cette version test
                foreach($allEvents as $event){
                    //Si l'event est compris dans l'intervalle de temps
                    //La paramètre start et end de $dataPost, sont envoyés automatique par le plugin, ils correspondent au date de la view (en gros de la semaine affiché à l'utilisateur)
                    //ATTENTION : Le paramètre end de $dataPost est exclusif et non inclusif
                    if($event['start'] >= $dataPost['start'] && $event['start'] < $dataPost['end'])
                        array_push($responseEvent, $event);
                }
            }

            //Uniquement le tableau comme retour
            jsonRender($responseEvent);
            break;
        //On colle une semaine dans le calendrier
        case 'paste_calendar':
            //------Pour la version test--------------------
            $label = [
                'matiere' => [1 => 'Matière 1', 2 => 'Matière 2', 3 => 'Matière 3', 4 => 'Pause déjeuner', 5 => 'Vacances'],
                'professeur' => [1 => 'Professeur 1', 2 => 'Professeur 2', 3 => 'Professeur 3'],
                'salle' => [1 => 'Salle 1', 2 => 'Salle 2', 3 => 'Salle 3']
            ];
            //----------------------------------------------

            $events = [];
            $addId = $dataPost['idTestAdd'];
            //Pour chaque event
            foreach($dataPost['data'] as $event){
                //On génère la partie info de l'event
                $desc = '';
                //Les champs qui peuvent remplir la description
                $useIndex = ['professeur', 'salle', 'info'];
                //Pour chaque champs
                foreach($useIndex as $v){
                    //Pas de valeur, on passe
                    if(!empty($v)){
                        //Est-ce qu'il faut récupérer un label ?
                        if(isset($label[$v]))
                            $desc.= (empty($desc)?'':'<br/>').$label[$v][$event[$v]];
                        else //Sinon la valeur directe
                            $desc.= (empty($desc)?'':'<br/>').$event[$v];
                    }
                }

                array_push($events, [
                    //----Données nécessaires pour l'event (necessaire au plugin)--
                    'id'            => $addId,
                    'title'         => (empty($event['matiere'])?'':$label['matiere'][$event['matiere']]), //Renvoyer le label de la matière
                    'start'         => $event['start'],  //Date de début, garder le format de date du plugin est hautement recommandé par l'auteur du plugin
                    'end'           => $event['end'],  //Date de début, garder le format de date du plugin est hautement recommandé par l'auteur du plugin
                    'color'         => (in_array($event['matiere'], [4,5])?'#3b3b3b':''), //Possibilité de modifier la couleur de l'event. Dans cet exemple, pour "Pause déjeuner" et "Vacances", la couleur est gris. Voir la doc, pour voir les possibilités de changement de couleur
                    'description'   => $desc,  //Description de l'event (Prof, salle, info)
                    //--------------------------------------
                    //-----Données en cas de modification (non neccesaires au plugin)----
                    'id_classe'     => $event['id_classe'],
                    'matiere'       => $event['matiere'], //C'est ici, qu'on stocke l'id de la matière
                    'professeur'    => $event['professeur'],
                    'salle'         => $event['salle'],
                    'info'          => $event['info']
                    //---------------------------------------
                ]);
                $addId++;
            }

            jsonRender(['success' => true, 'events' => $events, 'idEventTest' => $addId]);
            break;
        //Changement de classe sur le formulaire "Ajouter des notes"
        case 'change_classe_form_add_note':
            //Si pas d'id valide
            if(!isset($dataPost['id']) || empty($dataPost['id']))
                jsonRender(['success' => false]);

            $matieres = '<option value="1">Matiere 1</option><option value="2">Matiere 2</option><option value="3">Matiere 3</option>';
            $eleves = [
                1 => [
                    ['id' => 1, 'nom' => 'Nom_A', 'prenom' => 'Prenom_A'],
                    ['id' => 2, 'nom' => 'Nom_B', 'prenom' => 'Prenom_B'],
                    ['id' => 3, 'nom' => 'Nom_C', 'prenom' => 'Prenom_C'],
                    ['id' => 4, 'nom' => 'Nom_D', 'prenom' => 'Prenom_D'],
                    ['id' => 5, 'nom' => 'Nom_E', 'prenom' => 'Prenom_E']
                ],
                2 => [
                    ['id' => 6, 'nom' => 'Nom_F', 'prenom' => 'Prenom_F'],
                    ['id' => 7, 'nom' => 'Nom_G', 'prenom' => 'Prenom_G'],
                    ['id' => 8, 'nom' => 'Nom_H', 'prenom' => 'Prenom_H'],
                    ['id' => 9, 'nom' => 'Nom_I', 'prenom' => 'Prenom_I'],
                    ['id' => 10, 'nom' => 'Nom_J', 'prenom' => 'Prenom_J']
                ],
                3 => [
                    ['id' => 11, 'nom' => 'Nom_K', 'prenom' => 'Prenom_K'],
                    ['id' => 12, 'nom' => 'Nom_L', 'prenom' => 'Prenom_L'],
                    ['id' => 13, 'nom' => 'Nom_M', 'prenom' => 'Prenom_M'],
                    ['id' => 14, 'nom' => 'Nom_N', 'prenom' => 'Prenom_N'],
                    ['id' => 15, 'nom' => 'Nom_O', 'prenom' => 'Prenom_O']
                ]
            ];

            $htmlEleves = '';

            foreach($eleves[$dataPost['id']] as $eleve){
                $htmlEleves.= '<div class="col-xs-6">
                    <div class="form-group form-md-line-input form-md-floating-label">
                        <input type="hidden" name="id_eleve[]" value="'.$eleve['id'].'">
                        <div class="form-control form-control-static">'.$eleve['prenom'].' '.$eleve['nom'].'</div>
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="form-group form-md-line-input form-md-floating-label">
                        <input title="Note" type="number" min="0" max="50" required="required" name="note1[]" class="form-control" placeholder="Note* (Au minimum 0)">
                    </div>
                </div>';
            }

            jsonRender(['success' => true, 'matieres' => $matieres, 'eleves' => $htmlEleves]);
            break;
        //Changement de classe sur le formulaire "Ajouter des notes"
        case 'change_classe_form_edit_note':
            //Si pas d'id valide
            if(!isset($dataPost['id']) || empty($dataPost['id']))
                jsonRender(['success' => false]);

            //L'option vide est importante, ne pas l'enlever
            $matieres = '<option value=""></option><option value="1">Matiere 1</option><option value="2">Matiere 2</option><option value="3">Matiere 3</option>';
            $eleves = [
                1 => '<option value=""></option><option value="1">mat_A Nom_A Prenom_A</option><option value="2">mat_B Nom_B Prenom_B</option><option value="3">mat_C Nom_C Prenom_C</option><option value="4">mat_D Nom_D Prenom_D</option><option value="5">mat_E Nom_E Prenom_E</option>',
                2 => '<option value=""></option><option value="6">mat_F Nom_F Prenom_F</option><option value="7">mat_G Nom_G Prenom_G</option><option value="8">mat_H Nom_H Prenom_H</option><option value="9">mat_I Nom_I Prenom_I</option><option value="10">mat_J Nom_J Prenom_J</option>',
                3 => '<option value=""></option><option value="11">mat_K Nom_K Prenom_K</option><option value="12">mat_L Nom_L Prenom_L</option><option value="13">mat_M Nom_M Prenom_M</option><option value="14">mat_N Nom_N Prenom_N</option><option value="15">mat_O Nom_O Prenom_O</option>'
            ];

            jsonRender(['success' => true, 'matieres' => $matieres, 'eleves' => $eleves[$dataPost['id']]]);
            break;
        //Tous les champs sont remplis sur le formulaire "Modifier des notes"
        case 'all_fields_filled_form_edit_note':
            $devoirs = [
                ['id' => 1, 'date' => '10/09/2017', 'note' => 8],
                ['id' => 2, 'date' => '15/09/2017', 'note' => 8.5],
                ['id' => 3, 'date' => '10/10/2017', 'note' => 5],
                ['id' => 4, 'date' => '22/10/2017', 'note' => 6],
                ['id' => 5, 'date' => '06/11/2017', 'note' => 9]
            ];

            $htmlDevoirs = '';

            foreach($devoirs as $devoir){
                $htmlDevoirs.= '<tr>
                    <td>'.$devoir['date'].'</td>
                    <td>
                        <input type="hidden" name="devoir[]" value="'.$devoir['id'].'" required="required">
                        <div class="form-group form-md-line-input">
                            <input title="Note" type="number" min="0" max="50" required="required" name="note1[]" class="form-control" value="'.$devoir['note'].'" placeholder="Note* (Au minimum 0)">
                        </div>
                    </td>
                </tr>';
            }

            jsonRender(['success' => true, 'matiere' => 'Matière '.$dataPost['data']['id_matiere'], 'devoirs' => $htmlDevoirs]);
            break;
        //Voir un carnet de note
        case 'view_carnet_note':
            $outHtml = '<div id="myModal" class="modal fade" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-green">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title font-white">Carnet de note</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="portlet light portlet-fit">
                                        <div class="portlet-body">
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-6">
                                                    <dl>
                                                        <dt class="margin-bottom-5">Elève :</dt><dd>Nom_A Prenom_A</dd>
                                                        <dt class="margin-bottom-5 margin-top-10">Année scolaire :</dt><dd>2016/2017</dd>
                                                    </dl>
                                                </div>
                                                <div class="col-xs-12 col-sm-6">
                                                    <dl>
                                                        <dt class="margin-bottom-5">Classe :</dt><dd>Classe 2</dd>
                                                        <dt class="margin-bottom-5 margin-top-10">Trimestre :</dt><dd>1er Trimestre</dd>
                                                    </dl>
                                                </div>
                                            </div>
                                            <table class="table table-condensed">
                                                <thead>
                                                <tr>
                                                    <th>Matières</th>
                                                    <th>Note sur</th>
                                                    <th>Note</th>
                                                    <th>Appréciation</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>Matiere</td>
                                                    <td>10</td>
                                                    <td>8</td>
                                                    <td>Un élève très sérieux </td>
                                                </tr>
                                                <tr>
                                                    <td>Matiere</td>
                                                    <td>10</td>
                                                    <td>8</td>
                                                    <td>Un élève très sérieux </td>
                                                </tr>
                                                <tr>
                                                    <td>Matiere</td>
                                                    <td>10</td>
                                                    <td>8</td>
                                                    <td>Un élève très sérieux </td>
                                                </tr>
                                                <tr>
                                                    <td>Matiere</td>
                                                    <td>10</td>
                                                    <td>8</td>
                                                    <td>Un élève très sérieux </td>
                                                </tr>
                                                <tr>
                                                    <td>Matiere</td>
                                                    <td>10</td>
                                                    <td>8</td>
                                                    <td>Un élève très sérieux </td>
                                                </tr>
                                                <tr>
                                                    <td>Matiere</td>
                                                    <td>10</td>
                                                    <td>8</td>
                                                    <td>Un élève très sérieux </td>
                                                </tr>
                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <td>Total</td>
                                                    <td>160</td>
                                                    <td>140</td>
                                                </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn dark btn-outline" data-dismiss="modal">Fermer</button>
                        </div>
                    </div>
                </div>
            </div>';
            jsonRender(['success' => true, 'html' => $outHtml]);
            break;
        //Formulaire pour modifier un carnet de note
        case 'form_carnet_note':
            $outHtml = '<div id="myModal" class="modal fade" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-green">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title font-white">Modifier le carnet de note</h4>
                        </div>
                        <form class="form_carnet_note" role="form" action="javascript:;" method="post">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="portlet light portlet-fit">
                                            <div class="portlet-body">
                                                <div class="row">
                                                    <div class="col-xs-12 col-sm-6">
                                                        <dl>
                                                            <dt class="margin-bottom-5">Elève :</dt><dd>Nom_A Prenom_A</dd>
                                                            <dt class="margin-bottom-5 margin-top-10">Année scolaire :</dt><dd>2016/2017</dd>
                                                        </dl>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-6">
                                                        <dl>
                                                            <dt class="margin-bottom-5">Classe :</dt><dd>Classe 2</dd>
                                                            <dt class="margin-bottom-5 margin-top-10">Trimestre :</dt><dd>1er Trimestre</dd>
                                                        </dl>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-body">
                                    <input type="hidden" name="id_eleve" required="required" value="'.$dataPost['data']['id_eleve'].'">
                                    <input type="hidden" name="id_trimes" required="required" value="'.$dataPost['data']['id_trimes'].'">
                                    <table class="table table-condensed">
                                        <thead>
                                        <tr>
                                            <th>Matières</th>
                                            <th>Note sur</th>
                                            <th>Note</th>
                                            <th>Appréciation</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                Matiere
                                                <input type="hidden" name="matiereid[]" value="1" required="required">
                                            </td>
                                            <td>10</td>
                                            <td>
                                                <div class="form-group form-md-line-input">
                                                    <input title="Note" type="number" min="0" max="50" required="required" name="note1[]" class="form-control input_note" value="8" placeholder="Note* (Au minimum 0)">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group form-md-line-input">
                                                    <input title="Appréciation" type="text" name="app[]" class="form-control" value="Un élève très sérieux" placeholder="Appréciation">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Matiere
                                                <input type="hidden" name="matiereid[]" value="2" required="required">
                                            </td>
                                            <td>10</td>
                                            <td>
                                                <div class="form-group form-md-line-input">
                                                    <input title="Note" type="number" min="0" max="50" required="required" name="note1[]" class="form-control input_note" value="8" placeholder="Note* (Au minimum 0)">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group form-md-line-input">
                                                    <input title="Appréciation" type="text" name="app[]" class="form-control" value="Un élève très sérieux" placeholder="Appréciation">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Matiere
                                                <input type="hidden" name="matiereid[]" value="3" required="required">
                                            </td>
                                            <td>10</td>
                                            <td>
                                                <div class="form-group form-md-line-input">
                                                    <input title="Note" type="number" min="0" max="50" required="required" name="note1[]" class="form-control input_note" value="8" placeholder="Note* (Au minimum 0)">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group form-md-line-input">
                                                    <input title="Appréciation" type="text" name="app[]" class="form-control" value="Un élève très sérieux" placeholder="Appréciation">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Matiere
                                                <input type="hidden" name="matiereid[]" value="4" required="required">
                                            </td>
                                            <td>10</td>
                                            <td>
                                                <div class="form-group form-md-line-input">
                                                    <input title="Note" type="number" min="0" max="50" required="required" name="note1[]" class="form-control input_note" value="8" placeholder="Note* (Au minimum 0)">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group form-md-line-input">
                                                    <input title="Appréciation" type="text" name="app[]" class="form-control" value="Un élève très sérieux" placeholder="Appréciation">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Matiere
                                                <input type="hidden" name="matiereid[]" value="5" required="required">
                                            </td>
                                            <td>10</td>
                                            <td>
                                                <div class="form-group form-md-line-input">
                                                    <input title="Note" type="number" min="0" max="50" required="required" name="note1[]" class="form-control input_note" value="8" placeholder="Note* (Au minimum 0)">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group form-md-line-input">
                                                    <input title="Appréciation" type="text" name="app[]" class="form-control" value="Un élève très sérieux" placeholder="Appréciation">
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <td>Total</td>
                                            <td>50</td>
                                            <td>
                                                <div class="form-group form-md-line-input">
                                                    <input title="Note total" type="number" required="required" name="total" class="form-control input_somme" value="40" readonly>
                                                </div>
                                            </td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Annuler</button>
                                <button type="submit" class="btn green mt-ladda-btn ladda-button" data-style="slide-left"><span class="ladda-label">Sauvegarder</span></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>';

            jsonRender(['success' => true, 'html' => $outHtml]);
            break;
    }
}
//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! COMPTE COMPTABLE !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
elseif($dataPost['compte'] == 'comptable'){
    //Selon l'action demandé
    switch($dataPost['action']){
        default:
            jsonRender(['success' => false]);
            break;
        //Voir une facture
        case 'view_facture':
            $outHtml = '<div id="myModal" class="modal fade" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-green">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title font-white">Facture n°42</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="portlet light portlet-fit">
                                        <div class="portlet-body">
                                            <div class="row">
                                                <div class="col-sm-6 col-xs-12">
                                                    <dl>
                                                        <dt class="margin-bottom-5">Elève :</dt><dd>Nom_A Prenom_A</dd>
                                                        <dt class="margin-bottom-5 margin-top-10">Année scolaire :</dt><dd>2016/2017</dd>
                                                    </dl>
                                                </div>
                                                <div class="col-xs-12 col-sm-6">
                                                    <dl>
                                                        <dt class="margin-bottom-5">Classe :</dt><dd>Classe 2</dd>
                                                        <dt class="margin-bottom-5 margin-top-10">Mois :</dt><dd>Décembre</dd>
                                                    </dl>
                                                </div>
                                            </div>
                                            <table class="table table-condensed">
                                                <thead>
                                                <tr>
                                                    <th>Rubrique</th>
                                                    <th>Montant</th>
                                                    <th>Ecart</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>Droit d\'Inscription</td>
                                                    <td>8000</td>
                                                    <td>0</td>
                                                </tr>
                                                <tr>
                                                    <td>Scolarité</td>
                                                    <td>10000</td>
                                                    <td>0</td>
                                                </tr>
                                                <tr>
                                                    <td>APE</td>
                                                    <td>2000</td>
                                                    <td>0</td>
                                                </tr>
                                                <tr>
                                                    <td>Cotisation de fin d\'année</td>
                                                    <td>1000</td>
                                                    <td>0</td>
                                                </tr>
                                                <tr>
                                                    <td>Tenue(s)</td>
                                                    <td>12000</td>
                                                    <td>0</td>
                                                </tr>
                                                <tr>
                                                    <td>Transport</td>
                                                    <td>6000</td>
                                                    <td>0</td>
                                                </tr>
                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <td>Montant payé</td>
                                                    <td colspan="2">39000</td>
                                                </tr>
                                                <tr>
                                                    <td>Reliquat</td>
                                                    <td colspan="2">0</td>
                                                </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn dark btn-outline" data-dismiss="modal">Fermer</button>
                        </div>
                    </div>
                </div>
            </div>';
            jsonRender(['success' => true, 'html' => $outHtml]);
            break;
        //Les données pour le graphique de la caisse
        case 'echarts_checkout':
            $returnData = [
                'mois' => ['Octobre', 'Novembre', 'Décembre', 'Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet'], //Les mois que vous voulez afficher, si c'est tjr les mêmes, les mettre directement dans l'objet init en JS
                'data' => [
                    [1211700,6760000,6155500,6496300,5560600,7865300,7501100,6835800,1808000,151000],   //En 1er les valeurs "Encaissé", le même nombre de valeurs que le nombre de mois
                    [14492400,6349500,7232000,6486300,5560600,7865300,7501100,6835800,1808000,151000]   //Ensuite les valeurs "Versé", le même nombre de valeurs que le nombre de mois
                ],
                'sum' => [  //La somme des valeurs
                    'encaisse' => 63080600,
                    'verse' => 64282000
                ]
            ];

            jsonRender(['success' => true, 'mois' => $returnData['mois'], 'data' => $returnData['data'], 'sum' => $returnData['sum']]);
            break;
        //Facturer des frais de scolarité
        case 'facturer_scolarite':
            //NE PAS OUBLIER DE REMPLIR ATTRIBUT ACTION DU FORM
            $outHtml = '<div class="col-xs-12 col-md-8 col-md-offset-2">
                <p class="text-center text-uppercase bold">élève : Nom_A Prenom_A<br/>Classe : Classe 2</p>
                <form role="form" action="undefined" method="post">
                    <div style="display:none;"><input type="hidden" name="_method" value="POST"></div>
                    <input type="hidden" name="eleveid" value="'.$dataPost['id'].'">
                    <input type="hidden" name="classeid" value="1">
                    <div class="form-body">
                        <table class="table table-striped table-bordered" id="table_paiement">
                            <thead>
                            <tr>
                                <th>Année scolaire 2016/2017</th>
                                <th>
                                    Mois à régler (Sélection de plusieurs mois possible)
                                    <select title="Mois" class="form-control" multiple="multiple" required="required" name="mois" id="mois">
                                        <option value="OCTOBRE">OCTOBRE</option>
                                        <option value="JANVIER">JANVIER</option>
                                        <option value="FEVRIER">FEVRIER</option>
                                        <option value="MARS">MARS</option>
                                        <option value="AVRIL">AVRIL</option>
                                        <option value="MAI">MAI</option>
                                        <option value="JUIN">JUIN</option>
                                        <option value="JUILLET">JUILLET</option>
                                        <option value="AOÛT">AOÛT</option>
                                        <option value="SEPTEMBRE">SEPTEMBRE</option>
                                        <option value="NOVEMBRE">NOVEMBRE</option>
                                        <option value="DECEMBRE">DECEMRE</option>
                                    </select>
                                </th>
                                <th>Date : <input title="Date" class="form-control input-inline date-mask" type="text" name="date" required="required" value="'.date('d/m/Y').'"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <input type="hidden" name="paie[]" value="17">
                                    <input type="hidden" name="typepaie[]" value="Mensualite">
                                    Scolarité
                                </td>
                                <td colspan="2">
                                    <input title="Paiement Scolarité" type="number" class="form-control input_payer" name="paiement[]" value="12000">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="hidden" name="paie[]" value="21">
                                    <input type="hidden" name="typepaie[]" value="Mensualite">
                                    Anglais
                                </td>
                                <td colspan="2">
                                    <input title="Paiement Anglais" type="number" class="form-control input_payer" name="paiement[]" value="500">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="hidden" name="paie[]" value="20">
                                    <input type="hidden" name="typepaie[]" value="Mensualite">
                                    Informatique
                                </td>
                                <td colspan="2">
                                    <input title="Paiement Informatique" type="number" class="form-control input_payer" name="paiement[]" value="500">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="hidden" name="paie[]" value="0">
                                    <input type="hidden" name="typepaie[]" value="Reliquat">
                                    Reliquat
                                </td>
                                <td colspan="2">
                                    <input title="Paiement Reliquat" type="number" class="form-control input_payer" name="paiement[]" value="0">
                                </td>
                            </tr>
                            </tbody>
                            <tfoot>
                            <tr>
                                <td>Somme</td>
                                <td colspan="2">
                                    <input title="Somme" type="number" class="form-control input_somme" name="payer" id="payer" readonly value="13000">
                                </td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="form-actions noborder text-center">
                        <button type="submit" class="btn green">Enregistrer</button>
                    </div>
                </form>
            </div>
            <div class="col-xs-12 col-md-8 col-md-offset-2 margin-top-10">
                <div class="mt-element-ribbon bg-grey-cararra">
                    <div class="ribbon ribbon-shadow ribbon-color-info uppercase ">Récapitulatif</div>
                    <div class="ribbon-content">
                        <table class="table table-condensed table-striped table-hover">
                            <thead>
                            <tr>
                                <th>Rubrique</th>
                                <th>Octobre</th>
                                <th>Novembre</th>
                                <th>Décembre</th>
                                <th>Janvier</th>
                                <th>Février</th>
                                <th>Mars</th>
                                <th>Avril</th>
                                <th>Mai</th>
                                <th>Juin</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Scolarité</td>
                                <td>10000</td>
                                <td>10000</td>
                                <td>10000</td>
                                <td>10000</td>
                                <td>10000</td>
                                <td>12000</td>
                                <td>12000</td>
                                <td>N/D</td>
                                <td>N/D</td>
                            </tr>
                            <tr>
                                <td>Informatique</td>
                                <td>0</td>
                                <td>500</td>
                                <td>500</td>
                                <td>500</td>
                                <td>500</td>
                                <td>500</td>
                                <td>500</td>
                                <td>N/D</td>
                                <td>N/D</td>
                            </tr>
                            <tr>
                                <td>Droit d\'Inscription</td>
                                <td>8000</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>N/D</td>
                                <td>N/D</td>
                            </tr>
                            <tr>
                                <td>Cotisation de fin d\'année</td>
                                <td>1000</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>N/D</td>
                                <td>N/D</td>
                            </tr>
                            <tr>
                                <td>APE</td>
                                <td>2000</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>N/D</td>
                                <td>N/D</td>
                            </tr>
                            <tr>
                                <td>Anglais</td>
                                <td>10000</td>
                                <td>500</td>
                                <td>500</td>
                                <td>500</td>
                                <td>500</td>
                                <td>500</td>
                                <td>500</td>
                                <td>N/D</td>
                                <td>N/D</td>
                            </tr>
                            <tr>
                                <td>Tenues</td>
                                <td>8000</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>N/D</td>
                                <td>N/D</td>
                            </tr>
                            <tr>
                                <td>Cantine</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>N/D</td>
                                <td>N/D</td>
                            </tr>
                            <tr>
                                <td>Transport</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>N/D</td>
                                <td>N/D</td>
                            </tr>
                            <tr>
                                <td>Reliquat</td>
                                <td>4000</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>N/D</td>
                                <td>N/D</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>';

            jsonRender(['success' => true, 'html' => $outHtml]);
            break;
        //Facturer des frais trans_cant
        case 'facturer_trans_cant':
            //Si id de l'élève == 3, pour l'exemple d'un élève sans abonnement trans et cant
            if($dataPost['id'] == 3){
                $outHtml = '<div class="col-xs-12 col-md-8 col-md-offset-2">
                    <p class="text-center text-uppercase bold">élève : Nom_A Prenom_A<br/>Classe : Classe 2</p>
                    <p class="text-center text-uppercase">cet élève n\'est pas abonné au transport, ni à la cantine.</p>
                </div>';
            }else{
                //NE PAS OUBLIER DE REMPLIR ATTRIBUT ACTION DU FORM
                $outHtml = '<div class="col-xs-12 col-md-8 col-md-offset-2">
                    <p class="text-center text-uppercase bold">élève : Nom_A Prenom_A<br/>Classe : Classe 2</p>
                    <form role="form" action="undefined" method="post">
                        <div style="display:none;"><input type="hidden" name="_method" value="POST"></div>
                        <input type="hidden" name="eleveid" value="'.$dataPost['id'].'">
                        <input type="hidden" name="classeid" value="1">
                        <div class="form-body">
                            <table class="table table-striped table-bordered" id="table_paiement">
                                <thead>
                                <tr>
                                    <th>Année scolaire 2016/2017</th>
                                    <th>
                                        Mois à régler (Sélection de plusieurs mois possible)
                                        <select title="Mois" class="form-control" multiple="multiple" required="required" name="mois" id="mois">
                                            <option value="OCTOBRE">OCTOBRE</option>
                                            <option value="JANVIER">JANVIER</option>
                                            <option value="FEVRIER">FEVRIER</option>
                                            <option value="MARS">MARS</option>
                                            <option value="AVRIL">AVRIL</option>
                                            <option value="MAI">MAI</option>
                                            <option value="JUIN">JUIN</option>
                                            <option value="JUILLET">JUILLET</option>
                                            <option value="AOÛT">AOÛT</option>
                                            <option value="SEPTEMBRE">SEPTEMBRE</option>
                                            <option value="NOVEMBRE">NOVEMBRE</option>
                                            <option value="DECEMBRE">DECEMRE</option>
                                        </select>
                                    </th>
                                    <th>Date : <input title="Date" class="form-control input-inline date-mask" type="text" name="date" required="required" value="'.date('d/m/Y').'"></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <input type="hidden" name="busid" value="5">
                                        Transport
                                    </td>
                                    <td colspan="2">
                                        <input title="Paiement Transport" type="number" class="form-control input_payer" min="0" name="trans" value="6000">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="hidden" name="cantine" value="3">
                                        Cantine
                                    </td>
                                    <td colspan="2">
                                        <input title="Paiement Cantine" type="number" class="form-control input_payer" min="0" name="cant" value="2400">
                                    </td>
                                </tr>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td>Somme</td>
                                    <td colspan="2">
                                        <input title="Somme" type="number" class="form-control input_somme" name="payer" id="payer" readonly value="8400">
                                    </td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="form-actions noborder text-center">
                            <button type="submit" class="btn green">Enregistrer</button>
                        </div>
                    </form>
                </div>';
            }

            jsonRender(['success' => true, 'html' => $outHtml]);
            break;
        //Complement de paiement
        case 'complement_paiement':
            //NE PAS OUBLIER DE REMPLIR ATTRIBUT ACTION DU FORM
            $outHtml = '<div class="col-xs-12 col-md-8 col-md-offset-2">
                <p class="text-center text-uppercase bold">reçu n°: '.$dataPost['id'].'<br/>élève : Nom_A Prenom_A<br/>Classe : Classe 2</p>
                <form role="form" action="undefined" method="post">
                    <div style="display:none;"><input type="hidden" name="_method" value="POST"></div>
                    <input type="hidden" name="idrecu" value="'.$dataPost['id'].'">
                    <input type="hidden" name="classeid" value="1">
                    <input type="hidden" name="eleveid" value="2">
                    <input type="hidden" name="mois" value="3">
                    <div class="form-body">
                        <table class="table table-striped table-bordered" id="table_paiement">
                            <thead>
                            <tr>
                                <th>Année scolaire 2016/2017</th>
                                <th>
                                    Mois : Décembre
                                </th>
                                <th>Date : <input title="Date" class="form-control input-inline date-mask" type="text" name="date" required="required" value="'.date('d/m/Y').'"></th>
                            </tr>
                            </thead>
                            <thead>
                            <tr>
                                <th>Rubrique</th>
                                <th>Montant</th>
                                <th>Ecart</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>APE</td>
                                <td>2000</td>
                                <td>
                                    <input type="hidden" name="paie[]" value="19">
                                    <input title="Ecart APE" type="number" class="form-control input_payer" name="paiement[]" readonly value="0">
                                </td>
                            </tr>
                            <tr>
                                <td>Scolarité</td>
                                <td>10000</td>
                                <td>
                                    <input type="hidden" name="paie[]" value="17">
                                    <input title="Ecart Scolarité" type="number" class="form-control input_payer" name="paiement[]" readonly value="0">
                                </td>
                            </tr>
                            <tr>
                                <td>Informatique</td>
                                <td>500</td>
                                <td>
                                    <input type="hidden" name="paie[]" value="20">
                                    <input title="Ecart Informatique" type="number" class="form-control input_payer" name="paiement[]" readonly value="0">
                                </td>
                            </tr>
                            <tr>
                                <td>Anglais</td>
                                <td>500</td>
                                <td>
                                    <input type="hidden" name="paie[]" value="21">
                                    <input title="Ecart Anglais" type="number" class="form-control input_payer" name="paiement[]" readonly value="0">
                                </td>
                            </tr>
                            <tr>
                                <td>Tenue(s)</td>
                                <td>6000</td>
                                <td>
                                    <input type="hidden" name="tenueid" value="2">
                                    <input title="Ecart Tenue" type="number" class="form-control input_payer" name="prixtenue" readonly value="6000">
                                </td>
                            </tr>
                            <tr>
                                <td>Reliquat</td>
                                <td></td>
                            </tr>
                            </tbody>
                            <tfoot>
                            <tr>
                                <td>Montant de base à payer</td>
                                <td colspan="2">19000</td>
                            </tr>
                            <tr>
                                <td>Reliquat à payer</td>
                                <td colspan="2">
                                    <input title="Reliquat à payer" type="number" class="form-control input_somme" name="payer" id="payer" readonly value="6000">
                                </td>
                            </tr>
                            <tr>
                                <td>Paiement du reliquat</td>
                                <td colspan="2">
                                    <input title="Paiement du reliquat" type="number" class="form-control" name="total" id="total">
                                </td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="form-actions noborder text-center">
                        <button type="submit" class="btn green">Enregistrer</button>
                    </div>
                </form>
            </div>';

            jsonRender(['success' => true, 'html' => $outHtml]);
            break;
        //Voir une facture blouse
        case 'view_recu_blouse':
            $outHtml = '<div id="myModal" class="modal fade" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-green">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title font-white">Reçu de Tenue(s) n°42</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="portlet light portlet-fit ">
                                        <div class="portlet-body">
                                            <div class="row">
                                                <div class="col-sm-6 col-xs-12">
                                                    <dl>
                                                        <dt class="margin-bottom-5">Elève :</dt><dd>Nom_A Prenom_A</dd>
                                                        <dt class="margin-bottom-5 margin-top-10">Année scolaire :</dt><dd>2016/2017</dd>
                                                    </dl>
                                                </div>
                                                <div class="col-xs-12 col-sm-6">
                                                    <dl>
                                                        <dt class="margin-bottom-5">Classe :</dt><dd>Classe 2</dd>
                                                        <dt class="margin-bottom-5 margin-top-10">Mois :</dt><dd>Décembre</dd>
                                                    </dl>
                                                </div>
                                            </div>
                                            <table class="table table-condensed">
                                                <thead>
                                                <tr>
                                                    <th>Rubrique</th>
                                                    <th>Quantité</th>
                                                    <th>Montant</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>Tenue(s)</td>
                                                    <td>1</td>
                                                    <td>6000</td>
                                                </tr>
                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <td>Montant payé</td>
                                                    <td colspan="2">6000</td>
                                                </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn dark btn-outline" data-dismiss="modal">Fermer</button>
                        </div>
                    </div>
                </div>
            </div>';
            jsonRender(['success' => true, 'html' => $outHtml]);
            break;
        //Acheter une blouse pour un élève
        case 'achat_blouse':
            //NE PAS OUBLIER DE REMPLIR ATTRIBUT ACTION DU FORM
            $outHtml = '<div class="col-xs-12 col-md-8 col-md-offset-2">
                <p class="text-center text-uppercase bold">élève : Nom_A Prenom_A<br/>Classe : Classe 2</p>
                <form role="form" action="undefined" method="post">
                    <div style="display:none;"><input type="hidden" name="_method" value="POST"></div>
                    <input type="hidden" name="eleveid" value="'.$dataPost['id'].'">
                    <input type="hidden" name="classeid" value="1">
                    <div class="form-body">
                        <table class="table table-striped table-bordered" id="table_paiement">
                            <thead>
                            <tr>
                                <th>Année scolaire 2016/2017</th>
                                <th>
                                    Mois :
                                    <select title="Mois" class="form-control input-inline" required="required" name="mois" id="mois">
                                        <option value="OCTOBRE">OCTOBRE</option>
                                        <option value="JANVIER">JANVIER</option>
                                        <option value="FEVRIER">FEVRIER</option>
                                        <option value="MARS">MARS</option>
                                        <option value="AVRIL">AVRIL</option>
                                        <option value="MAI">MAI</option>
                                        <option value="JUIN">JUIN</option>
                                        <option value="JUILLET">JUILLET</option>
                                        <option value="AOÛT">AOÛT</option>
                                        <option value="SEPTEMBRE">SEPTEMBRE</option>
                                        <option value="NOVEMBRE">NOVEMBRE</option>
                                        <option value="DECEMBRE">DECEMRE</option>
                                    </select>
                                </th>
                                <th>Date : <input title="Date" class="form-control input-inline date-mask" type="text" name="date" required="required" value="'.date('d/m/Y').'"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <input type="hidden" name="tenueid" value="2" required="required">
                                    Tenue(s)
                                </td>
                                <td>
                                    <label for="nbrtenu">Nombre de tenue(s) : </label>
                                    <input type="number" class="form-control input-inline" name="nbrtenu" id="nbrtenu" value="1" min="1">
                                </td>
                                <td>
                                    <input title="Montant total à payer" type="number" class="form-control" name="prixtenu" id="prixtenu" readonly value="6000">
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="form-actions noborder text-center">
                        <button type="submit" class="btn green">Enregistrer</button>
                    </div>
                </form>
            </div>';
            //Prix des transports
            $prix = ['tenu' => 6000];

            jsonRender(['success' => true, 'html' => $outHtml, 'prix' => $prix]);
            break;
        //Abonner un élève au trans/cant
        case 'achat_trans_cant':
            //NE PAS OUBLIER DE REMPLIR ATTRIBUT ACTION DU FORM
            $outHtml = '<div class="col-xs-12 col-md-8 col-md-offset-2">
                <p class="text-center text-uppercase bold">élève : Nom_A Prenom_A<br/>Classe : Classe 2</p>
                <form role="form" action="undefined" method="post">
                    <div style="display:none;"><input type="hidden" name="_method" value="POST"></div>
                    <input type="hidden" name="eleveid" value="'.$dataPost['id'].'">
                    <input type="hidden" name="classeid" value="1">
                    <div class="form-body">
                        <table class="table table-striped table-bordered" id="table_paiement">
                            <thead>
                            <tr>
                                <th>Année scolaire 2016/2017</th>
                                <th>
                                    Mois :
                                    <select title="Mois" class="form-control input-inline" required="required" name="mois" id="mois">
                                        <option value="OCTOBRE">OCTOBRE</option>
                                        <option value="JANVIER">JANVIER</option>
                                        <option value="FEVRIER">FEVRIER</option>
                                        <option value="MARS">MARS</option>
                                        <option value="AVRIL">AVRIL</option>
                                        <option value="MAI">MAI</option>
                                        <option value="JUIN">JUIN</option>
                                        <option value="JUILLET">JUILLET</option>
                                        <option value="AOÛT">AOÛT</option>
                                        <option value="SEPTEMBRE">SEPTEMBRE</option>
                                        <option value="NOVEMBRE">NOVEMBRE</option>
                                        <option value="DECEMBRE">DECEMRE</option>
                                    </select>
                                </th>
                                <th>Date : <input title="Date" class="form-control input-inline date-mask" type="text" name="date" required="required" value="'.date('d/m/Y').'"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <label for="busid">Transport</label>
                                </td>
                                <td>
                                    <select class="form-control input_cond" name="busid" id="busid">
                                        <option value=""></option>
                                        <option value="5">Bus SOS</option>
                                        <option value="6">Bus Privé</option>
                                    </select>
                                    <div class="form-group form-md-radios display-none" id="zone_bus">
                                        <div class="md-radio-inline">
                                            <div class="md-radio">
                                                <input type="radio" id="zone_1" name="zone" value="1" class="md-radiobtn input_cond">
                                                <label for="zone_1">
                                                    <span class="inc"></span>
                                                    <span class="check bg-green"></span>
                                                    <span class="box"></span> Zone 1
                                                </label>
                                            </div>
                                            <div class="md-radio">
                                                <input type="radio" id="zone_2" name="zone" value="2" class="md-radiobtn input_cond">
                                                <label for="zone_2">
                                                    <span class="inc"></span>
                                                    <span class="check bg-green"></span>
                                                    <span class="box"></span> Zone 2
                                                </label>
                                            </div>
                                            <div class="md-radio">
                                                <input type="radio" id="zone_3" name="zone" value="3" class="md-radiobtn input_cond">
                                                <label for="zone_3">
                                                    <span class="inc"></span>
                                                    <span class="check bg-green"></span>
                                                    <span class="box"></span> Zone 3
                                                </label>
                                            </div>
                                            <div class="md-radio">
                                                <input type="radio" id="zone_4" name="zone" value="4" class="md-radiobtn input_cond">
                                                <label for="zone_4">
                                                    <span class="inc"></span>
                                                    <span class="check bg-green"></span>
                                                    <span class="box"></span> Zone 4
                                                </label>
                                            </div>
                                            <div class="md-radio">
                                                <input type="radio" id="zone_5" name="zone" value="5" class="md-radiobtn input_cond">
                                                <label for="zone_5">
                                                    <span class="inc"></span>
                                                    <span class="check bg-green"></span>
                                                    <span class="box"></span> Zone 5
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <input title="Montant trsnsport" type="number" class="form-control input_payer" name="trans" id="trans" readonly value="0">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="cantine">Cantine</label>
                                </td>
                                <td>
                                    <select class="form-control input_cond" name="cantine" id="cantine">
                                        <option value=""></option>
                                        <option value="2">Pension</option>
                                        <option value="3">Demi-pension</option>
                                    </select>
                                    <label for="tarif" class="display-none" id="cont_tarif">Tarif :
                                        <select class="form-control input-inline margin-top-10 input_cond" name="tarif" id="tarif">
                                            <option value="1">1</option>
                                            <option value="0.5">1/2</option>
                                        </select>
                                    </label>
                                </td>
                                <td>
                                    <input title="Montant cantine" type="number" class="form-control input_payer" name="cant" id="cant" readonly value="0">
                                </td>
                            </tr>
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="2">Montant à payer</td>
                                <td><input title="Montant total à payer" type="number" class="form-control input_somme" name="globale" id="globale" readonly value="0"></td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="form-actions noborder text-center">
                        <button type="submit" class="btn green">Enregistrer</button>
                    </div>
                </form>
            </div>';
            //Prix des transports/cantine
            $prix = ['pension' => 4800, 'demi_pension' => 3600, 'busPrive' => 2000, 'zone1' => 2000, 'zone2' => 3000, 'zone3' => 2500, 'zone4' => 1000, 'zone5' => 4000];

            jsonRender(['success' => true, 'html' => $outHtml, 'prix' => $prix]);
            break;
        //Le HTML du form pour ajouter/editer un versement
        case 'form_bank':
            //Ajout
            if(!isset($dataPost['id']) || empty($dataPost['id']))
                $outHtml = '<div id="myModal" class="modal fade" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-green">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                <h4 class="modal-title font-white">Ajouter un versement</h4>
                            </div>
                            <form class="form_bank" role="form" action="undefined" method="post">
                                <div class="modal-body">
                                    <div class="form-body">
                                        <div class="form-group form-md-line-input form-md-floating-label">
                                            <select class="form-control" required="required" name="idcycle" id="idcycle">
                                                <option value=""></option>
                                                <option value="1">Cycle 1</option>
                                                <option value="2">Cycle 2</option>
                                                <option value="3">Cycle 3</option>
                                            </select>
                                            <label for="idcycle">Cycle*</label>
                                        </div>
                                        <div class="form-group form-md-line-input form-md-floating-label">
                                            <input type="text" class="form-control edited date-mask" name="dateversement" required="required" id="dateversement" value="'.date('d/m/Y').'">
                                            <label for="dateversement">Date de versement*</label>
                                            <span class="help-block font-green">Exemple de message d\'information</span>
                                        </div>
                                        <div class="form-group form-md-line-input form-md-floating-label">
                                            <input type="text" class="form-control" name="nombanque" required="required" id="nombanque">
                                            <label for="nombanque">Banque*</label>
                                            <span class="help-block font-green">Exemple de message d\'information</span>
                                        </div>
                                        <div class="form-group form-md-line-input form-md-floating-label">
                                            <input type="text" class="form-control" required="required" name="numero" id="numero">
                                            <label for="numero">Numéro de reçu*</label>
                                            <span class="help-block font-green">Exemple de message d\'information</span>
                                        </div>
                                        <div class="form-group form-md-line-input form-md-floating-label">
                                            <input type="number" min="1" class="form-control" name="montant" required="required" id="montant">
                                            <label for="montant">Montant versé*</label>
                                            <span class="help-block font-green">Exemple de message d\'information</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Annuler</button>
                                    <button type="submit" class="btn green mt-ladda-btn ladda-button" data-style="slide-left"><span class="ladda-label">Sauvegarder</span></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>';
            else    //Edition
                $outHtml = '<div id="myModal" class="modal fade" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-green">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                <h4 class="modal-title font-white">Modifier le versement n°352</h4>
                            </div>
                            <form class="form_bank" role="form" action="undefined" method="post">
                                <div class="modal-body">
                                    <div class="form-body">
                                        <input type="hidden" name="id" required="required" value="'.$dataPost['id'].'">
                                        <div class="form-group form-md-line-input form-md-floating-label">
                                            <select class="form-control edited" required="required" name="idcycle" id="idcycle">
                                                <option value=""></option>
                                                <option value="1">Cycle 1</option>
                                                <option value="2" selected>Cycle 2</option>
                                                <option value="3">Cycle 3</option>
                                            </select>
                                            <label for="idcycle">Cycle*</label>
                                        </div>
                                        <div class="form-group form-md-line-input form-md-floating-label">
                                            <input type="text" class="form-control edited date-mask" name="dateversement" required="required" id="dateversement" value="04/08/2017">
                                            <label for="dateversement">Date de versement*</label>
                                            <span class="help-block font-green">Exemple de message d\'information</span>
                                        </div>
                                        <div class="form-group form-md-line-input form-md-floating-label">
                                            <input type="text" class="form-control edited" name="nombanque" required="required" id="nombanque" value="BICIS">
                                            <label for="nombanque">Banque*</label>
                                            <span class="help-block font-green">Exemple de message d\'information</span>
                                        </div>
                                        <div class="form-group form-md-line-input form-md-floating-label">
                                            <input type="text" class="form-control edited" required="required" name="numero" id="numero" value="352">
                                            <label for="numero">Numéro de reçu*</label>
                                            <span class="help-block font-green">Exemple de message d\'information</span>
                                        </div>
                                        <div class="form-group form-md-line-input form-md-floating-label">
                                            <input type="number" min="1" class="form-control edited" name="montant" required="required" id="montant" value="350987">
                                            <label for="montant">Montant versé*</label>
                                            <span class="help-block font-green">Exemple de message d\'information</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Annuler</button>
                                    <button type="submit" class="btn green mt-ladda-btn ladda-button" data-style="slide-left"><span class="ladda-label">Sauvegarder</span></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>';

            jsonRender(['success' => true, 'html' => $outHtml]);
            break;
        //Test pour le submit du form bank (Ajout/Edition d'un versement)
        case 'submit_form_bank':
            //on decode et on met en array
            $dataPost['data'] = json_decode($dataPost['data'], true);
            //On génère la valeur date pour la colonne cachée
            $date = DateTime::createFromFormat('d/m/Y', $dataPost['data']['dateversement']);
            $dateNum = $date->format('Ymd');
            //C'est un ajout
            if(!isset($dataPost['data']['id']) || empty($dataPost['data']['id'])){
                $idItem = $dataPost['idTestAdd'];
                $addId = $dataPost['idTestAdd'] + 1;
            }else{  //C'est une édition
                $idItem = $dataPost['data']['id'];
                $addId = $dataPost['idTestAdd'];
            }

            //La var qui va contenir les valeurs de chaque colonne du tableau
            $row = [
                'Cycle '.$dataPost['data']['idcycle'],  //Bien sûr renvoyer le label, pas l'id
                $dataPost['data']['nombanque'],
                $dateNum,   //NE PAS OUBLIER LA COLONNE CACHEE
                '<span class="display-none">'.$dateNum.'</span>'.$date->format('d/m/Y'),
                $dataPost['data']['numero'],
                $dataPost['data']['montant'],
                '<a href="javascript:;" data-id="'.$idItem.'" class="btn btn-xs yellow-gold edit"><i class="fa fa-edit"></i> Editer le versement</a>'
            ];

            jsonRender(['success' => true, 'id' => $idItem, 'row' => $row, 'idRecuTest' => $addId]);
            break;
        //Données pour la page financier_jours.php
        case 'financier_jour':
            //Les données se trouvent ici
            $dataPost['params'];
            //Pour le test, différentes données en fonction des filtres pour chaque cas
            $rows = [];
            //Si pas de filtre
            if(empty($dataPost['params']['idCycle']) && empty($dataPost['params']['filterDate']))
                $rows = [
                    ['Scolarité',    '1155689'],
                    ['Informatique', '1155689'],
                    ['Anglais',      '1155689'],
                    ['Bus SOS',      '1155689'],
                    ['Bus Prive',    '1155689'],
                    ['APE',          '1155689'],
                    ['Reliquat',     '0']
                ];
            elseif(!empty($dataPost['params']['idCycle']) && !empty($dataPost['params']['filterDate']))
                $rows = [
                    ['Scolarité',    '1155689'],
                    ['Informatique', '1155689'],
                    ['Anglais',      '1155689'],
                    ['Bus SOS',      '1155689'],
                    ['Reliquat',     '0']
                ];
            elseif(!empty($dataPost['params']['idCycle']))
                $rows = [
                    ['Scolarité',    '1155689'],
                    ['Informatique', '1155689'],
                    ['Anglais',      '1155689'],
                    ['Bus SOS',      '1155689'],
                    ['Reliquat',     '5422254']
                ];
            elseif(!empty($dataPost['params']['filterDate']))
                $rows = [
                    ['Scolarité',    '1154885689'],
                    ['Informatique', '1154885689'],
                    ['Anglais',      '118757689'],
                    ['Bus SOS',      '118757689'],
                    ['APE',          '1155689'],
                    ['Reliquat',     '0']
                ];

            jsonRender($rows);
            break;
        //Lorsque le cycle est choisi sur l'ajout d'un élève
        case 'cycle_choice':
            //Format des données attendu en retour
            $dataAjax = [
                1 => [  // <= id du cycle, necessaire que pour ma version test
                    //Les classes du cycle
                    'classe' => '<option value=""></option><optgroup label="CRECHE"><option value="1">Classe 1</option><option value="2">Classe 2</option><option value="3">Classe 3</option><option value="4">Classe 4</option></optgroup>',
                    //Les champs à activer pour le cycle en question, les id vont être affecter sur les champs de type "field_id"
                    'fields' => ['inscription' => ['id' => 1]],
                    //La configuration des catégories, pour les champs qui ont été préalablement activé
                    'dataPaiement' => [
                        //la valeur "default" doit toujours être configuré. Si une catégorie n'est pas configuré alors on ira chercher la configuration par défaut.
                        //Dans cet exemple, à part les catégories avec les id : 2,5,8 et 9; toutes les autres catégories iront chercher la configuration par défaut
                        //Donc vous l'aurez compris, la configuration par défaut, est la configuration la plus répandue pour le cycle en question.
                        'default' => [
                            //Pour chaque champ qui est concerné par la catégorie
                            'inscription' => [  //nom du champ, le même que dans l'array "fields" et que dans l'attribut "data-field-name" dans le fichier php
                                'value'         => 20000,   //Valeur par défaut du champ "field_montant"
                                'read_only'      => true,   //Est-ce que le champ "field_montant" est modifiable ? true : non modifiable, false: Modifiable
                                'field_cond'    => [        //Si pour ce champ, un champ de type "field_cond" est associé, on le configure, sinon à false, ou vous pouvez l'omettre
                                    'read_only'      => false, //Est-ce que le champ "field_cond" est modifiable ? true : non modifiable, false: Modifiable
                                    'init_value'    => null,    //Valeur par défaut, si null alors 0 ou 1er option si c'est un select
                                    'on_change'      => [   //Configuration du on_change. Cet array sert à dire qu'est-ce que se passe si on modifie ce champ ?
                                        'default'   => [    //Si le comportement de la valeur n'est pas définit alors on prend le comportement par défaut, voir exemples juste après
                                            //L'opération à faire lorsque le champ field_cond est modifié.
                                            //Choix possibles :
                                            // '+' : Additionne la valeur du champ parent (field_montant) avec la valeur du champ enfant (field_cond)
                                            // '*' : Multiplie la valeur du champ parent (field_montant) avec la valeur du champ enfant (field_cond)
                                            // '-' : Soustrait la valeur du champ parent (field_montant) avec la valeur du champ enfant (field_cond)
                                            // '=' : Le champ parent (field_montant) aura comme valeur celle du champ enfant (field_cond)
                                            'operation' => '*',
                                            //Sur quelle valeur doit se faire l'opération
                                            //Choix possibles :
                                            // 'parent' : on récupère la valeur du champ parent (field_montant), dans cet exemple 20000
                                            // 'child' : on récupère la valeur du champ enfant (field_cond), dans cet exemple (là on est sur le champ Tarif dans le cycle creche, pour le champ Droit d'inscription) ça peut-être 1 ou 0.5
                                            // un int|float : valeur définit directement
                                            'value' => 'child'
                                        ]
                                        /*
                                         * Exemple 1, imaginons que j'ai un select avec comme options : 12 => Ajouter 1000, 2 => Ajouter 50, etc...
                                        '12' => [
                                            'operation' => '+', //L'opération est une addition
                                            //Dans mon exemple, voilà  à quoi j'ai accès pour value
                                            //Si j'utilise 'parent' => j'aurais 20000 (voir plus haut)
                                            //Si j'utilise 'child' => j'aurais 12 la value du select, alors pourquoi j'ai pas mis directement 1000 dans la value de l'option ? parce que on ne sait jamais comment est fait le select
                                            //Donc la dernière solution est la bonne, définir moi-même la valeur qui fera le calcul
                                            'value' => 1000

                                            //Au final, si l'utilisateur choisi l'option Ajouter 1000, je vais bien prendre 20000 + 1000
                                        ],
                                        * Exemple 2, encore un select avec comme options : 5 => Prix par défaut, etc....
                                        '5' => [
                                            'operation' => '=', //L'opération est une affectation
                                            //Dans mon exemple, voilà  à quoi j'ai accès pour value
                                            //Si j'utilise 'parent' => j'aurais 20000 (voir plus haut)
                                            //Si j'utilise 'child' => j'aurais 5 la value du select
                                            //ou la valeur que je pourrais définir directement
                                            'value' => 'parent'

                                            // 'parent' semble être la bonne solution, car je veux remettre le prix dpar défaut du champ parent, donc je récupère la valeur par défaut depuis l'array configCat et j'affecte cette au champ parent
                                        ]
                                        */
                                    ]
                                ]
                            ]
                        ],
                        //Là, on configure la catégorie avec l'id 2, même si vous voulez changer qu'une seule valeur par rapport à la config par défaut, vous devez tout reconfigurer. Une fois qu'une catégorie est configuré, la config par défaut est ignoré.
                        '2' => [
                            'inscription' => [
                                'value'         => 0,
                                'read_only'     => true,
                                'field_cond'    => [
                                    'read_only'      => false,
                                    'init_value'    => null, //Par exemple dans ce cas précis c'est à dire, cycle creche, pour la catégorie id = 2, pour le champ droit d'inscription et pour le champ field_cond (le select Tarif), je pourrais mettre 1 ou 0.5
                                    'on_change'      => [
                                        'default'   => ['operation' => '*', 'value' => 'child']
                                    ]
                                ]
                            ]
                        ],
                        //Là, catégorie avec id 5
                        '5' => ['inscription' => [
                            'value' => 0, 'read_only' => true, 'field_cond' => [
                                'read_only' => false, 'init_value' => null, 'on_change' => [
                                    'default' => ['operation' => '*', 'value' => 'child']
                                ]
                            ]
                        ]],
                        '8' => ['inscription' => [
                            'value' => 0, 'read_only' => true, 'field_cond' => [
                                'read_only' => false, 'init_value' => null, 'on_change' => [
                                    'default' => ['operation' => '*', 'value' => 'child']
                                ]
                            ]
                        ]],
                        '9' => ['inscription' => [
                            'value' => 0, 'read_only' => true, 'field_cond' => [
                                'read_only' => false, 'init_value' => null, 'on_change' => [
                                    'default' => ['operation' => '*', 'value' => 'child']
                                ]
                            ]
                        ]]
                    ]
                ],
                2 => [
                    'classe' => '<option value=""></option><optgroup label="JARDIN"><option value="5">Classe 5</option><option value="6">Classe 6</option><option value="7">Classe 7</option><option value="8">Classe 8</option></optgroup>',
                    'fields' => [
                        'inscription'   => ['id' => 8],
                        'scolarite'     => ['id' => 24],
                        'ape'           => ['id' => 11],
                        'tenueid'       => ['id' => 3]
                    ],
                    'dataPaiement' => [
                        'default' => [
                            'inscription'   => ['value' => 2500, 'read_only' => true,'field_cond' => ['read_only' => true,'init_value' => null]],
                            'scolarite'     => ['value' => 6000, 'read_only' => true, 'field_cond' => false],
                            'ape'           => ['value' => 3000, 'read_only' => true, 'field_cond' => false],
                            //Pour le champ "tenuid", le init_value du champ field_cond sera de 1, donc 1 sera affiché dans le champ field_cond.
                            //Si par exemple, init_value était égale à 2, alors selon les paramètres que j'ai mis le champ field_montant, aurait été initialisé avec une valeur de 10000
                            //en effet les paramètres indique : valeur du champ parent '*' valeur du champ enfant => 5000 * 2 = 10000
                            //Faite le test, si vous voulez...
                            'tenueid'       => ['value' => 5000, 'read_only' => true, 'field_cond' => ['read_only' => false, 'init_value' => 1,'on_change' => ['default' => ['operation' => '*', 'value' => 'child']]]]
                        ],
                        '1' => [
                            'inscription'   => ['value' => 2500, 'read_only' => true, 'field_cond' => ['read_only' => true, 'init_value' => null, 'on_change' => false]],
                            'scolarite'     => ['value' => -2000, 'read_only' => true],
                            'ape'           => ['value' => 3000, 'read_only' => true],
                            'tenueid'       => ['value' => 5000, 'read_only' => true, 'field_cond' => ['read_only' => false, 'init_value' => 1, 'on_change' => ['default' => ['operation' => '*', 'value' => 'child']]]]
                        ],
                        '2' => [
                            'inscription'   => ['value' => 0, 'read_only' => true, 'field_cond' => ['read_only' => true, 'init_value' => null]],
                            'scolarite'     => ['value' => 3000, 'read_only' => true],
                            'ape'           => ['value' => 3000, 'read_only' => true],
                            'tenueid'       => ['value' => 5000, 'read_only' => true, 'field_cond' => ['read_only' => false, 'init_value' => 1, 'on_change' => ['default' => ['operation' => '*', 'value' => 'child']]]]
                        ],
                        '5' => [
                            'inscription'   => ['value' => 0, 'read_only' => true, 'field_cond' => ['read_only' => true, 'init_value' => null]],
                            'scolarite'     => ['value' => 1000, 'read_only' => true],
                            'ape'           => ['value' => 0, 'read_only' => true],
                            'tenueid'       => ['value' => 5000, 'read_only' => true, 'field_cond' => ['read_only' => false, 'init_value' => 1, 'on_change' => ['default' => ['operation' => '*', 'value' => 'child']]]]
                        ],
                        '8' => [
                            'inscription'   => ['value' => 2500, 'read_only' => true, 'field_cond' => ['read_only' => true, 'init_value' => null]],
                            'scolarite'     => ['value' => 4000, 'read_only' => true],
                            'ape'           => ['value' => 3000, 'read_only' => true],
                            'tenueid'       => ['value' => 5000, 'read_only' => true, 'field_cond' => ['read_only' => false, 'init_value' => 1, 'on_change' => ['default' => ['operation' => '*', 'value' => 'child']]]]
                        ],
                        '9' => [
                            'inscription'   => ['value' => 0, 'read_only' => true, 'field_cond' => ['read_only' => true, 'init_value' => null]],
                            'scolarite'     => ['value' => 2500, 'read_only' => true],
                            'ape'           => ['value' => 3000, 'read_only' => true],
                            'tenueid'       => ['value' => 5000, 'read_only' => true, 'field_cond' => ['read_only' => false, 'init_value' => 1, 'on_change' => ['default' => ['operation' => '*', 'value' => 'child']]]]
                        ]
                    ]
                ],
                3 => [
                    'classe' => '<option value=""></option><optgroup label="PRIMAIRE"><option value="9">Classe 9</option><option value="10">Classe 10</option><option value="11">Classe 11</option><option value="12">Classe 12</option></optgroup>',
                    'fields' => [
                        'inscription'   => ['id' => 16],
                        'scolarite'     => ['id' => 25],
                        'ape'           => ['id' => 19],
                        'cotisation'    => ['id' => 39],
                        'tenueid'       => ['id' => 2]
                    ],
                    'dataPaiement' => [
                        'default' => [
                            'inscription'   => [ 'value' => 8000, 'read_only' => true, 'field_cond' => ['read_only' => true, 'init_value' => null]],
                            'scolarite'     => ['value' => 10000, 'read_only' => true],
                            'ape'           => ['value' => 2000, 'read_only' => true],
                            'cotisation'    => ['value' => 1000, 'read_only' => true],
                            'tenueid'       => ['value' => 6000, 'read_only' => true, 'field_cond' => ['read_only' => false, 'init_value' => 1,'on_change' => ['default' => ['operation' => '*', 'value' => 'child']]]]
                        ],
                        '1' => [
                            'inscription'   => ['value' => 8000, 'read_only' => true, 'field_cond' => ['read_only' => true, 'init_value' => null]],
                            'scolarite'     => ['value' => 2000, 'read_only' => true],
                            'ape'           => ['value' => 2000, 'read_only' => true],
                            'cotisation'    => ['value' => 1000, 'read_only' => true],
                            'tenueid'       => ['value' => 6000, 'read_only' => true, 'field_cond' => ['read_only' => false, 'init_value' => 1, 'on_change' => ['default' => ['operation' => '*', 'value' => 'child']]]]
                        ],
                        '2' => [
                            'inscription'   => ['value' => 0, 'read_only' => true, 'field_cond' => ['read_only' => true, 'init_value' => null]],
                            'scolarite'     => ['value' => 5000, 'read_only' => true],
                            'ape'           => ['value' => 2000, 'read_only' => true],
                            'cotisation'    => ['value' => 1000, 'read_only' => true],
                            'tenueid'       => ['value' => 6000, 'read_only' => true, 'field_cond' => ['read_only' => false, 'init_value' => 1, 'on_change' => ['default' => ['operation' => '*', 'value' => 'child']]]]
                        ],
                        '5' => [
                            'inscription'   => ['value' => 0, 'read_only' => true, 'field_cond' => ['read_only' => true, 'init_value' => null]],
                            'scolarite'     => ['value' => 1000, 'read_only' => true],
                            'ape'           => ['value' => 0, 'read_only' => true],
                            'cotisation'    => ['value' => 0, 'read_only' => true],
                            'tenueid'       => ['value' => 6000, 'read_only' => true, 'field_cond' => ['read_only' => false, 'init_value' => 1, 'on_change' => ['default' => ['operation' => '*', 'value' => 'child']]]]
                        ],
                        '8' => [
                            'inscription'   => ['value' => 8000, 'read_only' => true, 'field_cond' => ['read_only' => true, 'init_value' => null]],
                            'scolarite'     => ['value' => 8000, 'read_only' => true],
                            'ape'           => ['value' => 2000, 'read_only' => true],
                            'cotisation'    => ['value' => 1000, 'read_only' => true],
                            'tenueid'       => ['value' => 6000, 'read_only' => true, 'field_cond' => ['read_only' => false, 'init_value' => 1, 'on_change' => ['default' => ['operation' => '*', 'value' => 'child']]]]
                        ],
                        '9' => [
                            'inscription'   => ['value' => 0, 'read_only' => true, 'field_cond' => ['read_only' => true, 'init_value' => null]],
                            'scolarite'     => ['value' => 6500, 'read_only' => true],
                            'ape'           => ['value' => 2000, 'read_only' => true],
                            'cotisation'    => ['value' => 1000, 'read_only' => true],
                            'tenueid'       => ['value' => 6000, 'read_only' => true, 'field_cond' => ['read_only' => false, 'init_value' => 1, 'on_change' => ['default' => ['operation' => '*', 'value' => 'child']]]]
                        ]
                    ]
                ]
            ];

            $returnData = $dataAjax[$dataPost['id']];
            jsonRender(['success' => true, 'fields' => $returnData['fields'], 'classe' => $returnData['classe'], 'configCat' => $returnData['dataPaiement']]);
            break;
        //Form pour l'abandon d'un élève
        case 'erase_eleve':
            $outHtml = '<div id="myModal" class="modal fade" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-green">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title font-white">Abandon d\'un élève</h4>
                        </div>
                        <form class="form_matiere" role="form" action="undefined" method="post">
                            <div class="modal-body">
                                <div class="form-body">
                                    <input type="hidden" name="id" required="required" value="'.$dataPost['id'].'">
                                    <div class="form-group form-md-line-input form-md-floating-label">
                                        <div class="form-control form-control-static">2016/2017</div>
                                        <label>Année scolaire</label>
                                    </div>
                                    <div class="form-group form-md-line-input form-md-floating-label">
                                        <input type="text" class="form-control edited date-mask" name="date" required="required" id="date" value="'.date('d/m/Y').'">
                                        <label for="date">Date*</label>
                                    </div>
                                    <div class="form-group form-md-line-input form-md-floating-label">
                                        <div class="form-control form-control-static bold">Nom_A Prenom_A</div>
                                        <label>Elève</label>
                                    </div>
                                    <div class="form-group form-md-line-input form-md-floating-label">
                                        <textarea class="form-control" name="motif" id="motif" required="required" rows="4"></textarea>
                                        <label for="motif">Motif*</label>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Annuler</button>
                                <button type="submit" class="btn green">Sauvegarder</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>';

            jsonRender(['success' => true, 'html' => $outHtml]);
            break;
        //Form pour désabonnement d'un élève
        case 'desabo_eleve':
            $outHtml = '<div id="myModal" class="modal fade" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-green">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title font-white">Désabonnement d\'un élève</h4>
                        </div>
                        <form class="form_desabo" role="form" action="undefined" method="post">
                            <div class="modal-body">
                                <div class="form-body">
                                    <input type="hidden" name="id" required="required" value="'.$dataPost['id'].'">
                                    <div class="form-group form-md-line-input form-md-floating-label">
                                        <div class="form-control form-control-static">2016/2017</div>
                                        <label>Année scolaire</label>
                                    </div>
                                    <div class="form-group form-md-line-input form-md-floating-label">
                                        <div class="form-control form-control-static bold">Nom_A Prenom_A</div>
                                        <label>Elève</label>
                                    </div>
                                    <div class="form-group form-md-line-input form-md-floating-label">
                                        <input type="text" class="form-control edited date-mask" name="date" required="required" id="date" value="'.date('d/m/Y').'">
                                        <label for="date">Date*</label>
                                    </div>
                                    <div class="form-group form-md-checkboxes">
                                        <div class="md-checkbox-inline">
                                            <div class="md-checkbox">
                                                <input type="checkbox" name="trans_desabo" id="trans_desabo" class="md-check">
                                                <label for="trans_desabo">
                                                    <span></span>
                                                    <span class="check border-green"></span>
                                                    <span class="box"></span>Désabonner l\'élève des transports
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group form-md-checkboxes">
                                        <div class="md-checkbox-inline">
                                            <div class="md-checkbox">
                                                <input type="checkbox" name="cant_desabo" id="cant_desabo" class="md-check">
                                                <label for="cant_desabo">
                                                    <span></span>
                                                    <span class="check border-green"></span>
                                                    <span class="box"></span>Désabonner l\'élève de la cantine
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Annuler</button>
                                <button type="submit" class="btn green">Sauvegarder</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>';

            jsonRender(['success' => true, 'html' => $outHtml]);
            break;
        //Form pour l'annulation d'une facture ou reçu
        case 'cancel_facture':
            $outHtml = '<div id="myModal" class="modal fade" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-green">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title font-white">Annulation d\'une facture/reçu</h4>
                        </div>
                        <form class="form_matiere" role="form" action="undefined" method="post">
                            <div class="modal-body">
                                <div class="form-body">
                                    <input type="hidden" name="id" required="required" value="'.$dataPost['id'].'">
                                    <div class="form-group form-md-line-input form-md-floating-label">
                                        <div class="form-control form-control-static">2016/2017</div>
                                        <label>Année scolaire</label>
                                    </div>
                                    <div class="form-group form-md-line-input form-md-floating-label">
                                        <div class="form-control form-control-static bold">Nom_A Prenom_A</div>
                                        <label>Elève</label>
                                    </div>
                                    <div class="form-group form-md-line-input form-md-floating-label">
                                        <input type="text" class="form-control edited date-mask" name="date" required="required" id="date" value="'.date('d/m/Y').'">
                                        <label for="date">Date*</label>
                                    </div>
                                    <div class="form-group form-md-line-input form-md-floating-label">
                                        <textarea class="form-control" name="motif" id="motif" required="required" rows="4"></textarea>
                                        <label for="motif">Motif*</label>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Annuler</button>
                                <button type="submit" class="btn green">Sauvegarder</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>';

            jsonRender(['success' => true, 'html' => $outHtml]);
            break;
        //Editer l'abonnement trans_cant d'un élève
        case 'edit_trans_cant':
            //NE PAS OUBLIER DE REMPLIR ATTRIBUT ACTION DU FORM
            $outHtml = '<div class="col-xs-12 col-md-8 col-md-offset-2">
                <p class="text-center text-uppercase bold">élève : Nom_A Prenom_A<br/>Classe : Classe 2</p>
                <form role="form" action="undefined" method="post">
                    <div style="display:none;"><input type="hidden" name="_method" value="POST"></div>
                    <input type="hidden" name="eleveid" value="'.$dataPost['id'].'">
                    <input type="hidden" name="classeid" value="1">
                    <div class="form-body">
                        <table class="table table-striped table-bordered" id="table_paiement">
                            <thead>
                            <tr>
                                <th>Année scolaire 2016/2017</th>
                                <th>
                                    Mois :
                                    <select title="Mois" class="form-control input-inline" required="required" name="mois" id="mois">
                                        <option value="OCTOBRE">OCTOBRE</option>
                                        <option value="JANVIER">JANVIER</option>
                                        <option value="FEVRIER">FEVRIER</option>
                                        <option value="MARS">MARS</option>
                                        <option value="AVRIL">AVRIL</option>
                                        <option value="MAI">MAI</option>
                                        <option value="JUIN">JUIN</option>
                                        <option value="JUILLET">JUILLET</option>
                                        <option value="AOÛT">AOÛT</option>
                                        <option value="SEPTEMBRE">SEPTEMBRE</option>
                                        <option value="NOVEMBRE">NOVEMBRE</option>
                                        <option value="DECEMBRE">DECEMRE</option>
                                    </select>
                                </th>
                                <th>Date : <input title="Date" class="form-control input-inline date-mask" type="text" name="date" required="required" value="'.date('d/m/Y').'"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <label for="busid">Transport</label>
                                </td>
                                <td>
                                    <select class="form-control input_cond" name="busid" id="busid">
                                        <option value=""></option>
                                        <option value="5" selected>Bus SOS</option>
                                        <option value="6">Bus Privé</option>
                                    </select>
                                    <div class="form-group form-md-radios display-none" id="zone_bus">
                                        <div class="md-radio-inline">
                                            <div class="md-radio">
                                                <input type="radio" id="zone_1" name="zone" value="1" class="md-radiobtn input_cond">
                                                <label for="zone_1">
                                                    <span class="inc"></span>
                                                    <span class="check bg-green"></span>
                                                    <span class="box"></span> Zone 1
                                                </label>
                                            </div>
                                            <div class="md-radio">
                                                <input type="radio" id="zone_2" name="zone" checked="checked" value="2" class="md-radiobtn input_cond">
                                                <label for="zone_2">
                                                    <span class="inc"></span>
                                                    <span class="check bg-green"></span>
                                                    <span class="box"></span> Zone 2
                                                </label>
                                            </div>
                                            <div class="md-radio">
                                                <input type="radio" id="zone_3" name="zone" value="3" class="md-radiobtn input_cond">
                                                <label for="zone_3">
                                                    <span class="inc"></span>
                                                    <span class="check bg-green"></span>
                                                    <span class="box"></span> Zone 3
                                                </label>
                                            </div>
                                            <div class="md-radio">
                                                <input type="radio" id="zone_4" name="zone" value="4" class="md-radiobtn input_cond">
                                                <label for="zone_4">
                                                    <span class="inc"></span>
                                                    <span class="check bg-green"></span>
                                                    <span class="box"></span> Zone 4
                                                </label>
                                            </div>
                                            <div class="md-radio">
                                                <input type="radio" id="zone_5" name="zone" value="5" class="md-radiobtn input_cond">
                                                <label for="zone_5">
                                                    <span class="inc"></span>
                                                    <span class="check bg-green"></span>
                                                    <span class="box"></span> Zone 5
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <input title="Montant trsnsport" type="number" class="form-control input_payer" name="trans" id="trans" value="3000">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="cantine">Cantine</label>
                                </td>
                                <td>
                                    <select class="form-control input_cond" name="cantine" id="cantine">
                                        <option value=""></option>
                                        <option value="2">Pension</option>
                                        <option value="3" selected>Demi-pension</option>
                                    </select>
                                    <label for="tarif" class="display-none" id="cont_tarif">Tarif :
                                        <select class="form-control input-inline margin-top-10 input_cond" name="tarif" id="tarif">
                                            <option value="1">1</option>
                                            <option value="0.5" selected>1/2</option>
                                        </select>
                                    </label>
                                </td>
                                <td>
                                    <input title="Montant cantine" type="number" class="form-control input_payer" name="cant" id="cant" value="1800">
                                </td>
                            </tr>
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="2">Montant à payer</td>
                                <td><input title="Montant total à payer" type="number" class="form-control input_somme" name="globale" id="globale" readonly value="7800"></td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="form-actions noborder text-center">
                        <button type="submit" class="btn green">Enregistrer</button>
                    </div>
                </form>
            </div>';
            //Prix des transports/cantine
            $prix = ['pension' => 4800, 'demi_pension' => 3600, 'busPrive' => 2000, 'zone1' => 2000, 'zone2' => 3000, 'zone3' => 2500, 'zone4' => 1000, 'zone5' => 4000];

            jsonRender(['success' => true, 'html' => $outHtml, 'prix' => $prix]);
            break;
    }
}
//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! COMPTE DIRECTEUR !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
elseif($dataPost['compte'] == 'directeur'){
    //Selon l'action demandé
    switch($dataPost['action']){
        default:
            jsonRender(['success' => false]);
            break;
        //Voir un carnet de note
        case 'view_carnet_note':
            $outHtml = '<div id="myModal" class="modal fade" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-green">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title font-white">Carnet de note</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="portlet light portlet-fit">
                                        <div class="portlet-body">
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-6">
                                                    <dl>
                                                        <dt class="margin-bottom-5">Elève :</dt><dd>Nom_A Prenom_A</dd>
                                                        <dt class="margin-bottom-5 margin-top-10">Année scolaire :</dt><dd>2016/2017</dd>
                                                    </dl>
                                                </div>
                                                <div class="col-xs-12 col-sm-6">
                                                    <dl>
                                                        <dt class="margin-bottom-5">Classe :</dt><dd>Classe 2</dd>
                                                        <dt class="margin-bottom-5 margin-top-10">Trimestre :</dt><dd>1er Trimestre</dd>
                                                    </dl>
                                                </div>
                                            </div>
                                            <table class="table table-condensed">
                                                <thead>
                                                <tr>
                                                    <th>Matières</th>
                                                    <th>Note sur</th>
                                                    <th>Controle</th>
                                                    <th>Composition</th>
                                                    <th>Appréciation</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>Matiere</td>
                                                    <td>10</td>
                                                    <td>-</td>
                                                    <td>-</td>
                                                    <td>Un élève très sérieux </td>
                                                </tr>
                                                <tr>
                                                    <td>Matiere</td>
                                                    <td>10</td>
                                                    <td>-</td>
                                                    <td>-</td>
                                                    <td>Un élève très sérieux </td>
                                                </tr>
                                                <tr>
                                                    <td>Matiere</td>
                                                    <td>10</td>
                                                    <td>-</td>
                                                    <td>-</td>
                                                    <td>Un élève très sérieux </td>
                                                </tr>
                                                <tr>
                                                    <td>Matiere</td>
                                                    <td>10</td>
                                                    <td>-</td>
                                                    <td>-</td>
                                                    <td>Un élève très sérieux </td>
                                                </tr>
                                                <tr>
                                                    <td>Matiere</td>
                                                    <td>10</td>
                                                    <td>-</td>
                                                    <td>-</td>
                                                    <td>Un élève très sérieux </td>
                                                </tr>
                                                <tr>
                                                    <td>Matiere</td>
                                                    <td>10</td>
                                                    <td>-</td>
                                                    <td>-</td>
                                                    <td>Un élève très sérieux </td>
                                                </tr>
                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <td>Total</td>
                                                    <td>0</td>
                                                    <td colspan="3">0</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">Moyenne</td>
                                                    <td>0.00</td>
                                                    <td>0.00</td>
                                                </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn dark btn-outline" data-dismiss="modal">Fermer</button>
                        </div>
                    </div>
                </div>
            </div>';
            jsonRender(['success' => true, 'html' => $outHtml]);
            break;
        //Voir un carnet de note
        case 'view_notes':
            $outHtml = '<div id="myModal" class="modal fade" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-green">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title font-white">Carnet de note</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="portlet light portlet-fit">
                                        <div class="portlet-body">
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-6">
                                                    <dl>
                                                        <dt class="margin-bottom-5">Elève :</dt><dd>Nom_A Prenom_A</dd>
                                                        <dt class="margin-bottom-5 margin-top-10">Année scolaire :</dt><dd>2016/2017</dd>
                                                    </dl>
                                                </div>
                                                <div class="col-xs-12 col-sm-6">
                                                    <dl>
                                                        <dt class="margin-bottom-5">Classe :</dt><dd>Classe 2</dd>
                                                        <dt class="margin-bottom-5 margin-top-10">Trimestre :</dt><dd>1er Trimestre</dd>
                                                    </dl>
                                                </div>
                                            </div>
                                            <table class="table table-condensed">
                                                <thead>
                                                <tr>
                                                    <th>Matières</th>
                                                    <th>Note sur</th>
                                                    <th>Note</th>
                                                    <th>Appréciation</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>Matiere</td>
                                                    <td>10</td>
                                                    <td>8</td>
                                                    <td>Un élève très sérieux </td>
                                                </tr>
                                                <tr>
                                                    <td>Matiere</td>
                                                    <td>10</td>
                                                    <td>8</td>
                                                    <td>Un élève très sérieux </td>
                                                </tr>
                                                <tr>
                                                    <td>Matiere</td>
                                                    <td>10</td>
                                                    <td>8</td>
                                                    <td>Un élève très sérieux </td>
                                                </tr>
                                                <tr>
                                                    <td>Matiere</td>
                                                    <td>10</td>
                                                    <td>8</td>
                                                    <td>Un élève très sérieux </td>
                                                </tr>
                                                <tr>
                                                    <td>Matiere</td>
                                                    <td>10</td>
                                                    <td>8</td>
                                                    <td>Un élève très sérieux </td>
                                                </tr>
                                                <tr>
                                                    <td>Matiere</td>
                                                    <td>10</td>
                                                    <td>8</td>
                                                    <td>Un élève très sérieux </td>
                                                </tr>
                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <td>Total</td>
                                                    <td>160</td>
                                                    <td colspan="2">140</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">Moyenne</td>
                                                    <td>0.00</td>
                                                </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn dark btn-outline" data-dismiss="modal">Fermer</button>
                        </div>
                    </div>
                </div>
            </div>';
            jsonRender(['success' => true, 'html' => $outHtml]);
            break;
    }
}
//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! TOUS LES COMPTES !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
elseif($dataPost['compte'] == 'all_compte'){
    switch($dataPost['action']){
        default:
            jsonRender(['success' => false]);
            break;
        //Retourne les options du filtre classe, pour un cycle donné ou toutes les classes si pas de cycle
        case 'filter_cycle':
            $optionsHtml = '<option value="" selected="selected">Toutes</option>';
            $optionsData = [
                1 => '<option data-id="1" value="Classe 1">Classe 1</option><option data-id="2" value="Classe 2">Classe 2</option><option data-id="3" value="Classe 3">Classe 3</option>',
                2 => '<option data-id="4" value="Classe 4">Classe 4</option><option data-id="5" value="Classe 5">Classe 5</option><option data-id="6" value="Classe 6">Classe 6</option>',
                3 => '<option data-id="7" value="Classe 7">Classe 7</option><option data-id="8" value="Classe 8">Classe 8</option><option data-id="9" value="Classe 9">Classe 9</option>'
            ];
            //Selon l'id du cycle
            if(!isset($dataPost['id']) || empty($dataPost['id']))
                $optionsHtml.= $optionsData[1].$optionsData[2].$optionsData[3];
            else
                $optionsHtml.= $optionsData[$dataPost['id']];

            jsonRender(['success' => true, 'optionsHtml' => $optionsHtml]);
            break;
        //Retourne les options du select classes pour un form en fonction de l'id cycle
        case 'change_cycle':
            $optionsHtml = '<option value=""></option>';
            $optionsData = [
                1 => '<option value="1">Classe 1</option><option value="2">Classe 2</option><option value="3">Classe 3</option>',
                2 => '<option value="4">Classe 4</option><option value="5">Classe 5</option><option value="6">Classe 6</option>',
                3 => '<option value="7">Classe 7</option><option value="8">Classe 8</option><option value="9">Classe 9</option>'
            ];

            //Selon l'id du cycle
            if(isset($dataPost['id']) && !empty($dataPost['id']))
                $optionsHtml.= $optionsData[$dataPost['id']];

            jsonRender(['success' => true, 'optionsHtml' => $optionsHtml]);
            break;

    }
}
//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
else
    jsonRender(['success' => false]);