/**
 * Created by Jr on 28/06/2017.
 */

/**
 * Created by Jr on 20/04/2015.
 */

var adminAbsent = function () {

    var handleTable = function() {
        var table = $('#table_absent');
        var selectClasse = $('#filter_classe');
        var selectCycle = $('#filter_cycle');
        var inputDate = $('#filter_date');

        var oTable = table.DataTable($.extend(mainInterface.defaultDatatable, {order: [[5, 'desc']]}));

        //Sélection sur le filtre étape
        inputDate.on('change', function(){
            oTable.column(5).search($(this).val()).draw();
        });

        //Sélection sur le filtre cycle
        selectCycle.on('change', function(){
            oTable.column(0).search($(this).val()).column(1).search("").draw();
        });

        //Sélection sur le filtre classe
        selectClasse.on('change', function(){
            oTable.column(1).search($(this).val()).draw();
        });
    };

    return {
        init: function(){
            handleTable();
        }
    };
}();

$(document).ready(function(){adminAbsent.init();});