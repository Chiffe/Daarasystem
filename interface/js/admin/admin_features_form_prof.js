/**
 * Created by Jr on 28/06/2017.
 */

/**
 * Created by Jr on 20/04/2015.
 */

var adminFeaturesFormProf = function () {

    var handleSelect = function() {
        //Init select
        $('#matieres').multiSelect({
            selectableHeader:   "<div class='bg-green padd_select font-white text-center'><h5>Matières disponibles</h5></div>",
            selectionHeader:    "<div class='bg-green padd_select font-white text-center'><h5>Matières associées</h5></div>",
            selectableOptgroup: true,
            cssClass:           'align_multiselect margin_r100 margin_b35'
        });
        $('#classes').multiSelect({
            selectableHeader:   "<div class='bg-green padd_select font-white text-center'><h5>Classes disponibles</h5></div>",
            selectionHeader:    "<div class='bg-green padd_select font-white text-center'><h5>Classes associées</h5></div>",
            cssClass:           'align_multiselect'
        });
    };

    return {
        init: function(){
            handleSelect();
        }
    };
}();

$(document).ready(function(){adminFeaturesFormProf.init();});