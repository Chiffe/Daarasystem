/**
 * Created by Jr on 28/06/2017.
 */

var parentNote = function () {

    var handleTable = function() {
        var table = $('#table_note');

        var oTable = table.DataTable($.extend(mainInterface.defaultDatatable, {
	        order: [[3, 'desc']],
            columnDefs: [{orderable: false, targets: [0]}]
        }));

	    //Sélection sur le filtre trimestre
	    $('#filter_trimestre').on('change', function(){
		    oTable.column(2).search($(this).val()).draw();
	    });
    };

    return {
        init: function(){
            handleTable();
        }
    };
}();

$(document).ready(function(){parentNote.init();});