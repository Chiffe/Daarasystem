/**
 * Created by Jr on 28/06/2017.
 */

/**
 * Created by Jr on 20/04/2015.
 */

var comptableArriere = function () {
    var handleTable = function() {
        var table = $('#table_paiement_annuler');

        table.DataTable($.extend(mainInterface.defaultDatatable, {order: [[0, 'desc']]}));
    };

    return {
        init: function(){
            handleTable();
        }
    };
}();

$(document).ready(function(){comptableArriere.init();});