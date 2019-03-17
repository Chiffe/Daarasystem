/**
 * Created by Jr on 28/06/2017.
 */

/**
 * Created by Jr on 20/04/2015.
 */

var directeurFeaturesFormEleve = function () {
    var handleSelect = function() {
        //Init select
        $('#clas_doublee').multiSelect({
            selectableHeader:   "<div class='bg-green padd_select font-white text-center'><h5>Classes disponibles</h5></div>",
            selectionHeader:    "<div class='bg-green padd_select font-white text-center'><h5>Classes doublées</h5></div>"
        });
    };

    return {
        init: function(){
            handleSelect();
        }
    };
}();

$(document).ready(function(){directeurFeaturesFormEleve.init();});