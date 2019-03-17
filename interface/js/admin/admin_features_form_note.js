/**
 * Created by Jr on 28/06/2017.
 */

var adminFeaturesFormNote = function () {

    //---------- Page Ajouter des notes -----------------------------------
    var handleAddForm = function() {
        if(jQuery().select2)
            return false;

        //Lors d'un changement de classe
        $('#id_classe').on('change', function(){
            var value = $(this).val();

            //Si value est null
            if(value == ''){
                //On cache le listing des élèves
                $('#cont_eleves_add_note').fadeOut('slow', function(){
                    //On reset le select matiere
                    $('#id_matiere').html('<option value=""></option>').removeClass('edited');
                    //On affiche la phrase d'attente
                    $('.tohide').fadeIn('fast');
                    //On supprime le contenu
                    $(this).html('');
                });
            }else{
                //On va chercher les élèments pour compléter le formulaire
                mainInterface.ajaxRequest('../response_ajax.php', {compte:'admin', action:'change_classe_form_add_note', id:value}, function(resAjax){
                    if(resAjax.success){
                        //On insère les matières au select
                        $('#id_matiere').html(resAjax.matieres).addClass('edited');
                        //On cache la phrase d'attente
                        $('.tohide').fadeOut('slow');
                        //On cache le listing des élèves
                        $('#cont_eleves_add_note').fadeOut('slow', function(){
                            //On modifie le html et on le réaffiche
                            $(this).html(resAjax.eleves).fadeIn('fast');
                        });
                    }
                    else
                        toastr.warning('Une erreur est survenue.');
                });
            }
        });
    };

	//---------- Page Modifier des notes -----------------------------------
    var handleEditForm = function() {
        if(!jQuery().select2)
            return false;

        //Init select
        $('#id_eleve').select2({
            placeholder: 'Sélectionnez un élève'
        });

        //Les var pour stocker les valeurs des champs
        var fieldsValue = {
            id_classe: null,
            trimes: null,
            id_matiere: null,
            id_eleve: null
        };

        //Lors d'un changement sur le champ classe
        $('#id_classe').on('change', function(){
            var value = $(this).val();
            //On met à zéro, matiere et eleve
            fieldsValue.id_matiere = null;
            fieldsValue.id_eleve = null;

            //Quelque soit le résultat, on nettoie le formulaire
            //On cache le label de la matière
            $('.toshow').fadeOut('slow');
            //On cache le listing des devoirs
            $('#cont_devoirs_edit_note').fadeOut('slow', function(){
                //On affiche la phrase d'attente
                $('.tohide').fadeIn('fast');
                //On supprime le contenu du tableau
                $(this).find('tbody').html('');
            });

            if(value == ''){
                fieldsValue.id_classe = null;
                //On reset le select matiere
                $('#id_matiere').html('<option value=""></option>').removeClass('edited');
                //On reset le select eleve
                $('#id_eleve').html('<option value=""></option>');
            }else{
                fieldsValue.id_classe = value;
                //On va chercher les élèments pour compléter le formulaire
                mainInterface.ajaxRequest('../response_ajax.php', {compte:'admin', action:'change_classe_form_edit_note', id:value}, function(resAjax){
                    if(resAjax.success){
                        //On insère les matières au select
                        $('#id_matiere').html(resAjax.matieres).removeClass('edited');
                        //On insère les eleves au select
                        $('#id_eleve').html(resAjax.eleves);
                    }
                    else
                        toastr.warning('Une erreur est survenue.');
                });
            }
        });

        //Lors d'un changement sur un des champs de base
        $('.change_field').on('change', function(){
            var value = $(this).val();
            var name = $(this).attr('name');

            if(value == '')
                fieldsValue[name] = null;
            else
                fieldsValue[name] = value;

            changeField();
        });

        /**
         * Vérifie ques tous les champs sont remplis avant de faire la requête AJAX pour aller chercher les devoirs
         * Gère également l'affichage du listing des devoirs.
         */
        function changeField(){
            var allFieldsFilled = true;

            //On vérifie que chaque champ est rempli
            $.each(fieldsValue, function(k,v){
                if(v == null){
                    allFieldsFilled = false;
                    return false;
                }
            });

            //Si tous les champs ne sont pas remplis
            if(!allFieldsFilled){
                //On cache le label de la matière
                $('.toshow').fadeOut('slow');
                //On cache le listing des devoirs
                $('#cont_devoirs_edit_note').fadeOut('slow', function(){
                    //On affiche la phrase d'attente
                    $('.tohide').fadeIn('fast');
                    //On supprime le contenu du tableau
                    $(this).find('tbody').html('');
                });
            }else{
                //On va chercher le listing des devoirs pour compléter le formulaire
                mainInterface.ajaxRequest('../response_ajax.php', {compte:'admin', action:'all_fields_filled_form_edit_note', data:fieldsValue}, function(resAjax){
                    if(resAjax.success){
                        //On cache le label de la matière
                        $('.toshow').fadeOut('slow', function(){
                            //On modifie le label et on le réaffiche
                            $('#label_matiere').html(' : '+resAjax.matiere).fadeIn('fast');
                        });
                        //On cache la phrase d'attente
                        $('.tohide').fadeOut('fast');
                        //On cache le listing des élèves
                        $('#cont_devoirs_edit_note').fadeOut('slow', function(){
                            //On modifie le html et on le réaffiche
                            $(this).find('tbody').html(resAjax.devoirs);
                            $(this).fadeIn('fast');
                        });
                    }
                    else
                        toastr.warning('Une erreur est survenue.');
                });
            }
        }
    };

    return {
        init: function(){
            handleAddForm();
            handleEditForm();
        }
    };
}();

$(document).ready(function(){adminFeaturesFormNote.init();});