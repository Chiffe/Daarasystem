/**
 * Created by Jr on 28/06/2017.
 */

/**
 * Created by Jr on 20/04/2015.
 */

var comptableArchiveCycle = function () {
    var handleTable = function() {
        var table = $('#table_archive_cycle');

        table.DataTable($.extend(mainInterface.defaultDatatable, {order: [[0, 'desc']], stateSave: true, columnDefs: [{orderable: false, targets: [1,2,3,4]}]}));
    };

    return {
        init: function(){
            handleTable();
        }
    };
}();

$(document).ready(function(){comptableArchiveCycle.init();});