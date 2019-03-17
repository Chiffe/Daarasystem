/**
 * Created by Jr on 28/06/2017.
 */

/**
 * Created by Jr on 20/04/2015.
 */

var comptableArriere = function () {
    var handleTable = function() {
        var table = $('#table_arriere');

        var oTable = table.DataTable($.extend(mainInterface.defaultDatatable, {order: [[0, 'desc']]}));

        //Sélection sur le filtre mois
        $('#filter_mois').on('change', function(){
            oTable.column(2).search($(this).val()).draw();
        });
    };

    return {
        init: function(){
            handleTable();
        }
    };
}();

$(document).ready(function(){comptableArriere.init();});