/**
 * Created by Jr on 28/06/2017.
 */

/**
 * Created by Jr on 20/04/2015.
 */

var comptableLog = function () {
    var handleTable = function() {
        var table = $('#table_log');

        table.DataTable($.extend(mainInterface.defaultDatatable, {order: [[0, 'desc']], stateSave: true}));
    };

    return {
        init: function(){
            handleTable();
        }
    };
}();

$(document).ready(function(){comptableLog.init();});