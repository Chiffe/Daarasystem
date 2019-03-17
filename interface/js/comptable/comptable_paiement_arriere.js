/**
 * Created by Jr on 28/06/2017.
 */

/**
 * Created by Jr on 20/04/2015.
 */

var comptablePaiementArriere = function () {

    var handleSelect2 = function() {
        //Init select
        $('#ideleve').select2({
            placeholder: 'Sélectionnez un élève',
            allowClear: true
        });
    };

    var handleNotFoundEleve = function(){
        //Si la case change d'état
        $('#notfound').on('change', function(){
            //Si coché
            if($(this).prop('checked')){
                //On met l'input ideleve à null
                $('#ideleve').val("").trigger('change.select2');
                // et on le rend dispensable
                $('#ideleve').prop('required', false);
                //On rend les champs nom, prenom et civilite indispensable
                $('.notfound_eleve input, .notfound_eleve select').prop('required', true);
                //On affiche les autres champs
                $('.found_eleve').hide('fast', function(){
                    $('.notfound_eleve').show('slow');
                })
            }else{
                //On rend les champs nom, prenom et civilite dispensable
                $('.notfound_eleve input, .notfound_eleve select').prop('required', false);
                //On rend le champ ideleve indispensable
                $('#ideleve').prop('required', true);
                //On affiche les autres champs
                $('.notfound_eleve').hide('fast', function(){
                    $('.found_eleve').show('slow');
                })
            }
        });
    };

    //Changement sur le cycle
    $('#cycle').on('change', function(){
        //On va chercher les classes du cycle
        mainInterface.ajaxRequest('../response_ajax.php', {compte:'all_compte', action:'change_cycle', id:$(this).val()}, function(resAjax){
            if(resAjax.success)
                $('#classe').html(resAjax.optionsHtml);
        });
    });

    return {
        init: function(){
            handleSelect2();
            handleNotFoundEleve();
        }
    };
}();

$(document).ready(function(){comptablePaiementArriere.init();});