/**
 * Created by Jr on 28/06/2017.
 */

/**
 * Created by Jr on 20/04/2015.
 */

var profDevoir = function () {

    var handleTable = function() {
        var table = $('#table_devoir');

        var oTable = table.DataTable($.extend(mainInterface.defaultDatatable, {
            order: [[1, 'asc']]
        }));

        //Sélection sur le filtre matire
        $('#filter_matiere').on('change', function(){
            oTable.column(6).search($(this).val()).draw();
        });

        //Sélection sur le filtre trimestre
        $('#filter_trimestre').on('change', function(){
            oTable.column(5).search($(this).val()).draw();
        });

        //Sélection sur le filtre classe
        $('#filter_classe').on('change', function(){
            oTable.column(1).search($(this).val()).draw();
        });

        //Sélection sur le filtre cycle
        $('#filter_cycle').on('change', function(){
            oTable.column(0).search($(this).val()).column(1).search("").draw();
        });
    };

    return {
        init: function(){
            handleTable();
        }
    };
}();

$(document).ready(function(){profDevoir.init();});