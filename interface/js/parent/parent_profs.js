/**
 * Created by Jr on 28/06/2017.
 */

var parentProf = function () {
    var handleTable = function() {
        var table = $('#table_prof');

        table.DataTable($.extend(mainInterface.defaultDatatable, {order: [[1, 'asc']], stateSave:true, columnDefs: [{orderable: false, targets: [3]}]}));
    };

        return {
        init: function(){
            handleTable();
        }
    };
}();

$(document).ready(function(){parentProf.init();});