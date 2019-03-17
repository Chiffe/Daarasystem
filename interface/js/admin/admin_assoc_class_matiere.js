/**
 * Created by Jr on 28/06/2017.
 */

/**
 * Created by Jr on 20/04/2015.
 */

var adminAssoc = function () {
    //---------------- Test Bew-Works A SUPPRIMER ---------
    var ajaxResponse = true;
    var ajaxResponseMatiere = [];
    ajaxResponseMatiere[1] = [];
    ajaxResponseMatiere[2] = ['1','2','4','6','7','10'];
    ajaxResponseMatiere[3] = ['9','10'];

    var handleBW = function(){
        $('#bw_test').on('switchChange.bootstrapSwitch', function (event, state) {
            ajaxResponse = state;
        });
    };
    //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

    var urls = {
        "getMatieres":      "url_pour_avoir_les_matieres_de_la_classe"
    };

    var handleSelect = function() {
        var select = $('#matieres');
        //Init les messages de notifications
        toastr.options = mainInterface.defaultToastr;

        //Init select
        select.multiSelect({
            selectableHeader:   "<div class='bg-green padd_select font-white text-center'><h5>Matières disponibles</h5></div>",
            selectionHeader:    "<div class='bg-green padd_select font-white text-center'><h5>Matières associées</h5></div>",
            selectableOptgroup: true
        });

        //Lors d'un changement de classe
        $('#classe').on('change', function(){
            //On récupère l'id de la classe
            var idClasse = $(this).val();

            //On désélectionne toutes les matières
            select.multiSelect('deselect_all');
            //Si une classe est sélectionnée
            if(idClasse){
                // ------------------------------- Faire requête AJAX à la place ----------------------
                // Utiliser urls.getMatieres pour avoir les id des matières associées à la classe
                // Le retour attendu un tableau avec les ids (en string) des matières de la classe et le boolean de la répone AJAX
                // --------
                //On simule le retour ajax
                var dataPost = [];
                dataPost['ajaxResponse'] = ajaxResponse;
                dataPost['matieres'] = ajaxResponseMatiere[idClasse];
                //Si retour OK
                if(dataPost['ajaxResponse'])
                    //On sélectionne les matières
                    select.multiSelect('select', dataPost['matieres']);
                else
                    toastr.warning('Une erreur est survenue. Veuillez recharger la page et réessayer.');
                // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
            }
        });
    };

    return {
        init: function(){
            handleSelect();
            handleBW(); // Test BEW-Works A SUPPRIMER
        }
    };
}();

$(document).ready(function(){adminAssoc.init();});